<?php
require_once ("../inc/connect.php");
if(!isset($_GET['s'])) {
	die('You must define a search term!');
}

if(!isset($_GET['t'])) {
//	die('You must define a search what!');
}
$table=$_GET['t'];
$search_table = 'public.ezfin_'.$table;
//$search_term = mb_strtolower($_GET['s'], 'UTF-8');
$search_term = $_GET['s'];
$search_term_length = strlen($search_term);
$final_result = array();
$search_term = '%'.$search_term.'%';
$sql_count="";
$sql_search="";
switch ($table) {
    case "category":
		$sql_count="SELECT count(*) FROM $search_table WHERE catname LIKE :UP OR catdescription  LIKE :op";
		$sql_search="SELECT * FROM $search_table WHERE catname LIKE :UP OR catdescription  LIKE :op";
        break;
    case "balanceview":
		$sql_count="SELECT count(*) FROM $search_table WHERE description LIKE :op";
		$sql_search="SELECT * FROM $search_table WHERE description LIKE :op";
        break;
    case "transactions":
		$sql_count="SELECT count(*) FROM $search_table WHERE description LIKE :op";
		$sql_search="SELECT * FROM $search_table WHERE description LIKE :op";
        break;
}

$count = 0;
$stmt = $db->prepare($sql_count);
switch ($table) {
    case "category":
		//$stmt->bindValue(':tb', $search_table, PDO::PARAM_STR);
		$stmt->bindValue(':up', $search_term, PDO::PARAM_STR);
		$stmt->bindValue(':op', $search_term, PDO::PARAM_STR);
        break;
    case "balanceview":
		//$stmt->bindValue(':tb', $search_table, PDO::PARAM_STR);
		$stmt->bindValue(':op', $search_term, PDO::PARAM_STR);
        break;
    case "transactions":
		//$stmt->bindValue(':tb', $search_table, PDO::PARAM_STR);
		$stmt->bindValue(':op', $search_term, PDO::PARAM_STR);
        break;
}

$stmt->execute();
$count = $stmt->fetchColumn();
$final_result[2]['search_result'][0] = "Count: $count";
if($count > 0){
	$line_count =0;
	$stmt = $db->prepare($sql_search);
	$stmt->bindValue(':op', $search_term, PDO::PARAM_STR);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($rows as $row)
	{
		$final_result[$line_count]['search_result'][0] = $table." - " .$row["catname"]." - ". $row["catdescription"];
		$line_count++;
	}

}

?>
<!DOCTYPE HTML>
<html lang="en-US" class="iframe">
<head>
	<title>Search results</title>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="search.css" type="text/css" media="screen">

</head>
<body>
<script type="text/javascript">
;(function(){	
	document.body.onload=resize
	window.onresize=resize
	
	function resize(){
		parent._resize(document.getElementById('search-results').offsetHeight)
	}
})()
</script>

	<div id="search-results">
		<ol class="search_list">
	<?php
		$match_count = 0;
		for ($i=0; $i < count($final_result); $i++){
			if (!empty($final_result[$i]['search_result'][0]) || $final_result[$i]['search_result'][0] !== ''){
				$match_count++;
	?>
			<li>
				<h6 class="search_title"><a target="_top" href="<?php echo $final_result[$i]['file_name'][0]; ?>" class="search_link"> <?php echo $table; ?> </a></h6>
				...<?php echo $final_result[$i]['search_result'][0]; ?>...
				<span class="match">Terms matched: <?php echo count($final_result[$i]['search_result']); ?> - URL: <?php echo $final_result[$i]['file_name'][0]; ?></span>
			</li>
	<?php
			}
		}
		if ($match_count == 0) {
			echo '<h6>No results found for <span class="search">'.$search_term.'</span></h6>';
		}
	?>
		</ol>
	</div>

</body>
</html>


<?php
//lists all the files in the directory given (and sub-directories if it is enabled)
function list_files($dir){
	global $recursive, $search_in;

	$result = array();
	if(is_dir($dir)){
		if($dh = opendir($dir)){
			while (($file = readdir($dh)) !== false) {
				if(!($file == '.' || $file == '..')){
					$file = $dir.'/'.$file;
					if(is_dir($file) && $recursive == true && $file != './.' && $file != './..'){
						$result = array_merge($result, list_files($file));
					}
					else if(!is_dir($file)){
						if(in_array(get_file_extension($file), $search_in)){
							$result[] = $file;
						}
					}
				}
			}
		}
	}
	return $result;
}

//returns the extention of a file
function get_file_extension($filename){
	$result = '';
	$parts = explode('.', $filename);
	if(is_array($parts) && count($parts) > 1){
		$result = end($parts);
	}
	return $result;
}

function strpos_recursive($haystack, $needle, $offset = 0, &$results = array()) {               
    $offset = stripos($haystack, $needle, $offset);
    if($offset === false) {
        return $results;           
    } else {
        $pattern = '/'.$needle.'/ui';
	preg_match_all($pattern, $haystack, $results, PREG_OFFSET_CAPTURE);
		return $results;
    }
}
?>