<?php


/**********************************************************
* File: dbConnect.php
* Author: Br. Burton
* 
* Description: Shows how to connect with Heroku credentials.
***********************************************************/
function get_db() {
	$db = NULL;
	try {
		// default Heroku Postgres configuration URL
		$dbUrl = getenv('DATABASE_URL');
		// Get the various parts of the DB Connection from the URL
		$dbopts = parse_url($dbUrl);
		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');
		// Create the PDO connection
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $ex) {
		// If this were in production, you would not want to echo
		// the details of the exception.
		echo "Error connecting to DB. Details: $ex";
		die();
	}
	return $db;
}




//require_once ("functions.pg.php");

// ---------------------------------------------------------------
// Gives error message and stops execution if user
//doesn't have an open session and this session is from an valid user
// ---------------------------------------------------------------

function check_login () {
	global $db;
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		
	
		if (isset ($_SESSION["id_usuario"])) {
			$id = $_SESSION["id_usuario"];
			echo '<p>ID USUARIO  IN SETTED</p>';
			$sql = 'SELECT id_usuario FROM public.ezfin_tusuario WHERE id_usuario=:op';
			//$id_user = get_db_value ('id_usuario', 'public.ezfin.tusuario', 'id_usuario', $id);
			
			
			$stmt =get_db()->prepare($sql);

			$stmt->bindValue(':op', $id, PDO::PARAM_STR);
			
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$count_Rows = count($rows);
            // Check if username exists, if yes then verify password
			if( $count_Rows ==1 ){ 
				$id_user = $rows[0]['id_usuario'];
				echo '<p>usuario da sessão: '.$id.'</p>';
				echo '<p>usiario do banco: '.$id_user.'</p>';
				
				if ($id == $id_user) {
					return false;
				}
			}
		}
	}
	//global $config;
	//require ($config["homedir"]."/inc/noaccess.php");
	require ("inc/noaccess.php");
	exit;
}

?>
