

<?php

if ($index1=="true"){
    $index1_active = 'class="active"';
}else{
    $index1_active = "";
}
if ($index3=="true"){
    $index3_active = 'class="active"';
}else{
    $index3_active = "";
}
if ($index2=="true"){
    $index2_active = 'active';
}else{
    $index2_active = "";
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
      <li><a href="index.php">Home</a></li>
      <li <?php echo $index1_active; ?> ><a href="index-1.php">About Us</a></li>
				<li class="<?php echo $index2_active; ?> sub-menu sub-menu-1"><a href="index-2.php">Products</a>
					<ul>
						<li><a href="index-2.php">what we offer</a></li>
						<li class="sub-menu sub-menu-2"><a href="index-2.php">specials</a>
							<ul>
								<li><a href="index-2.php">lorem ipsum dolor</a></li>
								<li><a href="index-2.php">sit amet</a></li>
								<li><a href="index-2.php">adipiscing elit</a></li>
								<li><a href="index-2.php">nunc suscipit</a></li>
								<li><a href="404.php">404 page not found</a></li>
							</ul>
						</li>
						<li class="sub-menu sub-menu-2"><a href="index-2.php">price list</a>
							<ul>
								<li><a href="index-2.php">lorem ipsum dolor</a></li>
								<li><a href="index-2.php">sit amet</a></li>
								<li><a href="index-2.php">adipiscing elit</a></li>
								<li><a href="index-2.php">nunc suscipit</a></li>									
							</ul>
						</li>						
					</ul>						
				</li>
				<li <?php echo $index3_active; ?> ><a href="index-3.php">Services</a></li>
				<li <?php echo $index4_active; ?> ><a href="index-4.php">Projects</a></li>
				<li <?php echo $index5_active; ?> ><a href="index-5.php">Contacts</a></li>											
    </ul>
		</div>
	</div>
</div>
