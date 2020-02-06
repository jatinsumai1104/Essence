<?php
require_once(__DIR__.'/../includes/header-bp.php');


$categories = $di->get("User")->getRecommendCategories($_SESSION['user_id']);

?>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(<?php echo BASEASSETS;?>img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Recommend</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
<!-- ##### Shop Grid Area Start ##### -->
<?php 
    $products = [];
    $products = $di->get("Event")->getProductsForBday(Session::getSession("user_id"));
    $status = "birthday";
    if(count($products) == 0){
        $products = $di->get("Event")->getProductsForEvents($di->get("User")->getUserCountry(Session::getSession("user_id")));
        $status = "event";
    }
?>
<section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <img src="<?php echo BASEASSETS;?>img/bg-img/<?php

                        echo $status == "birthday" ? "birthday-banner2.jpg" : "event-banner-2.jpg";
                    ?>"  style="height: 100vh" alt="">
                </div>
                
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span><?php echo count($products);?></span> products found</p>
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
                                            <span><?php echo $product['seller_name'];?></span>
                                            <a href="<?php echo BASEURL;?>single-product-details/<?php echo $product['id'];?>">
                                                <h6><?php echo $product['product_name'];?></h6>
                                            </a>
                                            <p class="product-price"> $<?php echo $product['price'];?></p>

                                            <!-- Hover Content -->
                                            <div class="hover-content">
                                                <!-- Add to Cart -->
                                                <div class="add-to-cart-btn">
                                                    <button type="button" name="add_to_cart" class="btn essence-btn add_to_cart" id="<?php echo $product["id"]?>" href="#" data-toggle="modal" data-target="#add-cart-modal" class_name="Category">Add to Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if(count($products) > 20){?>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->
<?php
require_once(__DIR__.'/../includes/footer-bp.php')

?>