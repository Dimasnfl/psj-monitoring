<?php
  $no = 1;
  foreach ($dataHarga as $harga) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $harga->nama; ?></td>
      <td><h>Rp.<?php echo $harga->harga; ?>/kg</h></td>
      <td><?php echo $harga->tanggal; ?></td>

      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataHarga" data-id="<?php echo $harga->id; ?>"><i class="glyphicon glyphicon-edit"></i></button>
          <button class="btn btn-danger konfirmasiHapus-harga" data-id="<?php echo $harga->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>
          <!-- <button class="btn btn-info detail-dataHarga" data-id="<?php echo $harga->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button> -->
      </td>
    </tr>
    <?php
    $no++;
  }
?>