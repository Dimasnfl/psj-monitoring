<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilUser();
		tampilProduk();
		tampilDesa();
		tampilTipe_produk();
		tampilKurir();
		tampilTransaksi();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

//User
function tampilUser() {
		$.get('<?php echo base_url('User/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-user').html(data);
			refresh();
		});
	}

	var id_user;
	$(document).on("click", ".konfirmasiHapus-user", function() {
		id_user = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataUser", function() {
		var id = id_user;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('User/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilUser();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataUser", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('User/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-user').modal('show');
		})
	})

	$('#form-tambah-user').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('User/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilUser();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-user").reset();
				$('#tambah-user').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on("click", ".detail-dataUser", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('User/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-user').modal('show');
		})
	})


	$(document).on('submit', '#form-update-user', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('User/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilUser();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-user").reset();
				$('#update-user').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-user').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-user').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})



	

	//produk
	function tampilProduk() {
		$.get('<?php echo base_url('produk/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-produk').html(data);
			refresh();
		});
	}

	var id_produk;
	$(document).on("click", ".konfirmasiHapus-produk", function() {
		id_produk = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataProduk", function() {
		var id = id_produk;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Produk/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilProduk();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataProduk", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Produk/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-produk').modal('show');
		})
	})


	  $(document).on("click", ".detail-dataProduk", function() {
	  	var id = $(this).attr("data-id");
		
	  	$.ajax({
	  		method: "POST",
	  		url: "<?php echo base_url('Produk/detail'); ?>",
	  		data: "id=" +id
	  	})
	  	.done(function(data) {
	  		$('#tempat-modal').html(data);
	  		$('#tabel-detail').dataTable({
	  			  "paging": true,
	  			  "lengthChange": false,
	  			  "searching": true,
	  			  "ordering": true,
	  			  "info": true,
	  			  "autoWidth": false
	  			});
	  		$('#detail-produk').modal('show');
	  	})
	  })


	$(document).on("click", ".penjemputan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Produk/penjemputan'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#penjemputan').modal('show');
		})
	})

	$(document).on('submit', '#form-penjemputan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Produk/prosesPenjemputan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);
			tampilProduk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-penjemputan").reset();
				$('#form-penjemputan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#form-tambah-produk').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Produk/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProduk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-produk").reset();
				$('#tambah-produk').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-produk', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Produk/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProduk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-produk").reset();
				$('#update-produk').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-produk').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	$('#update-produk').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


	//Desa
	function tampilDesa() {
		$.get('<?php echo base_url('Desa/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-desa').html(data);
			refresh();
		});
	}

	var id_desa;
	$(document).on("click", ".konfirmasiHapus-desa", function() {
		id_desa = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataDesa", function() {
		var id = id_desa;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Desa/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilDesa();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataDesa", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Desa/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-desa').modal('show');
		})
	})

	$(document).on("click", ".detail-dataDesa", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Desa/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-desa').modal('show');
		})
	})

	$('#form-tambah-desa').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Desa/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilDesa();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-desa").reset();
				$('#tambah-desa').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-desa', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Desa/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilDesa();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-desa").reset();
				$('#update-desa').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-desa').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-desa').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Tipe_produk
	function tampilTipe_produk() {
		$.get('<?php echo base_url('Tipe_produk/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-tipe_produk').html(data);
			refresh();
		});
	}

	var id_tipe_produk;
	$(document).on("click", ".konfirmasiHapus-tipe_produk", function() {
		id_tipe_produk = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataTipe_produk", function() {
		var id = id_tipe_produk;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Tipe_produk/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTipe_produk();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTipe_produk", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Tipe_produk/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-tipe_produk').modal('show');
		})
	})

	$(document).on("click", ".detail-dataTipe_produk", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Tipe_produk/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-tipe_produk').modal('show');
		})
	})

	$('#form-tambah-tipe_produk').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Tipe_produk/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTipe_produk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-tipe_produk").reset();
				$('#tambah-tipe_produk').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-tipe_produk', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Tipe_produk/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTipe_produk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-tipe_produk").reset();
				$('#update-tipe_produk').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-tipe_produk').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-tipe_produk').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})





//Kurir
function tampilKurir() {
		$.get('<?php echo base_url('Kurir/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kurir').html(data);
			refresh();
		});
	}

	var id_kurir;
	$(document).on("click", ".konfirmasiHapus-kurir", function() {
		id_kurir = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKurir", function() {
		var id = id_kurir;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kurir/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKurir();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKurir", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kurir/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kurir').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKurir", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kurir/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-kurir').modal('show');
		})
	})

	$('#form-tambah-kurir').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kurir/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKurir();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kurir").reset();
				$('#tambah-kurir').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kurir', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kurir/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKurir();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kurir").reset();
				$('#update-kurir').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kurir').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kurir').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Transaksi
function tampilTransaksi() {
		$.get('<?php echo base_url('Transaksi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-transaksi').html(data);
			refresh();
		});
	}

	var id_transaksi;
	$(document).on("click", ".konfirmasiHapus-transaksi", function() {
		id_transaksi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataTransaksi", function() {
		var id = id_transaksi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transaksi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTransaksi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTransaksi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transaksi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-transaksi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataTransaksi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transaksi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-transaksi').modal('show');
		})
	})

	$('#form-tambah-transaksi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Transaksi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTransaksi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-transaksi").reset();
				$('#tambah-transaksi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-transaksi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Transaksi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTransaksi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-transaksi").reset();
				$('#update-transaksi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-transaksi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-transaksi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


</script>