<?php
  $no = 1;
  foreach ($dataUser as $user) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $user->nik; ?></td>
      <td><?php echo $user->nama; ?></td>
      <td><img src="<?php echo base_url(); ?>assets/img/<?php echo $user->foto; ?>" width="60px" height="60px"></td>   
      <td><?php echo $user->telp; ?></td>
      <td><?php echo $user->desa_nama; ?></td>
      <td><h><?php echo $user->total_luas_lahan; ?> m2</h></td>     

      <td class="text-center" style="min-width:150px;">
      <button class="btn btn-info detail-dataUser" data-id="<?php echo $user->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> </button>
      <button class="btn btn-warning update-dataUser" data-id="<?php echo $user->id; ?>"><i class="glyphicon glyphicon-edit"></i></button>
        <button class="btn btn-danger konfirmasiHapus-user" data-id="<?php echo $user->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus">
        <i class="glyphicon glyphicon-trash"></i>
      </button>
      </td>
    </tr>
    <?php
        $no++;
  }
?>