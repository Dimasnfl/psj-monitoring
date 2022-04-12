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
      <td><?php echo $produk->status_produk_nama; ?></td>

      <td class="text-center" style="min-width:50px;">
      <button class="btn btn-warning update-dataProduk" data-id="<?php echo $produk->id; ?>"><i class="glyphicon glyphicon-edit"></i></button>
        <!-- <button class="btn btn-danger konfirmasiHapus-produk" data-id="<?php echo $produk->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus">
        <i class="glyphicon glyphicon-trash"></i>
      </button> -->
      </td>
    </tr>
    <?php
        $no++;
  }
?>