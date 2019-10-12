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
    <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Glasgow,&amp;aq=&amp;sll=46.975033,31.994583&amp;sspn=0.368248,0.617294&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Glasgow,+Glasgow+City,+United+Kingdom&amp;t=m&amp;ll=55.866932,-4.256344&amp;spn=0.020324,0.070896&amp;z=13&amp;output=embed"></iframe>
</figure>

<h3>mobile</h3>

<p>
	8901 Marmora Road,<br>
Glasgow, D04 89GR.<br>
Telephone: +1 800 123 1234<br>
E-mail: <a href="#">mail@bteamny.com</a>
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
	  <li><a href="#">Quisque nullatibulum libero</a></li>
	  <li><a href="#">Scelerisque eget, malesuada at</a></li>
	  <li><a href="#">Vivamus eget niiam cursus leo</a></li>
	  <li><a href="#">Nulla facilisinean nec eros</a></li>
	  <li><a href="#">Vestibulum ante ipsum</a></li>	  	            		      	      			      
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
				<div class="txt1">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.Ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
				<div class="txt2">- Mike Smith, <span>CEO Company</span></div>
			</div>
			
		</li>
		<li>
			<div class="testimonial1">
				<div class="txt1">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.Ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
				<div class="txt2">- Olga Guz, <span>CEO Company</span></div>
			</div>
			
		</li>
		<li>
			<div class="testimonial1">
				<div class="txt1">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.Ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
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