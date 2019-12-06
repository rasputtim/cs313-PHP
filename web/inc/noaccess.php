<?php
	
	echo "<center>";
	echo '<div style="margin-top: 100px; width: 450px;">';
	echo '<h2>'.'You don\'t have access to this page'.'</h2>';
	echo "<p align='center'>";
	echo "<img src='../images/noaccess.gif'>";
	echo "<p>".'Access to this page is restricted to authorized users only, please contact system administrator if you need assistance. <br><br>Please know that all attempts to access this page are recorded in security logs of Integria System Database'. "</p>";
	echo "</p>";
	echo '<p> <a href="../index.php?redirurl='+$_SERVER['HTTP_REFERER']+'">Login</a></p>';
	echo "</div>";
	echo "</center>";
	exit;

?>
