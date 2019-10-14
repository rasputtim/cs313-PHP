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
$index1="false";
$index2="false";
$index3="false";
$index4="false"; 
$index5="true";
include('templates/menubar.php');
 ?>

</div>

<div class="breadcrumbs1">
<div class="container">
<div class="row">
<div class="span12">
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;contacts</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
<div class="span9">
	
<h1>contact address</h1>

<figure class="google_map">
    <iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=43.814214,-111783096&amp;q=525%20S%20Center%20St%2C%20Rexburg%2C%20ID%2083460+(My%20Businetestess%20Name)&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe>
</figure>

<h3>mobile</h3>

<p>

8901 Marmora Road,<br>
Glasgow, D04 89GR.<br>
Telephone: +1 800 123 1234<br>
</p>

<div class="line1"></div>

<h2>contact form</h2>

<div id="note"></div>
<div id="fields">
	<form id="ajax-contact-form" class="form-horizontal" action="javascript:alert('success!');">
		<div class="row">
			<div class="span4">
				<div class="control-group">
				    <label class="control-label" for="inputName">Your full name:</label>
				    <div class="controls">				      
				      <input class="span4" type="text" id="inputName" name="name" value="Your full name:" onBlur="if(this.value=='') this.value='Your full name:'" onFocus="if(this.value =='Your full name:' ) this.value=''">
				    </div>
				</div>
				<div class="control-group">
				    <label class="control-label" for="inputEmail">Your email:</label>
				    <div class="controls">				      
				      <input class="span4" type="text" id="inputEmail" name="email" value="Your email:" onBlur="if(this.value=='') this.value='Your email:'" onFocus="if(this.value =='Your email:' ) this.value=''">
				    </div>
				</div>
				<div class="control-group">
				    <label class="control-label" for="inputPhone">Phone number:</label>
				    <div class="controls">				      
				      <input class="span4" type="text" id="inputPhone" name="phone" value="Phone number:" onBlur="if(this.value=='') this.value='Phone number:'" onFocus="if(this.value =='Phone number:' ) this.value=''">
				    </div>
				</div>
			</div>
			<div class="span5">
				<div class="control-group">
				    <label class="control-label" for="inputMessage">Message:</label>
				    <div class="controls">				      				      
				      <textarea class="span5" id="inputMessage" name="content" onBlur="if(this.value=='') this.value='Message:'" 
                        onFocus="if(this.value =='Message:' ) this.value=''">Message:</textarea>
				    </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<div class="control-group capthca">
				    <label class="control-label" for="inputCapthca">Capthca:</label>
				    <div class="controls">				      
				      <input class="" type="text" id="inputCapthca" name="capthca" value="Capthca:" onBlur="if(this.value=='') this.value='Capthca:'" onFocus="if(this.value =='Capthca:' ) this.value=''">
				      <img src="captcha/captcha.php">
				    </div>
				</div>
			</div>
		</div>
		<button type="submit" class="submit">Submit</button>
	</form>
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