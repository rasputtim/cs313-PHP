<?php

// Load global vars
global $config;

check_login ();
include_once ('include/functions_tes.php');

$id_user = (string) get_parameter ('id');
$update_user = (bool) get_parameter ('update_user');

//$is_update = (bool) get_parameter ('create',0);
$is_create = (bool) isset($_GET["create"]);
$is_update = (bool) isset($_GET["update"]);
$is_insert = (bool) isset($_GET["create2"]);

$first_day = (new DateTime('first day of this month'))->format('d-m-Y');
$last_day = (new DateTime('last day of this month'))->format('d-m-Y');

$came_from_extract = (bool) get_parameter ('from_extract',0);

// da permissão apenas para o usuário

$has_permission = false;
$groups = get_user_groups ($id_user);
foreach ($groups as $group) {
		if (give_acl ($config['id_user'], $group['id'], 'UM')) {
			$has_permission = true;
			break;
		}
}
// verifica se é venerável ou tesoureiro
$tesoureiro = is_tesoureiro($config["id_user"]);
$veneravel = is_veneravel($config["id_user"]);
if ($tesoureiro || $veneravel) $has_permission = true;



$user = get_db_row ('tusuario', 'id_usuario', $id_user);
//if ($user === false) {
//	no_permission ();
//	return;
//}

if (!$has_permission) {
    audit_db($config["id_user"],$config["REMOTE_ADDR"], "ACL Violation","Trying to access Treasury Browser");
    require ("general/noaccess.php");
    exit;
}


