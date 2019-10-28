<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:inc/noaccess.php");
    exit;
}
require_once ("inc/functions_db.php");
include('templates/header.php'); 
$money_format = '%(#10n';
$date_format = "D, M d, Y ";
$guiabar_ident = "add / edit category";
?>

<body class="subpage">
<div id="main">

<div class="top1">
<?php 
$index1="false";
$index2="false";
$index3="true";
$index4="false";
$index5="false";
include('templates/menubar.php'); 

?>

</div>

<?php

?>

<div id="content">
<div class="container">
<div class="row">
		<?php
		$search_type = "transactions";
			include('templates/searchcomplete.php'); 
		?>
		

<div class="col-lg-9">
	
<h1>Transactions for the current period</h1>

<div id = "stage" style = "background-color:cc0;">
       
</div>

<?php

$stmt = get_db()->prepare('SELECT * FROM public.ezfin_transactions');
//$stmt->bindValue(':op', $myOperation, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count =0;
$added = false;
foreach ($rows as $row)
{
	//get category
	$oper_image ="cat_income_green_peq.png";
	$stmt = get_db()->prepare('SELECT operation FROM public.ezfin_category WHERE idcat =  :op');
	$stmt->bindValue(':op', $row['idcategory'], PDO::PARAM_INT);
	$stmt->execute();
	$operation = $stmt->fetchColumn();
	switch($operation){
	   case 0:
	   $oper_image ="cat_income_green_peq.png";
	   break;
	   case 1:
	   $oper_image ="cat_bill_red_peq.png";
	   break;
	   case 2:
	   $oper_image = "cat_informative_peq.png";
	   break;
	}
	$added = false;
	if ($count  == 0 ) echo '<ul class="thumbnails thumbnails1">';
	echo '<li>';
		echo '<div class="thumbnail clearfix">';
		    // todo: add category icon here
			echo '<figure class="oper_icon"><img src="images/'.$oper_image.'" alt=""></figure>';
			echo '<div class="caption">';											
				echo '<h3>'.date_format(date_create($row['duedate']),$date_format)." - $ ". money_format($money_format, $row['amount']);
				echo '</h3>';
				echo '<p>';
						echo "  ".$row['description']. '<a href=" inctrans.php?update='.$row['idtransaction'].'"><strong>  edit</strong></a>';
				echo '</p>';
			echo '</div>';			
		echo '</div>';
	echo '</li>';
	if ($count  == 1 ) {
		echo '</ul>';
		$count = 0;
		$added = true;
	}else $count ++;
}
if ($added = false) echo '</ul>';
?>
				



</div>
<div class="col-lg-3">


<?php 
	include( 'templates/translist.php');

?>
	    	            		      	      			      
		

	

	
</div>	
</div>
<div class="row">
<div class="col-lg-12">

<div class="line1"></div>



</div>	
</div>	
</div>	
</div>


<div class="bot1">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="bot1_inner">

	<?php include('templates/footer.php'); ?>
	
</div>	
</div>	
</div>



	
</div>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
	$(document).ready(function() {	
		$("#driver").click(function(event){
               var name = $("#text-free_text").val();
			   var user = $("#text-user").val();
			   var category = $("#category").val();
			   var start_date = $("#text-start_date").val();
			   var end_date = $("#text-end_date").val();
			   var status = $("#status").val();
			   var amount = $("#text-amount").val();
               $("#stage").load('ajax/results.php', {
				   "name":name,
				   "user":user,
				   "category":category,
				   "start_date":start_date,
				   "end_date":end_date,
				   "status":status,
				   "amount":amount
				   } );
            });
	}); //
	$(window).load(function() {
		//
		
	}); //
	</script>	
</body>
</html>