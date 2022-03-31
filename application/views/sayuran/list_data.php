<?php
  foreach ($dataSayuran as $sayuran) {
    ?>
    <tr>
      <td><?php echo $sayuran->NIK; ?></td>
      <td><?php echo $sayuran->jenis; ?></td>
      <td><?php echo $sayuran->tanam; ?></td>
      <td><?php echo $sayuran->panen; ?></td>
      <td><h>Rp.<?php echo $sayuran->hrg; ?>/kg</h></td>
      <td><h><?php echo $sayuran->berat; ?>/kg</h></td>
      <td><?php echo $sayuran->luas_lahan; ?>/m2</h></td>
      <td><?php echo $sayuran->alamat; ?></td>
      <td><?php echo $sayuran->created_at; ?></td>
      <td class="text-center" style="min-width:50px;">
        <button class="btn btn-danger konfirmasiHapus-sayuran" data-id="<?php echo $sayuran->id_petani; ?>" data-toggle="modal" data-target="#konfirmasiHapus">
        <i class="glyphicon glyphicon-trash"></i>
      </button>
      </td>
    </tr>
    <?php
  }
?>