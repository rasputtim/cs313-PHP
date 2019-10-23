<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location:inc/noaccess.php");
    //exit;
}
require_once ("inc/functions_db.php");
require_once ("inc/functions.php");
$guiabar_ident = "add / edit category";



    

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
	$my_name = strtoupper (get_parameter("name"));
	$my_alias = get_parameter("alias");
	$my_icon = get_parameter("icon");
	$my_oper = $_POST['operation'];//get_parameter("operation");
    $my_description = htmlspecialchars($_POST['descript']) ;//get_paramenter("descript");
	
	$mydb = get_db();
	$stmt = $mydb->prepare('INSERT INTO public.ezfin_category (idUser,name,alias,icon,description,operation) VALUES (:user,:name,:alias,:icon,:desc,:oper)');
	$stmt->bindValue(':user', $my_user, PDO::PARAM_STR);
	$stmt->bindValue(':name', $my_name, PDO::PARAM_STR);
	$stmt->bindValue(':alias', $my_alias, PDO::PARAM_STR);
	$stmt->bindValue(':icon', $my_icon, PDO::PARAM_STR);
	$stmt->bindValue(':desc', $my_description, PDO::PARAM_STR);
	$stmt->bindValue(':oper', $my_oper, PDO::PARAM_INT);
	if($stmt->execute()){
		$newId = $mydb->lastInsertId('ezfin_category_idcat_seq');
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
	$my_name = strtoupper (get_parameter("name"));
	$my_alias = get_parameter("alias");
	$my_icon = get_parameter("icon");
	$my_oper = $_POST['operation'];//get_parameter("operation");
    $my_description = htmlspecialchars($_POST['descript']) ;//get_paramenter("descript");

	
	
	$sql_update ="UPDATE public.ezfin_category
	SET iduser = :user,
		name = :name ,
		alias = :alias,
		icon = :icon,
		description = :desc,
		operation = :oper
	WHERE
	   idcat = :id";

	$stmt = get_db()->prepare($sql_update);
	$stmt->bindValue(':user', $my_user, PDO::PARAM_STR);
	$stmt->bindValue(':name', $my_name, PDO::PARAM_STR);
	$stmt->bindValue(':alias', $my_alias, PDO::PARAM_STR);
	$stmt->bindValue(':icon', $my_icon, PDO::PARAM_STR);
	$stmt->bindValue(':desc', $my_description, PDO::PARAM_STR);
	$stmt->bindValue(':oper', $my_oper, PDO::PARAM_INT);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);

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
	
	$sql_update ="DELETE FROM public.ezfin_category WHERE idcat = :id";

	$stmt = get_db()->prepare($sql_update);
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

	if ($is_create){

		// CREATE form
		
		$id = -1;
		$my_user = "admin";
		$my_name = "";
		$my_alias = "";
		$my_icon = "";
		$my_oper = -1;
		$my_description = "";
		
		
		
	} else {   //Update
		$id = get_parameter ("update",-1);
         
		$sql_update ="SELECT * FROM public.ezfin_category WHERE idcat = :id";

		$stmt = get_db()->prepare($sql_update);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$row = array();
		if($stmt->execute()){
			$row = $stmt->fetch();
			
		}else {  //failed
			//
		}

		$my_user = "admin";
		$my_name = $row["name"];
		$my_alias = $row["alias"];
		$my_icon = $row["icon"];
		$my_oper = $row['operation'];
		$my_description = $row['description'] ;
		$my_checked_income = "";
		$my_checked_outcome = "";
		$my_checked_informative = "";
		
		switch($my_oper){
			case 0:
				$my_checked_income = "checked";
			break;
			case 1:
				$my_checked_outcome = "checked";
			break;
			case 2:
				$my_checked_informative = "checked";
			break;

		}
		
	}




	include('templates/guiabar.php');

	echo'<div id="content">';
	echo'<div class="container">';
	echo'<div class="row">';
			
	echo'<div class="col-lg-9">';
		
	// creates a container for the category form
	include ("templates/category_form.php");
    //ends the category form container

}else { //delete
	include('templates/guiabar.php');
	echo '<div class="container">';
	echo '<div class="col-md-6 col-md-offset-3 " id="form_container">';
                        
                            switch ($success){
							case 0:
							break;
							case 1:
								echo '<div id="" style="width:100%; height:100%;  "> <h3>SUCESS!</h3> </div>';
								break;
							case 2:
								echo'<div id="" style="width:100%; height:100%; "> <h3>Error</h3>ERROR </div>';
								break;
							}
							
							echo '</div>';	
							echo '</div>';	
}




	echo '</div>'; //end the navigation bar

	echo '<div class="col-lg-3">';

	echo '<h2>category List</h2>';

	echo '<ul class="ul1">';
		
		foreach (get_db()->query('SELECT name,idcat,operation FROM public.ezfin_category') as $row)
		{
		echo '<li><a href="inccats.php?update='.$row['idcat'].'">';
		echo $row['name'];
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
		$('#slider4 .carousel.main ul').carouFredSel({
			auto: {
				timeoutDuration: 8000					
			},
			responsive: true,
			prev: '.prev4',
			next: '.next4',
			width: '100%',
			scroll: {
				items: 1,
				duration: 1000,
				easing: "easeOutExpo"
			},			
			items: {
				width: '350',
				height: 'variable',	//	optionally resize item-height			  
				visible: {
					min: 1,
					max: 4
				}
			},
			mousewheel: false,
			swipe: {
				onMouse: true,
				onTouch: true
				}
		});
		$(window).bind("resize",updateSizes_vat).bind("load",updateSizes_vat);
		function updateSizes_vat(){		
			$('#slider4 .carousel.main ul').trigger("updateSizes");
		}
		updateSizes_vat();
	
	
	
	
	
	}); //
	$(window).load(function() {
		//
	//Get a reference to the link on the page
		// with an id of "mylink"
		var a = document.getElementById("mylink");

		//Set code to run when the link is clicked
		// by assigning a function to "onclick"
		a.onclick = function() {

		// Your code here...

		//If you don't want the link to actually 
		// redirect the browser to another page,
		// "google.com" in our example here, then
		// return false at the end of this block.
		// Note that this also prevents event bubbling,
		// which is probably what we want here, but won't 
		// always be the case.
		message = 'Are you sure?';
        return confirm(message);
		}
	});
	</script>	
</body>
</html>