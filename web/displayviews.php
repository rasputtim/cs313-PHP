<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:inc/noaccess.php");
    exit;
}
require_once ("inc/functions_db.php");
include('templates/header.php'); 

$guiabar_ident = "display transactions by Periods";
?>

<body class="subpage">
<div id="main">

<div class="top1">
<?php 
$index1="false";
$index2="false";
$index3="false";
$index4="true";
$index5="false";
include('templates/menubar.php'); 

?>

</div>

<?php

?>

<div id="content">
<div class="container">
<div class="row">
<?php
		$search_type = "transactions";
			include('templates/searchbyview.php'); 
		?>
</div>

<div class="row" id = "stage">

	<div class="col-lg-9" >
		


	</div>
	<div class="col-lg-3"  >

		
	</div>	
</div>
<div class="row">
<div class="col-lg-12">

<div class="line1"></div>



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
<script src="js/mydatepick.js"></script>
<script>
	$(document).ready(function() {	
		$("#driver").click(function(event){
               var driver = $("#driver").val();
			   
               $("#stage").load('ajax/viewresults.php', {
				   "driver":driver
				   });
            });
	}); //
	$(window).load(function() {
		//
		
	}); //
	</script>	
</body>
</html>