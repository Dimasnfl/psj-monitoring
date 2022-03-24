<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-location-arrow"></i> List Petani Yang Berasal Dari Desa: <b><?php echo $desa->nama; ?></b></h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Luas Lahan</th>
          </tr>
        </thead>
        <tbody id="data-petani">
          <?php
            foreach ($dataDesa as $petani) {
              ?>
              <tr>
              <td><?php echo $petani->NIK; ?></td>
              <td><?php echo $petani->petani; ?></td>
              <td><?php echo $petani->telp; ?></td>
              <td><?php echo $petani->luas_lahan; ?></td>

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