// Database Insert data
// ==================
if ($is_insert){ // Create group

	if (give_acl($config["id_user"], 0, "TEW") != 1){
		audit_db($config["id_user"],$config["REMOTE_ADDR"], "ACL Violation","Trying to write to User Treasury without privileges");
	    require ("general/noaccess.php");
    	exit;
    }

	$timestamp = date('Y-m-d H:i:s');
	$description = get_parameter ("description","");
	$id_product = get_parameter ("product",0);
	$id_category = get_parameter ("category",0);
	$date = get_parameter ("date", "");
    $date_sql = date('Y-m-d', strtotime($date));
    $ammount = get_parameter ("ammount", 0.00);
    $ammount_sql = str_replace(',', '.',$ammount);
	
	$detail_id_method =   get_parameter ("detail_id_method" , 0);
	$detail_number =  get_parameter ("detail_number" , "");
	$detail_bank =  get_parameter ("detail_bank" , "");
	$detail_agency =  get_parameter ("detail_agency" , "");
	$detail_account =  get_parameter ("detail_account" , "");
	/*
	echo "<h3 class='suc'>".__('Payment details Data');
	echo  "<p>".$detail_id_method;
	echo  "<p>".$detail_number;
	echo  "<p>".$detail_bank;
	echo  "<p>".$detail_agency;
	echo  "<p>".$detail_account;
	
	echo "</h3>";
	*/
	
    $set_todos = 0;
    $remissive_users = array();
    $positive_users = array();
    $ha_remissive = 0;
    $ha_positive = 0;
	foreach ($_POST['id_user'] as $selectedOption) {
	 if($selectedOption == -1) $set_todos = 1;
	}

    if( !$set_todos) {

	foreach ($_POST['id_user'] as $selectedOption) {

   	 if(!is_remido($selectedOption, $id_category,$date_sql) && is_pagante($selectedOption)) {
		 
		$my_cat = $id_category;
		$my_user = $selectedOption;
				
		$id_data = tes_insert_data_user ($ammount_sql,$date_sql,$description ,$id_product, $my_cat , $my_user);
	
		if ($id_data > 0){
			 //======Insere regitro de pagamento=======
			$id_payment = tes_insert_user_data_payment($id_data,$detail_id_method,$detail_number,$detail_bank,$detail_agency,$detail_account,$description);
	       
						
			if ($id_payment > 0){
				$new_payment = $id_payment;
				echo "<h3 class='suc'>".__('Payment details')."  ".__('Successfully created')." ".$new_payment."</h3>";
			} else {
				echo "<h3 class='error'>".__('Payment details')."  ".__('Could not be created')."</h3>";
			
			}
			echo "<h3 class='suc'>".__('Successfully created')." "._('for')." ".dame_nombre_real($my_user)."</h3>";
		}else{
			echo "<h3 class='error'>".__('Could not be created')." "._('for')." ".dame_nombre_real($my_user)."</h3>";
		}
			
			
	 }else{
		 array_push($remissive_users,$selectedOption);
		 $ha_remissive = 1;
		 //echo "<h3 class='error'>".__('Could not be created').__('Remissive User')."</h3>";
	 }
    } //end foreach


    //check only the last record
	/*
	if (! $result)
		echo "<h3 class='error'>".__('Could not be created')."</h3>";
	else {
		echo "<h3 class='suc'>".__('Successfully created')."</h3>";
		$id_data = mysql_insert_id();
		//insert_event ("USER TREASURY ITEM CREATED", $id_data, 0, $title);
		audit_db ($config["id_user"], $config["REMOTE_ADDR"], "TES", "Created user tes item $ammount - $description");
	}
	*/
	
    }else {  // TODOS Selected


    
    $sql_teste = "SELECT id_usuario FROM tusuario  where id_company=1 ORDER BY nombre_real";
			//echo $sql_teste;

    $users_list =  get_db_all_rows_sql ($sql_teste);
    
    if ($users_list !== false) {
    
	foreach ($users_list as $selected) {
	$selectedOption = $selected[0];
     
    if(!is_remido($selectedOption, $id_category,$date_sql) && is_pagante($selectedOption)) {
		
		$my_cat = $id_category;
		$my_user = $selectedOption;
				
		$id_data = tes_insert_data_user ($ammount_sql,$date_sql,$description ,$id_product, $my_cat , $my_user);
	
		if ($id_data > 0){
			 //======Insere regitro de pagamento=======
			$id_payment = tes_insert_user_data_payment($id_data,$detail_id_method,$detail_number,$detail_bank,$detail_agency,$detail_account,$description);
	       
						
			if ($id_payment > 0){
            $new_payment = $id_payment;
			//	echo "<h3 class='suc'>".__('Payment details')."  ".__('Successfully created')." ".$new_payment."</h3>";
			} else {
			//	echo "<h3 class='error'>".__('Payment details')."  ".__('Could not be created')."</h3>";
			//
			}
			array_push($positive_users,$selectedOption);
			$ha_positive = 1;	
			//echo "<h3 class='suc'>".__('Successfully created')." "._('for')." ".dame_nombre_real($my_user)."</h3>";
		}else{
			echo "<h3 class='error'>".__('Could not be created')." "._('for')." ".dame_nombre_real($my_user)."</h3>";
		}
			
			
	 }else{
		 array_push($remissive_users,$selectedOption);
		 $ha_remissive = 1;
		 //echo "<h3 class='error'>".__('Could not be created').__('Remissive User')."</h3>";
	 }

	 } //end foreach     $is_create = true;
	 } //end if
    }
    //Irmãos Remidos
    if ($ha_positive) {
       echo "<h3 class='success'>";
       echo __('Added Users');
       echo ": ";
       foreach($positive_users as $remido) {
			echo dame_nombre_real($remido);
			echo " , ";
       }
      echo "</h3>";

    }
    
    //Irmãos Remidos
    if ($ha_remissive) {
       echo "<h3 class='error'>";
       echo __('Remissive Users');
       echo ": ";
       foreach($remissive_users as $remido) {
			echo dame_nombre_real($remido);
			echo " , ";
       }
      echo "</h3>";

    }


}

// Attach DELETE
// ==============
if (isset($_GET["delete_attach"])){

	if (give_acl($config["id_user"], 0, "TW") != 1){
		audit_db($config["id_user"],$config["REMOTE_ADDR"], "ACL Violation","Trying to delete an attach on a Treasury without privileges");
	    require ("general/noaccess.php");
    	exit;
    }

	$id_attachment = get_parameter ("delete_attach", 0);
	$id_kb = get_parameter ("update", 0);
	$attach_row = get_db_row ("tattachment", "id_attachment", $id_attachment);
	$nombre_archivo = $config["homedir"]."attachment/".$id_attachment."_".$attach_row["filename"];
	$sql = " DELETE FROM tattachment WHERE id_attachment =".$id_attachment;
	mysql_query($sql);
	unlink ($nombre_archivo);
	//insert_event ("TES ITEM UPDATED", $id_kb, 0, "File ".$attach_row["filename"]." deleted");
	audit_db ($config["id_user"], $config["REMOTE_ADDR"], "TES", "Deleted Treasury item $id_tes - ".$attach_row["filename"]);
	echo "<h3 class='suc'>".__('Attach deleted ok')."</h3>";
	unset ($id_kb);
}

