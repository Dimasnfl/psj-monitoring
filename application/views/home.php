<div class="row">

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_petani; ?></h3>
        <p>Jumlah Petani</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-contact"></i>
      </div>
      <a href="<?php echo base_url('petani') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $jml_sayuran; ?></h3>
        <p>Data Sayuran Terdaftar</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-folder"></i>
      </div>
      <a href="<?php echo base_url('sayuran') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $jml_harga; ?></h3>
        <p>Data Harga Sayuran</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-cart"></i>
      </div>
      <a href="<?php echo base_url('harga') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
 </div>

 <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-blue">
      <div class="inner">
        <h3><?php echo $jml_desa; ?></h3>
        <p>Data Desa</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-navigate"></i>
      </div>
      <a href="<?php echo base_url('desa') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
 </div>
  
  <!-- diagram desa -->
  <div class="col-lg-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Statistik <small>Data Desa</small></h3>

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

  <!-- diagram sayuran -->
  <div class="col-lg-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Statistik <small>Data Sayuran</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-harga" style="height:250px"></canvas>
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


  //data harga
  var pieChartCanvas = $("#data-harga").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_harga; ?>;

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

