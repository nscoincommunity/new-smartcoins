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

    <script src="<?php echo base_url();?>asset/osc/js/all-fontawe.js"></script>
    
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
                        <div class="left-side d-none d-sm-flex">

                        <ul class="social">
                                <li>
                                    <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#0"><i class="fab fa-twitter"></i></a>
                                    <a href="#0"><i class="fab fa-instagram"></i></a>
                                    <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                            
                            <a href="#" class="mail">  <?php $query = $this->db->get('identitas');
                            foreach ($query->result() as $row) {
                              echo "<p>".$row->email."</p>"; } ?> </a>
                        </div>
                        
                        <div class="right-side">
                            <div class="form-group">
                                <!-- <i class="fas fa-globe"></i>
                                <select class="select-bar">
                                    <option value="lang">Languages</option>
                                    <option value="Bangla">Bangla</option>
                                    <option value="English">English</option>
                                </select>  -->
                            </div>
                             

                             
                                
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="header-area">
                        <div class="logo">
                            <a href="<?php echo base_url().'?ref='.$this->input->cookie('sponsor',true); ?>"><img src="<?php $query = $this->db->get('identitas');
                            foreach ($query->result() as $row) {
                              echo base_url()."asset/images/".$row->favicon; } ?>" alt="logo"></a>
                        </div>
                        
                        <ul class="menu">
                            <li>
                                <a href="<?php echo base_url().'?ref='.$this->input->cookie('sponsor',true); ?>" class="active">Home</a>
                            </li>
                            
                            
                            
                            <li>
                                <a href="<?php echo base_url('auth/login'); ?>" > Login</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('auth/register'); ?>" class="header-button bg-3">join with us</a>
                            </li>
                        </ul>
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- ========Header-Section Ends Here ========-->