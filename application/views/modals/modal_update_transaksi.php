<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Transaksi</h3>

  <form id="form-update-transaksi" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataTransaksi->id; ?>">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Nomor Resi " name="no_resi" aria-describedby="sizing-addon2" value="<?php echo $dataTransaksi->no_resi; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Tanggal Pengambilan " name="tanggal_pengambilan" aria-describedby="sizing-addon2" value="<?php echo $dataTransaksi->tanggal_pengambilan; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Tanggal Diambil " name="tanggal_diambil" aria-describedby="sizing-addon2" value="<?php echo $dataTransaksi->tanggal_diambil; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Id kurir " name="id_kurir" aria-describedby="sizing-addon2" value="<?php echo $dataTransaksi->id_kurir; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Id user" name="id_user" aria-describedby="sizing-addon2" value="<?php echo $dataTransaksi->id_user; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Id produk " name="id_produk" aria-describedby="sizing-addon2" value="<?php echo $dataTransaksi->id_produk; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Tanggal sampai " name="tanggal_sampai" aria-describedby="sizing-addon2" value="<?php echo $dataTransaksi->tanggal_sampai; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Jumlah Biaya Angkut " name="biaya_angkut" aria-describedby="sizing-addon2" value="<?php echo $dataTransaksi->biaya_angkut; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Id status transaksi " name="id_status_transaksi" aria-describedby="sizing-addon2" value="<?php echo $dataTransaksi->id_status_transaksi; ?>">
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>