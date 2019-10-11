<?php
require_once ("connect.php");
//require_once ("functions.pg.php");

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
			$sql = 'SELECT id_usuario FROM public.ezfin_tusuario WHERE id_usuario=:op';
			//$id_user = get_db_value ('id_usuario', 'public.ezfin.tusuario', 'id_usuario', $id);
			echo '<p>SQL: '.$sql.'</p>';
			$stmt = $db->prepare($sql);

			$stmt->bindValue(':op', $id, PDO::PARAM_STR);
			echo '<p>SQL: '.$sql.'</p>';
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
