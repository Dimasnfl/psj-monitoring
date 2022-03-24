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
		tampilPetani();
		tampilDesa();
		tampilSayuran();
		tampilHarga();
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

	//petani
	function tampilPetani() {
		$.get('<?php echo base_url('Petani/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-petani').html(data);
			refresh();
		});
	}

	var id_petani;
	$(document).on("click", ".konfirmasiHapus-petani", function() {
		id_petani = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPetani", function() {
		var id = id_petani;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Petani/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPetani();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPetani", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Petani/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-petani').modal('show');
		})
	})

	$('#form-tambah-petani').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Petani/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPetani();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-petani").reset();
				$('#tambah-petani').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-petani', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Petani/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPetani();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-petani").reset();
				$('#update-petani').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-petani').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-petani').on('hidden.bs.modal', function () {
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


	//sayuran
	function tampilSayuran() {
		$.get('<?php echo base_url('Sayuran/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-sayuran').html(data);
			refresh();
		});
	}

	var id_sayuran;
	$(document).on("click", ".konfirmasiHapus-sayuran", function() {
		id_sayuran = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSayuran", function() {
		var id = id_sayuran;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sayuran/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSayuran();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSayuran", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sayuran/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-sayuran').modal('show');
		})
	})

	$('#form-tambah-sayuran').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sayuran/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSayuran();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-sayuran").reset();
				$('#tambah-sayuran').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-sayuran', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sayuran/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSayuran();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-sayuran").reset();
				$('#update-sayuran').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-sayuran').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-sayuran').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})



	//Harga
	function tampilHarga() {
		$.get('<?php echo base_url('Harga/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-harga').html(data);
			refresh();
		});
	}

	var id_harga;
	$(document).on("click", ".konfirmasiHapus-harga", function() {
		id_harga = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataHarga", function() {
		var id = id_harga;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Harga/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilHarga();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataHarga", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Harga/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-harga').modal('show');
		})
	})

	$(document).on("click", ".detail-dataHarga", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Harga/detail'); ?>",
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
			$('#detail-harga').modal('show');
		})
	})

	$('#form-tambah-harga').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Harga/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilHarga();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-harga").reset();
				$('#tambah-harga').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-harga', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Harga/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilHarga();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-harga").reset();
				$('#update-harga').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-harga').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-harga').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
</script>