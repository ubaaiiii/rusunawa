<div class="row">
	<div class="col-lg-8">
		<div class="row">
			<?php foreach ($data as $key): ?>
				<div class="col-lg-3">
					<div class="card">
						<div class="card-body">
							<img src="<?= base_url('assets/img/'.$key['foto']) ?>">
						</div>
						<div class="card-footer">
							<a href="<?= base_url('home/del_img/'.$key['id']) ?>"><i class="fa fa-trash"></i> Hapus</a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-plus-circle"></i> Tambah Gallery</h4>
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('home/add_gallery') ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label>Foto :</label>
						<input type="file" name="foto" class="form-control">
					</div>
					<div class="form-group">
						<label>Deskripsi :</label>
						<textarea class="form-control" name="deskripsi"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-danger btn-sm btn-block" value="Upload">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>