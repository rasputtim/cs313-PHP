<div class="container">
<div class="row">
<div class="span12">
<div class="top1_inner clearfix">
<div class="top1_inner_bg"></div>
<header><div class="logo_wrapper"><a href="index.php" class="logo"><img class="llogo" src="images/logo.png" alt=""></a></div></header>
<div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder = "username = admin">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder = "password = 123456" required>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </form>
    </div>
<?php

include('templates/navbar.php'); ?>

</div>	
</div>	
</div>	
</div>	
