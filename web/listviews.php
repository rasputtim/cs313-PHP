<?php 
session_start();
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
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;views</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
<div class="span9">
	
<h1>Periods</h1>



<?php

$stmt = $db->prepare('SELECT * FROM public.ezfin_balanceview');
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
			echo '<figure class=""><img src="images/services01.jpg" alt=""></figure>';
			echo '<div class="caption">';											
				echo '<h3>'.date_format(date_create($row['initialdate']),$date_format)." - ". date_format(date_create($row['finaldate']),$date_format);
				echo '</h3>';
				echo '<p>';
						echo $row['title']. '<a href=" edittransacton.php?idtrans='.$row['idbalview'].'"><strong>  edit</strong></a>';
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
	foreach ($db->query('SELECT * FROM public.ezfin_balanceview') as $row)
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
<div class="span12">


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