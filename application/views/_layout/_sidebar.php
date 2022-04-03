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
	  <li <?php if ($page == 'User') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('User'); ?>">
          <i class="fa fa-user"></i>
          <span>Data Petani</span>
        </a>
      </li>
	  
	  <li <?php if ($page == 'Produk') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Produk'); ?>">
          <i class="fa fa-leaf"></i>
          <span>Data Commodity</span>
        </a>
      </li>
	  
	  <li <?php if ($page == 'Tipe_produk') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Tipe_produk'); ?>">
          <i class="fa fa-tags"></i>
          <span>Data Harga Produk</span>
        </a>
      </li>
	  
	  <li <?php if ($page == 'Desa') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('desa'); ?>">
          <i class="fa fa-location-arrow"></i>
          <span>Data Dusun</span>
        </a>
      </li>
     
      <li <?php if ($page == 'Kurir') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kurir'); ?>">
          <i class="fa fa-car"></i>
          <span>Data Kurir</span>
        </a>
      </li>
     
      <li <?php if ($page == 'Transaksi') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Transaksi'); ?>">
          <i class="fa fa-shopping-cart"></i>
          <span>Data Transaksi</span>
        </a>
      </li> 
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>