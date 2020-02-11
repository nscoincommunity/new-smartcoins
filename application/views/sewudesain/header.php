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
    
    <link rel="icon" href="<?php echo base_url()."asset/images/fav.png"; ?>">

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

        <!-- Top Header Area 
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="top-header-content h-100 d-flex align-items-center justify-content-between">
                            
                            <div class="top-headline">
                                <p><a href="<?php echo base_url(); ?>administrator" ><span>KOINPINTARKITA.ID </span></a></p>
                            </div>
                           
                            <div class="login-faq-earn-money" style="margin-right:20px;">
                                <a href="<?php echo base_url(); ?>auth/login">Login</a>
                                <a href="<?php echo base_url(); ?>auth/reg">Register</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Navbar Area -->
        <div class="cryptos-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="cryptosNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="<?php echo base_url().'?ref='.$this->input->cookie('sponsor',true); ?>"><img src="<?php $query = $this->db->get('identitas');
                            foreach ($query->result() as $row) {
                              echo base_url()."asset/images/".$row->favicon; } ?>" alt="Logo OurSmarCoins" ></a>

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

                            <div class="classynav">
                                <ul>
                                  <?php
                                      $botm = $this->model_menu->bottom_menu();
                                      foreach ($botm->result_array() as $row){
                                          $dropdown = $this->model_menu->dropdown_menu($row['id_menu'])->num_rows();
                                          if ($dropdown == 0){
                                            echo "<li><a href='".base_url()."$row[link]'>$row[nama_menu]</a></li>";
                                          }else{
                                            echo "<li class='dropdown'>
                                                  <a href='".base_url()."$row[link]' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>$row[nama_menu]
                                                  <span class='caret'></span></a>
                                                  <ul class='dropdown-menu'>";
                                                    $dropmenu = $this->model_menu->dropdown_menu($row['id_menu']);
                                                    foreach ($dropmenu->result_array() as $row){
                                                        echo "<li><a href='".base_url()."$row[link]'>$row[nama_menu]</a></li>";
                                                    }
                                                  echo "</ul>
                                                </li>";
                                          }
                                      }
                                  ?>
                                </ul>

                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
