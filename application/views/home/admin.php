<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-users"></i> Daftar Admin</h4>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>No.Telepon</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $key => $value): ?>
							<tr>
								<td><?php echo $key + 1 ?></td>
								<td><?php echo $value['nama'] ?></td>
								<td><?php echo $value['email'] ?></td>
								<td><?php echo $value['no_telp'] ?></td>
								<td>
									<button class="btn btn-sm btn-warning" 
										onclick="edit(<?= $value['id']; ?>,'<?= $value['nama']; ?>','<?= $value['email']; ?>','<?= $value['no_telp']; ?>')">

										<i class="fa fa-edit"></i> Edit
									</button>
									<button class="btn btn-sm btn-danger"
										onclick="return hapus(<?php echo $value['id'] ?>)" 
									>
										<i class="fa fa-trash"></i> Hapus</button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-plus"></i> Tambah Admin</h4>
			</div>
			<div class="card-body">
				<form method="post" action="<?php echo base_url('home/save_admin') ?>">
					<div class="form-group">
						<label>Nama :</label>
						<input type="text" name="nama" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Email :</label>
						<input type="email" name="email" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Password :</label>
						<input type="password" name="password" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>No.Telepon :</label>
						<input type="number" name="no_telp" class="form-control" required="">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="edit_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Admin ID : <b id="id_admin"></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="form_edit" method="post">
      		<div class="form-group">
				<label>Nama :</label>
				<input type="text" name="nama" id="nama" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Email :</label>
				<input type="email" name="email" id="email" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>No.Telepon :</label>
				<input type="number" name="no_telp" id="no_telp" class="form-control" required="">
			</div>
      </div>
      <div class="modal-footer">
		<button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
      	</form>
    </div>
  </div>
</div>

<script>
	function hapus(id) {
		window.location = '<?php echo base_url("home/delete_admin/") ?>'+id;
	}

	function edit(id, nama, email, no_telp){
		$('#edit_modal').modal('show');

		$('#id_admin').html(id);
		$('#nama').val(nama);
		$('#email').val(email);
		$('#no_telp').val(no_telp);

		$('#form_edit').attr('action', '<?php echo base_url('home/update_admin/') ?>'+id);
	}
</script>