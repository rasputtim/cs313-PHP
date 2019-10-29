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

echo '<div class="search-form-wrapper clearfix">';

echo '<form id="search-form" action="#" accept-charset="utf-8" class="my-form-comp clearfix" method="post" >';
        
echo'<div class="container">';
        echo'<div class="row">';
            echo "<h1>".'Transactions'." &raquo; ".'Balance'." &raquo; "."</h1>";
        echo'</div>';
        echo'<div class="row">';
        echo print_select_from_sql ('SELECT idbalview, title FROM public.ezfin_balanceview', 'driver',
						$period, '', "Period", '', true, 0, false, '');
        echo'</div>';
        
        
    echo'</div>';
      
        

echo "</form>";
echo '</div>';
?>

      
    
      

