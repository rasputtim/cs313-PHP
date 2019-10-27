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
	// Search parameter
	$free_text = get_parameter ("free_text", "");
	$category = get_parameter ("category", 0);
	$start_date = get_parameter ('start_date',$first_day);
	$end_date = get_parameter ('end_date',$last_day);
	// Search filters
    $start_date_sql = $start_date;
    $end_date_sql = $end_date;
    $user_id = get_parameter ('user_id',"");
    $status = get_paramenter('status',-1);
    $amount = get_paramenter("amount", 0.00);
	//Search filter processing

	$sql_filter = "";
    $date_filter = false;
    $where_clause = "";
    $where_saldo_inicial="";

    $start_date_where="";
    $end_date_where="";
	if ($free_text != "") {
		$sql_filter .= " AND (description LIKE '%$free_text%')";
        $where_clause .= " AND (description LIKE '%$free_text%')";
        $where_saldo_inicial .= " AND (description LIKE '%$free_text%')";
	}
	if ($user_id != 0) {
	    $sql_filter .= " AND id_user = $user_id ";
        $where_clause .= " AND id_user = $user_id ";
        $where_saldo_inicial .= " AND id_user = $user_id ";
    }
	if ($category != 0){
        

		//todo: fiz sql for category

		$filter = '';

        if(is_array($category)) {
            foreach($category as $rec_code){
                
            $filter .= " OR idcategory=".$rec_code;
            }
        }else{
            $filter = 'AND (idcategory = '.$category;
        }
		$filter .= ")";

		$sql_filter .= $filter;
		$where_clause .= $filter;
		$where_saldo_inicial .= $filter;

	}

	if ($start_date != "" AND $end_date == "") {
		$sql_filter .= " AND date >= '$start_date_sql' ";
        $date_filter = true;
        $start_date_where = $start_date_sql;
        $where_saldo_inicial .= " AND date < '$start_date_sql' ";
        }

	if ($end_date != "" AND $start_date == "") {
		$sql_filter .= " AND date <= '$end_date_sql' ";
		$date_filter = true;
		$end_date_where = $end_date_sql;
		}

	if ($end_date != "" AND $start_date != "") {
		$sql_filter .= " AND date BETWEEN  '$start_date_sql' AND '$end_date_sql'";
		$date_filter = true;
		$end_date_where = $end_date_sql;
		$start_date_where = $start_date_sql;
		$where_saldo_inicial .= " AND date < '$start_date_sql' ";

	}
    if($ammount != 0.00){
        $sql_filter .= " AND amount = $amount ";
		

    }
    if ($status != -1) {
        $sql_filter .= " AND status = $status ";
    }


    echo '<div class="search-form-wrapper clearfix">';

	echo '<form method="post" action="?sec=tes&sec2=operation/tes/extract_user">';
	echo '<table width="100%" class="search-table">';
	echo "<tr>";

	echo "<td>";
    echo "<label>" . 'Categoriy' . "</label>";
    
	echo print_select_from_sql ('SELECT idcat, name FROM public.ezfin_category', 'category',
						$category, '', "Any", '', true, false, false, '');
	echo "<td>";
	echo "<label>" . 'User' . "</label>";

	if($tesoureiro || $veneravel) {
	echo print_select_from_sql ('SELECT id_usuario, real_name FROM public.ezfin_tusuario order by real_name', 'user_id',
						$user_id, '', "Any", '', true, false, false, '');
    }else {
    $nombre_real = ""; //dame_nombre_real($config["id_user"]);
	echo $nombre_real;
    }
    
	echo "<tr>";
	echo "<td>";
	echo "<label>" . 'Search' . "</label>";
	echo "<input type=text name='free_text' size=25 value='$free_text'>";
    
    echo "</td>";
    echo "<tr>";
	echo "<td>";
	echo "<label>" . 'Amount' . "</label>";
	print_input_text ('amount', $amount, '', 10, 20);

    echo "</td>";
    echo "<tr>";
	echo "<td>";
	echo "<label>" . 'Status' . "</label>";
	print_input_text ('status', $status, '', 10, 20);

	echo "</td>";
    echo "<tr>";
	echo "<td>";

    echo print_label ("Begin date", '', true);
    print_input_text ('start_date', $start_date, '', 10, 20);
	echo "</td><td>";
    echo print_label ("End date", '', true);
    print_input_text ('end_date', $end_date, '', 10, 20);


	echo "<td >";

	echo "<input type=submit class='sub search' value='".'Search'."'>";
	// Delete new lines from the string

	echo "</td></tr></table></form>";


	$offset = get_parameter ("offset", 0);

	$condition = "" ;//get_filter_by_kb_product_accessibility();

    // sem pagination
	if ($user_id != 0) {
	$sql1 = "SELECT * FROM public.ezfin_transactions $condition $sql_filter ORDER BY  date, idcategory   ";
    }else { //com paginanation

	//$count = get_db_sql("SELECT COUNT(id) FROM ttes_user_data $condition $sql_filter");
	//pagination ($count, "index.php?sec=tes&sec2=operation/tes/extract_user&free_text=$free_text&user_id=$user_id&category=$category", $offset);

	//$sql1 = "SELECT * FROM ttes_user_data $condition $sql_filter ORDER BY  date, id_category  LIMIT $offset, ". $config["block_size"];
    }
echo '</div>'
?>