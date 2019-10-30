<?php 

require_once ("../inc/functions_db.php");

$my_user = "SALVATORE";
$my_pass = "123456";
$success = -1;

$mydb = get_db();
	$stmt = $mydb->prepare('INSERT INTO ponder7.ezfin_category (username,password) VALUES (:user,:pass)');
	$stmt->bindValue(':user', $my_user, PDO::PARAM_STR);
	$stmt->bindValue(':pass', $my_pass, PDO::PARAM_STR);
	
	if($stmt->execute()){
		$newId = $mydb->lastInsertId('ezfin_category_idcat_seq');
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

