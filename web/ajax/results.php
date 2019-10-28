<?php
require_once ("inc/functions_db.php");
   if( $_REQUEST["name"] ){
      $name = $_REQUEST['name'];
      $start_date = $_REQUEST['start_date'];
      $end_date = $_REQUEST['end_date'];
      $status = $_REQUEST['status'];
      $user= $_REQUEST['user'];
      $category =  $_REQUEST['category'];
      $amount =  $_REQUEST['amount'];
     foreach ($category as $row){
        echo "category: " . $row;
        echo " , ";
     }
      echo "Welcome ". $name;
      echo "Begin date: " . $start_date;
      echo "End date: " . $end_date;
      echo "status: " . $status;
      echo "amount: " . $amount;
      echo "user: " . $user;

   }

   echo '<h1>Transactions for the current period</h1>';


   
   
   $stmt = get_db()->prepare('SELECT * FROM public.ezfin_transactions');
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