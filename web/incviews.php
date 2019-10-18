<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location:inc/noaccess.php");
    //exit;
}
require_once ("inc/connect.php");
require_once ("inc/functions.php");




    

$is_create = (bool) get_parameter("create");
$is_update = false;
if(get_parameter("update") != ''){
  $is_update=true;
}
$is_insert = get_parameter("create2");
$is_update_database = false;
if (get_parameter("update2") !=''){
	$is_update_database = true;
}
//$is_insert = false;
//$is_insert = $_POST["create2"];
///////     INSERT DAA INTO DATABASE /////////
// Database Insert data
// ==================
$success=0;
if ($is_insert){ // Create group

	$my_user = "admin";
	$my_inidate = strtoupper (get_parameter("inidate"));
	$my_enddate = get_parameter("enddate");
	$my_keydate = get_parameter("keydate");
	$my_description = htmlspecialchars($_POST['descript']) ;//get_paramenter("descript");
	$my_title = get_parameter("title");
	$my_iscur = $_POST['iscur'];//get_parameter("operation");
    
	$stmt = $db->prepare('INSERT INTO public.ezfin_balanceview (iduser, initialdate, finaldate, keydate, description, title, iscurrent) VALUES (:user,:inidate,:enddate,:keydate,:desc,:title,:iscur)');
	
	$stmt->bindValue(':user', $my_user, PDO::PARAM_STR);
	$stmt->bindValue(':inidate', $my_inidate, PDO::PARAM_STR);
	$stmt->bindValue(':enddate', $my_enddate, PDO::PARAM_STR);
	$stmt->bindValue(':keydate', $my_keydate, PDO::PARAM_STR);
	$stmt->bindValue(':desc', $my_description, PDO::PARAM_STR);
	$stmt->bindValue(':title', $my_title, PDO::PARAM_STR);
	$stmt->bindValue(':iscur', $my_iscur, PDO::PARAM_INT);
	if($stmt->execute()){
		$newId = $db->lastInsertId('ezfin_balanceview_idbalview_seq');
		$success = 1;
	}else {  //failed
		$success=2;
	}
}
///////END INSERT DATA ///////////////

// Database UPDATE
// ==================
if ($is_update_database){ // if modified any parameter

	

	$id = get_parameter ("id","");
	$my_user = "admin";
	$my_inidate = strtoupper (get_parameter("inidate"));
	$my_enddate = get_parameter("enddate");
	$my_keydate = get_parameter("keydate");
	$my_description = htmlspecialchars($_POST['descript']) ;//get_paramenter("descript");
	$my_title = get_parameter("title");
	$my_iscur = $_POST['iscur'];//get_parameter("operation");
    
	
	
	$sql_update ="UPDATE public.ezfin_balanceview
	SET iduser = :user,
		inidate = :inidate ,
		enddate = :enddate,
		keydate = :keydate,
		description = :desc,
		title = :title,
		iscurrent = :iscur
	WHERE
	   idbalview = :id";

	$stmt = $db->prepare($sql_update);
	$stmt->bindValue(':user', $my_user, PDO::PARAM_STR);
	$stmt->bindValue(':inidate', $my_inidate, PDO::PARAM_STR);
	$stmt->bindValue(':enddate', $my_enddate, PDO::PARAM_STR);
	$stmt->bindValue(':keydate', $my_keydate, PDO::PARAM_STR);
	$stmt->bindValue(':desc', $my_description, PDO::PARAM_STR);
	$stmt->bindValue(':title', $my_title, PDO::PARAM_STR);
	$stmt->bindValue(':iscur', $my_iscur, PDO::PARAM_INT);

	if($stmt->execute()){
		$success = 1;
	}else {  //failed
		$success=2;
	}
	

}


// Database DELETE
// ==================
if (isset($_GET["delete_data"])){ // if delete


	$id = get_parameter ("delete_data",0);
	
	$sql_update ="DELETE FROM public.ezfin_balanceview WHERE idbalview = :id";

	$stmt = $db->prepare($sql_update);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);
	
	if($stmt->execute()){
		$success = 1;
	}else {  //failed
		$success=2;
	}
}

if ($is_update_database){
	$_GET["update"]= $id;
}



//////////////////////////////////////////////////
// CREATE OR UPDATE DATA
//////////////////////////////////////////////////

	include('templates/header.php'); ?>

	<body class="subpage">
	<div id="main">

	<div class="top1">
	<?php 
	$index1="false";
	$index2="true";
	$index3="false";
	$index4="false";
	$index5="false";
	include('templates/menubar.php'); 
	?>
	</div>

	<div class="breadcrumbs1">

<?php	
if ($is_insert) $is_create = true;
if ($is_update_database) $is_update = true;

if (($is_create OR $is_update)) {
	$my_iscur_check = "";
	if ($is_create){

		// CREATE form
		
		$id = -1;
		$my_user = "admin";
		$my_inidate = "";
		$my_enddate = "";
		$my_keydate = "";
		$my_description = "";//get_paramenter("descript");
		$my_title = "";
		$my_iscur = -1;//get_parameter("operation");
		
		
		
		
	} else {   //Update
		$id = get_parameter ("update",-1);
         
		$sql_update ="SELECT * FROM public.ezfin_balanceview WHERE idbalview = :id";

		$stmt = $db->prepare($sql_update);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$row = array();
		if($stmt->execute()){
			$row = $stmt->fetch();
			
		}else {  //failed
			//
		}

		$my_user = "admin";
		$my_inidate =  $row["inidate"];
		$my_enddate =  $row["enddate"];
		$my_keydate =  $row["keydate"];
		$my_description = $row['descript'];
		$my_title =  $row["title"];
		$my_iscur =  $row["iscurrent"];

		
		switch($my_iscur){
			case 0:
				$my_iscur_check = "";
			break;
			case 1:
				$my_iscur_check = "checked";
			break;
			

		}
		
	}




	echo'<div class="container">';
	echo'<div class="row">';
	echo'<div class="col-lg-12">';
	echo'<div class="breadcrumbs1_inner"><a href="index.php">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;add / edit category</div>	';
	echo'</div>	';
	echo'</div>	';
	echo'</div>	';
	echo'</div>';

	echo'<div id="content">';
	echo'<div class="container">';
	echo'<div class="row">';
			
	echo'<div class="col-lg-9">';
		
	// creates a container for the category form
	include ("templates/balview_form.php");
    //ends the category form container

}
	echo '</div>'; //end the navigation bar

	echo '<div class="col-lg-3">';

	echo '<h2>category List</h2>';

	echo '<ul class="ul1">';
		
		foreach ($db->query('SELECT * FROM public.ezfin_balanceview') as $row)
		{
			echo '<li><a href="incviews.php?update='.$row['idbalview'].'">';
			echo $row['title'];
			echo '</a></li>';
		}
	
															
		echo '</ul>	';

		

		
		echo '</div>';	
		echo '</div>';	
		echo '</div>';	
		echo '</div>';



 ?>

<div class="bot1">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="bot1_inner">
<?php include('templates/footer.php'); ?>
</div>	
</div>	
</div>








	
</div>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
function showmydiv() {
 document.getElementById('success_message').style.display = 'block';
}
</script>
<script>

	$(document).ready(function() {	
		//	carouFredSel
		
	}); //
	$(window).load(function() {
		//
	
	}); //
	</script>	
</body>
</html>