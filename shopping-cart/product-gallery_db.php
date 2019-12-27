<?php
session_start();
require_once('inc/connect.php'); 
require_once ("Product.php");
$product = new Product();
$productArray = $product->getAllProduct();

$sql = "SELECT * FROM products";
$res = mysqli_query($connection, $sql);
?>
<div class="txt-heading">Products</div>

<?php while($r = mysqli_fetch_assoc($res)){ ?>
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="<?php echo $r['image']; ?>" alt="<?php echo $r['title'] ?>">
	      <div class="caption">
	        <h3><?php echo $r['title'] ?></h3>
	        <p><?php echo $r['description'] ?></p>
	        <p><a href="addtocart.php?id=<?php echo $r['id']; ?>" class="btn btn-primary" role="button">Add to Cart</a></p>
	      </div>
	    </div>
	  </div>
       <?php } ?>


    
<?php
if (! empty($productArray)) {
    foreach ($productArray as $k => $v) {
        ?>
		<div class="product-item col-sm-6 col-md-3">
            <div class="thumbnail">
                <div class="product-image ">
                    <img src="<?php echo $productArray[$k]["image"]; ?>" alt="<?php echo $productArray[$k]["title"]; ?>">
                </div>
                <div>
                    <div class="product-info caption">
                        <strong><?php echo $productArray[$k]["title"]; ?></strong>
                    </div>
                    <div class="product-info product-price"><?php echo "$".$productArray[$k]["price"]; ?></div>
                    <div class="product-info">
                    <p><a href="addtocart.php?id=<?php echo $r['id']; ?>" class="btn btn-primary" role="button">Add to Cart</a></p>
                        <input type="text"
                            id="qty_<?php echo $productArray[$k]["code"]; ?>"
                            name="quantity" value="1" size="2" />
                    </div>
                </div>
            </div>
        </div>
	<?php
    }
}
?>
