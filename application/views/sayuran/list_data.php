<?php
  foreach ($dataSayuran as $sayuran) {
    ?>
    <tr>
      <td><?php echo $sayuran->NIK; ?></td>
      <td><img src="<?php echo base_url('afandiyusuf.com/siduda-monitoring/assets/app_photo'); ?><?php echo $sayuran->foto; ?>" class="img-circle" alt="User Image" width="40px" height="40px"></td> 
      <td><?php echo $sayuran->jenis; ?></td>
      <td><?php echo $sayuran->tanam; ?></td>
      <td><?php echo $sayuran->panen; ?></td>
      <td><h>Rp.<?php echo $sayuran->hrg; ?>/kg</h></td>
      <td><?php echo $sayuran->berat; ?></td>
      <td><?php echo $sayuran->alamat; ?></td>
      <td class="text-center" style="min-width:50px;">
        <button class="btn btn-danger konfirmasiHapus-sayuran" data-id="<?php echo $sayuran->id_petani; ?>" data-toggle="modal" data-target="#konfirmasiHapus">
        <i class="glyphicon glyphicon-trash"></i>
      </button>
      </td>
    </tr>
    <?php
  }
?>