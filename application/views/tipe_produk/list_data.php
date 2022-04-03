<?php
  $no = 1;
  foreach ($dataTipe_produk as $tipe_produk) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><img src="https://www.afandiyusuf.com/siduda-monitoring/assets/thumbnail/<?php echo $tipe_produk->foto; ?>" width="150px" height="100px"></td>      
      <td><?php echo $tipe_produk->nama; ?></td>
      <td><h>Rp.<?php echo $tipe_produk->harga; ?>/kg</h></td>
      <td><?php echo $tipe_produk->tanggal; ?></td>

      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataTipe_produk" data-id="<?php echo $tipe_produk->id; ?>"><i class="glyphicon glyphicon-edit"></i></button>
          <button class="btn btn-danger konfirmasiHapus-tipe_produk" data-id="<?php echo $tipe_produk->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>
          <!-- <button class="btn btn-info detail-dataTipe_produk" data-id="<?php echo $tipe_produk->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button> -->
      </td>
    </tr>
    <?php
    $no++;
  }
?>