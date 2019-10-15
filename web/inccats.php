<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location:inc/noaccess.php");
    //exit;
}
require_once ("inc/connect.php");
require_once ("inc/functions.php");

///////     INSERT DAA INTO DATABASE /////////
// Database Insert data
// ==================
if ($is_insert){ // Create group

	$timestamp = date('Y-m-d H:i:s');
	$description = get_parameter ("description","");
	$id_product = get_parameter ("product",0);
	$id_category = get_parameter ("category",0);
	$date = get_parameter ("date", "");
    $date_sql = date('Y-m-d', strtotime($date));
    $ammount = get_parameter ("ammount", 0.00);
    $ammount_sql = str_replace(',', '.',$ammount);
	
	$detail_id_method =   get_parameter ("detail_id_method" , 0);
	$detail_number =  get_parameter ("detail_number" , "");
	$detail_bank =  get_parameter ("detail_bank" , "");
	$detail_agency =  get_parameter ("detail_agency" , "");
	$detail_account =  get_parameter ("detail_account" , "");
	/*
	echo "<h3 class='suc'>".__('Payment details Data');
	echo  "<p>".$detail_id_method;
	echo  "<p>".$detail_number;
	echo  "<p>".$detail_bank;
	echo  "<p>".$detail_agency;
	echo  "<p>".$detail_account;
	
	echo "</h3>";
	*/
	
    $set_todos = 0;
    $remissive_users = array();
    $positive_users = array();
    $ha_remissive = 0;
    $ha_positive = 0;
	foreach ($_POST['id_user'] as $selectedOption) {
	 if($selectedOption == -1) $set_todos = 1;
	}

    if( !$set_todos) {

	foreach ($_POST['id_user'] as $selectedOption) {

   	 if(!is_remido($selectedOption, $id_category,$date_sql) && is_pagante($selectedOption)) {
		 
		$my_cat = $id_category;
		$my_user = $selectedOption;
				
		$id_data = tes_insert_data_user ($ammount_sql,$date_sql,$description ,$id_product, $my_cat , $my_user);
	
		if ($id_data > 0){
			 //======Insere regitro de pagamento=======
			$id_payment = tes_insert_user_data_payment($id_data,$detail_id_method,$detail_number,$detail_bank,$detail_agency,$detail_account,$description);
	       
						
			if ($id_payment > 0){
				$new_payment = $id_payment;
				echo "<h3 class='suc'>".__('Payment details')."  ".__('Successfully created')." ".$new_payment."</h3>";
			} else {
				echo "<h3 class='error'>".__('Payment details')."  ".__('Could not be created')."</h3>";
			
			}
			echo "<h3 class='suc'>".__('Successfully created')." "._('for')." ".dame_nombre_real($my_user)."</h3>";
		}else{
			echo "<h3 class='error'>".__('Could not be created')." "._('for')." ".dame_nombre_real($my_user)."</h3>";
		}
			
			
	 }else{
		 array_push($remissive_users,$selectedOption);
		 $ha_remissive = 1;
		 //echo "<h3 class='error'>".__('Could not be created').__('Remissive User')."</h3>";
	 }
    } //end foreach


    //check only the last record
	/*
	if (! $result)
		echo "<h3 class='error'>".__('Could not be created')."</h3>";
	else {
		echo "<h3 class='suc'>".__('Successfully created')."</h3>";
		$id_data = mysql_insert_id();
		//insert_event ("USER TREASURY ITEM CREATED", $id_data, 0, $title);
		audit_db ($config["id_user"], $config["REMOTE_ADDR"], "TES", "Created user tes item $ammount - $description");
	}
	*/
	
    }else {  // TODOS Selected


    
    $sql_teste = "SELECT id_usuario FROM tusuario  where id_company=1 ORDER BY nombre_real";
			//echo $sql_teste;

    $users_list =  get_db_all_rows_sql ($sql_teste);
    
    if ($users_list !== false) {
    
	foreach ($users_list as $selected) {
	$selectedOption = $selected[0];
     
    if(!is_remido($selectedOption, $id_category,$date_sql) && is_pagante($selectedOption)) {
		
		$my_cat = $id_category;
		$my_user = $selectedOption;
				
		$id_data = tes_insert_data_user ($ammount_sql,$date_sql,$description ,$id_product, $my_cat , $my_user);
	
		if ($id_data > 0){
			 //======Insere regitro de pagamento=======
			$id_payment = tes_insert_user_data_payment($id_data,$detail_id_method,$detail_number,$detail_bank,$detail_agency,$detail_account,$description);
	       
						
			if ($id_payment > 0){
            $new_payment = $id_payment;
			//	echo "<h3 class='suc'>".__('Payment details')."  ".__('Successfully created')." ".$new_payment."</h3>";
			} else {
			//	echo "<h3 class='error'>".__('Payment details')."  ".__('Could not be created')."</h3>";
			//
			}
			array_push($positive_users,$selectedOption);
			$ha_positive = 1;	
			//echo "<h3 class='suc'>".__('Successfully created')." "._('for')." ".dame_nombre_real($my_user)."</h3>";
		}else{
			echo "<h3 class='error'>".__('Could not be created')." "._('for')." ".dame_nombre_real($my_user)."</h3>";
		}
			
			
	 }else{
		 array_push($remissive_users,$selectedOption);
		 $ha_remissive = 1;
		 //echo "<h3 class='error'>".__('Could not be created').__('Remissive User')."</h3>";
	 }

	 } //end foreach     $is_create = true;
	 } //end if
    }
    //Irm�os Remidos
    if ($ha_positive) {
       echo "<h3 class='success'>";
       echo 'Added Users';
       echo ": ";
       foreach($positive_users as $remido) {
			echo dame_nombre_real($remido);
			echo " , ";
       }
      echo "</h3>";

    }
    
    //Irm�os Remidos
    if ($ha_remissive) {
       echo "<h3 class='error'>";
       echo 'Remissive Users';
       echo ": ";
       foreach($remissive_users as $remido) {
			echo dame_nombre_real($remido);
			echo " , ";
       }
      echo "</h3>";

    }


}
///////END INSERT DATA ///////////////




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
<div class="container">
<div class="row">
<div class="span12">
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;add / edit category</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
		
