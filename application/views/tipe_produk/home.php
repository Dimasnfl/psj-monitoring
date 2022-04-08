<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-3" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-tipe_produk"><i class="glyphicon glyphicon-plus-sign"></i>  Tambah Data E-Commodity Baru</button>
    </div>
    <div class="col-md-2">
        <a href="<?php echo base_url('Tipe_produk/export'); ?>" class="form-control btn btn-success"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Export Data Excel</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Foto Produk</th>
          <th>Jenis Produk</th>
          <th>Harga</th>
          <th>Tanggal Harga Ditetapkan</th>

          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-tipe_produk">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_tipe_produk; ?>
<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataTipe_produk', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Harga Produk';
  $data['url'] = 'Tipe_produk/import';
  echo show_my_modal('modals/modal_import', 'import-tipe_produk', $data);
?>