// Database UPDATE
// ==================
if (isset($_GET["update2"])){ // if modified any parameter

	if (give_acl($config["id_user"], 0, "TEW") != 1){
		audit_db($config["id_user"],$config["REMOTE_ADDR"], "ACL Violation","Trying to update an User Treasury Entry without privileges");
	    require ("general/noaccess.php");
    	exit;
    }

	$id = get_parameter ("id","");
	$timestamp = date('Y-m-d H:i:s');
	$description = get_parameter ("description","");
	$id_user = get_parameter ("id_user","");
	$id_product = get_parameter ("product",0);
	$id_category = get_parameter ("category",0);
	$date = get_parameter ("date", "");
	$date_sql = date('Y-m-d', strtotime($date));
	$ammount = get_parameter ("ammount", 0.00);
    $ammount_sql = str_replace(',', '.',$ammount);

	//payment detail data
	$id_payment_detail = get_payment_detail_id(0,$id);
	
	$detail_id_method =   get_parameter ("detail_id_method" , 0);
	$detail_number =  get_parameter ("detail_number" , "");
	$detail_bank =  get_parameter ("detail_bank" , "");
	$detail_agency =  get_parameter ("detail_agency" , "");
	$detail_account =  get_parameter ("detail_account" , "");

	/*
	echo "<h3 class='suc'>".__('Payment details Data');
	echo  "<p> ID: ".$id_payment_detail;
	echo  "<p>".$detail_id_method;
	echo  "<p>".$detail_number;
	echo  "<p>".$detail_bank;
	echo  "<p>".$detail_agency;
	echo  "<p>".$detail_account;
	
	echo "</h3>";
	*/
    $result = tes_update_data_user ($id,$ammount_sql,$date_sql,$description ,$id_product, $id_category, $id_user);
	
	/*
	
	$sql_update ="UPDATE ttes_user_data
	SET amount1 = '$ammount_sql', description = '$description', date = '$date_sql', timestamp = '$timestamp', id_user = '$id_user',
	id_category = $id_category, id_product = $id_product
	WHERE id = $id";
	//echo $sql_update;
	$result=mysql_query($sql_update);
	*/
	if (! $result) {
		echo "<h3 class='error'>".__('Could not be updated')."</h3>";
	}else {
		
		echo "<h3 class='suc'>".__('Successfully updated')."</h3>";
		
		//insert_event ("TES ITEM UPDATED", $id, 0, $title);
		//audit_db ($config["id_user"], $config["REMOTE_ADDR"], "TES", "Updated treasury item $id - $description");
		//uptade payment detail
		//se tiver altera
		$id_payment = tes_update_user_data_payment($id_payment_detail,$id,$detail_id_method,$detail_number,$detail_bank,$detail_agency,$detail_account,$description);
	       //$id_payment =0;
		
		if ($id_payment){
				echo "<h3 class='suc'>".__('Payment details')."  ".__('Successfully updated').": ".$id_payment_detail."</h3>";
		} else {
				echo "<h3 class='error'>".__('Payment details')."  ".__('Could not be updated')."</h3>";
				
		}
		
		
		
		
	}
	
	if($came_from_extract){
	
	echo "<P> ". __('BACK TO EXTRACT PAGE')." "."-> ";
	echo "<b><a href='index.php?sec=tes&sec2=operation/tes/extract_user&&user_id=$id_user&update=".$id."'>".__("EXTRACT")."</a></b>";
		
		
	}

		if ( $_FILES['userfile']['name'] != "" ){ //if file
			$tipo = $_FILES['userfile']['type'];
			// Insert into database
			$filename = $_FILES['userfile']['name'];
			$filesize = $_FILES['userfile']['size'];

			$attach_description = get_parameter ("attach_description");

			$sql = "INSERT INTO tattachment (id_tes, id_usuario, filename, description, size ) VALUES (".$id.", '".$config["id_user"]. "','".$filename."','$attach_description', $filesize )";

			mysql_query($sql);
			$id_attachment=mysql_insert_id();
			$result_msg = "<h3 class='suc'>".__('File added')."</h3>";
			// Copy file to directory and change name
			$nombre_archivo = $config["homedir"]."attachment/".$id_attachment."_".$filename;

			if (!(copy($_FILES['userfile']['tmp_name'], $nombre_archivo ))){
				$result_msg = "<h3 class=error>".__('File cannot be saved. Please contact administrator about this error')."</h3>";
				$sql = " DELETE FROM tattachment WHERE id_attachment =".$id_attachment;
				mysql_query($sql);
				unlink ($_FILES['userfile']['tmp_name']);
			} else {
				// Delete temporal file
				//insert_event ("TES ITEM UPDATED", $id, 0, "File $filename added");
				audit_db ($config["id_user"], $config["REMOTE_ADDR"], "TES", "Created User Treasury item $id - $filename");
			}
			echo $result_msg;

		}

	

}


