<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
<? php 
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
	echo '<p> Error!: ' . $ex->getMessage();
       echo "</p>";
  die();
}
echo "<p> SUCCESS </p>";
?>
<?php echo $dbUrl; ?>  
</body>
</html>
