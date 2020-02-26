<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-key"></i> Reset Password</h4>
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('home/update_pass') ?>">
					<div class="form-group">
						<label>Masukan Password Baru : </label>
						<input type="password" name="password" class="form-control" required="">
					</div>
					<div class="form-group">
						<button class="btn btn-danger btn-sm btn-block">UPDATE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>