// Database DELETE
// ==================
if (isset($_GET["delete_data"])){ // if delete

	if (give_acl($config["id_user"], 0, "TEW") != 1){
		audit_db($config["id_user"],$config["REMOTE_ADDR"], "ACL Violation","Trying to delete a TES without privileges");
	    require ("general/noaccess.php");
    	exit;
    }

	$id = get_parameter ("delete_data",0);
	$kb_title = get_db_sql ("SELECT description FROM ttes_user_data WHERE id = $id ");

	$sql_delete= "DELETE FROM ttes_user_data WHERE id = $id";
	$result=mysql_query($sql_delete);

	if ($result=mysql_query("SELECT * FROM tattachment WHERE id_tes = $id")) {
		while ($row=mysql_fetch_array($result)){
				$nombre_archivo = $config["homedir"]."attachment/".$row["id_attachment"]."_".$row["filename"];
				unlink ($nombre_archivo);
		}
		$sql = " DELETE FROM tattachment WHERE id_tes = ".$id;
		mysql_query($sql);
	}
	// verifica se já existe registro na tabela de método de pagamento para esse registro ttesdata
	$id_payment_detail = get_payment_detail_id(0,$id);
	//$result_msg .= "<p> delete payment detail: $detail_id";
	delete_payment_detail($id_payment_detail);
	//insert_event ("TES ITEM DELETED", $id, 0, "Deleted TES $kb_title");
	audit_db ($config["id_user"], $config["REMOTE_ADDR"], "TES", "Deleted Treasury item $id - $kb_title");
	echo "<h3 class='suc'>".__('Successfully deleted')."</h3>";
}

if (isset($_GET["update2"])){
	$_GET["update"]= $id;
}


//////////////////////////////////////////////////
// CREATE OR UPDATE DATA
//////////////////////////////////////////////////
if ($is_insert) $is_create = true;

