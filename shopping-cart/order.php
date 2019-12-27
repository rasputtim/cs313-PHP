<?php 
session_start();
include('templates/header.php'); 
require_once ("Product.php");
$product = new Product();
$productArray = $product->getAllProduct();


$myName = strip_tags(trim($_POST['first_name']));
$myLastName = strip_tags(trim($_POST['last_name']));
$myAddress = strip_tags(trim($_POST['address']));
$myCity= strip_tags(trim($_POST['city']));
$myState= strip_tags(trim($_POST['state']));
$myZip= strip_tags(trim($_POST['zip_code']));
$items = unserialize(trim($_POST['items_array']));
$cartitems = explode(",", $items);
?> 

<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                          
                    <div class="row">
                        <p>ORDER PLACED By: <?php echo $myName; ?></p>
                    </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small></small></div>
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
                                    <p class="form-control"><?php echo $myName;?></p>
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Last Name:</strong>
                                    <p class="form-control"><?php echo $myLastName;?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                <p class="form-control"><?php echo $myAddress;?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                <p class="form-control"><?php echo $myCity;?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12">
                                <p class="form-control"><?php echo $myState;?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                <p class="form-control"><?php echo $myZip;?></p>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
