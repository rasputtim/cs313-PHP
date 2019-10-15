<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location:inc/noaccess.php");
    //exit;
}
require_once ("inc/connect.php");
//require_once ("inc/functions.php");

/**
 * Get a parameter from get request array.
 *
 * @param name Name of the parameter
 * @param default Value returned if there were no parameter.
 *
 * @return Parameter value.
 */
function get_parameter_get ($name, $default = "") {
	if ((isset ($_GET[$name])) && ($_GET[$name] != ""))
		return safe_input ($_GET[$name]);

	return $default;
}

/**
 * Get a parameter from post request array.
 *
 * @param name Name of the parameter
 * @param default Value returned if there were no parameter.
 *
 * @return Parameter value.
 */
function get_parameter_post ($name, $default = "") {
	if ((isset ($_POST[$name])) && ($_POST[$name] != ""))
		return safe_input ($_POST[$name]);

	return $default;
}

/**
 * Get a paramter from a request.
 *
 * It checks first on post request, if there were nothing defined, it
 * would return get request
 *
 * @param name
 * @param default
 *
 * @return
 */
function get_parameter ($name, $default = '') {
	// POST has precedence
	if (isset($_POST[$name]))
		return get_parameter_post ($name, $default);

	if (isset($_GET[$name]))
		return get_parameter_get ($name, $default);

	return $default;
}


//$is_insert = get_parameter("create2");
$is_insert = false;
$is_insert = $_POST["create2"];
///////     INSERT DAA INTO DATABASE /////////
// Database Insert data
// ==================
if ($is_insert){ // Create group
	//echo "<script type='javascript'>alert('Is Insert');</script>";
	
	//echo "<h3 class='suc'>".__('Successfully deleted')."</h3>";


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
//if ($is_insert){ // Create group
	//echo "<script type='javascript'>alert('Is Insert');</script>";
	
	echo "<h3 class='suc'>".__('is insert')."</h3>";


//}
?>
<div class="col-md-6 col-md-offset-3" id="form_container">
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