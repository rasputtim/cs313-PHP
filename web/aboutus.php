
<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:inc/noaccess.php");
    exit;
}
include('templates/header.php'); 
?>

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
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;about us</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
<div class="span9">


<h2>Who we are</h2>

<p>
	Originally known for leadership in enterprise resource planning (ERP) software, EzFin has evolved to become a market leader in end-to-end personal finance application software. Supported by a top cloud company with 2 million users worldwide, EzFin helps families of all sizes  to operate profitably, adapt continuously, and achieve their financial purpose. 
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
	  <li><a href="#">Our software systems integrate with back-end financials and use the latest digital technologies</a></li>
	  <li><a href="#">We Transform financial management to become intelligent</a></li>
	  <li><a href="#">Fuel the economy by turning bad debt into profit</a></li>
	  <li><a href="#">Our professional staff is available when you call</a></li>
	  <li><a href="#">Simply put, We Make it Easy. </a></li>	  	            		      	      			      
	</ul>	

	<br>
	
<div class="box1">
<div class="caroufredsel_slider">
	<div class="txt1">Testimonials</div>
	<a class="prev_testimonial" href="#"></a>
	<a class="next_testimonial" href="#"></a>	
	<ul id="caroufredsel" class="clearfix">
	<li>
			<div class="testimonial1">
				<div class="txt1">Efficiently manage a complex portfolio and keep up with digital trends. This cloud-based  management software delivers a modern user experience with a clear view of space utilization, facility costs, global portfolio compositions, and financial performance – all in real time. </div>
				<div class="txt2">- Salvatore, <span>CEO Company</span></div>
			</div>
			
		</li>
		<li>
			<div class="testimonial1">
				<div class="txt1">EzFin innovations help 437,000 customers worldwide control finences more efficiently and use budget insight more effectively. Explore our leadership, history, sustainability, diversity. </div>
				<div class="txt2">- Olga Guz, <span>CEO Company</span></div>
			</div>
			
		</li>
		<li>
			<div class="testimonial1">
				<div class="txt1">EzFin helps the world run better and improves peoples’ lives through our integrated strategy. Our Integrated Reports details customer performance and what is material for our sustainable financial success.</div>
				<div class="txt2">- Ann Parker, <span>CEO Company</span></div>
			</div>
			
		</li>								
	</ul>
</div>
</div>

<h2>special offer <span>save %50</span></h2>

<p>
	<strong>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</strong>
</p>
<p>
	Ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
</p>

<a href="#" class="button2">read more</a>


	
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