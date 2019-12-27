<?php
session_start();
require_once ("Product.php");
$product = new Product();
$productArray = $product->getAllProduct();


?>
<div class="txt-heading">Products</div>

  
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
                         <a href="addtocart.php?id=<?php echo  $productArray[$k]['id']; ?>" class="btn btn-primary" role="button">Add to Cart</a>
                         <a href="productdetail.php?show=<?php echo  $productArray[$k]['id']; ?>" class="btn btn-primary" role="button"> Detail</a>
                    </div>
                </div>
            </div>
        </div>
	<?php
    }
}
?>
