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
<div class="col-lg-12">
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;balance views</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
		<?php
		$search_type = "balanceview";
			include('templates/search.php'); 
		?>
		
<div class="col-lg-9">
	
<h1>Periods for Balance Views</h1>



<?php

$stmt = get_db()->prepare('SELECT * FROM public.ezfin_balanceview');
//$stmt->bindValue(':op', $myOperation, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count =0;
$added = false;
foreach ($rows as $row)
{
	$added = false;
	if ($count  == 0 ) echo '<ul class="thumbnails thumbnails1">';
	echo '<li>';
		echo '<div class="thumbnail clearfix">';
		    // todo: add category icon here
			//echo '<figure class=""><img src="images/services01.jpg" alt=""></figure>';
			echo '<div class="caption">';	
				echo '<h3> START DATE                          -                 END DATE</H3>'	;								
				echo '<h3>'.date_format(date_create($row['initialdate']),$date_format)." - ". date_format(date_create($row['finaldate']),$date_format);
				echo '</h3>';
				echo '<p>';
						echo $row['title'];
						echo '<a href="incviews.php?update='.$row['idbalview'].'" class="button2">edit </a>';
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

<h2>services List</h2>

	<ul class="ul1">
<?php 
	foreach (get_db()->query('SELECT * FROM public.ezfin_balanceview') as $row)
	{
	echo '<li><a href="#">';
	echo $row['title']." - ".$row['initialdate']." - ". $row['finaldate'];
	echo '</a></li>';
	}
?>
	    	            		      	      			      
	</ul>	

	

	
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
		//
	
	
	
	}); //
	$(window).load(function() {
		//
	
	}); //
	</script>	
</body>
</html>