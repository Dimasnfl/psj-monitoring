<?php
  foreach ($dataPetani as $petani) {
    ?>
    <tr>
      <td><?php echo $petani->NIK; ?></td>
      <td><?php echo $petani->petani; ?></td>
      <td><?php echo $petani->telp; ?></td>
      <td><?php echo $petani->desa; ?></td>
      <td><?php echo $petani->jenis_sayuran; ?></td>
      <td><?php echo $petani->luas_lahan; ?></td>
      <td><?php echo $petani->foto; ?></td>
      <td class="text-center" style="min-width:50px;">
        <!-- <button class="btn btn-warning update-dataPetani" data-NIK="<?php echo $petani->NIK; ?>"><i class="glyphicon glyphicon-repeat"></i> </button> -->
        <button class="btn btn-danger konfirmasiHapus-petani" data-NIK="<?php echo $petani->NIK; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> </button>
      </td>
    </tr>
    <?php
  }
?>