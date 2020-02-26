<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-gear"></i> Setting Application</h4>
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('home/update_setting') ?>">
					<div class="form-group">
						<label>Nama Rusun :</label>
						<input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>">
					</div>
					<div class="form-group">
						<label>Alamat Rusun :</label>
						<textarea class="form-control" name="alamat"><?= $data['alamat'] ?></textarea>
					</div>
					<div class="form-group">
						<label>No Telp Rusun :</label>
						<input type="number" name="no_telp" class="form-control" value="<?= $data['no_telp'] ?>">
					</div>
					<div class="form-group">
						<label>Email Rusun :</label>
						<input type="email" name="email" class="form-control" value="<?= $data['email'] ?>">
					</div>
					<div class="form-group">
						<label>Deskripsi Rusun :</label>
						<textarea class="form-control" name="deskripsi"><?= $data['deskripsi'] ?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-success btn-block btn-sm" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-user"></i> Upload Logo Rusun</h4>
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('home/upload_logo') ?>" enctype="multipart/form-data">
					<div class="form-group">
						<center>
							<img src="<?= base_url('assets/img/'.$data['logo']) ?>" style="border-radius: 100%">
						</center>
					</div>
					<div class="form-group">
						<label>Upload Logo</label>
						<input type="file" name="foto" required="" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info btn-block btn-sm">Upload</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<hr>
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header bg-danger text-light">
				<h4><i class="fa fa-payment"></i> Tambah Rekening</h4>
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('home/add_rekening') ?>">
					<div class="form-group">
						<label>No Rekening</label>
						<input type="number" name="no_rek" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Nama Rekening</label>
						<input type="text" name="nama" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Jenis Rekening</label>
						<input type="text" name="bank" class="form-control" required="">
						<small>BNI, BRI, ATM</small>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-info btn-sm btn-block" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header bg-danger text-light">
				<h4>Daftar Rekening</h4>
			</div>
			<div class="card-body table-responsive">
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>No Rekening</th>
							<th>Nama Rekening</th>
							<th>Bank</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($rekening as $key): ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $key['no_rek'] ?></td>
								<td><?= $key['nama'] ?></td>
								<td><?= $key['bank'] ?></td>
								<td>
									<a href="<?= base_url('home/del_rekening/'.$key['id']) ?>"><i class="fa fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>