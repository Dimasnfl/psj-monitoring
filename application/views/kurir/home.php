<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-kurir"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-6">
        <a href="<?php echo base_url('Kurir/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Export Data Excel</a>
    </div>
 </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Kurir</th>
          <th>Layanan</th>
          <th>Jenis Kendaraan</th>
          <th>Plat Nomor</th>
          <th>No. Telp</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-kurir">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_kurir; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKurir', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Kurir';
  $data['url'] = 'Kurir/import';
  echo show_my_modal('modals/modal_import', 'import-kurir', $data);
?>