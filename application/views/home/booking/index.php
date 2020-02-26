<div class="row">
	

	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4>Kamar Kosong</h4>
			</div>
			<div class="card-body">

				<div class="form-group">
					<a href="<?= base_url('booking/history') ?>"><i class="fa fa-book"></i> Histori Booking</a>
				</div>

				<table class="table tabl-hover table-bordered" id="data_table">
					<thead>
						<tr>
							<th>No</th>
							<th>Code Kamar</th>
							<th>Lantai</th>
							<th>Gender</th>
							<th>Harga</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
							<?php 
								$no = 1;
								foreach ($data as $key) {
									?>
								<tr>
									<td style="text-align: center;"><?= $no++ ?></td>
									<td style="text-align: center;"><?= $key['code']; ?></td>
									<td style="text-align: center;"><?= $key['tingkat']; ?></td>
									<td style="text-align: center;"><?= ($key['gender'] == 1 ? 'Laki - Laki' : 'Perempuan'); ?></td>
									<td style="text-align: center;">
										<?php echo 'Rp.'.number_format($key['harga'], 2, ',', '.'); ?>
									</td>
									<td style="text-align: center;">
										<a href="<?= base_url('booking/proses/'.$key['id']) ?>" class="btn btn-danger btn-sm">BOOKING</a>
									</td>
								</tr>
									<?php
								}
							?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>