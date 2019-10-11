<?php
require_once ("functions.pg.php");

// ---------------------------------------------------------------
// Gives error message and stops execution if user
//doesn't have an open session and this session is from an valid user
// ---------------------------------------------------------------

function check_login () {
	
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		echo '<p>LOGGED IN SETTED</p>';
	
	
		if (isset ($_SESSION["id_usuario"])) {
			$id = $_SESSION["id_usuario"];
			echo '<p>ID USUARIO  IN SETTED</p>';
			$id_user = get_db_value ('id_usuario', 'public.ezfin.tusuario', 'id_usuario', $id);
			echo '<p>INSIDE</p>';
			echo '<p>usuario da sessão: '.$id.'</p>';
			echo '<p>isiario do banco: '.$id_user.'</p>';
			
			if ($id == $id_user) {
				return false;
			}
		}
	}
	echo '<p>usuario da sessão: '.$id.'</p>';
	echo '<p>isiario do banco: '.$id_user.'</p>';
	//global $config;
	//require ($config["homedir"]."/inc/noaccess.php");
	//require ("inc/noaccess.php");
	exit;
}

?>
