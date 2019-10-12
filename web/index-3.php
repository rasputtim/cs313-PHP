<?php 
session_start();
require_once ("inc/connect.php");
include('templates/header.php'); 
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
	
}
if ($added = false) echo '</ul>';
?>
				


<ul class="thumbnails thumbnails1">
	<li>
		<div class="thumbnail clearfix">
			<figure class=""><img src="images/services03.jpg" alt=""></figure>
			<div class="caption">											
				<h3>Lorem ipsum dones consectetur </h3>
				<p>
					Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt  dolore magna. Ipsum dolor sit <a href="#"><strong>read more</strong></a>
				</p>
			</div>			
		</div>
	</li>
	<li>
		<div class="thumbnail clearfix">
			<figure class=""><img src="images/services04.jpg" alt=""></figure>
			<div class="caption">											
				<h3>Lorem ipsum dones consectetur </h3>
				<p>
					Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt  dolore magna. Ipsum dolor sit <a href="#"><strong>read more</strong></a>
				</p>
			</div>			
		</div>
	</li>				
</ul>
<ul class="thumbnails thumbnails1">
	<li>
		<div class="thumbnail clearfix">
			<figure class=""><img src="images/services05.jpg" alt=""></figure>
			<div class="caption">											
				<h3>Lorem ipsum dones consectetur </h3>
				<p>
					Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt  dolore magna. Ipsum dolor sit <a href="#"><strong>read more</strong></a>
				</p>
			</div>			
		</div>
	</li>
	<li>
		<div class="thumbnail clearfix">
			<figure class=""><img src="images/services06.jpg" alt=""></figure>
			<div class="caption">											
				<h3>Lorem ipsum dones consectetur </h3>
				<p>
					Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt  dolore magna. Ipsum dolor sit <a href="#"><strong>read more</strong></a>
				</p>
			</div>			
		</div>
	</li>				
</ul>





</div>
<div class="span3">

<h2>services List</h2>

	<ul class="ul1">
	  <li><a href="#">Quisque nullatibulum libero</a></li>
	  <li><a href="#">Scelerisque eget, malesuada at</a></li>
	  <li><a href="#">Vivamus eget niiam cursus leo</a></li>
	  <li><a href="#">Nulla facilisinean nec eros</a></li>
	  <li><a href="#">Vestibulum ante ipsum</a></li>	
	  <li><a href="#">Quisque nullatibulum libero</a></li>
	  <li><a href="#">Scelerisque eget, malesuada at</a></li>
	  <li><a href="#">Vivamus eget niiam cursus leo</a></li>
	  <li><a href="#">Nulla facilisinean nec eros</a></li>
	  <li><a href="#">Vestibulum ante ipsum</a></li>	  	            		      	      			      
	</ul>	

	

	
</div>	
</div>
<div class="row">
<div class="span12">

<div class="line1"></div>

<h2>Special offers</h2>

<div class="row">
<div class="span6">
<div class="thumb4">
	<div class="thumbnail clearfix">
		<figure class=""><img src="images/services07.jpg" alt=""></figure>
		<div class="caption">
			<h3>Lorem ipsum dones consectetur vorte gurti fablo dolore </h3>
			<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt  dolore magna. Ipsum dolor sit ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini  <a href="#"><strong>read more</strong></a></p>
		</div>
	</div>
</div>	
</div>
<div class="span6">
<div class="thumb4">
	<div class="thumbnail clearfix">
		<figure class=""><img src="images/services08.jpg" alt=""></figure>
		<div class="caption">
			<h3>Lorem ipsum dones consectetur vorte gurti fablo dolore </h3>
			<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt  dolore magna. Ipsum dolor sit ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini  <a href="#"><strong>read more</strong></a></p>
		</div>
	</div>
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