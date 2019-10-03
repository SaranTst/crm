<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRM</title>

  <!-- Font -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CSS [1]--> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-4.3.1/css/bootstrap.min.css">

  <!-- CSS topbar & sidebar [2]-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

  <!-- Css Custome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">

  <!-- JS [3]-->
  <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>

</head>
<body>


 <header class="cd-main-header js-cd-main-header">
    <div class="cd-logo-wrapper">
      <a href="#0" class="cd-logo"><img src="<?php echo base_url(); ?>images/Icon-Bjhmedical-W2.png" alt="Logo"></a>
    </div>
    
    <div class="cd-search js-cd-search" style="display: none;">
      <!-- <form>
        <input class="reset" type="search" placeholder="Search...">
      </form> -->
    </div>
  
    <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
  
    <ul class="cd-nav__list js-cd-nav__list">
      <!-- <li class="cd-nav__item"><a href="#0">Tour</a></li>
      <li class="cd-nav__item"><a href="#0">Support</a></li> -->
      <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
        <a href="#0">
          <!-- <img src="<?php echo base_url(); ?>images/Icon-Sales.png" alt="avatar"> -->
          Saran T. <i class="fa fa-angle-down fa-lg fa-fw"></i>
        </a>
    
        <ul class="cd-nav__sub-list" style="width: 120px;">
<!--           <li class="cd-nav__sub-item"><a href="#0">My Account</a></li>
          <li class="cd-nav__sub-item"><a href="#0">Edit Account</a></li> -->
          <li class="cd-nav__sub-item"><a href="#0">Logout</a></li>
        </ul>
      </li>
    </ul>
  </header> <!-- .cd-main-header -->

  <?php $this->load->view('sidebar'); ?>