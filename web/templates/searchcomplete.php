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
    
	


echo '<div class="search-form-wrapper clearfix">';

echo '<form id="search-form" action="#" accept-charset="utf-8" class="my-form-comp clearfix" method="post" >';
        echo '<table width="100%" class="search-table">';
        
        echo "<tr>";
        echo "<td>";
        print_input_text('free_text',$free_text,'',10,10,"if(this.value=='') this.value='Search'","if(this.value =='Search' ) this.value=''");
        
        echo "</td>";
        echo "<td>";
        if ($amount=="") $amount = 'Amount';
        print_input_text ('amount', $amount, '', 10, 20,"if(this.value=='') this.value='Amount'","if(this.value =='Amount' ) this.value=''");

        echo "</td>";
        echo "<td>";
        echo print_label ('Status', '', true);
        ?>
        <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input statusclass" id="materialInline1" name="status" value='-1' checked>
        <label class="form-check-label" for="materialInline1">Undefined</label>
        </div>

        <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input statusclass" id="materialInline1" name="status" value='1'>
        <label class="form-check-label" for="materialInline1">Paid / Received</label>
        </div>

        <!-- Material inline 2 -->
        <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input statusclass" id="materialInline2" name="status" value='0'>
        <label class="form-check-label" for="materialInline2"> Unpaid / Unreceived</label>
        </div>
    <?php
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        $start_date = $first_day;
        $end_date = $last_day;
        echo print_label ("Begin date", '', true);
        print_input_text ('start_date', $start_date, '', 10, 20);
        echo "</td><td>";
        echo print_label ("End date", '', true);
        print_input_text ('end_date', $end_date, '', 10, 20);


        echo "<td >";

        echo "</td></tr></table>";
echo "<input id = 'driver' type=button class='sub search' value='".'Search'."'>";
echo "</form>";
echo '</div>';
?>

      
    
      

