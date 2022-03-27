<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <!-- <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-sayuran"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div> -->
    <div class="col-md-18">
        <a href="<?php echo base_url('Sayuran/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Export Data Excel</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NIK Petani</th>
          <th>Foto Sayuran</th>
          <th>Jenis Sayuran</th>
          <th>Tanggal Tanam</th>
          <th>Tanggal Panen</th>
          <th>Harga</th>
          <th>Berat Panen</th>
          <th>Alamat</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-sayuran">

      </tbody>
    </table>
  </div>
</div>

<!-- <?php echo $modal_tambah_sayuran; ?> -->

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSayuran', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Sayuran';
  $data['url'] = 'Sayuran/import';
  echo show_my_modal('modals/modal_import', 'import-sayuran', $data);
?>