if (($is_create OR $is_update)) {
	if ($is_create){

		// CREATE form
		if  (!give_acl($config["id_user"], 0, "TEW")) {
			return;
		}

		$description = "";
		$id = -1;
		$id_product = 1;
		$id_category = 1;
		$id_project = get_db_value ('id', 'tproject', 'actual', '1');
		$ammount = 0.00;

		$date = get_parameter ("date", "");
		$date_sql = print_inverted_date($date);
		$id_user = get_parameter ("user_id", "");
		//payment detail data
		
		$detail_id_method = 0;
		$detail_number = "";
		$detail_bank = "";
		$detail_agency = "";
		$detail_account = "";
		
		
		
	} else {   //Update
		$id = get_parameter ("update",-1);
		$row = get_db_row ("ttes_user_data", "id", $id);
		$description = $row["description"];
		$id_product = $row["id_product"];
		$id_category = $row["id_category"];
	    $id_user = $row["id_user"];
	    $date_sql = $row["date"];
	    $date = print_inverted_date($date_sql);
	    $ammount_sql = $row["amount1"];
        $ammount = str_replace('.', ',',$ammount_sql);
        $id_user = $row["id_user"];
		//payment detail data
		$id_payment_detail = get_payment_detail_id(0,$id);
		$payment_detail = get_payment_detail($id_payment_detail);
		$detail_id_method =  $payment_detail["method_id"];
		$detail_number = $payment_detail["number"];
		$detail_bank = $payment_detail["bank"];
		$detail_agency = $payment_detail["agency"];
		$detail_account = $payment_detail["account"];
	}


	


	
if ($id == -1){   //CREATE NEW Record
		echo "<h1>".__('Create a new User Treasury item')."</h1>";
		echo "<form id='form-kb_item' name=prodman method='post' action='index.php?sec=tes&sec2=operation/tes/browse_user&create2'>";
	}
	else {
		echo "<h1>".__('Update existing User Treasury item')."</h1>";
		echo "<form id='form-sec_item' enctype='multipart/form-data' name=prodman2 method='post' action='index.php?sec=tes&sec2=operation/tes/browse_user&update2&from_extract=$came_from_extract'>";
		echo "<input type=hidden name=id value='$id'>";
	}



$table->border = 4;
$table->width = '99%';
$table->class = 'search-table-button';
$table->rowspan = array ();
//$table->rowspan[0][2] = 4;
$table->rowspan[1][1] = 3;
$table->colspan = array ();
//$table->colspan[5][0] = 3;
//$table->colspan[7][0] = 2;
$table->colspan[8][0] = 2;
$table->style[0] = 'vertical-align: top';
$table->style[1] = 'vertical-align: top';
$table->style[2] = 'vertical-align: top';
$table->size = array ();
//$table->size[2] = '100px';
$table->data = array ();

$table->data[0][0] = print_label (__('Register Number'), '', '', true, $id);

if ($has_permission) {
	$table->data[0][1] = print_input_text ('ammount', $ammount, '', 12, 50, true, __('Value'));
} else {
	$table->data[0][1] = print_label (__('Ammount'), '', '', true, $ammount);
}


if ($has_permission) {

$table->data[1][0] = "<b>".__('Category')."</b><br>";
$table->data[1][0] .= combo_tes_user_val_categories ($id_category,0,1);

$table->data[1][1] = "<b>".__('User')."</b><br>";
if($is_update) {
    $table->data[1][1] .=  print_select_from_sql ('SELECT id_usuario, nombre_real FROM tusuario where id_company = 1 order by nombre_real', 'id_user', $id_user, '', '', '', true, false, true, '');

}else {
    $table->data[1][1] .=  print_select_from_sql ('SELECT id_usuario, nombre_real FROM tusuario where id_company = 1 order by nombre_real', 'id_user[]', $id_user, '', __("All Users"), -1, true, 15, true, '');
}
$table->data[1][1] .= print_help_tip (__('You can select multiple users with <SHIFT> e <CTRL> keys'), true);

$table->data[2][0] =print_input_text ('date', $date, '', 20, 40, true, __('Date'));

$table->data[7][0] = print_payment_method_table($detail_id_method,$detail_number, $detail_bank,$detail_agency,$detail_account);

	$table->data[8][0] = print_textarea ('description', 3, 55, $description, '', true, __('Description'));

	$data = print_submit_button (__('Update'), 'upd_btn', false, 'class="upd sub"', true);
	$data .= print_input_hidden ('update_user', 1, true);

	if ($id == -1)
	$data =  print_submit_button (__('Create'), 'crt_btn', false, 'class="sub create"', true) . "</td></tr>";
	else {
	$data = print_submit_button (__('Update'), 'upd_btn', false, 'class="upd sub"', true);

	}

	$table->colspan[count($table->data)+1][0] = 3;
	$table->data[count($table->data)+1][0] = $data;

	print_table ($table);


	echo '</form>';
} else {
	print_table ($table);
}
	// Show list of attachments
	$sql1 = "SELECT * FROM tattachment WHERE id_tes = $id ORDER BY description";
	$result = mysql_query($sql1);
	if (mysql_num_rows($result) > 0){
		echo "<h3>".__('Attachment list')."</h3>";
		echo '<table class="databox" width="90%">';
	 	while ($row=mysql_fetch_array($result)){
			echo "<tr>";
			echo "<td>";
			echo "<img src='images/disk.png'>&nbsp;";
			$attach_id = $row["id_attachment"];
			echo '<a href="attachment/'.$row["id_attachment"].'_'.rawurlencode ($row["filename"]).'">';
			echo $row["filename"];
			echo "</a>";
			echo "<td>";
			echo $row["description"];
			echo "<td>";

			if (give_acl($config["id_user"], 0, "KW") == 1){
				echo "<a href='index.php?sec=tes&sec2=operation/tes/browse_user&update=$id&delete_attach=$attach_id'><img border=0 src='images/cross.png'></A>";
			}
		}
		echo "</table>";
	}



} //aqui



