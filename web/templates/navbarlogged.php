<div class="navbar navbar_">
	<div class="navbar-inner navbar-inner_">
		
		<div class="nav-collapse nav-collapse_ collapse">
			<ul class="nav sf-menu clearfix">
      <li><a href="index.php">Home</a></li>
      
				<li class="<?php echo $index2_active; ?> sub-menu sub-menu-1"><a href="#">Administration</a>
					<ul>
						<li><a href="listoptions.php">Options</a></li>
						<li class="sub-menu sub-menu-2"><a href="listcats.php">Categories</a>
							<ul>
								<li><a href="inccats.php?create=1">Include</a></li>
								<li><a href="inccats.php?update=0">Edit</a></li>
								<li><a href="listcats.php">Search</a></li>
								
							</ul>
						</li>
						<li class="sub-menu sub-menu-2"><a href="listviews.php">Periods</a>
							<ul>
								<li><a href="incviews.php?create=1">Include</a></li>
								<li><a href="incviews.php?update=2">Edit</a></li>
								<li><a href="listviews.php">Search</a></li>
																
							</ul>
						</li>
						<li class="sub-menu sub-menu-2"><a href="listtrans.php">Transactions</a>
							<ul>
								<li class="sub-menu sub-menu-2"><a href="inctrans.php?create=1">Include</a>
									<ul>
										<li><a href="inctrans.php?create=1&type=out">Outcome</a></li>
										<li><a href="inctrans.php?create=1&type=inc">Income</a></li>
									</ul>
							    </li>

								<li>
									
									
									<a href="inctrans.php?update=2">Edit</a>

								</li>
								<li><a href="listtrans.php">Search</a></li>
																
							</ul>
						</li>						
					</ul>						
				</li>
				<li class="<?php echo $index3_active; ?>" ><a href="listtrans.php">Transactions</a></li>
				<li class="<?php echo $index5_active; ?>" >
					<form class="" action="login.php" method="post">
						<div id="username" class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
							<input type="text" name="username" class="form-control form-control-sm" value="<?php echo $username; ?>" placeholder = "username = admin">
							<span class="help-block"><?php echo $username_err; ?></span>
						</div>    
						<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
							<input type="password" name="password" class="form-control form-control-sm" placeholder = "password = 123456" required>
							<span class="help-block"><?php echo $password_err; ?></span>
						</div>
				</li>
				<li class="<?php echo $index5_active; ?>" >	
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Login">
						</div>
						<p><a href="register.php">Sign up now</a>.</p>
					</form>
				</li>


    </ul>
		</div>
	</div>
</div>