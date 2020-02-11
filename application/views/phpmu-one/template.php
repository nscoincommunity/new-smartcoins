<?php
  $iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
  $ksm = $this->db->query("SELECT * FROM rb_konsumen where kode_konsumen='".$this->session->kode_konsumen."'")->row_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title><?php echo $title; ?></title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/sw/style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="top-header-content h-100 d-flex align-items-center justify-content-between">
                            <!-- Top Headline -->
                            <div class="top-headline">
                                <p>Welcome to <span>CryptoTrend.ID</span></p>
                            </div>
                            <!-- Top Login & Faq & Earn Monery btn -->
                            <div class="login-faq-earn-money" style="margin-right:20px;">
                                <a href="#">Login</a>
                                <a href="#">Register</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="cryptos-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="cryptosNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>asset/images/logo.png" alt="CryptoTrend.id" width="100"></a>

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

                              <?php include "sw-menu.php"; ?>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">

            <!-- Single Hero Slide -->
            <div class="single-hero-slide">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-7">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Take a step into the <span>Crypto World</span></h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod erat. Ut at erat et arcu pulvinar.</h6>
                                <a href="#" class="btn cryptos-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="hero-slides-thumb" data-animation="fadeInUp" data-delay="1000ms">
                                <img src="<?php echo base_url(); ?>asset/sw/img/bg-img/bg-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-7">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Take a step into the <span>Crypto World</span></h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod erat. Ut at erat et arcu pulvinar.</h6>
                                <a href="#" class="btn cryptos-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="hero-slides-thumb" data-animation="fadeInUp" data-delay="1000ms">
                                <img src="<?php echo base_url(); ?>asset/sw/img/bg-img/bg-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->



    <!-- ##### About Area Start ##### -->
    <section class="cryptos-about-area mt-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="about-thumbnail mb-100">
                        <img src="<?php echo base_url(); ?>asset/sw/img/bg-img/about.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="about-content mb-100">
                        <div class="section-heading">
                            <h3>Let’s change <br><span>the world</span> together</h3>
                            <h5>Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod erat. Ut at erat et arcu pulvinar cursus a eget nisl.</h5>
                            <p>Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod erat. Ut at erat et arcu pulvinar cursus a eget nisl. Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi.</p>
                            <a href="#" class="btn cryptos-btn mt-30">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Currency Area Start ##### -->
    <section class="currency-calculator-area section-padding-100 bg-img bg-overlay" style="background-image: url(<?php echo base_url(); ?>asset/sw/img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center white mx-auto">
                        <h3 class="mb-4">Cryptocurrency Calculator</h3>
                        <h5 class="mb-2">Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod erat. Ut at erat et arcu pulvinar cursus a eget nisl.</h5>
                        <p>Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod erat. Ut at erat et arcu pulvinar cursus a eget nisl. Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Currency Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="cryptos-blog-area section-padding-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <div class="blog-area">
                        <!-- Single Blog Area -->
                        <div class="single-blog-area d-flex align-items-start">
                            <!-- Thumbnail -->
                            <div class="blog-thumbnail">
                                <img src="<?php echo base_url(); ?>asset/sw/img/blog-img/1.jpg" alt="">
                            </div>
                            <!-- Content -->
                            <div class="blog-content">
                                <a href="#" class="post-title">This Platform Aims to Disrupt the Market</a>
                                <div class="meta-data">
                                    <a href="#">Crypto News</a> |
                                    <a href="#">March 18, 2018</a>
                                </div>
                                <p>Morbi vel arcu gravida, iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis.</p>
                            </div>
                        </div>
                        <!-- Single Blog Area -->
                        <div class="single-blog-area d-flex align-items-start">
                            <!-- Thumbnail -->
                            <div class="blog-thumbnail">
                                <img src="<?php echo base_url(); ?>asset/sw/img/blog-img/2.jpg" alt="">
                            </div>
                            <!-- Content -->
                            <div class="blog-content">
                                <a href="#" class="post-title">New Hedge Funds invests in Crypto</a>
                                <div class="meta-data">
                                    <a href="#">Crypto News</a> |
                                    <a href="#">March 18, 2018</a>
                                </div>
                                <p>Iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis. Ut in iaculis enim.</p>
                            </div>
                        </div>
                        <!-- Single Blog Area -->
                        <div class="single-blog-area d-flex align-items-start">
                            <!-- Thumbnail -->
                            <div class="blog-thumbnail">
                                <img src="<?php echo base_url(); ?>asset/sw/img/blog-img/3.jpg" alt="">
                            </div>
                            <!-- Content -->
                            <div class="blog-content">
                                <a href="#" class="post-title">This Platform Aims to Disrupt the Market</a>
                                <div class="meta-data">
                                    <a href="#">Crypto News</a> |
                                    <a href="#">March 18, 2018</a>
                                </div>
                                <p>Morbi vel arcu gravida, iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis.</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </section>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Main Footer Area -->
        <div class="main-footer-area section-padding-100-0 bg-img bg-overlay" style="background-image: url(<?php echo base_url(); ?>asset/sw/img/bg-img/bg-1.jpg);">
            <div class="container">
                <div class="row">

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <a href="#"><img src="<?php echo base_url(); ?>asset/sw/img/core-img/logo2.png" alt=""></a>
                            </div>
                            <p>Morbi vel arcu gravida, iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis. Ut in iaculis enim, et pulvinar mauris. Etiam tristique magna eget velit consectetur, a tincidunt velit dictum.</p>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Recent Posts</h6>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="single--blog-post">
                                <a href="#">
                                    <p>Aliquam ac eleifend metus</p>
                                </a>
                                <span>March 10, 2018</span>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="single--blog-post">
                                <a href="#">
                                    <p>Donec in libero sit amet mi vulputate</p>
                                </a>
                                <span>March 10, 2018</span>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="single--blog-post">
                                <a href="#">
                                    <p>Aliquam ac eleifend metus</p>
                                </a>
                                <span>March 10, 2018</span>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Quick Links</h6>
                            </div>
                            <nav>
                                <ul class="useful-links d-flex justify-content-between flex-wrap">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Faq</a></li>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Newsletter &amp; Exchange</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Exchange</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12">
                        <p>
Copyright &copy;<?php echo date('Y'); ?> All rights reserved | CRYPTOTREND.ID

</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?php echo base_url(); ?>asset/sw/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url(); ?>asset/sw/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url(); ?>asset/sw/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?php echo base_url(); ?>asset/sw/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo base_url(); ?>asset/sw/js/active.js"></script>
</body>

</html>
