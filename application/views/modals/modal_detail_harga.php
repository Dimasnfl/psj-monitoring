<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-cart-plus"></i> List Petani Yang Menjual Sayuran: <b><?php echo $harga->jenis_sayuran; ?></b></h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NIK Petani</th>
            <th>Foto Sayuran</th>
            <th>Tanggal Tanam</th>
            <th>Tanggal Panen</th>
            <th>Berat Panen</th>
          </tr>
        </thead>
        <tbody id="data-sayuran">
          <?php
            foreach ($dataHarga as $sayuran) {
              ?>
              <tr>
                <td><?php echo $sayuran->NIK; ?></td>
                <td><?php echo $sayuran->foto_sayuran; ?></td>
                <td><?php echo $sayuran->tgl_tanam; ?></td>
                <td><?php echo $sayuran->tgl_panen; ?></td>
                <td><?php echo $sayuran->berat_panen; ?></td>
              </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>