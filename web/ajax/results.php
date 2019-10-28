<?php
   if( $_REQUEST["name"] ){
      $name = $_REQUEST['name'];
      $begin_date = $_REQUEST['begin_date'];
      echo "Welcome ". $name;
      echo "Begin date" . $begin_date;
   }
?> 