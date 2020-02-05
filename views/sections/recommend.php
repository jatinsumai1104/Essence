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
    foreach($categories as $category){
        // print_r($category);
    ?>
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span><?php echo $category['category_name']?></span> recommended for you are</p>
                                    </div>
                                    <div class="float-right">
                                      <a href="#" class="btn essence-btn btn-sm">Show More ..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="<?php echo BASEASSETS;?>img/product-img/product-1.jpg" alt="">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="<?php echo BASEASSETS;?>img/product-img/product-2.jpg" alt="">

                                        <!-- Product Badge -->
                                        <div class="product-badge offer-badge">
                                            <span>-30%</span>
                                        </div>
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>topshop</span>
                                        <a href="single-product-details.php">
                                            <h6>Knot Front Mini Dress</h6>
                                        </a>
                                        <p class="product-price"><span class="old-price">$75.00</span> $55.00</p>
                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            
                                            <div class="add-to-cart-btn">
                                                <button type="button" name="add_to_cart" class="btn essence-btn add_to_cart" id="<?php echo $_GET["product_id"]?>" href="#" data-toggle="modal" data-target="#add-cart-modal" class_name="Category">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    ?>
    <!-- ##### Shop Grid Area End ##### -->
    <?php
require_once(__DIR__.'/../includes/footer-bp.php')

?>