<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-user"></i> Detail User ID : <?php echo $data['id'] ?></h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<center>
						<img style="width: 50%" src="<?php echo base_url('assets/img/'.$data['foto']) ?>">
					</center>
				</div>
				<div class="form-group">
					<label>NIK</label>
					<input type="text" disabled="" class="form-control" value="<?php echo $data['nik'] ?>">
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" disabled="" class="form-control" value="<?php echo $data['nama'] ?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" disabled="" class="form-control" value="<?php echo $data['email'] ?>">
				</div>
				<div class="form-group">
					<label>No Telepon</label>
					<input type="text" disabled="" class="form-control" value="<?php echo $data['no_telp'] ?>">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" disabled="" class="form-control" value="<?php echo $data['alamat'] ?>">
				</div>
				<div class="form-group">
					<label>Gender</label>
					<input type="text" disabled="" class="form-control" value="<?php echo ($data['gender'] == 1 ? 'Laki-Laki' : 'Perempuan') ?>">
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-book"></i> Data Booking</h4>
			</div>
			<div class="card-body">
				
				<?php if (count($booking) > 0): ?>
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Kamar ID</th>
								<th>Tgl. Booking</th>
								<th>Tgl. Masuk</th>
								<th>Tgl. Selesai</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;foreach ($booking as $key): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $key['kamar_id'] ?></td>
									<td><?php echo $key['tanggal_booking'] ?></td>
									<td><?php echo $key['tanggal_mulai'] ?></td>
									<td><?php echo $key['tanggal_selesai'] ?></td>
									<td><?php
										if($key['status'] == 1){
											echo "<b class='text-success'>Confirm</b>";
										}elseif($key['status'] == 2){
											echo "<b class='text-danger'>Expired</b>";
										}else{
											echo "<b class='text-warning'>Pending</b>";
										}
									?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				<?php else: ?>
					<center>
						<h4>Data Booking Tidak Ada</h4>
					</center>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>
