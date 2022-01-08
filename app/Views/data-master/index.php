<?= $this->extend('top_layout') ?>

<?= $this->section('inline-css') ?>
<style>
	.image-dt {
		width: 80px;
		height: 80px;
	}
</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Master</h1>
			</div><!-- /.col -->
			<div class="col-sm-6 text-right">
				<button type="button" class="btn btn-success" id="tambah_data_master_button"><i class="fas fa-plus"></i> Tambah data master</button>
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
						<table id="data_master_table" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tipe</th>
									<th>File</th>
									<th>Jawaban</th>
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
<div class="modal fade card card-primary" id="data_master_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="data_master_form" method="POST">
				<input type="hidden" name="old_file">
				<div class="modal-header card-header">
					<h4 class="modal-title card-title" id="modal_title">Form</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body card-body">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="file">Gambar</label>
						<input type="file" class="form-control" id="file" name="file">
					</div>
					<div class="form-group">
						<label for="tipe">Tipe</label>
						<select name="tipe" id="tipe" class="form-control">
							<option value="atas">Atas</option>
							<option value="tengah">Tengah</option>
							<option value="bawah">Bawah</option>
						</select>
					</div>
					<div class="form-group">
						<label for="jawaban">Jawaban</label>
						<select name="jawaban" id="jawaban" class="form-control">
							<option value="B">Benar</option>
							<option value="S">Salah</option>
						</select>
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
		<button type="button" class="btn  btn-outline-info btn-edit" onclick="show_edit_data_master_modal('place_here')"><i class="fas fa-edit"></i></button>
		<button type="button" class="btn  btn-outline-danger btn-delete" onclick="show_delete_data_master_modal('place_here')"><i class="fas fa-trash"></i></button>
	</div>
</template>
<?= $this->endSection() ?>

<?= $this->section('inline-js') ?>
<script>
	$(function() {


		$("#data_master_form").submit(function(e) {
			e.preventDefault();

			let form_data = new FormData($(this)[0]);

			showSpinner();
			$.ajax({
					processData: false,
					contentType: false,
					url: '<?= base_url("data-master/create_or_update") ?>',
					type: 'POST',
					headers: {
						'X-Requested-With': 'XMLHttpRequest'
					},
					data: form_data,
				})
				.done(function(response) {
					console.log(response);
					if (!response.success) {

					} else {
						clearDataMasterForm();
						data_master_table.ajax.reload(null, false);
						$("#data_master_modal").modal('hide');
						Swal.fire({
							icon: 'success',
							showConfirmButton: false,
							timer: 1000
						})

					}
				})
				.always(function(e) {
					hideSpinner();
				});

		});

		$("#tambah_data_master_button").click(function(e) {
			show_tambah_data_master_modal();
		});

		let data_master_table = $("#data_master_table").DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "<?= base_url('data-master/show_all') ?>",
			"columns": [{
					"data": "id"
				},
				{
					"data": "tipe"
				},
				{
					"data": "file"
				},
				{
					"data": "jawaban"
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
				},
			],

		});
	});


	function clearDataMasterForm() {
		$("#tipe").val('');
		$("#jawaban").val('');
		$("#file").val('');
	}

	function show_tambah_data_master_modal() {
		clearDataMasterForm();
		$("#modal_title").text('Form tambah Data Master');
		$("#data_master_modal").modal('show');
	}

	function show_delete_data_master_modal(id) {
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
							url: '<?= base_url("data-master/delete") ?>',
							type: 'GET',
							data: {
								id: id
							},
						})
						.done(function(response) {
							if (!response.success) {

							} else {
								$("#data_master_table").DataTable().ajax.reload(null, false);
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

	function show_edit_data_master_modal(id) {

		showSpinner();
		$.ajax({
				url: '<?= base_url("data-master/show") ?>',
				type: 'GET',
				data: {
					id: id
				},
			})
			.done(function(response) {
				if (!response.success) {

				} else {
					$("#id").val(response.data.id);
					$("#tipe").val(response.data.tipe);
					$("#jawaban").val(response.data.jawaban);
					$("#old_file").val(response.data.file);
					$("#modal_title").text('Form ubah data Master');
					$("#data_master_modal").modal('show');
				}
			})
			.always(function(e) {
				hideSpinner();
			})

	}

	function render_edit_delete_button(id) {
		let tmpl = $("#render-action-button-template").html();
		tmpl = tmpl.replace('place_here', id);
		tmpl = tmpl.replace('place_here', id);

		return tmpl;

	}
</script>
<?= $this->endSection() ?>