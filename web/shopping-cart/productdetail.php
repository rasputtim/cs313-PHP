<?php 
session_start();
include('templates/header.php'); 
include('templates/nav.php'); 
require_once ("Product.php");
$product = new Product();
$productArray = $product->getAllProduct();

$items = $_SESSION['cart'];
$cartitems = explode(",", $items);

if(isset($_GET['show']) & !empty($_GET['show'])){
	$showtem = $_GET['show'];

}

$r =$productArray[$showtem];
?>

 
  <div class="container">

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column    image_large-->
        <div class="col-md-6 mb-4 ">

          <img id="productdetailimg" src="<?php echo $r['image_large'] ?>" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <a href="">
                <span class="badge purple mr-1">Category 2</span>
              </a>
              <a href="">
                <span class="badge blue mr-1">New</span>
              </a>
              <a href="">
                <span class="badge red mr-1">Bestseller</span>
              </a>
            </div>

            <p class="lead">
              <span class="mr-1">
                <del><?php echo $r['price']+50; ?></del>
              </span>
              <span><?php echo $r['price']; ?></span>
            </p>

            <p class="lead font-weight-bold">Description</p>

            <p><?php echo $r['detail']; ?></p>

            <form action="addtocart.php?id=<?php echo  $showtem; ?>" class="d-flex justify-content-left">
              <!-- Default input -->
              <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px">
              <input type="hidden" name="id" value="<?php echo  $showtem; ?>" >
              <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart
                <i class="fas fa-shopping-cart ml-1"></i>
              </button>
              
            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 text-center">

          <h4 class="my-4 h4">Additional information</h4>

          <p><?php echo $r['aditional']; ?></p>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      

    </div>
  </main>
  <!--Main layout-->

  

    
<?php
    include('templates/footer.php'); 
    ?>