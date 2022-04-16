<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-leaf"></i> Data Produk <b>
    <?php echo $produk->id_produk; ?></b></h3>


            <div class = "box box-body" >
                <h4 class="text-center">Nama Petani     :  <?php echo $produk->user; ?></h4>
                <h4 class="text-center">Nama Produk     :  <?php echo $produk->tipe_produk; ?></h4>
                <h4 class="text-center">Tanggal Tanam   :  <?php echo $produk->tgl_tanam; ?></h4>
                <h4 class="text-center">Tanggal Panen   :  <?php echo $produk->tgl_panen; ?></h4>
                <h4 class="text-center">Berat Panen     :  <?php echo $produk->berat_panen; ?>kg</h4>
                <h4 class="text-center">Luas Lahan      :  <?php echo $produk->luas_lahan; ?>m2</h4>
                <h4 class="text-center">Alamat          :  <?php echo $produk->alamat; ?></h4>
                <h4 class="text-center">Status Produk   :  <?php echo $produk->status_produk; ?></h4>
            </div>


  <!-- <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div> -->
</div>