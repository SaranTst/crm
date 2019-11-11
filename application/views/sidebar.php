  <main class="cd-main-content">
    <nav class="cd-side-nav js-cd-side-nav">
      <ul class="cd-side__list js-cd-side__list">
        <!-- <li class="cd-side__label"><span>Main</span></li> -->
        <li class="cd-side__item cd-side__item--has-children js-cd-item--has-children <?php echo $this->current_page == 'customer' ? 'cd-side__item--selected' : ''; ?>" onclick="location.href='<?php echo base_url(); ?>customer'">
          <a href="<?php echo base_url(); ?>customer"><img src="<?php echo $this->current_page == 'customer' ?  base_url().'/images/Icon-Customer.png' : base_url().'/images/Icon-Customer-White.png'; ?>" alt="customer" width="45">Customer</a>
        </li>
        <li class="cd-side__item cd-side__item--has-children js-cd-item--has-children <?php echo $this->current_page == 'dashboard' ? 'cd-side__item--selected' : ''; ?>" onclick="location.href='<?php echo base_url(); ?>dashboard'">
          <a href="<?php echo base_url(); ?>dashboard"><img src="<?php echo $this->current_page == 'dashboard' ?  base_url().'/images/Icon-Dashboard.png' : base_url().'/images/Icon-Dashboard-White.png'; ?>" alt="dashboard" width="45">Dashboard</a>
        </li>

        <?php if ($this->session->userdata("sale")['ROLE'] == 1) { ?>
        <li class="cd-side__item cd-side__item--has-children js-cd-item--has-children <?php echo $this->current_page == 'sales' ? 'cd-side__item--selected' : ''; ?>" onclick="location.href='<?php echo base_url(); ?>sales'">
          <a href="<?php echo base_url(); ?>sales"><img src="<?php echo $this->current_page == 'sales' ?  base_url().'/images/Icon-Sales.png' : base_url().'/images/Icon-Sales-White.png'; ?>" alt="sales" width="45">Sales</a>
        </li>
        <li class="cd-side__item cd-side__item--has-children js-cd-item--has-children <?php echo $this->current_page == 'admins' ? 'cd-side__item--selected' : ''; ?>" onclick="location.href='<?php echo base_url(); ?>admins'">
          <a href="<?php echo base_url(); ?>admins"><img src="<?php echo $this->current_page == 'admins' ?  base_url().'/images/Icon-Sales.png' : base_url().'/images/Icon-Sales-White.png'; ?>" alt="admins" width="45">Admins</a>
        </li>
        <li class="cd-side__item cd-side__item--has-children js-cd-item--has-children <?php echo $this->current_page == 'services' ? 'cd-side__item--selected' : ''; ?>" onclick="location.href='<?php echo base_url(); ?>services'">
          <a href="<?php echo base_url(); ?>services"><img src="<?php echo $this->current_page == 'services' ?  base_url().'/images/Icon-Sales.png' : base_url().'/images/Icon-Sales-White.png'; ?>" alt="services" width="45">Services</a>
        </li>

        <li class="cd-side__item cd-side__item--has-children js-cd-item--has-children <?php echo $this->current_page == 'management' ? 'cd-side__item--selected' : ''; ?>" onclick="location.href='<?php echo base_url(); ?>management'" disable>
          <a href="<?php echo base_url(); ?>management"><img src="<?php echo $this->current_page == 'management' ?  base_url().'/images/Icon-Management.png' : base_url().'/images/Icon-Management-White.png'; ?>" alt="management" width="45">Management</a>
        </li>
        <?php } ?>

      </ul>
    </nav>