<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <!-- <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-harga"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div> -->
    <div class="col-md-6">
        <a href="<?php echo base_url('Harga/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-6">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-harga"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Jenis Sayuran</th>
          <th>Harga</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-harga">

      </tbody>
    </table>
  </div>
</div>

<!-- <?php echo $modal_tambah_harga; ?> -->

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataHarga', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Harga';
  $data['url'] = 'Harga/import';
  echo show_my_modal('modals/modal_import', 'import-harga', $data);
?>