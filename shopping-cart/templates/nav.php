<?php 
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
 
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="https://sleepy-fortress-71203.herokuapp.com/index.php">Back</a></li>
        <li><a href="index.php">Shop <span class="sr-only">(current)</span></a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="checkout.php">Check Out</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="cart.php" ><?php echo sizeof($cartitems)-1;?> items in Cart</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
