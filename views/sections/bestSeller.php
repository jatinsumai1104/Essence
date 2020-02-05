<?php
require_once(__DIR__.'/../includes/header-bp.php');
$res = $di->get("Product")->bestSeller();

?>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(<?php echo BASEASSETS;?>img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Best Seller</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
            <?php
                foreach($res as $r){
            ?>
                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-wrapper">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $r['image'] );?>" alt="">
                                        </div>

                                        <!-- Product Description -->
                                        <div class="product-description">
                                            <span><?php echo $r['seller_name'];?></span>
                                            <a href="single-product-details/<?php echo $r['id'];?>">
                                                <h6><?php echo $r['product_name'];?></h6>
                                            </a>
                                            <p class="product-price"> Rs. <?php echo $r['price'];?></p>

                                            <!-- Hover Content -->
                                            <div class="hover-content">
                                                <!-- Add to Cart -->
                                                <div class="add-to-cart-btn">
                                                <button type="button" name="add_to_cart" class="btn essence-btn add_to_cart" id="<?php echo $r['id']?>" href="#" data-toggle="modal" data-target="#add-cart-modal" class_name="Category">Add to Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <?php
            
            }
            ?>
    <!-- ##### Shop Grid Area Start ##### -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->
    <?php
require_once(__DIR__.'/../includes/footer-bp.php')

?>