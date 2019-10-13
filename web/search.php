<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:inc/noaccess.php");
    exit;
}
require_once ("inc/connect.php");
include('templates/header.php'); 
?>

<body class="subpage">
<div id="main">

<div class="top1">
<div class="container">
<div class="row">
<div class="span12">
<div class="top1_inner clearfix">
<div class="top1_inner_bg"></div>
<header><div class="logo_wrapper"><a href="index.html" class="logo"><img class="llogo" src="images/logo.png" alt=""></a></div></header>
<div class="navbar navbar_">
	<div class="navbar-inner navbar-inner_">
		<a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="nav-collapse nav-collapse_ collapse">
			<ul class="nav sf-menu clearfix">
      <li><a href="index.html">Home</a></li>
      <li><a href="index-1.html">About Us</a></li>
				<li class="sub-menu sub-menu-1"><a href="index-2.html">Products</a>
					<ul>
						<li><a href="index-2.html">what we offer</a></li>
						<li class="sub-menu sub-menu-2"><a href="index-2.html">specials</a>
							<ul>
								<li><a href="index-2.html">lorem ipsum dolor</a></li>
								<li><a href="index-2.html">sit amet</a></li>
								<li><a href="index-2.html">adipiscing elit</a></li>
								<li><a href="index-2.html">nunc suscipit</a></li>
								<li><a href="404.html">404 page not found</a></li>
							</ul>
						</li>
						<li class="sub-menu sub-menu-2"><a href="index-2.html">price list</a>
							<ul>
								<li><a href="index-2.html">lorem ipsum dolor</a></li>
								<li><a href="index-2.html">sit amet</a></li>
								<li><a href="index-2.html">adipiscing elit</a></li>
								<li><a href="index-2.html">nunc suscipit</a></li>									
							</ul>
						</li>						
					</ul>						
				</li>
				<li><a href="index-3.html">Services</a></li>
				<li><a href="index-4.html">Projects</a></li>
				<li><a href="index-5.html">Contacts</a></li>											
    </ul>
		</div>
	</div>
</div>
</div>	
</div>	
</div>	
</div>	
</div>

<div class="breadcrumbs1">
<div class="container">
<div class="row">
<div class="span12">
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;search</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
<div class="span12">
	
<h1>Search Results</h1>	

<div id="search-results"></div>

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
<script type="text/javascript" src="search/search.js"></script>
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