<?php
  $no = 1;
  foreach ($dataKurir as $kurir) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kurir->nama; ?></td>
      <td><?php echo $kurir->layanan; ?></td>
      <td><?php echo $kurir->jenis_kendaraan; ?></td>
      <td><?php echo $kurir->plat_no; ?></td>
      <td><?php echo $kurir->no_telp; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataKurir" data-id="<?php echo $kurir->id; ?>"><i class="glyphicon glyphicon-edit"></i> </button>
          <button class="btn btn-danger konfirmasiHapus-Kurir" data-id="<?php echo $kurir->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i> </button>
          <!-- <button class="btn btn-info detail-dataDesa" data-id="<?php echo $desa->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button> -->
      </td>
    </tr>
    <?php
    $no++;
  }
?>