<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <!-- <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-produk"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div> -->
    <div class="col-md-18">
        <a href="<?php echo base_url('Produk/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Export Data Excel</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama Petani</th>
          <th>Jenis Produk</th>
          <th>Tanggal Tanam</th>
          <th>Tanggal Panen</th>
          <th>Berat Panen</th>
          <th>Harga</th>
          <th>Luas Lahan</th>         
          <th>Alamat</th>
          <th>Status</th>  
          <!-- <th>Created_at</th> -->
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-produk">

      </tbody>
    </table>
  </div>
</div>

<!-- <?php echo $modal_tambah_produk; ?> -->

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataProduk', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Produk';
  $data['url'] = 'Produk/import';
  echo show_my_modal('modals/modal_import', 'import-produk', $data);
?>