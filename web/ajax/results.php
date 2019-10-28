<?php
require_once ("../inc/functions_db.php");
$free_text = '';
$start_date = '';
$end_date = '';
$status = -1;
$user= '';
$category = array();
$amount = 0.00;

   if( $_REQUEST["free_text"] ){
      $free_text = $_REQUEST['free_text'];
      echo "Welcome ". $free_text;
      if ($free_text == "Search") $free_text = '';

   }
   if( $_REQUEST['start_date'] ){
    $start_date = $_REQUEST['start_date'];
    echo "Begin date: " . $start_date;
    
   }
   if( $_REQUEST['end_date'] ){
    $end_date = $_REQUEST['end_date'];
    echo "End date: " . $end_date;
    
    }
    if( $_REQUEST['status'] ){
        $status = $_REQUEST['status'];
        echo "status: " . $status;
        if ($status == -1) $status = -1;
    }
    if( $_REQUEST['user'] ){
        $user= $_REQUEST['user'];
       
    echo "user: " . $user;
    }
    if( $_REQUEST['category'] ){
        $category =  $_REQUEST['category'];
        foreach ($category as $row){
            echo "category: " . $row;
            echo " , ";
         }
    }
    if( $_REQUEST['amount'] ){
        $amount =  $_REQUEST['amount'];
        echo "amount: " . $amount;
        if ($amount == "Amount") $amount = 0.00;
    }

    
    
	// Search filters
    $start_date_sql = $start_date;
    $end_date_sql = $end_date;
    $user_id = $user;
    
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
        $added = false;
        if(!empty($category)) {
            
            if (count($category)==1){
               if (!$category[0]==""){
                $filter = 'AND (idcategory = '.$category[0];
                $added = true;
               }
            }else {
                foreach($category as $rec_code){
                    
                $filter .= " OR idcategory=".$rec_code;
                }
            }
		if ($added) $filter .= ")";
        }
		$sql_filter .= $filter;
		$where_clause .= $filter;
		$where_saldo_inicial .= $filter;

	}

	if ($start_date != "" AND $end_date == "") {
		$sql_filter .= " AND duedate >= '$start_date_sql' ";
        $date_filter = true;
        $start_date_where = $start_date_sql;
        $where_saldo_inicial .= " AND duedate < '$start_date_sql' ";
        }

	if ($end_date != "" AND $start_date == "") {
		$sql_filter .= " AND duedate <= '$end_date_sql' ";
		$date_filter = true;
		$end_date_where = $end_date_sql;
		}

	if ($end_date != "" AND $start_date != "") {
		$sql_filter .= " AND duedate BETWEEN  '$start_date_sql' AND '$end_date_sql'";
		$date_filter = true;
		$end_date_where = $end_date_sql;
		$start_date_where = $start_date_sql;
		$where_saldo_inicial .= " AND duedate < '$start_date_sql' ";

	}
    if($ammount != 0.00){
        $sql_filter .= " AND amount = $amount ";
		

    }
    if ($status != -1) {
        $sql_filter .= " AND status = $status ";
    }

    $offset = "100";

    $sql1 = "SELECT * FROM public.ezfin_transactions  WHERE 1=1 $sql_filter ORDER BY  duedate, idcategory  LIMIT $offset";
    echo "SQL : " . $sql1;

   echo '<h1>Transactions for the current period</h1>';


   
   
   $stmt = get_db()->prepare('SELECT * FROM public.ezfin_transactions  WHERE 1=1');
   //$stmt->bindValue(':op', $myOperation, PDO::PARAM_INT);
   $stmt->execute();
   $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $count =0;
   $added = false;
   foreach ($rows as $row)
   {
       //get category
       $oper_image ="cat_income_green_peq.png";
       $stmt = get_db()->prepare('SELECT operation FROM public.ezfin_category WHERE idcat =  :op');
       $stmt->bindValue(':op', $row['idcategory'], PDO::PARAM_INT);
       $stmt->execute();
       $operation = $stmt->fetchColumn();
       switch($operation){
          case 0:
          $oper_image ="cat_income_green_peq.png";
          break;
          case 1:
          $oper_image ="cat_bill_red_peq.png";
          break;
          case 2:
          $oper_image = "cat_informative_peq.png";
          break;
       }
       $added = false;
       if ($count  == 0 ) echo '<ul class="thumbnails thumbnails1">';
       echo '<li>';
           echo '<div class="thumbnail clearfix">';
               // todo: add category icon here
               echo '<figure class="oper_icon"><img src="images/'.$oper_image.'" alt=""></figure>';
               echo '<div class="caption">';											
                   echo '<h3>'.date_format(date_create($row['duedate']),$date_format)." - $ ". money_format($money_format, $row['amount']);
                   echo '</h3>';
                   echo '<p>';
                           echo "  ".$row['description']. '<a href=" inctrans.php?update='.$row['idtransaction'].'"><strong>  edit</strong></a>';
                   echo '</p>';
               echo '</div>';			
           echo '</div>';
       echo '</li>';
       if ($count  == 1 ) {
           echo '</ul>';
           $count = 0;
           $added = true;
       }else $count ++;
   }
   if ($added = false) echo '</ul>';
   
?> 