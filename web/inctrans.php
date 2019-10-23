<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location:inc/noaccess.php");
    //exit;
}
require_once ("inc/functions_db.php");
require_once ("inc/functions.php");
$money_format = '%(#10n';
$date_format = "D, M d, Y ";



    

$is_create = (bool) get_parameter("create");
$inc_type =  get_parameter("type","all");

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
	$my_duedate = strtoupper (get_parameter("duedate"));
	$my_description = htmlspecialchars($_POST['descript']) ;
	$my_idcat = get_parameter("idcat");
	$my_amount = get_parameter("amount");
	$my_paydate = strtoupper (get_parameter("paydate"));
	$my_status = $_POST['status'];//get_parameter("operation");
    
	$stmt = get_db()->prepare('INSERT INTO public.ezfin_transactions ( iduser, duedate, description, idcategory, amount, paymentdate, status) VALUES (:user,:duedate,:desc,:idcat, :amm,:paydate, :stat)');
	
	$stmt->bindValue(':user', $my_user, PDO::PARAM_STR);
	$stmt->bindValue(':duedate', $my_duedate, PDO::PARAM_STR);
	$stmt->bindValue(':desc', $my_description, PDO::PARAM_STR);
	$stmt->bindValue(':idcat', $my_idcat, PDO::PARAM_INT);
	$stmt->bindValue(':amm', $my_ammopunt, PDO::PARAM_STR);
	$stmt->bindValue(':paydate', $my_paydate, PDO::PARAM_STR);
	$stmt->bindValue(':stat', $my_status, PDO::PARAM_INT);
	if($stmt->execute()){
		$newId = get_db()->lastInsertId('ezfin_transaction_idtransaction_seq');
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
	$my_duedate = strtoupper (get_parameter("duedate"));
	$my_description = htmlspecialchars($_POST['descript']) ;
	$my_idcat = get_parameter("idcat");
	$my_amount = get_parameter("amount");
	$my_paydate = strtoupper (get_parameter("paydate"));
	$my_status = $_POST['status'];//get_parameter("operation");

	
	
	$sql_update ="UPDATE public.ezfin_transactions
	SET iduser = :user,
		duedate = :duedate,
		description = :desc,
		idcategory = :idcat,
		amount = :amm,
		paymentdate = :paydate,
		status = :stat
	WHERE
	   idtransaction = :id";
    //echo $sql_update;
	$stmt = get_db()->prepare($sql_update);
	$stmt->bindValue(':user', $my_user, PDO::PARAM_STR);
	$stmt->bindValue(':duedate', $my_duedate, PDO::PARAM_STR);
	$stmt->bindValue(':desc', $my_description, PDO::PARAM_STR);
	$stmt->bindValue(':idcat', $my_idcat, PDO::PARAM_INT);
	$stmt->bindValue(':amm', $my_amount, PDO::PARAM_STR);
	$stmt->bindValue(':paydate', $my_paydate, PDO::PARAM_STR);
	$stmt->bindValue(':stat', $my_status, PDO::PARAM_INT);
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
	
	$sql_update ="DELETE FROM public.ezfin_transactions WHERE idtransaction = :id";

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
	$my_status_check = "";
	if ($is_create){

		// CREATE form
		
		$id = -1;
		$my_user = "admin";
		$my_duedate = '';
		$my_description = '' ;
		$my_idcat = -1;
		$my_amount = '0.00';
		$my_amount_formated = '0.00';
		$my_paydate = '';
		$my_status = -1;//get_parameter("operation");
		
		
		
	} else {   //Update
		$id = get_parameter ("update",-1);
         
		$sql_update ="SELECT a.*, b.name as catname, b.idcat as catid FROM public.ezfin_transactions as a JOIN public.ezfin_category as b on a.idcategory = b.idcat WHERE a.idtransaction =  :id";

		$stmt = get_db()->prepare($sql_update);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$row = array();
		if($stmt->execute()){
			$row = $stmt->fetch();
			
		}else {  //failed
			//
		}

		$my_user = "admin";
		$my_duedate = $row["duedate"];
		$my_description = $row['description'] ;
		$my_idcat = $row["idcategory"];
		$my_amount = $row["amount"];
		$my_amount_formated = money_format($money_format, $row['amount']);
		$my_paydate = $row['paymentdate'];
		$my_status = $row['status'];
		$my_catname = $row['catname'];
		

		switch($my_status){
			case 0:
				$my_status_check = "";
			break;
			case 1:
				$my_status_check = "checked";
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
		
	// creates a container for the transaction form
	include ("templates/transaction_form.php");
    //ends the transaction form container

}
	echo '</div>'; //end the navigation bar

	echo '<div class="col-lg-3">';

	
	include( 'templates/translist.php');

		
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

<script src="js/mydatepick.js"></script>
<script>

	$(document).ready(function() {	
		//	
		
		
	
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
		return false;
		}
	}); //

	
	</script>	
</body>
</html>