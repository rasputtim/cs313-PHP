<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php
$dbUrl = getenv('DATABASE_URL');
?>
 <?php echo '<p>Hello World</p>'; 
       echo "$dbUrl";
?> 
 
 </body>
</html>
