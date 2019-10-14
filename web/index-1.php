<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:inc/noaccess.php");
    exit;
}
include('templates/header.php'); ?>

<body class="subpage">
<div id="main">

<div class="top1">

<?php 
$index1="true";
$index2="false";
$index3="false";
$index4="false";
$index5="false";
include('templates/menubar.php'); ?>

	
</div>

<div class="breadcrumbs1">
<div class="container">
<div class="row">
<div class="span12">
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;about us</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
<div class="span9">
	
<h1>Welcome to mobile<br><span>Lorem ipsum dolor sit amet conse ctetur adipisicing elit</span></h1>

<div class="thumb1">
	<div class="thumbnail clearfix">
		<figure class=""><img src="images/about01.jpg" alt=""></figure>
		<div class="caption">
			<p>
				Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna. Ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetuer adipiscing elit. Nunc suscipit. 
			</p>
			<a href="#" class="button2">read more</a>
		</div>
	</div>
</div>

<div class="line1"></div>

<h2>Who we are</h2>

<p>
	Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna. Ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetuer adipiscing elit. Nunc suscipit. 
</p>
<p>
	Suspendisse enim arcu, convallis non, cursus sed, dignissim et, est. Aenean semper aliquet libero. In ante velit, cursus ut, ultrices vitae, tempor ut, risus. Duis pulvinar. Vestibulum vel pede at sapien sodales mattis. Quisque pretium, lacus nec iaculis vehicula, arcu libero consectetuer massa, auctor aliquet mauris ligula id ipsum. Vestibulum pede. Maecenas sit amet augue. Sed blandit lect
</p>

<h2>Our team</h2>

<div class="row">
<div class="span3">
<div class="thumb2">
	<div class="thumbnail clearfix">
		<a href="#">
			<figure class=""><img src="images/about02.jpg" alt=""></figure>
			<div class="caption">
				<div class="txt1">Adam Smith</div>
				<div class="txt2">CEO Company</div>
			</div>
		</a>
	</div>
</div>	
</div>
<div class="span3">
<div class="thumb2">
	<div class="thumbnail clearfix">
		<a href="#">
			<figure class=""><img src="images/about03.jpg" alt=""></figure>
			<div class="caption">
				<div class="txt1">Mark Williams</div>
				<div class="txt2">Finance</div>
			</div>
		</a>
	</div>
</div>	
</div>
<div class="span3">
<div class="thumb2">
	<div class="thumbnail clearfix">
		<a href="#">
			<figure class=""><img src="images/about04.jpg" alt=""></figure>
			<div class="caption">
				<div class="txt1">Tom Johns</div>
				<div class="txt2">Equipment</div>
			</div>
		</a>
	</div>
</div>	
</div>	
</div>

<div class="row">
<div class="span3">
<div class="thumb2">
	<div class="thumbnail clearfix">
		<a href="#">
			<figure class=""><img src="images/about05.jpg" alt=""></figure>
			<div class="caption">
				<div class="txt1">Peter Smith</div>
				<div class="txt2">Manager</div>
			</div>
		</a>
	</div>
</div>	
</div>
<div class="span3">
<div class="thumb2">
	<div class="thumbnail clearfix">
		<a href="#">
			<figure class=""><img src="images/about06.jpg" alt=""></figure>
			<div class="caption">
				<div class="txt1">Jesica Williams</div>
				<div class="txt2">Support</div>
			</div>
		</a>
	</div>
</div>	
</div>
<div class="span3">
<div class="thumb2">
	<div class="thumbnail clearfix">
		<a href="#">
			<figure class=""><img src="images/about07.jpg" alt=""></figure>
			<div class="caption">
				<div class="txt1">amanda Parker</div>
				<div class="txt2">Support</div>
			</div>
		</a>
	</div>
</div>	
</div>	
</div>













</div>
<div class="span3">

<h2>Why choose us</h2>

	<ul class="ul1">
	  <li><a href="#">Quisque nullatibulum libero</a></li>
	  <li><a href="#">Scelerisque eget, malesuada at</a></li>
	  <li><a href="#">Vivamus eget niiam cursus leo</a></li>
	  <li><a href="#">Nulla facilisinean nec eros</a></li>
	  <li><a href="#">Vestibulum ante ipsum</a></li>	  	            		      	      			      
	</ul>	

	<br>
	
<?php
include('templates/testimonials.php');
?>



	
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
	
		// carufredsel testimonials
		$('#caroufredsel').carouFredSel({
			auto: {
				timeoutDuration: 9000					
			},
			responsive: true,		
			direction:	"left",
			prev: '.prev_testimonial',
			next: '.next_testimonial',
			width: '100%',
			scroll: {
				items: 1,
				duration: 1000,
				easing: "easeOutExpo",
				fx: "fade"
			},			
			items: {
				width: '1000',
				height: 'variable',	//	optionally resize item-height			  
				visible: {
					min: 1,
					max: 1
				}
			},
			mousewheel: false,
			swipe: {
				onMouse: true,
				onTouch: true
				}
			
	
	
		}); 
	
	
	
	
	
	}); //
	$(window).load(function() {
		//
	
	}); //
</script>		
</body>
</html>