<div class="rows">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-users"></i> Daftar Users</h4>
			</div>
			<div class="card-body table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>No Telp</th>
							<th>Gender</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $no= 1; foreach ($data as $key): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $key['nik'] ?></td>
								<td><?php echo $key['nama'] ?></td>
								<td><?php echo $key['no_telp'] ?></td>
								<td><?php echo ($key['gender'] == 1 ? 'Laki-Laki' : 'Perempuan') ?></td>
								<td style="text-align: center;">
									<a class="btn btn-danger btn-sm text-light" onclick="return confirm('Apakah anda yakin untuk menghapus ?')" href="<?= base_url('home/del_user/'.$key['nik']) ?>"><i class="fa fa-trash"></i> Hapus</a>
									<a href="<?= base_url('home/detail_user/'.$key['nik']) ?>" class="btn btn-primary btn-sm text-light"><i class="fa fa-user"></i> Detail</a>
									<button onclick="_editUser(<?= $key['nik'] ?>)" class="btn btn-warning btn-sm text-light"><i class="fa fa-edit"></i> Edit</button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-4">

	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_show">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Users ID : <b id="id_user"></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" id="hidden_id" value="">
      	<div class="form-group">
      		<label>NIK</label>
      		<input type="number" name="nik" id="nik" class="form-control">
      	</div>
      	<div class="form-group">
      		<label>Nama</label>
      		<input type="text" name="nama" id="nama" class="form-control">
      	</div>
      	<div class="form-group">
      		<label>Email</label>
      		<input type="email" name="email" id="email" class="form-control">
      	</div>
      	<div class="form-group">
      		<label>No Telepon</label>
      		<input type="number" name="no_telp" id="no_telp" class="form-control">
      	</div>
      	<div class="form-group">
      		<label>Alamat</label>
      		<textarea class="form-control" id="alamat" name="alamat"></textarea>
      	</div>
      	<div class="form-group">
      		<label>Gender</label>
      		<select id="gender" name="gender" class="form-control">
      			<option value="1">Laki - Laki</option>
      			<option value="2">Perempuan</option>
      		</select>
      	</div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" onclick="_updateUser()">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  	</form>
      </div>
    </div>
  </div>
</div>

<script>
	function _editUser(id){
		$('#id_user').html(id);
		$('#hidden_id').val(id);
		$.ajax({
			url: '<?= base_url("home/get_user/") ?>'+id+'/json',
			method: 'GET',
			dataType: 'JSON',
			success: (data) => {
				$('#modal_show').modal('show');
				$('#nik').val(data.nik);
				$('#nama').val(data.nama);
				$('#email').val(data.email);
				$('#no_telp').val(data.no_telp);
				$('#alamat').val(data.alamat);
				$('#gender').val(data.gender);
			}
		});
	}

	function _updateUser(){
		var nik = $('#nik').val(),
			nama = $('#nama').val(),
			email = $('#email').val(),
			no_telp = $('#no_telp').val(),
			alamat = $('#alamat').val(),
			gender = $('#gender').val(),
			id = $('#hidden_id').val();

		$.ajax({
			url: '<?= base_url("home/update_user/") ?>'+id,
			method: 'POST',
			data : {
				nik, nama, email, no_telp, alamat, gender
			},
			success: (data) => {
				if(data == true){
					alert('Berhasil MengUpdate User');
					location.reload();
				}else{
					alert('Berhasil MengUpdate User');
					location.reload();
				}
			}
		})
	}
</script>
