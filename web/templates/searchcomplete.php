<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:inc/noaccess.php");
    exit;
}
require_once ("inc/functions_db.php");
require_once ("inc/functions_html.php");
$first_day = (new DateTime('first day of last month'))->format('Y-m-d');
$last_day = (new DateTime('last day of this month'))->format('Y-m-d');

	// Show list of items
	// =======================

echo "<h1>".'Transactions'." &raquo; ".'Data management'." &raquo; "."</h1>";
echo "<p></p>";
	


echo '<div class="search-form-wrapper clearfix">';

echo '<form id="search-form" action="#" accept-charset="utf-8" class="my-form-comp clearfix" method="post" >';
        

        

echo "<input id = 'driver' type=button class='sub search' value='".'Search'."'>";
       
echo "</form>";
echo '</div>';
?>

      
    
      

