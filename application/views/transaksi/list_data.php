<?php
  $no = 1;
  foreach ($dataTransaksi as $transaksi) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $transaksi->no_resi; ?></td>
      <td><?php echo $transaksi->tanggal_pengambilan; ?></td>
      <td><?php echo $transaksi->tanggal_diambil; ?></td>
      <td><?php echo $transaksi->nama_kurir; ?></td>
      <td><?php echo $transaksi->nama_user; ?></td>
      <td><?php echo $transaksi->id_produk; ?></td>
      <td><?php echo $transaksi->tanggal_sampai; ?></td>
      <td><h>Rp.<?php echo $transaksi->biaya_angkut; ?>/kg</h></td>
      <td><?php echo $transaksi->nama_status; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataTransaksi" data-id="<?php echo $transaksi->id; ?>"><i class="glyphicon glyphicon-edit"></i> </button>
          <button class="btn btn-danger konfirmasiHapus-transaksi" data-id="<?php echo $transaksi->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i> </button>
          <!-- <button class="btn btn-info detail-dataDesa" data-id="<?php echo $desa->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button> -->
      </td>
    </tr>
    <?php
    $no++;
  }
?>