<?= $this->extend('top_layout') ?>

<?= $this->section('inline-css') ?>
<style>

</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Daftar Data Uji</h1>
			</div><!-- /.col -->
			<div class="col-sm-6 text-right">
				<button type="button" class="btn btn-success" id="tambah_data_uji_button"><i class="fas fa-plus"></i>Tambah data uji</button>
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
						<table id="data_uji_table" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>kata</th>
									<th>kata pakar</th>
									<th width="1%" style="white-space: nowrap;">Action</th>
								</tr>
							</thead>
							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade card card-primary" id="data_uji_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="data_uji_form" method="POST">
				<div class="modal-header card-header">
					<h4 class="modal-title card-title" id="modal_title">Form</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body card-body">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="kata">kata</label>
						<input type="text" name="kata" id="kata" class="form-control">
					</div>
					<div class="form-group">
						<label for="kata">kata pakar</label>
						<input type="text" name="kata_pakar" id="kata_pakar" class="form-control">

					</div>
					
					
					
				</div>
				<div class="modal-footer  card-footer">

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>

				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<template  id="render-action-button-template">
	<div class="btn-group">
		<button type="button" class="btn btn-outline-primary btn-edit" onclick="show_edit_data_uji_modal('place_here')"><i class="fas fa-edit"></i></button>
		<button type="button" class="btn btn-outline-danger btn-delete" onclick="show_delete_data_uji_modal('place_here')" ><i class="fas fa-trash"></i></button>
	</div>
</template>
<?= $this->endSection() ?>

<?= $this->section('inline-js') ?>
<script>
	$(function() {


		$("#data_uji_form").submit(function(e) {
			e.preventDefault();

			let form_data = {
				id: $("#id").val(),
				kata: $("#kata").val(),
				kata_pakar: $("#kata_pakar").val(),
			};

			$.ajax({
				url: '<?= base_url("data-uji/create_or_update") ?>',
				type: 'POST',
				data: form_data,
			})
			.done(function(response) {
				if (!response.success) {

				} else {
					clearDataUjiForm();
					data_uji_table.ajax.reload(null, false);
					$("#data_uji_modal").modal('hide');
					Swal.fire({icon: 'success', showConfirmButton: false, timer: 1000})
					
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});

		$("#tambah_data_uji_button").click(function(e) {
			show_tambah_data_uji_modal();
		});

		let data_uji_table = $("#data_uji_table").DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "<?= base_url('data-uji/show_all') ?>",
			"columns": [
			{ "data": "id" },
			{ "data": "kata" },
			{ "data": "kata_pakar" },
			{ "data": null },
			],
			"columnDefs": [ {
				"targets": -1,
				"data": null,
				"render" : function(data, type, row) {
					return render_edit_delete_button(row['id']);
				}
			} ],

		});
	});



	function clearDataUjiForm() {
		$("#kata").val('');
		$("#kata_pakar").val('');
		$("#id").val('');
	}

	function show_tambah_data_uji_modal() {
		clearDataUjiForm();
		$("#data_uji_modal").modal('show');
	}

	function show_delete_data_uji_modal(id) {
		Swal.fire({
			icon : 'warning',
			title : 'Hapus data',
			text : 'Yakin ingin menghapus data?',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Jangan',

		})
		.then((res) => {
			if (res.value) {
				$.ajax({
					url: '<?= base_url("data-uji/delete") ?>',
					type: 'GET',
					data: {id: id},
				})
				.done(function(response) {
					if (!response.success) {

					} else {

						$("#data_uji_table").DataTable().ajax.reload(null, false);
						Swal.fire({icon: 'success', showConfirmButton: false, timer: 1000})
					}
				});
			}
		})
		
	}
	function show_edit_data_uji_modal(id) {


		$.ajax({
			url: '<?= base_url("data-uji/show") ?>',
			type: 'GET',
			data: {id: id},
		})
		.done(function(response) {
			if (!response.success) {

			} else {
				$("#id").val(response.data.id);
				$("#kata").val(response.data.kata);
				$("#kata_pakar").val(response.data.kata_pakar);
				$("#data_uji_modal").modal('show');
			}
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