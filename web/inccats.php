<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location:inc/noaccess.php");
    //exit;
}
require_once ("inc/connect.php");
require_once ("inc/functions.php");




    


$is_insert = get_parameter("create2");
//$is_insert = false;
//$is_insert = $_POST["create2"];
///////     INSERT DAA INTO DATABASE /////////
// Database Insert data
// ==================
if ($is_insert){ // Create group

	$my_user = "admin";
	$my_name = get_parameter("name");
	$my_alias = get_parameter("alias");
	$my_icon = get_parameter("icon");
	$my_oper = $_POST['operation'];//get_parameter("operation");
    $my_description = htmlspecialchars($_POST['descript']) ;//get_paramenter("descript");
	
	$stmt = $db->prepare('INSERT INTO public.ezfin_category (idUser,name,alias,icon,description,operation) VALUES (:user,:name,:alias,:icon,:desc,:oper)');
	$stmt->bindValue(':user', $my_user, PDO::PARAM_STR);
	$stmt->bindValue(':name', $my_name, PDO::PARAM_STR);
	$stmt->bindValue(':alias', $my_alias, PDO::PARAM_STR);
	$stmt->bindValue(':icon', $my_icon, PDO::PARAM_STR);
	$stmt->bindValue(':desc', $my_description, PDO::PARAM_STR);
	$stmt->bindValue(':oper', $my_oper, PDO::PARAM_INT);
	$stmt->execute();
	$newId = $db->lastInsertId('ezfin_category_idcat_seq');
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
<div class="col-lg-12">
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;add / edit category</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
		
<div class="col-lg-9">
	
<h1>add new category</h1>

<?php
if ($is_insert){ // Create group
	//echo "<script type='javascript'>alert('Is Insert');</script>";
	
	//echo "<h3 class='suc'>".__('is insert')."</h3>";
	echo "<h3 >Is Insert</h3>";
	echo "<h3 >$my_user</h3>";
	echo "<h3 >$my_name</h3>";
	echo "<h3 >$my_alias</h3>";
	echo "<h3 >$my_icon</h3>";
	echo "<h3 >OPER: $my_oper</h3>";
	echo "<h3 >$my_description</h3>";
	echo "<h3 >NEW ID: $newId</h3>";

}
?>
<div class="container">
<div class="col-md-6 col-md-offset-3 " id="form_container">
                    <h2>CATEGORY FORM</h2> 
                    <p> Please fill the information required below. Click Send </p>
                    <form role="form" method="post" id="reused_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
					<input type="hidden" class="form-control" id="is_insert" name="create2" value="true">
                        <div class="row">
                            <div class="col-sm-6 form-group">

                                <label for="name"> Category Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">

                                <label for="alias"> Category Alias:</label>
                                <input type="text" class="form-control" id="alias" name="alias" required>
                            </div>
						</div>
						<div class="row">
                            <div class="col-sm-6 form-group">
								<label for="icon"> Icon:</label>
								<select class="form-control" id="icon" name="icon" required >
								<option value= "">Select one icon</option>
								<option value="cat_all.png">cat_all.</option>
								<option value="cat_all_bw.png">cat_all_bw.png</option>
								<option value="cat_begin_cashflow.png">cat_begin_cashflow.png</option>
								<option value="cat_bill.png">cat_bill.png</option>
								<option value="cat_bill_red.png">cat_bill_red.png</option>
								<option value="cat_bill_red_peq.png">cat_bill_red_peq.png</option>
								<option value="cat_clothing.png">cat_clothing.png</option>
								<option value="cat_education.png">cat_education.png</option>
								<option value="cat_end_cashflow.png">cat_end_cashflow.png</option>
								<option value="cat_entertainment.png">cat_entertainment.png</option>
								<option value="cat_expense_left.png">cat_expense_left.png</option>
								<option value="cat_extras_cash_register.png">cat_extras_cash_register.png</option>
								<option value="cat_extras_coins_700.png">cat_extras_coins_700.png</option>
								<option value="cat_extras_coins_7000_blue.png">cat_extras_coins_7000_blue.png</option>
								<option value="cat_extras_coins_700_black.png">cat_extras_coins_700_black.png</option>
								<option value="cat_extras_coins_700_red.png">cat_extras_coins_700_red.png</option>
								<option value="cat_extras_currency_black_dollar.png">cat_extras_currency_black_dollar.png</option>
								<option value="cat_extras_currency_dollar_green.png">cat_extras_currency_dollar_green.png</option>
								<option value="cat_extras_currency_dollar_red.png">cat_extras_currency_dollar_red.png</option>
								<option value="cat_extras_dollars_folder.png">cat_extras_dollars_folder.png</option>
								<option value="cat_extras_money_wallet.png">cat_extras_money_wallet.png</option>
								<option value="cat_food.png">cat_food.png</option>
								<option value="cat_fuel.png">cat_fuel.png</option>
								<option value="cat_gambling_inc.png">cat_gambling_inc.png</option>
								<option value="cat_general_inc.png">cat_general_inc.png</option>
								<option value="cat_general_out.png">cat_general_out.png</option>
								<option value="cat_groceries.png">cat_groceries.png</option>
								<option value="cat_housing.png">cat_housing.png</option>
								<option value="cat_income.png">cat_income.png</option>
								<option value="cat_income_green.png">cat_income_green.png</option>
								<option value="cat_income_green_peq.png">cat_income_green_peq.png</option>
								<option value="cat_informative.png">cat_informative.png</option>
								<option value="cat_informative_bw.png">cat_informative_bw.png</option>
								<option value="cat_informative_peq.png">cat_informative_peq.png</option>
								<option value="cat_informative_round.png">cat_informative_round.png</option>
								<option value="cat_insurance.png">cat_insurance.png</option>
								<option value="cat_investments.png">cat_investments.png</option>
								<option value="cat_medical.png">cat_medical.png</option>
								<option value="cat_pets.png">cat_pets.png</option>
								<option value="cat_rent_bill.png">cat_rent_bill.png</option>
								<option value="cat_rent_inc.png">cat_rent_inc.png</option>
								<option value="cat_retirement.png">cat_retirement.png</option>
								<option value="cat_retirement_plan.png">cat_retirement_plan.png</option>
								<option value="cat_salary.png">cat_salary.png</option>
								<option value="cat_savings.png">cat_savings.png</option>
								<option value="cat_taxes.png">cat_taxes.png</option>
								<option value="cat_tax_refunds.png">cat_tax_refunds.png</option>
								<option value="cat_transportation.png">cat_transportation.png</option>
								<option value="cat_unknown.png">cat_unknown.png</option>
								<option value="cat_utilities.png">cat_utilities.png</option>
								<option value="cat_working.png">cat_working.png</option>
								</select>
                                
                                
                            </div>
                            

								
                           
						</div>
						<div class="row">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="operation" id="inlineRadio1" value="0">
							<label class="form-check-label" for="inlineRadio1">INCOME</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="operation" id="inlineRadio2" value="1">
							<label class="form-check-label" for="inlineRadio2">OUTCOME</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="operation" id="inlineRadio3" value="2" >
							<label class="form-check-label" for="inlineRadio3">INFORMATIVE</label>
							</div>
						</div>	
						<div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="descript"> Description:</label>
                                <textarea class="form-control" type="textarea" name="descript" id="descript" maxlength="6000" rows="3"></textarea>
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



</div>
<div class="col-lg-3">

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
<div class="col-lg-12">
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