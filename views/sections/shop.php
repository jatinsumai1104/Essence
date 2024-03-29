<?php
require_once(__DIR__.'/../includes/header-bp.php');
// echo $_SESSION['user_id'];
?>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(<?php echo BASEASSETS;?>img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Categories</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li>
                                        <a href="<?php echo BASEURL;?>shop">All</a>
                                    </li>
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="#">clothing</a>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="<?php echo BASEURL;?>shop/jeans">Jeans</a></li>
                                            <li><a href="<?php echo BASEURL;?>shop/jeans_men">Jeans Men</a></li>
                                            <li><a href="<?php echo BASEURL;?>shop/jeans_women">Jeans Women</a></li>
                                            <li><a href="<?php echo BASEURL;?>shop/shirt">Shirts</a></li>
                                            <li><a href="<?php echo BASEURL;?>shop/shirt_men">Shirts Men</a></li>
                                            <li><a href="<?php echo BASEURL;?>shop/shirt_women">Shirts Women</a></li>
                                            <li><a href="#">Dresses</a></li>
                                            <li><a href="<?php echo BASEURL;?>shop/shirt">Shirts &amp; Blouses</a></li>
                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#electronics" class="collapsed">
                                        <a href="#">Electronics</a>
                                        <ul class="sub-menu collapse" id="electronics">
                                            <li><a href="#">All</a></li>
                                            <li><a href="<?php echo BASEURL;?>shop/laptop">Laptop</a></li>
                                            <li><a href="<?php echo BASEURL;?>shop/mobile">Mobiles</a></li>
                                            <li><a href="#">Other Accessories</a></li>
                                        </ul>
                                    </li>
                                    <li data-toggle="collapse" data-target="#make-up" class="collapsed">
                                        <a href="#">Make - Up</a>
                                        <ul class="sub-menu collapse" id="make-up">
                                            <li><a href="<?php echo BASEURL;?>shop/make_up">All</a></li>
                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#books" class="collapsed">
                                        <a href="#">Books</a>
                                        <ul class="sub-menu collapse" id="books">
                                            <li><a href="<?php echo BASEURL;?>shop/books">All</a></li>
                                            <li><a href="<?php echo BASEURL;?>shop/fict_name">Fiction Books</a></li>
                                            <li><a href="<?php echo BASEURL;?>shop/nonfict_name">Non Fiction Books</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <?php 
                    $products = [];
                    if(isset($_SESSION["search_query"])){
                        $products = $di->get("Database")->rawQuery("SELECT * from product where category_name like '%{$_SESSION['search_query']}%'");
                        unset($_SESSION['search_query']);
                    }else{
                        if(isset($_GET["category_name"])){
                            $products = $di->get("Product")->getProductByCategory($_GET["category_name"]);
                        }else{
                            $products = $di->get("Product")->readAllProducts();
                        }
                    }
                ?>
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
    <!-- ##### Shop Grid Area End ##### -->


    <?php
require_once(__DIR__.'/../includes/footer-bp.php')

?>
