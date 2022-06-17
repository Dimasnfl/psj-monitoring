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
      <td><?php echo $row->berat_panen; ?> kg</td>
      <td><?php echo rupiah ($row->tipe_produk_harga); ?></td>
      <td><?php echo $row->luas_lahan; ?> m<sup>2</sup></td>
      <td><?php echo $row->alamat; ?></td>

      <?php if($this->session->userdata('level') == 1) { ?>
      <td><?php echo $row->status_produk_nama; ?></td>
      <td class="text-center" style="min-width:110px;">
      <?php  if($row->status_produk_id != 7 AND $row->id_status_transaksi != 4)
      {
        ?>



      <button class="btn btn-info detail-dataProduk" data-id="<?php echo $row->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> </button>
      <!-- <button class="btn btn-warning update-dataProduk" data-id="<?php echo $row->id; ?>"><i class="glyphicon glyphicon-edit"></i></button> -->
      <?php  if($row->status_produk_id == 3)
      {
        ?>
         <button class="btn btn-success penjemputan" data-id="<?php echo $row->id; ?>"><i class="glyphicon glyphicon-plane"></i></button>
        <?php
      }
      ?>
      <?php
        if($row->status_produk_id == 4 AND $row->id_status_transaksi == 2 AND $row->sudah_dikonfirmasi_petani == 1) 
      {
        ?>
         <button class="btn btn-secondary konfirmasi-produk" data-id="<?php echo $row->id; ?>" data-toggle="modal" data-target="#konfirmasiProduk"><i class="glyphicon glyphicon-ok"></i> </button>
        <?php
      }
      ?>


<?php 
      }
        ?>
      </td>
      <?php } ?>
    </tr>
    <?php
  }
?>

