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
$dbOpts = parse_url($dbUrl);
$dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');
  echo "<p> Host: $dbHost";
  echo "<p> User: $dbUser";
  echo "<p> Password: $dbPassword";
  echo "<p> Port: $dbPort";
  echo "<p> Database Name: $dbName";
?> 
 
 </body>
</html>
