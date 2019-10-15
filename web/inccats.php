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
		<div class="search-form-wrapper clearfix">
			<form id="search-form" action="search.php" method="GET" accept-charset="utf-8" class="navbar-form clearfix" >
				<input type="hidden" id="seach_what" name="t" value="category">
				<input type="text" name="s" value='Search' onBlur="if(this.value=='') this.value='Search'" onFocus="if(this.value =='Search' ) this.value=''">
				<a href="#" onClick="document.getElementById('search-form').submit()"></a>
			</form>
		</div>
<div class="span9">
	
<h1>categories  overview</h1>


<div class="col-md-6 col-md-offset-3" id="form_container">
                    <h2>Contact Us</h2> 
                    <p> Please send your message below. We will get back to you at the earliest! </p>
                    <form role="form" method="post" id="reused_form">
                        
                        <div class="row">
                            <div class="col-sm-6 form-group">

                                <label for="name"> Category Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">

                                <label for="alias"> Category Alias:</label>
                                <input type="text" class="form-control" id="name" name="alias" required>
                            </div>
						</div>
						<div class="row">
                            <div class="col-sm-6 form-group">

                                <label for="icon"> Icon:</label>
                                <input type="text" class="form-control" id="icon" name="icon" required>
                            </div>
                            <div class="col-sm-6 form-group">

                                <label for="operation"> Operation:</label>
                                <input type="text" class="form-control" id="operation" name="operation" required>
                            </div>
						</div>
						<div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="message"> Description:</label>
                                <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-default pull-left" >Send &rarr;</button>
                            </div>
                        </div>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your message successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                </div>





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

<div id="slider4_wrapper">
<div class="container">
<div class="row">
<div class="span12">
<div id="slider4">
<div class="slider4-title">CATEGORIES MOST USED</div>
<div class="slider4_wrapper2">
<a class="prev4" href="#"></a>
<a class="next4" href="#"></a>
<div class="carousel-box row">
	<div class="inner span12">			
		<div class="carousel main">
			<ul>
				<li>
					<div class="thumb-carousel2 banner1">
						<div class="thumbnail clearfix">
							<a href="#">
								<figure>
									<img src="images/products07.jpg" alt="">
								</figure>
								<div class="caption">
									<div class="txt1">Lorem ipsum dolor</div>
									<div class="txt2">dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>								
								</div>								
							</a>								
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel2 banner1">
						<div class="thumbnail clearfix">
							<a href="#">
								<figure>
									<img src="images/products08.jpg" alt="">
								</figure>
								<div class="caption">
									<div class="txt1">Lorem ipsum dolor</div>
									<div class="txt2">dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>								
								</div>								
							</a>								
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel2 banner1">
						<div class="thumbnail clearfix">
							<a href="#">
								<figure>
									<img src="images/products09.jpg" alt="">
								</figure>
								<div class="caption">
									<div class="txt1">Lorem ipsum dolor</div>
									<div class="txt2">dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>								
								</div>								
							</a>								
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel2 banner1">
						<div class="thumbnail clearfix">
							<a href="#">
								<figure>
									<img src="images/products10.jpg" alt="">
								</figure>
								<div class="caption">
									<div class="txt1">Lorem ipsum dolor</div>
									<div class="txt2">dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>								
								</div>								
							</a>								
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel2 banner1">
						<div class="thumbnail clearfix">
							<a href="#">
								<figure>
									<img src="images/products07.jpg" alt="">
								</figure>
								<div class="caption">
									<div class="txt1">Lorem ipsum dolor</div>
									<div class="txt2">dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>								
								</div>								
							</a>								
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel2 banner1">
						<div class="thumbnail clearfix">
							<a href="#">
								<figure>
									<img src="images/products08.jpg" alt="">
								</figure>
								<div class="caption">
									<div class="txt1">Lorem ipsum dolor</div>
									<div class="txt2">dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>								
								</div>								
							</a>								
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel2 banner1">
						<div class="thumbnail clearfix">
							<a href="#">
								<figure>
									<img src="images/products09.jpg" alt="">
								</figure>
								<div class="caption">
									<div class="txt1">Lorem ipsum dolor</div>
									<div class="txt2">dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>								
								</div>								
							</a>								
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel2 banner1">
						<div class="thumbnail clearfix">
							<a href="#">
								<figure>
									<img src="images/products10.jpg" alt="">
								</figure>
								<div class="caption">
									<div class="txt1">Lorem ipsum dolor</div>
									<div class="txt2">dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>								
								</div>								
							</a>								
						</div>
					</div>
				</li>																								
			</ul>
		</div>
	</div>
</div>	
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