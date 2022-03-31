<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Kurir</h3>

  <form id="form-update-kurir" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataKurir->id; ?>">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Nama Kurir " name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataKurir->nama; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Nama Layanan " name="layanan" aria-describedby="sizing-addon2" value="<?php echo $dataKurir->layanan; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Nama Jenis Kendaraan " name="jenis_kendaraan" aria-describedby="sizing-addon2" value="<?php echo $dataKurir->jenis_kendaraan; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Nomor Plat Kendaraan  " name="plat_no" aria-describedby="sizing-addon2" value="<?php echo $dataKurir->plat_no; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon " name="no_telp" aria-describedby="sizing-addon2" value="<?php echo $dataKurir->no_telp; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-"></i>
      </span>
      <input type="date" class="form-control" placeholder="Masukkan Tanggal Data di Update " name="updated_at" aria-describedby="sizing-addon2" value="<?php echo $dataKurir->updated_at; ?>">
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>