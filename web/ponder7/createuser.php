<?php 

require_once ("../inc/functions_db.php");

$my_user = $_GET['username'];
$my_pass = $_GET['password'];
$success = -1;

    $mydb = get_db();
	$stmt = $mydb->prepare('INSERT INTO ponder7.login (username,password) VALUES (:user,:pass)');
	$stmt->bindValue(':user', $my_user, PDO::PARAM_STR);
	$stmt->bindValue(':pass', $my_pass, PDO::PARAM_STR);
	
	if($stmt->execute()){
		$newId = $mydb->lastInsertId('ponder7.login_id_seq');
		$success = 1;
	}else {  //failed
		$success=2;
    }
    

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>

<body>
<div>

	<h1>Test Page</h1>

	Your username is: <?= $my_user ?><br /><br />
    Your password is: <?= $my_pass ?><br /><br />
	The datadabe task was: <?= $success ?><br /><br />
</div>

</body>
</html>

