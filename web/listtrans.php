<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location:inc/noaccess.php");
    //exit;
}
require_once ("inc/connect.php");
include('templates/header.php'); 
$money_format = '%(#10n';
$date_format = "D, M d, Y ";
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

<div class="breadcrumbs1">
<div class="container">
<div class="row">
<div class="span12">
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;transactions</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">

		<div class="search-form-wrapper clearfix">
			<form id="search-form" action="search.php" method="GET" accept-charset="utf-8" class="navbar-form clearfix" >
				<input type="hidden" id="seach_what" name="t" value="transactions">
				<input type="text" name="s" value='Search' onBlur="if(this.value=='') this.value='Search'" onFocus="if(this.value =='Search' ) this.value=''">
				<a href="#" onClick="document.getElementById('search-form').submit()"></a>
			</form>
		</div>

<div class="span9">
	
<h1>Transactions for the current period</h1>



<?php

$stmt = $db->prepare('SELECT * FROM public.ezfin_transactions');
//$stmt->bindValue(':op', $myOperation, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count =0;
$added = false;
foreach ($rows as $row)
{
	//get category
	$oper_image ="cat_income_green_peq.png";
	$stmt = $db->prepare('SELECT operation FROM public.ezfin_category WHERE idcat =  :op');
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
						echo $row['description']. '<a href=" edittransacton.php?idtrans='.$row['idtransaction'].'"><strong>  edit</strong></a>';
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
<div class="span3">

<h2>services List</h2>

	<ul class="ul1">
<?php 
	foreach ($db->query('SELECT * FROM public.ezfin_transactions') as $row)
	{
	echo '<li><a href="#">';
	echo $row['idcategory']." - ".$row['duedate']." - ". money_format($money_format, $row['amount']);
	echo '</a></li>';
	}
?>
	    	            		      	      			      
	</ul>	

	

	
</div>	
</div>
<div class="row">
<div class="span12">

<div class="line1"></div>

<h2>Special offers</h2>

<div class="row">
<div class="span6">
	
</div>
<div class="span6">
<div class="thumb4">
	
</div>	
</div>	
</div>



<div class="line1"></div>







</div>	
</div>	
</div>	
</div>


<div class="bot1">
<div class="container">
<div class="row">
<div class="span12">
<div class="bot1_inner">

	<?php include('templates/footer.php'); ?>
	
</div>	
</div>	
</div>








	
</div>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
	$(document).ready(function() {	
		//
	
	
	
	}); //
	$(window).load(function() {
		//
	
	}); //
	</script>	
</body>
</html>