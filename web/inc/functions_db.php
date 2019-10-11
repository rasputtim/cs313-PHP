<?php
require_once ("functions_db.pg.php");

// ---------------------------------------------------------------
// Gives error message and stops execution if user
//doesn't have an open session and this session is from an valid user
// ---------------------------------------------------------------

function check_login () {
	if (isset ($_SESSION["id_usuario"])) {
		$id = $_SESSION["id_usuario"];
		$id_user = get_db_value ('id_usuario', 'tusuario', 'id_usuario', $id);
		if ($id == $id_user) {
			return false;
		}
	}
	//global $config;
	//require ($config["homedir"]."/general/noaccess.php");
	exit;
}

?>
