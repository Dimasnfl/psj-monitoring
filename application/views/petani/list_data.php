<?php
  foreach ($dataPetani as $petani) {
    ?>
    <tr>
      <td><?php echo $petani->nik; ?></td>
      <td><?php echo $petani->nama; ?></td>
      <td><?php echo $petani->telp; ?></td>
      <td><?php echo $petani->desa; ?></td>
      <td><?php echo $petani->foto; ?></td>
      <td class="text-center" style="min-width:50px;">
        <!-- <button class="btn btn-warning update-dataPetani" data-NIK="<?php echo $petani->nik; ?>"><i class="glyphicon glyphicon-repeat"></i> </button> -->
        <button class="btn btn-danger konfirmasiHapus-petani" data-NIK="<?php echo $petani->nik; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i> </button>
      </td>
    </tr>
    <?php
  }
?>