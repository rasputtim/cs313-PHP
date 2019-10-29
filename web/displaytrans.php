<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:inc/noaccess.php");
    exit;
}
require_once ("inc/functions_db.php");
include('templates/header.php'); 

$guiabar_ident = "display transactions";
?>

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

<?php

?>

<div id="content">
<div class="container">
<div class="row">
<?php
		$search_type = "transactions";
			include('templates/searchcomplete.php'); 
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
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#text-amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#text-amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>
<script>
	$(document).ready(function() {	
		$("#driver").click(function(event){
               var free_text = $("#text-free_text").val();
			   var user = $("#text-user").val();
			   var category = $("#category").val();
			   var start_date = $("#text-start_date").val();
			   var end_date = $("#text-end_date").val();
			   var status = $(".statusclass:checked").val();
			   var amount = $("#text-amount").val();
               $("#stage").load('ajax/results.php', {
				   "free_text":free_text,
				   "user":user,
				   "category":category,
				   "start_date":start_date,
				   "end_date":end_date,
				   "status":status,
				   "amount":amount
				   });
            });
	}); //
	$(window).load(function() {
		//
		
	}); //
	</script>	
</body>
</html>