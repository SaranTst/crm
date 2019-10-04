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
        <li class="cd-side__item cd-side__item--has-children js-cd-item--has-children <?php echo $this->current_page == 'sales' ? 'cd-side__item--selected' : ''; ?>" onclick="location.href='<?php echo base_url(); ?>sales'">
          <a href="<?php echo base_url(); ?>sales"><img src="<?php echo $this->current_page == 'sales' ?  base_url().'/images/Icon-Sales.png' : base_url().'/images/Icon-Sales-White.png'; ?>" alt="sales" width="45">Sales</a>
        </li>
        <li class="cd-side__item cd-side__item--has-children js-cd-item--has-children <?php echo $this->current_page == 'add_sales' ? 'cd-side__item--selected' : ''; ?>" onclick="location.href='<?php echo base_url(); ?>add_sales'">
          <a href="<?php echo base_url(); ?>add_sales"><img src="<?php echo $this->current_page == 'add_sales' ?  base_url().'/images/Icon-Add-Sales.png' : base_url().'/images/Icon-Add-Sales-White.png'; ?>" alt="add_sales" width="45">Add Sales</a>
        </li>
        <li class="cd-side__item cd-side__item--has-children js-cd-item--has-children <?php echo $this->current_page == 'management' ? 'cd-side__item--selected' : ''; ?>" onclick="location.href='<?php echo base_url(); ?>management'">
          <a href="<?php echo base_url(); ?>management"><img src="<?php echo $this->current_page == 'management' ?  base_url().'/images/Icon-Management.png' : base_url().'/images/Icon-Management-White.png'; ?>" alt="management" width="45">Management</a>
        </li>
      </ul>
    
      <!-- <ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__label"><span>Secondary</span></li>
        <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
          <a href="#0">Bookmarks</a>
          
          <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="#0">All Bookmarks</a></li>
            <li class="cd-side__sub-item"><a href="#0">Edit Bookmark</a></li>
            <li class="cd-side__sub-item"><a href="#0">Import Bookmark</a></li>
          </ul>
        </li>

        <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
          <a href="#0">Images</a>
          
          <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="#0">All Images</a></li>
            <li class="cd-side__sub-item"><a href="#0">Edit Image</a></li>
          </ul>
        </li>
    
        <li class="cd-side__item cd-side__item--has-children cd-side__item--users js-cd-item--has-children">
          <a href="#0">Users</a>
          
          <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="#0">All Users</a></li>
            <li class="cd-side__sub-item"><a href="#0">Edit User</a></li>
            <li class="cd-side__sub-item"><a href="#0">Add User</a></li>
          </ul>
        </li>

        <li class="cd-side__item cd-side__item--has-children js-cd-item--has-children">
          <a href="#0">Notifications<span class="cd-count">3</span></a>
          
          <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a aria-current="page" href="#0">All Notifications</a></li>
            <li class="cd-side__sub-item"><a href="#0">Friends</a></li>
            <li class="cd-side__sub-item"><a href="#0">Other</a></li>
          </ul>
        </li>
      </ul> -->
    
      <!-- <ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__label"><span>Action</span></li>
        <li class="cd-side__btn"><button class="reset" href="#0">+ Button</button></li>
      </ul> -->
    </nav>