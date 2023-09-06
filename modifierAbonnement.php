<?php
$abon = $_SESSION['abon'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>zeryeb</title>
    <link rel="stylesheet" type="text/css" href="../libs/css/style.css">
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../libs/css/responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link href="../libs/images/lo9o.png" sizes="128x128" rel="shortcut icon"/>
</head>
<body>
<header class="header-nav menu_style_home_one navbar-scrolltofixed stricky main-menu">
    <div class="container-fluid">
        <nav>

            <div class="menu-toggle">
                <img class="nav_logo_img img-fluid" src="../libs/images/header-logo.png" alt="header-logo.png">
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="#" class="navbar_brand float-left dn-smd">
                <img class="logo1 img-fluid" src="../libs/images/header-logo.png" alt="header-logo.png">
                <img class="logo2 img-fluid" src="../libs/images/header-logo.png" alt="header-logo2.png">
                <span>Zeryeb</span>
            </a>

            <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                <li>
                    <a href="#"><span class="title">Home</span></a>

                    <ul>
                        <li><a href="index-2.html">Home 1</a></li>
                        <li><a href="index2.html">Home 2</a></li>
                        <li><a href="index3.html">Home 3</a></li>
                        <li><a href="index4.html">Home 4</a></li>
                        <li><a href="index5.html">Home 5</a></li>
                        <li><a href="index6.html">Home - University</a></li>
                        <li><a href="index7.html">Home College</a></li>
                        <li><a href="index8.html">Home Kindergarten</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="title">Courses</span></a>

                    <ul>
                        <li>
                            <a href="#">Courses List</a>

                            <ul>
                                <li><a href="page-course-v1.html">Courses v1</a></li>
                                <li><a href="page-course-v2.html">Courses v2</a></li>
                                <li><a href="page-course-v3.html">Courses v3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Courses Single</a>

                            <ul>
                                <li><a href="page-course-single-v1.html">Single V1</a></li>
                                <li><a href="page-course-single-v2.html">Single V2</a></li>
                                <li><a href="page-course-single-v3.html">Single V3</a></li>
                            </ul>
                        </li>
                        <li><a href="page-instructors.html">Instructors</a></li>
                        <li><a href="page-instructors-single.html">Instructor Single</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="title">Abonnements</span></a>
                    <ul>
                        <li><a href="view/ajouterAbonnement.php">abonnement List</a></li>
                        <li><a href="../index.php?act=stat">abon stat</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="title">Pages</span></a>
                    <ul>
                        <li>
                            <a href="#"><span class="title">Shop Pages</span></a>
                            <ul>
                                <li><a href="page-shop.html">Shop</a></li>
                                <li><a href="page-shop-single.html">Shop Single</a></li>
                                <li><a href="page-shop-cart.html">Cart</a></li>
                                <li><a href="page-shop-checkout.html">Checkout</a></li>
                                <li><a href="page-shop-order.html">Order</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="title">User Admin</span></a>
                            <ul>
                                <li><a href="page-dashboard.html">Dashboard</a></li>
                                <li><a href="page-my-courses.html">My Courses</a></li>
                                <li><a href="page-my-order.html">My Order</a></li>
                                <li><a href="page-my-message.html">My Message</a></li>
                                <li><a href="page-my-review.html">My Review</a></li>
                                <li><a href="page-my-bookmarks.html">My Bookmarks</a></li>
                                <li><a href="page-my-listing.html">My Listing</a></li>
                                <li><a href="page-my-setting.html">My Setting</a></li>
                            </ul>
                        </li>
                        <li><a href="page-about.html">About Us</a></li>
                        <li><a href="page-gallery.html">Gallery</a></li>
                        <li><a href="page-faq.html">Faq</a></li>
                        <li><a href="page-login.html">LogIn</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-pricing.html">Membership</a></li>
                        <li><a href="page-error.html">404 Page</a></li>
                        <li><a href="page-terms.html">Terms and Conditions</a></li>
                        <li><a href="page-become-instructor.html">Become an Instructor</a></li>
                        <li><a href="page-ui-element.html">UI Elements</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="title">Blog</span></a>
                    <ul>
                        <li><a href="page-blog-v1.html">Blog List 1</a></li>
                        <li><a href="page-blog-grid.html">Blog List 2</a></li>
                        <li><a href="page-blog-list.html">Blog List 3</a></li>
                        <li><a href="page-blog-single.html">Single Post</a></li>
                    </ul>
                </li>
                <li class="last">
                    <a href="page-contact.html"><span class="title">Contact</span></a>
                </li>
            </ul>

        </nav>
    </div>
</header>

<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <div class="header stylehome1">
            <div class="main_logo_home2">
                <img class="nav_logo_img img-fluid float-left mt20" src="../libs/images/header-logo.png"
                     alt="header-logo.png">
                <span>zeryeb</span>
            </div>
            <ul class="menu_bar_home2">
                <li class="list-inline-item">
                </li>
                <li class="list-inline-item"><a href="#menu"><span></span></a></li>
            </ul>
        </div>
    </div>
    <nav id="menu" class="stylehome1">
        <ul>
            <li><span>Home</span>
                <ul>
                    <li><a href="index-2.html">Home 1</a></li>
                    <li><a href="index2.html">Home 2</a></li>
                    <li><a href="index3.html">Home 3</a></li>
                    <li><a href="index4.html">Home 4</a></li>
                    <li><a href="index5.html">Home 5</a></li>
                    <li><a href="index6.html">Home - University</a></li>
                    <li><a href="index7.html">Home College</a></li>
                    <li><a href="index8.html">Home Kindergarten</a></li>
                </ul>
            </li>
            <li><span>Courses</span>
                <ul>
                    <li><span>Courses List</span>
                        <ul>
                            <li><a href="page-course-v1.html">Courses v1</a></li>
                            <li><a href="page-course-v2.html">Courses v2</a></li>
                            <li><a href="page-course-v3.html">Courses v3</a></li>
                        </ul>
                    </li>
                    <li><span>Courses Single</span>
                        <ul>
                            <li><a href="page-course-single-v1.html">Single V1</a></li>
                            <li><a href="page-course-single-v2.html">Single V2</a></li>
                            <li><a href="page-course-single-v3.html">Single V3</a></li>
                        </ul>
                    </li>
                    <li><a href="page-instructors.html">Instructors</a></li>
                    <li><a href="page-instructors-single.html">Instructor Single</a></li>
                </ul>
            </li>
            <li><span>Events</span>
                <ul>
                    <li><a href="page-event.html">abonnement List</a></li>
                    <li><a href="page-event-single.html">abonnement Single</a></li>
                </ul>
            </li>
            <li><span>Pages</span>
                <ul>
                    <li><span>Shop Pages</span>
                        <ul>
                            <li><a href="page-shop.html">Shop</a></li>
                            <li><a href="page-shop-single.html">Shop Single</a></li>
                            <li><a href="page-shop-cart.html">Cart</a></li>
                            <li><a href="page-shop-checkout.html">Checkout</a></li>
                            <li><a href="page-shop-order.html">Order</a></li>
                        </ul>
                    </li>
                    <li><span>User Admin</span>
                        <ul>
                            <li><a href="page-dashboard.html">Dashboard</a></li>
                            <li><a href="page-my-courses.html">My Courses</a></li>
                            <li><a href="page-my-order.html">My Order</a></li>
                            <li><a href="page-my-message.html">My Message</a></li>
                            <li><a href="page-my-review.html">My Review</a></li>
                            <li><a href="page-my-bookmarks.html">My Bookmarks</a></li>
                            <li><a href="page-my-listing.html">My Listing</a></li>
                            <li><a href="page-my-setting.html">My Setting</a></li>
                        </ul>
                    </li>
                    <li><a href="page-about.html">About Us</a></li>
                    <li><a href="page-gallery.html">Gallery</a></li>
                    <li><a href="page-faq.html">Faq</a></li>
                    <li><a href="page-login.html">LogIn</a></li>
                    <li><a href="page-register.html">Register</a></li>
                    <li><a href="page-pricing.html">Membership</a></li>
                    <li><a href="page-error.html">404 Page</a></li>
                    <li><a href="page-terms.html">Terms and Conditions</a></li>
                    <li><a href="page-become-instructor.html">Become an Instructor</a></li>
                    <li><a href="page-ui-element.html">UI Elements</a></li>
                </ul>
            </li>
            <li><span>Blog</span>
                <ul>
                    <li><a href="page-blog-v1.html">Blog List 1</a></li>
                    <li><a href="page-blog-grid.html">Blog List 2</a></li>
                    <li><a href="page-blog-list.html">Blog List 3</a></li>
                    <li><a href="page-blog-single.html">Single Post</a></li>
                </ul>
            </li>
            <li><a href="page-contact.html">Contact</a></li>

        </ul>
    </nav>
</div>

<div class="home1-mainslider">
    <div class="container-fluid p0">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-banner-wrapper">
                    <div class="banner-style-one owl-theme owl-carousel">
                        <div class="slide slide-one"
                             style="background-image: url(libs/images/home/1.jpg); height: 95vh ;">
                            <div class="container">
                                <div class="row home-content">
                                    <div class="col-lg-12 text-center p0">
                                        <h3 class="banner-title">La formation parfaite pour vous</h3>
                                        <p>La musique est considérée comme thérapie pour l'âme.</p>
                                        <div class="btn-block"><a href="#" class="banner-btn">Prêt à commencer?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide slide-one"
                             style="background-image: url(libs/images/home/3.jpg);height: 95vh;">
                            <div class="container">
                                <div class="row home-content">
                                    <div class="col-lg-12 text-center p0">
                                        <h3 class="banner-title">Découvrir nos ?</h3>
                                        <p>La musique est considérée comme thérapie pour l'âme.</p>
                                        <div class="btn-block"><a href="#" class="banner-btn">Prêt à commencer?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide slide-one"
                             style="background-image: url(libs/images/home/2.jpg);height: 95vh;">
                            <div class="container">
                                <div class="row home-content">
                                    <div class="col-lg-12 text-center p0">
                                        <h3 class="banner-title">découvrir nos cours</h3>
                                        <p>La musique est considérée comme thérapie pour l'âme.</p>
                                        <div class="btn-block"><a href="#" class="banner-btn">Prêt à commencer?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-btn-block banner-carousel-btn">
                        <span class="carousel-btn left-btn"><i class="flaticon-left-arrow left"></i> <span class="left">RET<br>OUR</span></span>
                        <span class="carousel-btn right-btn"><span class="right">SUI<br>VANT</span> <i
                                    class="flaticon-right-arrow-1 right"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container home_iconbox_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="home_icon_box">
                            <div class="icon"><img src="../libs/images/home/hicon1.png" alt="hicon1.png"></div>
                            <p>Meilleurs professeurs de musique</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="home_icon_box">
                            <div class="icon mt15"><img src="../libs/images/home/hicon2.png" alt="hicon2.png"></div>
                            <p>Meilleure formation en musique</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="home_icon_box">
                            <div class="icon"><img src="../libs/images/home/hicon3.png" alt="hicon3.png"></div>
                            <p>Reconnaissance Nationale</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="home_icon_box">
                            <div class="icon"><img src="../libs/images/home/hicon4.png" alt="hicon4.png"></div>
                            <p>Numéro un dans Tunisie</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="our-courses" class="our-courses pt90 pt650-992">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mouse_scroll">
                    <div class="icon"><span class="flaticon-download-arrow"></span></div>
                    <p>modifier un Abonnement.</p>
                    <form action="index.php?act=update" method="post">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <label>Nom</label><br>
                                <input type="text" name="nom" value="<?php echo $abon->getNom(); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <label>Type d'abonnement</label><br>
                                <input type="text" name="type" value="<?php echo $abon->getType(); ?> ">
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <label>Date d'abonnement</label><br>
                                    <!--        "--><?php //var_dump(($_SESSION['date'])); ?><!-- ">-->
                                    <input type="dateAb" name="date"
                                           value="<?php echo '"' . date('Y-m-d', strtotime(($event->getDateAb()))) . '"' ?> ">
                                </div>
                            </div>
                            
                        
                        <input type="hidden" name="idAb" value="<?php echo $_SESSION['idAb']; ?>"/>

                        <input class="btn btn-primary" type="submit" name="updatebtn" value="Submit">
                        <a href="../index.php" class="btn btn-danger">Cancel</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript" src="../libs/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../libs/js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="../libs/js/popper.min.js"></script>
<script type="text/javascript" src="../libs/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../libs/js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="../libs/js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="../libs/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="../libs/js/isotop.js"></script>
<script type="text/javascript" src="../libs/js/snackbar.min.js"></script>
<script type="text/javascript" src="../libs/js/simplebar.js"></script>
<script type="text/javascript" src="../libs/js/parallax.js"></script>
<script type="text/javascript" src="../libs/js/scrollto.js"></script>
<script type="text/javascript" src="../libs/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="../libs/js/jquery.counterup.js"></script>
<script type="text/javascript" src="../libs/js/wow.min.js"></script>
<script type="text/javascript" src="../libs/js/progressbar.js"></script>
<script type="text/javascript" src="../libs/js/slider.js"></script>
<script type="text/javascript" src="../libs/js/timepicker.js"></script>
<!-- Custom script for all pages -->
<script type="text/javascript" src="../libs/js/script.js"></script>

</body>
</html>
