<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/odometer.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/owl.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/odometer.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/osc/css/main.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>asset/osc/images/favicon.png" type="image/x-icon">
    
    <script src="https://kit.fontawesome.com/86170cb0c0.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="main-section">
        <!-- ========Header-Section Starts Here ========-->
        
        <div class="preloader">
            <div class="preloader-inner">
                <div class="preloader-icon">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <a href="#0" class="scrollToTop">
            <i class="fas fa-angle-up"></i>
        </a>
        <div class="overlay"></div>
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-top-area">
                        
                        
                        <div class="right-side">
                            <div class="form-group">
                                <!-- <i class="fas fa-globe"></i>
                                <select class="select-bar">
                                    <option value="lang">Languages</option>
                                    <option value="Bangla">Bangla</option>
                                    <option value="English">English</option>
                                </select>  -->
                            </div>
                             <div class="account">
                                
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="header-area">
                        <div class="logo">
                            <a href="#0"><img src="<?php $query = $this->db->get('identitas');
                            foreach ($query->result() as $row) {
                              echo base_url()."asset/images/".$row->favicon; } ?>" alt="logo"></a>
                        </div>
                        
                        
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="account--section sign-up-section">
            <div class="container-fluid">
                <div class="account--area">
                    <div class="account--thumb">
                        <img src="<?php echo base_url();?>asset/osc/images/account/sign-up.png" alt="account">
                    </div>
                    <span class="cross-button">
                        <i class="flaticon-plus"></i>
                    </span>
                    <div class="account--content">
                       
                        
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ========Header-Section Ends Here ========-->


<!-- ========Contact-Section Starts Here ========-->
        <section class="contact-section padding-bottom padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="contact-thumb">
                            <img src="<?php echo base_url();?>asset/osc/images/contact/contact01.png" alt="faq">
                            <div class="mes1 wow slideInLeft">
                                <img src="<?php echo base_url();?>asset/osc/images/contact/mes1.png" alt="faq">
                            </div>
                            <div class="mes2 wow slideInDown">
                                <img src="<?php echo base_url();?>asset/osc/images/contact/mes2.png" alt="faq">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-header">
                            
                            <h4 class="title"> Successfully Registration</h4>
                            <span>Your account has been successfully created. <br>
                            Please check your email to get the membership activation link.
Before you click the membership activation link, you cannot log in to the member area. <br><br>If you don't find the email in your inbox, also check the spam folder!</span>
                        </div>

                        <a href="<?php echo base_url('auth/login'); ?>" class="custom-button bg-1">login now</a>
                       

                                    
                    </div>
                </div>
            </div>
        </section>
        <!-- ========Contact-Section Ends Here ========-->