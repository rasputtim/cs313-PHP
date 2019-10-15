

<?php

if ($index1=="true"){
    $index1_active = 'active';
}else{
    $index1_active = "";
}
if ($index2=="true"){
    $index2_active = 'active';
}else{
    $index2_active = "";
}
if ($index3=="true"){
    $index3_active = 'active';
}else{
    $index3_active = "";
}
if ($index4=="true"){
    $index4_active = 'active';
}else{
    $index4_active = "";
}
if ($index5=="true"){
    $index5_active = 'active';
}else{
    $index5_active = "";
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
      <li class="<?php echo $index1_active; ?> "><a href="aboutus.php">About Us</a></li>
				<li class="<?php echo $index2_active; ?> sub-menu sub-menu-1"><a href="#">Administration</a>
					<ul>
						<li><a href="options.php">Options</a></li>
						<li class="sub-menu sub-menu-2"><a href="listcats.php">Categories</a>
							<ul>
								<li><a href="inccats.php">Include</a></li>
								<li><a href="editcats.php">Edit</a></li>
								<li><a href="listcats.php">Search</a></li>
								
							</ul>
						</li>
						<li class="sub-menu sub-menu-2"><a href="listviews.php">Periods</a>
							<ul>
								<li><a href="incviews.php">Include</a></li>
								<li><a href="editviews.php">Edit</a></li>
								<li><a href="listviews.php">Search</a></li>
																
							</ul>
						</li>
						<li class="sub-menu sub-menu-2"><a href="listtrans.php">Transactions</a>
							<ul>
								<li><a href="inctrans.php">Include</a></li>
								<li><a href="edittrans.php">Edit</a></li>
								<li><a href="listtrans.php">Search</a></li>
																
							</ul>
						</li>						
					</ul>						
				</li>
				<li class="<?php echo $index3_active; ?>" ><a href="listtrans.php">Transactions</a></li>
				<li class="<?php echo $index4_active; ?>" ><a href="listviews.php">Views</a></li>
				<li class="<?php echo $index5_active; ?>" ><a href="index-5.php">Contacts</a></li>	
				


    </ul>
		</div>
	</div>
</div>
