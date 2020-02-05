<?php
require_once(__DIR__.'/../includes/header-bp.php');
$product = $di->get("Product")->getProductById($_GET["product_id"]);
?>
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $product['image'] );?>" alt="" style="width: 60%">
                <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $product['image'] );?>" alt="" style="width: 60%">
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