if ((!$is_update) AND (!$is_create)){


	// Show list of items
	// =======================

	echo "<h1>".__('Treasury Data management')." &raquo; ".__('Defined data')."</a></h1>";

	// Search parameter
	$free_text = get_parameter ("free_text", "");
	//$product = get_parameter ("product", 0);
	$category = get_parameter ("category", 0);
	$id_project = get_parameter ("id_project", 0);
  	$start_date = get_parameter ('start_date',$first_day);
	$end_date = get_parameter ('end_date',$last_day);
	// Search filters
    $start_date_sql = print_inverted_date($start_date);
    $end_date_sql = print_inverted_date($end_date);
    //if($tesoureiro) $user_id = get_parameter ('user_id',"");
    //else $user_id = get_parameter ('user_id',$config["id_user"]);
	$user_id = get_parameter ('user_id',"");



// Search filter processing
	// ========================

	$sql_filter = "";
    $date_filter = false;
    $where_clause = "";
    $start_date_where="";
    $end_date_where="";
	if ($free_text != "") {
		$sql_filter .= " AND (title LIKE '%$free_text%' OR data LIKE '%$free_text%')";
        $where_clause .= " AND (title LIKE '%$free_text%' OR data LIKE '%$free_text%')";
	}
	if ($user_id != 0) {
	    $sql_filter .= " AND id_user = $user_id ";
        $where_clause .= " AND id_user = $user_id ";
    }
	if ($category != 0){


        $despesa = tes_find_user_cat_sons_of($category);

		//monta filtro

		$filter = 'AND (id_category = '.$category;

		foreach($despesa as $rec_code){

		$filter .= " OR id_category=".$rec_code;
		}
		$filter .= ")";

		$sql_filter .= $filter;
		$where_clause .= $filter;

	}

	if ($start_date != "" AND $end_date == "") {
		$sql_filter .= " AND date >= '$start_date_sql' ";
        $date_filter = true;
        $start_date_where = $start_date_sql;
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

	}
	echo '<form method="post" action="?sec=tes&sec2=operation/tes/browse_user">';
	echo '<table width="100%" class="search-table">';
	echo "<tr>";
	//echo "<td>";
	//echo "<label>" . __('Product types') . "</label>";
	//combo_product_types($product, 1);

	echo "<td>";
	echo "<label>" . __('Categories') . "</label>";
	echo print_select_from_sql ('SELECT id, name FROM ttes_user_category', 'category',
						$category, '', __("Any"), '', true, false, false, '');
	echo "<td>";
	echo "<label>" . __('User') . "</label>";
	echo print_select_from_sql ('SELECT id_usuario, nombre_real FROM tusuario order by nombre_real', 'user_id',
						$user_id, '', __("Any"), '', true, false, false, '');


	echo "<tr>";
	echo "<td>";
	echo "<label>" . __('Search Text') . "</label>";
	echo "<input type=text name='free_text' size=25 value='$free_text'>";

	echo "<td>";
	//echo "<label>" . __('Project') . "</label>";
	//echo print_select_from_sql ('SELECT id, name FROM tproject', 'id_project',
	//					$id_project, '', __("Any"), '', true, false, false, '');

	echo "</td><tr><td>";
    echo print_label (__("Begin date"), '', true);
    print_input_text ('start_date', $start_date, '', 10, 20);
	echo "</td><td>";
    echo print_label (__("End date"), '', true);
    print_input_text ('end_date', $end_date, '', 10, 20);


	echo "<td >";

	echo "<input type=submit class='sub search' value='".__('Search')."'>";
	echo "</td></tr></table></form>";


	$offset = get_parameter ("offset", 0);

	$condition = get_filter_by_kb_product_accessibility();

	if ($user_id != 0) {
	 $sql1 = "SELECT * FROM ttes_user_data $condition $sql_filter ORDER BY  date, id_category";
    }else{
	$count = get_db_sql("SELECT COUNT(id) FROM ttes_user_data $condition $sql_filter");
	pagination ($count, "index.php?sec=tes&sec2=operation/tes/browse_user&free_text=$free_text&product=$product&category=$category", $offset);

	$sql1 = "SELECT * FROM ttes_user_data $condition $sql_filter ORDER BY  date, id_category  LIMIT $offset, ". $config["block_size"];
    }
    //echo $sql1;
    $sql2 = "SELECT SUM(amount1) FROM ttes_user_data WHERE 1 $sql_filter ";
    //echo $sql2;
    $total_geral = get_db_value_sql($sql2);

	$color =0;
	if ($result=mysql_query($sql1)){
		echo '<table width="100%" class="listing">';

		echo "<th>".__('Date')."</th>";
		echo "<th>".__('User')."</th>";
		echo "<th>".__('Category')."</th>";
		echo "<th>".__('Value')."</th>";
		echo "<th>".__('Payment Method')."</th>";
		echo "<th>".__('Files')."</th>";



		if (give_acl($config["id_user"], 0, "TEW")) {
			echo "<th>".__('Edit')."</th>";
			echo "<th>".__('Delete')."</th>";
		}
        echo "<tr>";
        $total = 0;
      // Delete new lines from the string
	  	$where_clause = str_replace(array("\r", "\n"), '', $where_clause);
	      echo print_button(__('Export to CSV'), '', false, 'window.open(\'' . 'include/export_csv.php?export_cvs_treasury_user_data=1&where_clause=' . str_replace('"', "\'", $where_clause) . '&date=' . $date_filter . '&start_date=' . $start_date_where . '&end_date=' . $end_date_where .'\')', 'class="sub csv"', true);
	      //echo $where_clause;

       echo "</tr>";

        echo "<h3 >".__('Total Geral: R$ ').str_replace('.', ',',money_format ( '%.2n' , $total_geral ))."</h3>";
		while ($row=mysql_fetch_array($result)){
            $total += $row["amount1"];;
			echo "<tr>";
			// Date
			echo "<td class=f9>";
			$date= print_inverted_date($row["date"]);
			echo $date;

			// Name
			echo "<td valign='top'><a href='index.php?sec=tes&sec2=operation/tes/browse_user&user_id=".$row["id_user"]."'>". dame_nombre_real($row["id_user"])."</a></td>";

			// Category
			echo "<td class=f9>";
			$category_name = get_db_sql ("SELECT name FROM ttes_user_category  WHERE id = ".$row["id_category"]);
			$category_desc = get_db_sql ("SELECT description FROM ttes_user_category  WHERE id = ".$row["id_category"]);
			echo "<img title='$category_desc' src='images/groups_small/".get_db_sql ("SELECT icon FROM ttes_user_category WHERE id = ".$row["id_category"]). "'>";
            echo $category_name;
			//Amount
            echo "<td class='f9' align='center' >";
			$ammount_sql = $row["amount1"];
        	$ammount = str_replace('.', ',',$ammount_sql);
        	//setlocale(LC_MONETARY, 'pt_BR.utf-8');
			echo str_replace('.', ',',money_format ( '%.2n' , $ammount_sql ));
			
			// Payment Detail
			echo "<td class=f9 align='center'>";
			//payment detail data
		    $id_payment_detail = get_payment_detail_id(0,$row["id"]);
			$payment_detail = get_payment_detail($id_payment_detail);
			$detail_id_method =  $payment_detail["method_id"];
		    $method_name = get_db_sql ("SELECT name FROM ttes_payment_method  WHERE id = $detail_id_method");
            echo $method_name;
			// Show list of attachments
			echo "<td class=f9>";
			//$product_name = get_db_sql ("SELECT name FROM ttes_product WHERE id = ".$row["id_product"]);
			$id = $row["id"];
			$sql_teste = "SELECT * FROM tattachment WHERE id_tes = $id ORDER BY description";
			//echo $sql_teste;

			$attachments =  get_db_all_rows_sql ($sql_teste);
			if ($attachments !== false && $id) {

				foreach ($attachments as $attachment) {

					$attach_id = $attachment['id_attachment'];
					$link = 'operation/tes/tes_download_file.php?type=sec&id_attachment='.$attachment['id_attachment'];
					echo '<a href="'.$link.'" title="'.$attachment['description'].'">';
					echo '<img title='.$attachment['filename'].' src="images/disk.png"/> ';
					//echo $attachment['filename'];
					echo '</a>';

				}

			}





			if (give_acl($config["id_user"], 0, "TEW")) {
				// Edit
				echo "<td class='f9' align='center' >";
				echo "<a href='index.php?sec=tes&sec2=operation/tes/browse_user&user_id=".$row["id_user"]."&update=".$row["id"]."'><img border=0 title='".__('Edit')."' src='images/page_white_text.png'></a>";

				// Delete
				echo "<td class='f9' align='center' >";
				echo "<a href='index.php?sec=tes&sec2=operation/tes/browse_user&user_id=".$row["id_user"]."&delete_data=".$row["id"]."'   onclick='return confirmation()'><img border='0' src='images/cross.png'></a>";
			}

		}
		//echo "<tr>";
		//echo "<td class='f9' align='center' >";
		//echo __('Total: ').money_format ( '%.2n' , $total ) ."</td></tr>";
		echo "</table>";
        echo "<h3 >".__('Total da Pagina: R$ ').str_replace('.', ',',money_format ( '%.2n' , $total ))."</h3>";
	} else {
		$downloads = array();
		echo "<h3 class='error'>".__('No items found')."</h3>";
	}

}




