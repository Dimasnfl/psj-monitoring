<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
      <div class="col-md-2">
						<label>Pilih Status Produk</label>
            <select name="" class="form-control" id="id_status_produk">
            <option value="0"> -- Pilih Status -- </option>
            <option value="1">Proses Tanam</option>
						<option value="2">Panen</option>
            <option value="3">Siap Diambil</option>
            <option value="4">Selesai Diambil</option>
            <option value="5">Sedang Diambil</option>
          </select>		
      </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
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

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataProduk', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Produk';
  $data['url'] = 'Produk/import';
  echo show_my_modal('modals/modal_import', 'import-produk', $data);
?>