<div class="span9">
	
<h1>add new category</h1>


<div class="col-md-6 col-md-offset-3" id="form_container">
                    <h2>CATEGORY FORM</h2> 
                    <p> Please fill the information required below. Click Send </p>
                    <form role="form" method="post" id="reused_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                        
                        <div class="row">
                            <div class="col-sm-6 form-group">

                                <label for="name"> Category Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">

                                <label for="alias"> Category Alias:</label>
                                <input type="text" class="form-control" id="name" name="alias" required>
                            </div>
						</div>
						<div class="row">
                            <div class="col-sm-6 form-group">

                                <label for="icon"> Icon:</label>
                                <input type="text" class="form-control" id="icon" name="icon" required>
                            </div>
                            <div class="col-sm-6 form-group">

                                <label for="operation"> Operation:</label>
                                <input type="text" class="form-control" id="operation" name="operation" required>
                            </div>
						</div>
						<div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="message"> Description:</label>
                                <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-default pull-left" >Send &rarr;</button>
                            </div>
                        </div>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your message successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
</div>





</div>
<div class="span3">

<h2>category List</h2>

	<ul class="ul1">
	<?php 
	foreach ($db->query('SELECT name FROM public.ezfin_category') as $row)
	{
	echo '<li><a href="#">';
	echo $row['name'];
	echo '</a></li>';
	}
?>
	  	            		      	      			      
	</ul>	

	

	
</div>	
</div>	
</div>	
</div>





<div class="bot1">
<div class="container">
<div class="row">
<div class="span12">
<div class="bot1_inner">
<?php include('templates/footer.php'); ?>
</div>	
</div>	
</div>








	
</div>
<script type="text/javascript" src="js/bootstrap.js"></script>
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
	
	}); //
	</script>	
</body>
</html>