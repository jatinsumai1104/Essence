<header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index"><img src="<?php echo BASEASSETS;?>img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Women's Collection</li>
                                        <li><a href="<?php echo BASEURL;?>shop">Dresses</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">Blouses &amp; Shirts</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">T-shirts</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">Rompers</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">Bras &amp; Panties</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Men's Collection</li>
                                        <li><a href="<?php echo BASEURL;?>shop">T-Shirts</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">Polo</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">Shirts</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">Jackets</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Kid's Collection</li>
                                        <li><a href="<?php echo BASEURL;?>shop">Dresses</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">Shirts</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">T-shirts</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">Jackets</a></li>
                                        <li><a href="<?php echo BASEURL;?>shop">Trench</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="<?php echo BASEASSETS;?>img/bg-img/bg-6.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="<?php echo BASEURL;?>index">Home</a></li>
                                    <li><a href="<?php echo BASEURL;?>shop/all">Shop</a></li>
                                    <li><a href="<?php echo BASEURL;?>single-product-details">Product Details</a></li>
                                    <li><a href="<?php echo BASEURL;?>checkout">Checkout</a></li>
                                    <li><a href="<?php echo BASEURL;?>contact">Contact</a></li>
                                    <li><a href="<?php echo BASEURL;?>login">Login</a></li>
                                    <li><a href="<?php echo BASEURL;?>register">Register</a></li>
                                    <li><a href="<?php echo BASEURL;?>forgot-password">Forgot Password</a></li>
                                    <li><a href="<?php echo BASEURL;?>recommend">Recommend</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo BASEURL;?>contact">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="<?php echo BASEASSETS;?>img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="#"><img src="<?php echo BASEASSETS;?>img/core-img/user.svg" alt=""></a>
                </div>
                <!-- User Login Info -->
                <form method="post" action="<?php echo BASEURL;?>helper/routing.php">
                    <div class="user-login-info">
                        <button class="btn" name="logout" href="#" style="position: relative;
    z-index: 1;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 90px;
    flex: 0 0 90px;
    width: 90px;
    display: block;
    text-align: center;
    border-left: 1px solid #ebebeb;
    height: 100%;
    line-height: 72px;">Logout</button>
                    </div>
                </form>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="cart" id="essenceCartBtn"><img src="<?php echo BASEASSETS;?>img/core-img/bag.svg" alt=""></a>
                </div>

            </div>

        </div>
    </header>