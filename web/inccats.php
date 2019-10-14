<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location:inc/noaccess.php");
    //exit;
}
require_once ("inc/connect.php");
include('templates/header.php'); ?>

<body class="subpage">
<div id="main">

<div class="top1">
<?php 
$index1="false";
$index2="true";
$index3="false";
$index4="false";
$index5="false";
include('templates/menubar.php'); 
?>
</div>

<div class="breadcrumbs1">
<div class="container">
<div class="row">
<div class="span12">
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;products</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
		
<div class="span9">
	
<h1>categories  overview</h1>



<?php
$myOperation=1;
$stmt = $db->prepare('SELECT * FROM public.ezfin_category WHERE operation=:op');
$stmt->bindValue(':op', $myOperation, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count =0;
$added = false;
foreach ($rows as $row)
{
	$added = false;
	if ($count % 3 == 0 ) echo '<div class="row">';
	echo '<div class="span3">';
	echo '<div class="thumb3">';
	echo '<div class="thumbnail clearfix">';		
	echo '<figure class=""><img src="images/'. $row['icon'] . '.png " alt=""></figure>';
	echo '<div class="caption">';
	echo '<h3>' . $row['name'] . '</h3>';
	echo '<p>';
				echo $row['description'];
				echo '</p>';
				echo '<p>';
				echo '<strong>Operation:'.$myOperation.'</strong>';
				echo '</p>';
				echo '<a href="editcat.php?cat='.$row['idcat'].'" class="button2">edit </a>';
				echo '</div>';		
				echo '</div>';
				echo '</div>';
				echo '</div>';
				if ($count == 2 ) {
					echo '</div>';
					$count = 0;
					$added = true;
				}else $count++;
			
}
if ($added == false) echo '</div>';
?>	




</div>
<div class="span3">

<h2>category List</h2>

	<ul class="ul1">
	<?php 
	foreach ($db->query('SELECT name FROM public.ezfin_category') as $row)
	{
	echo '<li><a href="#">';
	echo $row['name'];
	echo '</a></li>';
	}
?>
	  	            		      	      			      
	</ul>	

	

	
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
		//	carouFredSel
		$('#slider4 .carousel.main ul').carouFredSel({
			auto: {
				timeoutDuration: 8000					
			},
			responsive: true,
			prev: '.prev4',
			next: '.next4',
			width: '100%',
			scroll: {
				items: 1,
				duration: 1000,
				easing: "easeOutExpo"
			},			
			items: {
				width: '350',
				height: 'variable',	//	optionally resize item-height			  
				visible: {
					min: 1,
					max: 4
				}
			},
			mousewheel: false,
			swipe: {
				onMouse: true,
				onTouch: true
				}
		});
		$(window).bind("resize",updateSizes_vat).bind("load",updateSizes_vat);
		function updateSizes_vat(){		
			$('#slider4 .carousel.main ul').trigger("updateSizes");
		}
		updateSizes_vat();
	
	
	
	
	
	}); //
	$(window).load(function() {
		//
	
	}); //
	</script>	
</body>
</html>