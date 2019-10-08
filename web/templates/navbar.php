

<?php
$index3=$argument2 = $_GET['index3'];

if ($index3==true){
    $index3_active = 'class="active"';
}else{
    $index3_active = "";
}
?>

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
				<li <?php echo $index3_active; ?> ><a href="index-3.html">Services</a></li>
				<li><a href="index-4.html">Projects</a></li>
				<li><a href="index-5.html">Contacts</a></li>											
    </ul>
		</div>
	</div>
</div>
