<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    
    <title>OurSmartCoins - Member Area</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/member/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/member/rangeslider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/member/sweetalert.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    .badge {
      font-size: 90%;
      padding: 3px;
    }
    .table.dataTable thead .sorting {
      background-image: url(#) !important;
    }
  </style>

  <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->


  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url(); ?>members">OSC</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <!-- <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li> -->
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>members/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo base_url(); ?>asset/member/person.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $this->session->userdata('nama_lengkap');?></p>
          <p class="app-sidebar__user-designation"><?php echo $this->session->userdata('username');?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?php echo base_url();?>members"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label"> DASHBOARD</span></a></li>


        <li><a class="app-menu__item <?php if($this->uri->segment(1) == 'investasi' && $this->uri->segment(2) != 'withdraw' && $this->uri->segment(2) != 'myprofit' ) {echo 'active';} ?>  " href="<?php echo base_url();?>investasi"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label"> DEPOSIT PACKAGE</span></a></li>

        <li><a class="app-menu__item <?php if($this->uri->segment(2) == 'myprofit') {echo 'active';} ?> " href="<?php echo base_url();?>investasi/myprofit/"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label"> DAILY PROFIT REPORT</span></a></li>

        <li><a class="app-menu__item <?php if($this->uri->segment(2) == 'mybonus') {echo 'active';} ?> " href="<?php echo base_url();?>investasi/mybonus/"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label"> BONUS REPORT</span></a></li>

        <li><a class="app-menu__item <?php if($this->uri->segment(2) == 'withdraw') {echo 'active';} ?> " href="<?php echo base_url();?>investasi/withdraw"><i class="app-menu__icon fa fa-dollar"></i><span class="app-menu__label"> WITHDRAWAL REPORT</span></a></li>
        
        <li><a class="app-menu__item <?php if($this->uri->segment(2) == 'profile') {echo 'active';} ?> " href="<?php echo base_url();?>members/profile"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label"> PROFILE</span></a></li>

        <li><a class="app-menu__item" href="<?php echo base_url();?>members/logout"><i class="app-menu__icon fa fa-sign-in"></i><span class="app-menu__label"> LOGOUT</span></a></li>

      </ul>
    </aside>
