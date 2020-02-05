<?php
require_once(__DIR__.'/../includes/header-bp.php')

?>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(<?php echo BASEASSETS;?>img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
    <?php 
        $products = $di->get("Cart")->getAllCartProducts(Session::getSession("user_id"));
        $total_price = $products["total_price"];
        unset($products["total_price"]);
    ?>
    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span><?php echo count($products);?></span> products found in the cart</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <?php 
                                foreach($products as $product){
                            ?>
                                <!-- Single Product -->
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-wrapper">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $product['image'] );?>" alt="">
                                        </div>

                                        <!-- Product Description -->
                                        <div class="product-description">
                                            <span><?php echo $product['category_name'];?></span>
                                            <span class="float-right">Quantity: <?php echo $product['quantity'];?></span>
                                            <a href="<?php echo BASEURL;?>single-product-details/<?php echo $product['id'];?>">
                                                <h6><?php echo $product['product_name'];?></h6>
                                            </a>
                                            <p class="product-price"> $<?php echo $product['price'];?> <span><button class="btn btn-danger float-right">Delete</button></span></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                  <div class="order-details-confirmation">
                    <div class="cart-page-heading">
                        <h5>Your Order</h5>
                        <p>The Details</p>
                    </div>

                    <ul class="order-details-form mb-4">
                        <li><span>Product</span> <span>Total</span></li>
                        <?php 
                            foreach($products as $product){
                        ?>
                        <li><span><?php echo $product['product_name'] ." * ".$product['quantity'];?></span> <span>$<?php echo $product['quantity']*$product["price"];?></span></li>
                        <?php } ?>
                        <li><span>Subtotal</span> <span>$<?php echo $total_price;?></span></li>
                        <li><span>Shipping</span> <span>Free</span></li>
                        <li><span>Total</span> <span>$<?php echo $total_price;?></span></li>
                    </ul>

                    <a href="#" class="btn essence-btn">Check Out</a>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->
    <?php
require_once(__DIR__.'/../includes/footer-bp.php')

?>