<?php
   if( $_REQUEST["name"] ){
      $name = $_REQUEST['name'];
      $start_date = $_REQUEST['start_date'];
      $end_date = $_REQUEST['end_date'];
      $statuse = $_REQUEST['status'];
      $user= $_REQUEST['user'];
      $category =  $_REQUEST['category'];
      $amount =  $_REQUEST['amount'];
      echo "Welcome ". $name;
      echo "Begin date: " . $start_date;
      echo "End date: " . $end_date;
      echo "status: " . $status;
      echo "category: " . $category;
      echo "amount: " . $amount;
      echo "user: " . $user;

   }
?> 