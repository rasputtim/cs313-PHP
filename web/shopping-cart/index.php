<?php 
session_start();
include('templates/header.php');
include('templates/nav.php');
?> 
<div class="container">
 
<div class="row" id="product-grid" >
	<?php 
	require_once "product-gallery.php";
	?>
	
</div>

<?php include('templates/footer.php'); ?>
