<?php
  foreach ($dataSayuran as $sayuran) {
    ?>
    <tr>
      <td><?php echo $sayuran->NIK; ?></td>
      <td><?php echo $sayuran->foto; ?></td>
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