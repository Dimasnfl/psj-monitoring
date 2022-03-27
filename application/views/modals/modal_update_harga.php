<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Harga Sayuran</h3>

  <form id="form-update-harga" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataHarga->id; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-grain"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Sayuran" name="jenis_sayuran" aria-describedby="sizing-addon2" value="<?php echo $dataHarga->jenis_sayuran; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-shopping-cart"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Harga per Ton" name="harga" aria-describedby="sizing-addon2" value="<?php echo $dataHarga->harga; ?>">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>