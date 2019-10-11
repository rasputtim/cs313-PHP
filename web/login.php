<?php
// Initialize the session
// https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
session_start();
 

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "inc/connect.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id_usuario, real_name, password FROM public.ezfin_tusuario WHERE id_usuario = :un";
        
        echo '<p>CREDENTIAL VALIDATED</p>';
        

        if($stmt = $db->prepare($sql)){
                      
            // Set parameters
            $param_username = $username;

            // Bind variables to the prepared statement as parameters
            $stmt->bindValue(':un', $param_username, PDO::PARAM_STR);
            echo '<p>'.$param_username.'</p>';
          

            // Attempt to execute the prepared statement
            if($stmt->execute()){

                echo '<p>SQL EXECUTED</p>';
                /* store result */
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $count_Rows = count($rows);
                //var_dump($result);
                          
                
                // Check if username exists, if yes then verify password
                if( $count_Rows ==1 ){                    
                    
                                      
                        if(password_verify($password, $rows[0]['password'])){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                  
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
                // Store result
                // Bind result variables
                
            } else{
                echo "<p> Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        //mysqli_stmt_close($stmt);
    }
    
    // Close connection
    //mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>
