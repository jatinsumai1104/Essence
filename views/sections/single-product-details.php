<?php
require_once(__DIR__.'/../includes/header-bp.php');
$product = $di->get("Product")->getProductById($_GET["product"]);
?>
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $product['image'] );?>" alt="" style="height: 90vh">
                <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $product['image'] );?>" alt="" style="height: 90vh">
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span><?php echo $product['seller_name'];?></span>
            <a href="cart.html">
                <h2><?php echo $product['product_name'];?></h2>
            </a>
            <p class="product-price"><span class="old-price">$<?php echo rand($product['price']-10, $product['price']);?></span> $<?php echo $product['price'];?></p>
            <p class="product-desc"><?php echo $product['product_description'];?></p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->
    <?php
require_once(__DIR__.'/../includes/footer-bp.php')

?>
<script>
 $(document).ready(function() {
     $product_id = $("#product_id").val();
           $.ajax({
    url: "http://localhost/stock_quote/helper/routing.php",
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
        });
</script>