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
                                        <p>People also viewed these <span><?php echo $category['category_name']?></span></p>
                                    </div>
                                    <div class="float-right">
                                      <a href="<?php echo BASEURL;?>shop/<?php echo $category['category_name'];?>" class="btn essence-btn btn-sm">Show More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <?php
                            $product_ids = $di->get("Category")->getCategoryUsers($category['category_name']);
                            $i=0;
                            foreach($product_ids as $prod){
                                $i++;
                                if($i==4){
                                break;
                                }
                                $product = $di->get("Product")->getProductById($prod);
                            ?>

                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-wrapper">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $product['image'] );?>" alt="">
                                        </div>

                                        <!-- Product Description -->
                                        <div class="product-description">
                                            <span><?php echo $product['seller_name'];?></span>
                                            <a href="single-product-details/<?php echo $product['id'];?>">
                                                <h6><?php echo $product['product_name'];?></h6>
                                            </a>
                                            <p class="product-price"> Rs. <?php echo $product['price'];?></p>

                                            <!-- Hover Content -->
                                            <div class="hover-content">
                                                <!-- Add to Cart -->
                                                <div class="add-to-cart-btn">
                                                <button type="button" name="add_to_cart" class="btn essence-btn add_to_cart" id="<?php echo $product['id']?>" href="#" data-toggle="modal" data-target="#add-cart-modal" class_name="Category">Add to Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

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