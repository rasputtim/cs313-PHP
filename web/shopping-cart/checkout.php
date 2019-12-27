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

<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                          
                    <div class="row">
                        <p></p>
                    </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="order.php">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="cart.php">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                            
                        <?php
                        $total = '';
                        $i=1;
                        foreach ($cartitems as $key=>$id) {
                            if ($key != "0") {
                            $r =$productArray[$id];
                            
                        ?>	  	

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="<?php echo $r["image"]; ?>" alt="<?php echo $r["title"]; ?>">
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><?php echo $r['title']; ?></div>
                                    <div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>$</span><?php echo $r['price']; ?></h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                        <?php 
                            $total = $total + $r['price'];
                            $i++; 
                            }
                            } 
                        ?>
                        
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>$</span><span><?php echo $total;?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="form-control" value="" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="state" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="" />
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <input type='hidden' name='items_array' value="<?php echo htmlentities(serialize($items)); ?>" />
                    <!--SHIPPING METHOD END-->
                    <!-- PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="cart.php" class="btn btn-info">Cart</a>
                               
                                
                                <a href="index.php" class="btn btn-info">Shop</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- PAYMENT END-->
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
