<?php
  $no = 1;
  foreach ($dataProduk as $produk) {
    ?>
    <tr>
    <td><?php echo $no; ?></td>
      <td><?php echo $produk->user_nik; ?></td>
      <td><?php echo $produk->user_nama; ?></td>
      <td><?php echo $produk->tipe_produk_nama; ?></td>
      <td><?php echo $produk->tgl_tanam; ?></td>
      <td><?php echo $produk->tgl_panen; ?></td>
      <td><h><?php echo $produk->berat_panen; ?>kg</h></td>
      <td><h>Rp.<?php echo $produk->tipe_produk_harga; ?>/kg</h></td>
      <td><h><?php echo $produk->luas_lahan; ?> m2</h></td>
      <td><?php echo $produk->alamat; ?></td>
      <td><?php echo $produk->status_produk_nama; 
     
      ?></td>

      <td class="text-center" style="min-width:110px;">
      <button class="btn btn-info detail-dataProduk" data-id="<?php echo $produk->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> </button>
      <button class="btn btn-warning update-dataProduk" data-id="<?php echo $produk->id; ?>"><i class="glyphicon glyphicon-edit"></i></button>
      <?php  if($produk->status_produk_id == 3)
      {
        ?>
         <button class="btn btn-success penjemputan" data-id="<?php echo $produk->id; ?>"><i class="glyphicon glyphicon-plane"></i></button>
        <?php
      }
      ?>
      </td>
    </tr>
    <?php
        $no++;
  }
?>