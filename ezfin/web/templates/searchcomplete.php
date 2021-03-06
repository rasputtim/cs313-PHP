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
            echo "<h1>".'Transactions'." &raquo; ".'Data management'." &raquo; "."</h1>";
        echo'</div>';
        echo'<div class="row">';
            echo'<div class="col big-box">';
            echo print_select_from_sql ('SELECT idcat, name FROM public.ezfin_category', 'category',
						$category, '', "Category", '', true, 5, false, '');
            echo'</div>';
    
            echo'<div class="col">';
                echo'<div class="row">';
                    echo'<div class="col mini-box">'; 
                    echo'<label for="amount">User:</label>';
                    echo'</div>';
                    echo'<div class="col mini-box">'; 
                    echo'<label for="amount">Amount range:</label>';
                                  
                    echo'</div>';
                echo'</div>';
                echo'<div class="row">';
                    echo'<div class="col mini-box">'; 
                    $user = $_SESSION["id_usuario"];
	                print_input_text('user',$user,'',10,10,"if(this.value=='') this.value='User'","if(this.value =='User' ) this.value=''",false,false,true);
     
                    echo'</div>';
                    echo'<div class="col mini-box">'; 
                    
                    print_input_text ('amount', $amount, '', 10, 20,"if(this.value=='') this.value='Amount'","if(this.value =='Amount' ) this.value=''");
                    echo'<input type="hidden" id="amount_min" name="amount_min" value="">';
                    echo'<input type="hidden" id="amount_max" name="amount_max" value="">';
                    echo'<div id="slider-range"></div>';
                   
                    echo'</div>';
                echo'</div>';
                echo'<div class="row">';
                    echo'<div class="col mini-box">'; 
                       echo print_label ("Begin Due date", '', true);
                    echo'</div>';
                    echo'<div class="col mini-box">'; 
                       echo print_label ("End Due date", '', true);
                    echo'</div>';
                echo'</div>';
                echo'<div class="row">';
                    echo'<div class="col mini-box">'; 
                        $start_date = $first_day;
                        print_input_text ('start_date', $start_date, '', 10, 20);
                    echo'</div>';
                    echo'<div class="col mini-box">'; 
                        $end_date = $last_day;
                        print_input_text ('end_date', $end_date, '', 10, 20);
                    echo'</div>';
                echo'</div>';
            echo'</div>';
  
        echo'</div>';
        echo'<div class="row">';
            echo'<div class="col">';
                if ($free_text=="") $free_text = 'Search-Text';
                print_input_text('free_text',$free_text,'',10,10,"if(this.value=='') this.value='Search-Text'","if(this.value =='Search-Text' ) this.value=''");
                
            echo'</div>';
            echo'<div class="col">';
            echo print_label ('Status', '', true);
                ?>
                <!-- Default inline 1-->
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input statusclass" id="defaultInline1" name="status" value='-1' checked>
                <label class="custom-control-label" for="defaultInline1">Undefined</label>
                </div>

                <!-- Default inline 2-->
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input statusclass" id="defaultInline2" name="status"  value='1'>
                <label class="custom-control-label" for="defaultInline2">Paid/Received</label>
                </div>

                <!-- Default inline 3-->
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input statusclass" id="defaultInline3" name="status" value='2' >
                <label class="custom-control-label" for="defaultInline3">Unpaid/Unreceived</label>
                </div>
                
            <?php
            echo'</div>';
        echo'</div>';
    echo'</div>';
      
        
echo "<input id = 'driver' type=button class='sub search' value='".'Search'."'>";
echo "</form>";
echo '</div>';
?>

      
    
      

