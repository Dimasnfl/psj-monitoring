<?php
  $no = 1;
  foreach ($dataDesa as $desa) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $desa->nama; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataDesa" data-id="<?php echo $desa->id; ?>"><i class="glyphicon glyphicon-repeat"></i> </button>
          <button class="btn btn-danger konfirmasiHapus-desa" data-id="<?php echo $desa->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i> </button>
          <button class="btn btn-info detail-dataDesa" data-id="<?php echo $desa->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>