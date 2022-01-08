<?= $this->extend('top_layout') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data deskripsi</h1>
			</div><!-- /.col -->
			<div class="col-sm-6 text-right">
				<button type="button" class="btn btn-success" id="tambah_deskripsi_button"><i class="fas fa-plus"></i> Tambah deskripsi</button>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-12">

				<div class="card">

					<!-- /.card-header -->
					<div class="card-body">
						<table id="deskripsi_table" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Status Atas</th>
									<th>Status Tengah</th>
									<th>Status Bawah</th>
									<th>Keterangan</th>
									<th width="1%">Action</th>
								</tr>
							</thead>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade card card-primary" id="deskripsi_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="deskripsi_form" method="POST">
				<div class="modal-header card-header">
					<h4 class="modal-title card-title" id="modal_title">Form</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body card-body">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="status_atas">Status Atas</label>
						<select name="status_atas" id="status_atas" class="form-control">
							<?php $opsi = getOpsi(); ?>
							<?php foreach ($opsi as $k => $v) : ?>
								<option value="<?= $k ?>"><?= $v ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="status_tengah">Status Tengah</label>
						<select name="status_tengah" id="status_tengah" class="form-control">
							<?php $opsi = getOpsi(); ?>
							<?php foreach ($opsi as $k => $v) : ?>
								<option value="<?= $k ?>"><?= $v ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="status_bawah">Status Bawah</label>
						<select name="status_bawah" id="status_bawah" class="form-control">
							<?php $opsi = getOpsi(); ?>
							<?php foreach ($opsi as $k => $v) : ?>
								<option value="<?= $k ?>"><?= $v ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea id="keterangan" name="keterangan" class="form-control" required></textarea>
					</div>

				</div>
				<div class="modal-footer  card-footer">

					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>

				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<template id="render-action-button-template">
	<div class="btn-group">
		<button type="button" class="btn  btn-outline-info btn-edit" onclick="show_edit_deskripsi_modal('place_here')"><i class="fas fa-edit"></i></button>
		<button type="button" class="btn  btn-outline-danger btn-delete" onclick="show_delete_deskripsi_modal('place_here')"><i class="fas fa-trash"></i></button>
	</div>
</template>
<?= $this->endSection() ?>

<?= $this->section('inline-js') ?>
<script>
	$(function() {


		$("#deskripsi_form").submit(function(e) {
			e.preventDefault();

			let form_data = new FormData($(this)[0]);
			showSpinner();
			$.ajax({
					processData: false,
					contentType: false,
					url: '<?= base_url("deskripsi/create_or_update") ?>',
					type: 'POST',
					data: form_data,
				})
				.done(function(response) {
					if (!response.success) {

					} else {
						clearDeskripsiForm();
						deskripsi_table.ajax.reload(null, false);
						$("#deskripsi_modal").modal('hide');
						Swal.fire({
							icon: 'success',
							showConfirmButton: false,
							timer: 1000
						})

					}
				})
				.always(function(e) {
					hideSpinner();
				})

		});

		$("#tambah_deskripsi_button").click(function(e) {
			show_tambah_deskripsi_modal();
		});

		let deskripsi_table = $("#deskripsi_table").DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "<?= base_url('deskripsi/show_all') ?>",
			"columns": [{
					"data": "id"
				},
				{
					"data": "status_atas"
				},
				{
					"data": "status_tengah"
				},
				{
					"data": "status_bawah"
				},
				{
					"data": "keterangan"
				},
				{
					"data": null
				},
			],
			"columnDefs": [{
				"targets": -1,
				"data": null,
				"render": function(data, type, row) {
					return render_edit_delete_button(row['id']);
				}
			}],

		});
	});


	function clearDeskripsiForm() {
		$("#status_atas").val('');
		$("#status_tengah").val('');
		$("#status_bawah").val('');
		$("#keterangan").val('');
		$("#id").val('');
	}

	function show_tambah_deskripsi_modal() {
		clearDeskripsiForm();
		$("#modal_title").text('Form tambah Deskripsi');
		$("#deskripsi_modal").modal('show');
	}

	function show_delete_deskripsi_modal(id) {
		Swal.fire({
				icon: 'warning',
				title: 'Hapus data',
				text: 'Yakin ingin menghapus data?',
				allowOutsideClick: false,
				showCancelButton: true,
				confirmButtonText: 'Hapus',
				cancelButtonText: 'Jangan',

			})
			.then((res) => {
				if (res.value) {
					$.ajax({
							url: '<?= base_url("deskripsi/delete") ?>',
							type: 'GET',
							data: {
								id: id
							},
						})
						.done(function(response) {
							if (!response.success) {

							} else {
								$("#deskripsi_table").DataTable().ajax.reload(null, false);
								Swal.fire({
									icon: 'success',
									showConfirmButton: false,
									timer: 1000
								})
							}
						});
				}
			});



	}

	function show_edit_deskripsi_modal(id) {


		showSpinner();
		$.ajax({
				url: '<?= base_url("deskripsi/show") ?>',
				type: 'GET',
				data: {
					id: id
				},
			})
			.done(function(response) {
				if (!response.success) {

				} else {
					$("#id").val(response.data.id);
					$("#status_atas").val(response.data.status_atas);
					$("#status_tengah").val(response.data.status_tengah);
					$("#status_bawah").val(response.data.status_bawah);
					$("#keterangan").val(response.data.keterangan);
					$("#modal_title").text('Form ubah data deskripsi');
					$("#deskripsi_modal").modal('show');
				}
			})
			.always(function(e) {
				hideSpinner();
			});

	}

	function render_edit_delete_button(id) {
		let tmpl = $("#render-action-button-template").html();
		tmpl = tmpl.replace('place_here', id);
		tmpl = tmpl.replace('place_here', id);

		return tmpl;

	}
</script>
<?= $this->endSection() ?>