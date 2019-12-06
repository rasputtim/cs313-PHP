<?php
	$redirurl = "index.php";
	//if ( isset($_GET['redir_url']) {
	//	$redirurl = $_GET['redir_url'];
	//	if ( $redirurl == "https://cryptic-beyond-10470.herokuapp.com/")
	//		$redirurl = "index.php";
	//}else
	//	$redirurl = "index.php";
	

	$send_url = "../index.php?redirurl=$redirurl";
	echo "<center>";
	echo '<div style="margin-top: 100px; width: 450px;">';
	echo '<h2>'.'You don\'t have access to this page'.'</h2>';
	echo "<p align='center'>";
	echo "<img src='../images/noaccess.gif'>";
	echo "<p>".'Access to this page is restricted to authorized users only, please contact system administrator if you need assistance. <br><br>Please know that all attempts to access this page are recorded in security logs of Integria System Database'. "</p>";
	echo "</p>";
	echo "<p> <a href=$send_url >Login</a></p>";
	echo "</div>";
	echo "</center>";
	exit;

?>
