<div class="row">
  <!-- tampilan admin -->
<?php if($this->session->userdata('level') == 1) { ?>
  <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_user; ?></h3>
        <p>Data Petani</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-contact"></i>
      </div>
      <a href="<?php echo base_url('User') ?>" class="small-box-footer">List Data <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $jml_produk; ?></h3>
        <p>Data E-Commodity</p>
      </div>
      <div class="icon">
        <i class="ion ion-leaf"></i>
      </div>
      <a href="<?php echo base_url('Produk') ?>" class="small-box-footer">List Data <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $jml_tipe_produk; ?></h3>
        <p>Data Harga Produk</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-pricetags"></i>
      </div>
      <a href="<?php echo base_url('Tipe_produk') ?>" class="small-box-footer">List Data <i class="fa fa-arrow-circle-right"></i></a>
    </div>
 </div>

 <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-blue">
      <div class="inner">
        <h3><?php echo $jml_desa; ?></h3>
        <p>Data Dusun</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-navigate-outline"></i>
      </div>
      <a href="<?php echo base_url('Desa') ?>" class="small-box-footer">List Data <i class="fa fa-arrow-circle-right"></i></a>
    </div>
 </div>

 <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $jml_kurir; ?></h3>
        <p>Data Kurir</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-car"></i>
      </div>
      <a href="<?php echo base_url('Kurir') ?>" class="small-box-footer">List Data <i class="fa fa-arrow-circle-right"></i></a>
    </div>
 </div>

 <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-purple">
      <div class="inner">
        <h3><?php echo $jml_transaksi; ?></h3>
        <p>Data Transaksi</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-cart"></i>
      </div>
      <a href="<?php echo base_url('Transaksi') ?>" class="small-box-footer">List Data <i class="fa fa-arrow-circle-right"></i></a>
    </div>
 </div>
 <?php } ?>

<!-- tampilan guest -->
 <?php if($this->session->userdata('level') != 1) { ?>
  <div class="col-lg-6 col-xs-4">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_user; ?></h3>
        <p>Data Petani</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-contact"></i>
      </div>
      <a href="<?php echo base_url('User') ?>" class="small-box-footer">List Data <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-6 col-xs-4">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $jml_produk; ?></h3>
        <p>Data E-Commodity</p>
      </div>
      <div class="icon">
        <i class="ion ion-leaf"></i>
      </div>
      <a href="<?php echo base_url('Produk') ?>" class="small-box-footer">List Data <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-6 col-xs-4">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $jml_tipe_produk; ?></h3>
        <p>Data Harga Produk</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-pricetags"></i>
      </div>
      <a href="<?php echo base_url('Tipe_produk') ?>" class="small-box-footer">List Data <i class="fa fa-arrow-circle-right"></i></a>
    </div>
 </div>

 <div class="col-lg-6 col-xs-4">
    <div class="small-box bg-blue">
      <div class="inner">
        <h3><?php echo $jml_desa; ?></h3>
        <p>Data Dusun</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-navigate-outline"></i>
      </div>
      <a href="<?php echo base_url('Desa') ?>" class="small-box-footer">List Data <i class="fa fa-arrow-circle-right"></i></a>
    </div>
 </div>
 <?php } ?>


  
  <!-- diagram desa -->
  <div class="col-lg-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-location-arrow"></i>
        <h3 class="box-title">Statistik <small>Data Dusun</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-desa" style="height:250px"></canvas>
      </div>
    </div>
  </div>

  <!-- diagram produk -->
  <div class="col-lg-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-leaf"></i>
        <h3 class="box-title">Statistik <small>Data E-Commodity</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-tipe_produk" style="height:250px"></canvas>
      </div>
    </div>
  </div>

</div>


<script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
<script>
  
  //data desa
  var pieChartCanvas = $("#data-desa").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_desa; ?>;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);


  //data tipe produk
  var pieChartCanvas = $("#data-tipe_produk").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_tipe_produk; ?>;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);

</script>

