<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRM</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">

  <!-- CSS [1]--> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-4.3.1/css/bootstrap-datepicker.css">

  <!-- CSS topbar & sidebar [2]-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

  <!-- Css Custome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">

  <!-- JS [3]-->
  <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap-4.3.1/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap-4.3.1/locales/bootstrap-datepicker.th.min.js"></script>

  <!-- Pagination -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/simplePagination/simplePagination.css">
  <script src="<?php echo base_url(); ?>assets/simplePagination/jquery.simplePagination.js"></script>

  <!-- Sweetalert2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert2/sweetalert2.min.css">

</head>
<body>
  
 <script type="text/javascript">
  var base_url = '<?php echo base_url();?>';
  var ID_LOGIN = <?php echo $this->session->userdata("sale")['ID_EMPLOYEE']; ?>;
 </script>

 <header class="cd-main-header js-cd-main-header">
    <div class="cd-logo-wrapper">
      <a href="<?php echo base_url(); ?>dashboard" class="cd-logo"><img src="<?php echo base_url(); ?>images/Icon-Bjhmedical-W2.png" alt="Logo"></a>
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
      <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children" id="profile_header">
        <a href="javascript:void(0)">
          <!-- <img src="<?php echo base_url(); ?>images/Icon-Sales.png" alt="avatar"> -->
          <?php
          if ($this->session->userdata("sale")) {
            echo $this->session->userdata("sale")['FIRST_NAME_ENG'].' '.strtoupper($this->session->userdata("sale")['LAST_NAME_ENG'][0]).'.';
          }
          ?>
          <i class="fa fa-caret-down fa-lg fa-fw"></i>
        </a>
    
        <ul class="cd-nav__sub-list" style="width: 120px;">
<!--           <li class="cd-nav__sub-item"><a href="#0">My Account</a></li>
          <li class="cd-nav__sub-item"><a href="#0">Edit Account</a></li> -->
          <li class="cd-nav__sub-item"><a href="<?php echo base_url().'sales/logout'; ?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </header> <!-- .cd-main-header -->

  <?php $this->load->view('sidebar'); ?>