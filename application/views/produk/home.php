<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
  <div class="col-md-3">

          <tr>
            <td>
              <label><b>Select Status Produk</b></label>
              <select name="" class="form-control" id="id_status_produk">
              <option value="">Show All</option>
              <option value="1">Proses Tanam</option>
              <option value="2">Panen</option>
              <option value="3">Siap Diambil</option>
              <option value="4">Selesai Diambil</option>
              <option value="5">Sedang Diambil</option>
            </select>
            </td>
          </tr>

      </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive p-0">
    <table id="list-data" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>NIK</th>
          <th>Nama Petani</th>
          <th>Jenis Produk</th>
          <th>Tanggal Tanam</th>
          <th>Tanggal Panen</th>
          <th>Berat Panen</th>
          <th>Harga (/kg)</th>
          <th>Luas Lahan</th>         
          <th>Alamat</th>
          <th>Status</th>  
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-produk">
      </tbody>
    </table>
  </div>
</div>


<!-- <?php echo $modal_tambah_produk; ?> -->
<!-- <?php echo $modal_penjemputan; ?> -->

<div id="tempat-modal"></div>
<div id="tempat-modal2"></div>

<?php show_my_confirm('konfirmasiProduk', 'konfirmasi-dataProduk', 'Konfirmasi Data Ini?', 'Ya, Konfirmasi Data Ini'); ?>
<?php
  $data['judul'] = 'Produk';
  $data['url'] = 'Produk/import';
  echo show_my_modal('modals/modal_import', 'import-produk', $data);
?>


<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script>
    $(document).ready(function() {
      //jika data sudah siap maka akan dijalangkan
      status();
      $("#id_status_produk").change(function(){
        // ini dijalankan ketika ada event dari combo box
        status();
      });
    });

    function status() {
      var status_produk = $("#id_status_produk").val();
      $.ajax({
        url : "<?= base_url('Produk/load_status') ?>",
        data: "id_status_produk=" + status_produk,
        success:function(data) {
          $("#data-produk").html(data);
        }
      });
    }
  </script>
