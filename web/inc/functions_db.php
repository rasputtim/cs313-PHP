<?php
//require_once ("functions.pg.php");

// ---------------------------------------------------------------
// Gives error message and stops execution if user
//doesn't have an open session and this session is from an valid user
// ---------------------------------------------------------------

function check_login () {
	if (isset ($_SESSION["id_usuario"])) {
		$id = $_SESSION["id_usuario"];
		$id_user = "";//get_db_value ('id_usuario', 'public.ezfin.tusuario', 'id_usuario', $id);
		
		
		if ($id == $id_user) {
			return false;
		}
	}
	//global $config;
	//require ($config["homedir"]."/inc/noaccess.php");
	require ("/inc/noaccess.php");
	exit;
}

?>
