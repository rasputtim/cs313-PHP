<?php
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
?> 