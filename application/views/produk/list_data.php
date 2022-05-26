<?php

  function rupiah ($harga) {
		$hasil = 'Rp ' . number_format($harga, 2, ",", ".");
		return $hasil;
	}
  foreach ($dataProduk as $row) {
    ?>
    <tr>

      <td><?php echo $row->user_nik; ?></td>
      <td><?php echo $row->user_nama; ?></td>
      <td><?php echo $row->tipe_produk_nama; ?></td>
      <td><?php echo $row->tgl_tanam; ?></td>
      <td><?php echo $row->tgl_panen; ?></td>
      <td><h><?php echo $row->berat_panen; ?>kg</h></td>
      <td><?php echo rupiah ($row->tipe_produk_harga); ?></td>
      <td><h><?php echo $row->luas_lahan; ?> m2</h></td>
      <td><?php echo $row->alamat; ?></td>
      <td><?php echo $row->status_produk_nama; ?></td>

      <td class="text-center" style="min-width:110px;">
      <button class="btn btn-info detail-dataProduk" data-id="<?php echo $row->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> </button>
      <button class="btn btn-warning update-dataProduk" data-id="<?php echo $row->id; ?>"><i class="glyphicon glyphicon-edit"></i></button>
      <?php  if($row->status_produk_id == 3)
      {
        ?>
         <button class="btn btn-success penjemputan" data-id="<?php echo $row->id; ?>"><i class="glyphicon glyphicon-plane"></i></button>
        <?php
      }
      ?>
      </td>
    </tr>
    <?php
  }
?>