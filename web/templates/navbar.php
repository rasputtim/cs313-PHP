

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
      <li class="<?php echo $index1_active; ?> "><a href="index-1.php">About Us</a></li>
				<li class="<?php echo $index2_active; ?> sub-menu sub-menu-1"><a href="index-2.php">Administration</a>
					<ul>
						<li><a href="index-2.php">Options</a></li>
						<li class="sub-menu sub-menu-2"><a href="index-2.php">Categories</a>
							<ul>
								<li><a href="index-2.php">lorem ipsum dolor</a></li>
								<li><a href="index-2.php">sit amet</a></li>
								<li><a href="index-2.php">adipiscing elit</a></li>
								<li><a href="index-2.php">nunc suscipit</a></li>
								<li><a href="404.php">404 page not found</a></li>
							</ul>
						</li>
						<li class="sub-menu sub-menu-2"><a href="index-2.php">Balance Views</a>
							<ul>
								<li><a href="index-2.php">lorem ipsum dolor</a></li>
								<li><a href="index-2.php">sit amet</a></li>
								<li><a href="index-2.php">adipiscing elit</a></li>
								<li><a href="index-4.php">projects</a></li>									
							</ul>
						</li>						
					</ul>						
				</li>
				<li class="<?php echo $index3_active; ?>" ><a href="index-3.php">Transactions</a></li>
				<li class="<?php echo $index4_active; ?>" ><a href="listviews.php">Views</a></li>
				<li class="<?php echo $index5_active; ?>" ><a href="index-5.php">Contacts</a></li>	
				<li class="<?php echo $index5_active; ?>" >
					<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
							<label>Username</label>
							<input type="text" name="username" class="form-control form-control-sm" value="<?php echo $username; ?>" placeholder = "username = admin">
							<span class="help-block"><?php echo $username_err; ?></span>
						</div>    
						<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
							<label>Password</label>
							<input type="password" name="password" class="form-control form-control-sm" placeholder = "password = 123456" required>
							<span class="help-block"><?php echo $password_err; ?></span>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Login">
						</div>
						<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
					</form>
				</li>


    </ul>
		</div>
	</div>
</div>
