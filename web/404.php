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
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;404</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
<div class="span12">
	
<h1>SORRY!</h1>	

<div class="row">
	<div class="span7">
		<div class="page-404">
			<p class="txt1">404</p>
			<p class="txt2">PAGE NOT FOUND</p>
		</div>
	</div>
	<div class="span5">
		<p>
			Nulla pharetra dignissim enim. Nam cursus eros ut massa. Proin rutrum. Donec non urna non leo aliquam cursus. Vivamus ornare viverra lacus. Fusce id sapien. Donec rhoncus, enim sit amet sodales elementum, elit odio sagittis erat, at tincidunt leo neque non pede. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris ac leo. Aliquam magna nibh, tincidunt ut, lobortis feugiat, consectetuer sed, sapien. Aenean dui eros, tempus non, pulvinar in, vestibulum sed, urna. Nullam eget arcu a pede adipiscing vestibulum. Donec accumsan lacus nec dolor. Etiam porttitor elit. Quisque suscipit, arcu id porttitor vehicula, sem eros congue nulla, id consequat massa diam at dui. Quisque quis massa. Suspendisse metus justo, pellentesque et, sagittis sit amet, consectetuer imperdiet, sapien. Nullam eu neque eget risus porttitor accumsan. Vivamus cursus pretium tortor. 
		</p>
		<p>
			The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
		</p>
		<p>
			Please try using our search box below to look for information on the website
		</p>
		<div class="search-form-wrapper clearfix">
			<form id="search-form" action="search.php" method="GET" accept-charset="utf-8" class="navbar-form clearfix" >
				<input type="text" name="s" value='Search' onBlur="if(this.value=='') this.value='Search'" onFocus="if(this.value =='Search' ) this.value=''">
				<a href="#" onClick="document.getElementById('search-form').submit()"></a>
			</form>
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
		//
	
	
	
	}); //
	$(window).load(function() {
		//
	
	}); //
	</script>	
</body>
</html>