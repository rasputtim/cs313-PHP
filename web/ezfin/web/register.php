<?php
// Include config file
require_once "inc/connect.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $realname = "";
$username_err = $password_err = $confirm_password_err = $realname_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_usuario FROM public.ezfin_tusuario WHERE id_usuario = :op";
       

        if( $stmt = $db->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindValue(':op', $param_username, PDO::PARAM_INT);
            
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                
                /* store result */
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $count_Rows = count($rows);
                
                if($count_Rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        // mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
       
    }

    // Validate real name
    if(empty(trim($_POST["realname"]))){
        $realname_err = "Please enter you Complete Name.";     
    } elseif(strlen(trim($_POST["realname"])) < 6){
        $realname_err = "Please enter your Complete username.";
    } else{
        $realname = trim($_POST["realname"]);
       
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($realname_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO public.ezfin_tusuario (id_usuario, real_name, password) VALUES (:un, :ur, :up)";
         
        if($stmt = $db->prepare($sql)){
           
            
            // Set parameters
            $param_username = $username;
            $param_realname = $realname;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

             // Bind variables to the prepared statement as parameters
             $stmt->bindValue(':un', $param_username, PDO::PARAM_STR);
             $stmt->bindValue(':ur', $param_realname, PDO::PARAM_STR);
             $stmt->bindValue(':up', $param_password, PDO::PARAM_STR);
            //echo '<p>'.$sql.'</p>';
            //echo '<p> hash: '.$param_password.'</p>';
             // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($realname_err)) ? 'has-error' : ''; ?>">
                <label>Complete Name</label>
                <input type="text" name="realname" class="form-control" value="<?php echo $realname; ?>">
                <span class="help-block"><?php echo $realname_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>
