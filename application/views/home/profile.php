<div class="row">
	<div class="col-lg-4">
		<?php 

			if(empty($_SESSION['admin'])){
				?>
			<div class="card">
				<div class="card-header bg-dark text-light">
					<h4><i class="fa fa-image"></i> Kartu Identitas</h4>
				</div>
				<div class="card-body">
					<div class="form-group">
						<center>
							<img src="<?= base_url('assets/img/'.$data['ktp']) ?>">
						</center>
					</div>
				</div>
			</div>
			<hr>
				<?php
			}

		?>
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-user"></i> Foto Profile</h4>
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('home/update_foto_profile') ?>" enctype="multipart/form-data">
					<div class="form-group">
						<center>
							<img src="<?= base_url('assets/img/'.$data['foto']) ?>">
						</center>
						<hr>
						<div class="form-group">
							<h4>Update Foto Profile</h4>
						</div>
						<div class="form-group">
							<label>Foto :</label>
							<input type="file" class="form-control" name="foto">
						</div>
						<div class="form-group">
							<button class="btn btn-danger btn-sm btn-block">Upload</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-user"></i> Update your Profile</h4>
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('home/update_profile/') ?>">
					<div class="form-group">
						<label>Nama : </label>
						<input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>">
					</div>
					<div class="form-group">
						<label>Email : </label>
						<input type="email" name="email" class="form-control" value="<?= $data['email'] ?>">
					</div>
					<?php 

					if(empty($_SESSION['admin'])){
						?>
						<div class="form-group">
							<label>No Telp : </label>
							<input type="text" name="no_telp" class="form-control" value="<?= $data['no_telp'] ?>">
						</div>
						<div class="form-group">
							<label>Alamat : </label>
							<textarea class="form-control" name="alamat" required=""><?= $data['alamat'] ?></textarea>
						</div>
						<div class="form-group">
							<label>Gender : </label>
							<select class="form-control" name="gender">
								<option <?= ($data['gender'] == 1 ? 'selected' : '') ?> value='1'>Laki - Laki</option>
								<option <?= ($data['gender'] == 2 ? 'selected' : '') ?> value='2'>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>NIK : </label>
							<input type="number" name="nik" class="form-control" value="<?= $data['nik'] ?>">
						</div>
						<?php
					}

					?>
					<div class="form-group">
						<button class="btn btn-info btn-sm pull-right" type="submit"><i class="fa fa-save"></i> Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>