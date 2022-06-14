<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-2" style="padding: 0;">
    <?php if($this->session->userdata('level') == 1) { ?>
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-kurir"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
      <?php } ?>
    </div>
    <!-- <div class="col-md-6">
        <a href="<?php echo base_url('Kurir/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Export Data Excel</a>
    </div> -->
 </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive p-0">
    <table id="list-data" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>NIK</th>
          <th>Nama Kurir</th>
          <th>Mitra</th>
          <th>Jenis Kendaraan</th>
          <th>Plat Nomor</th>
          <th>No. Telp</th>
          <?php if($this->session->userdata('level') == 1) { ?>
          <th style="text-align: center;">Action</th>
      <?php } ?>
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