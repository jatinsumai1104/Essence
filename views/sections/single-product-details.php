<?php
require_once(__DIR__.'/../includes/header-bp.php');
$product = $di->get("Product")->getProductById($_GET["product_id"]);
$review = $di->get("Product")->getReviewByProductId($_GET["product_id"]);
?>
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix col-md-offset-4">
            <div class="product_thumbnail_slides owl-carousel">
                <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $product['image'] );?>" alt="" class="float-right" style="width: 60%">
                <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $product['image'] );?>" alt="" class="float-right" style="width: 60%">
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span><?php echo $product['seller_name'];?></span>
            <a href="cart.html">
                <h2><?php echo $product['product_name'];?></h2>
            </a>
            <p class="product-price"><span class="old-price">Rs <?php echo $product['price'];?></span> Rs.<?php echo rand($product['price']-100, $product['price']);?></p>
            <p class="product-desc"><?php echo $product['product_description'];?></p>

                <!-- Cart & Favourite Box -->
            <div class="cart-fav-box d-flex align-items-center">
                <!-- Cart -->
                <button type="button" name="add_to_cart" class="btn essence-btn add_to_cart" id="<?php echo $_GET["product_id"]?>" href="#" data-toggle="modal" data-target="#add-cart-modal" class_name="Category">Add to Cart</button>
            </div>
            <p class="product-price mt-3">Product Reviews:</p>
            <!-- Product Reviews:
            <br> -->

            <?php
                foreach($review as $res){
            ?>
                <h5><?php echo $res['name'];?> <span class="float-right">Ratings: <?php echo $res['rating'];?> / 5.0</span></h5>
                <p><?php echo $res['description'];?></p>
                
                    <!-- echo $res['name'].":  ". $res['description']. "  ". $res['rating'];
                    echo "<br>"; -->
            <?php
                }
            ?>

        </div>

        
    

        
    </section>
    <section class="shop_grid_area section-padding-80">
            <div class="container">
                <div class="row">
                    <?php 
                        $products = $di->get("Product")->boughtTogether($_GET["product_id"]);
                    ?>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="shop_grid_product_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="product-topbar d-flex align-items-center justify-content-between">
                                        <!-- Total Products -->
                                        <div>
                                            <h3>User Also Bought</h3>
                                        </div>
                                        <div class="total-products float-right">
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
                                    <div class="col-12 col-sm-6 col-lg-3">
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
                                                <p class="product-price"> Rs. <?php echo $product['price'];?></p>

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
                        <!-- <nav aria-label="navigation">
                            <ul class="pagination mt-50 mb-70">
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">21</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav> -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <!-- ##### Single Product Details Area End ##### -->
    <?php
require_once(__DIR__.'/../includes/footer-bp.php');

?>
<script>
 $(document).ready(function() {
     $product_id = <?php echo $_GET["product_id"]?>;
    $.ajax({
        url: "http://localhost/essence/helper/routing.php",
        method: "POST",
        data: {
        add_category_user: true,
        product_id:$product_id
        },
        dataType: "json",
        success: function(data) {
        },
        error: function(error) {
        console.log(error);
        }
    });
    //console.log("hello");
        });
</script>