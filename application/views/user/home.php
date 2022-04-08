<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-2">
        <a href="<?php echo base_url('User/export'); ?>" class="form-control btn btn-success"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Export Data Excel</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NIK</th>
          <th>Nama Petani</th>
          <th>Foto</th>
          <th>No Telp</th>
          <th>Asal Dusun</th>
          <th>Total Luas Lahan</th>

          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-user">

      </tbody>
    </table>
  </div>
</div>

<!-- <?php echo $modal_tambah_user; ?> -->

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataUser', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'User';
  $data['url'] = 'User/import';
  echo show_my_modal('modals/modal_import', 'import-user', $data);
?>