?>

<script type="text/javascript" src="include/languages/date_<?php echo $config['language_code']; ?>.js"></script>
<script type="text/javascript" src="include/js/integria_date.js"></script>
<script type="text/javascript" src="include/js/jquery.ui.autocomplete.js"></script>
<script type="text/javascript" src="include/js/jquery.validate.js"></script>
<script type="text/javascript" src="include/js/jquery.validation.functions.js"></script>

<script type="text/javascript">


function change_foto_mode () {

	if ($("#foto_box").prop('mode') == 'upload') {
		$("#foto_box").prop('mode', 'select');
		$("#foto_upload").hide("slide", {direction: 'right'}, 250, function() {
			$("#foto_select").show("slide", {direction: 'left'}, 250);
		});
	} else {
		$("#foto_box").prop('mode', 'upload');
		$("#foto_select").hide("slide", {direction: 'right'}, 250, function() {
			$("#foto_upload").show("slide", {direction: 'left'}, 250);
		});
	}
}


function confirmation() {
message = __('Are you sure?');
      return confirm(message);
    }

$(document).ready (function () {
	$('textarea').TextAreaResizer ();
});
add_datepicker ("#text-date");



// Form validation
trim_element_on_submit('input[name="free_text"]');
trim_element_on_submit('#text-name');
validate_form("#form-sec_item");
var rules, messages;
// Rules: #text-name
rules = {
	required: true,
	remote: {
		url: "ajax.php",
        type: "POST",
        data: {
			page: "include/ajax/remote_validations",
			search_existing_sec_item: 1,
			sec_item_name: function() { return $('#text-name').val() }
        }
	}
};
messages = {
	required: "<?php echo __('Title required')?>",
	remote: "<?php echo __('This title already exists')?>"
};
add_validate_form_element_rules('#text-name', rules, messages);

