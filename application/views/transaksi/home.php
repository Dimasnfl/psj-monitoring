<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
<div class="box-header">
    <div class="col-md-3">
        <a href="<?php echo base_url('Transaksi/export'); ?>" class="form-control btn btn-success"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Export Data Excel</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive p-0">
    <table id="list-data" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nomor Resi</th>
          <th>Tanggal Pengambilan</th>
          <th>Tanggal Diambil</th>
          <th>Nama Kurir</th>
          <th>Nama Petani</th>
          <th>ID Produk</th>
          <th>Tanggal Sampai</th>
          <th>Biaya Angkut</th>
          <th>Status</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-transaksi">






      </tbody>
    </table>
  </div>
</div>

<!-- <?php echo $modal_tambah_transaksi; ?> -->

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataTransaksi', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Transaksi';
  $data['url'] = 'Transaksi/import';
  echo show_my_modal('modals/modal_import', 'import-transaksi', $data);
?>