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
	$my_oper = get_parameter("operation");
    $my_description = htmlspecialchars($_POST['descript']) ;//get_paramenter("descript");

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

<?php
if ($is_insert){ // Create group
	//echo "<script type='javascript'>alert('Is Insert');</script>";
	
	//echo "<h3 class='suc'>".__('is insert')."</h3>";
	echo "<h3 >Is Insert</h3>";
	echo "<h3 >$my_user</h3>";
	echo "<h3 >$my_name</h3>";
	echo "<h3 >$my_alias</h3>";
	echo "<h3 >$my_icon</h3>";
	echo "<h3 >$my_oper</h3>";
    echo "<h3 >$my_description</h3>";

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
								<option selected>Open this select menu</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
								</select>
                                
                                
                            </div>
                            <div class="col-sm-6 checkbox-inline">

								<label for="operation"> Operation:</label>
								<div class="col-sm-6 ">
								<label class="radio-inline"><input type="radio" name="operation" checked>Income</label>
								</div><div class="col-sm-6 ">
								<label class="radio-inline"><input type="radio" name="operation">Outcome</label>
								</div><div class="col-sm-6">
								<label class="radio-inline"><input type="radio" name="operation">Informative</label> 
								</div>
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