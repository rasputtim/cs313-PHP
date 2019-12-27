<?php 
session_start();
include('templates/header.php'); 
include('templates/nav.php'); 
require_once ("Product.php");
$product = new Product();
$productArray = $product->getAllProduct();

$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>
<div class="container">
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>S.NO</th>
	  		<th>Item Name</th>
	  		<th>Price</th>
			<th>Action</th>
	  	</tr>
  	
<?php
$total = '';
$i=1;
 foreach ($cartitems as $key=>$id) {
	if ($key != "0") {
	$r =$productArray[$id];
	
?>	  	
	<tr>
		<td><?php echo $i."-".$id; ?> </td>
		<td> <?php echo $r['title']; ?></td>
		<td>$<?php echo $r['price']; ?></td>
		<td><a href="delcart.php?remove=<?php echo $key; ?>"> <img class="img-responsive" src="images/icon-delete.png"></a></td>
	</tr>
<?php 
	$total = $total + $r['price'];
	$i++; 
	}
	} 
?>
<tr>
	<td></td>
	<td><strong>Total Price</strong></td>
	<td><strong>$<?php echo $total; ?></strong></td>
	<td><a href="checkout.php" class="btn btn-info">Checkout</a></td>
</tr>
	  </table>
	</div>
</div>
<?php include('templates/footer.php'); ?>