// Form validation
validate_form("#form-user_edit");
var rules, messages;
// Rules: #text-real_name
rules = {
	required: true,
	remote: {
		url: "ajax.php",
        type: "POST",
        data: {
			page: "include/ajax/remote_validations",
			search_existing_user_name: 1,
			user_name: function() { return $('#text-real_name').val() },
			user_id: "<?php echo $id_user?>"
        }
	}
};
messages = {
	required: "<?php echo __('Name required')?>",
	remote: "<?php echo __('This name already exists')?>"
};
add_validate_form_element_rules('#text-real_name', rules, messages);
// Rules: #text-email
rules = {
	required: true,
	//email: true,
	remote: {
		url: "ajax.php",
        type: "POST",
        data: {
			page: "include/ajax/remote_validations",
			search_existing_user_email: 1,
			user_email: function() { return $('#text-email').val() },
			user_id: "<?php echo $id_user?>"
        }
	}
};
messages = {
	required: "<?php echo __('Email required')?>",
	//email: "<?php echo __('Invalid email')?>",
	remote: "<?php echo __('This email already exists')?>"
};
add_validate_form_element_rules('#text-email', rules, messages);
// Rules: #password-password_confirmation
rules = { equalTo: '#password-password' };
messages = { equalTo: "<?php echo __('Passwords don\'t match')?>" };
add_validate_form_element_rules('#password-password_confirmation', rules, messages);
add_ranged_datepicker ("#text-start_date", "#text-end_date", null);
add_ranged_datepicker ("#text-start_date", "#text-end_date", null);

</script>
