<?php
  foreach ($dataSayuran as $sayuran) {
    ?>
    <tr>
      <td><?php echo $sayuran->NIK; ?></td>
      <td><?php echo $sayuran->foto_sayuran; ?></td>
      <td><?php echo $sayuran->jenis_sayuran; ?></td>
      <td><?php echo $sayuran->tanam; ?></td>
      <td><?php echo $sayuran->panen; ?></td>
      <td><h>Rp.<?php echo $sayuran->hrg; ?>/kg</h></td>
      <td><?php echo $sayuran->berat; ?></td>
      <td><?php echo $sayuran->alamat; ?></td>
      <td class="text-center" style="min-width:50px;">
        <!-- <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $sayuran->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button> -->
        <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<?php echo $sayuran->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>
      </td>
    </tr>
    <?php
  }
?>