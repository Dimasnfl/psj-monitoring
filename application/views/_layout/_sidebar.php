<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>
    <br>
      <li class="header">PETANI SEJAHTERA</li>
	  <li <?php if ($page == 'petani') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('petani'); ?>">
          <i class="fa fa-user"></i>
          <span>Data Petani</span>
        </a>
      </li>
	  
	  <li <?php if ($page == 'sayuran') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('sayuran'); ?>">
          <i class="fa fa-reorder"></i>
          <span>Data Sayuran</span>
        </a>
      </li>
	  
	  <li <?php if ($page == 'harga') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('harga'); ?>">
          <i class="fa fa-cart-plus"></i>
          <span>Data Harga Sayuran</span>
        </a>
      </li>
	  
	  <li <?php if ($page == 'desa') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('desa'); ?>">
          <i class="fa fa-location-arrow"></i>
          <span>Data Desa</span>
        </a>
      </li>
     
      <li <?php if ($page == '') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url(''); ?>">
          <i class="fa fa-location-arrow"></i>
          <span>Data Kurir</span>
        </a>
      </li>
     
      <li <?php if ($page == '') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url(''); ?>">
          <i class="fa fa-cart-plus"></i>
          <span>Data Transaksi</span>
        </a>
      </li> 
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>