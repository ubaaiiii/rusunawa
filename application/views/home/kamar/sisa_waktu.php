
<div class="rows">

	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-clock"></i> Masa Berakhir</h4>
				<small>Tanggal Hari ini : <?php echo date('d-m-Y') ?></small>
			</div>
			<div class="card-body table-responsive">
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>User</th>
							<th>Kamar ID</th>
							<th>Tgl. Booking</th>
							<th>Tgl. Masuk</th>
							<th>Tgl. Keluar</th>
							<th>Sisa Waktu</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
							foreach ($data as $key) {
								?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $key['user_id'] ?></td>
										<td><?php echo $key['kamar_id'] ?></td>
										<td><?php echo $key['tanggal_booking'] ?></td>
										<td><?php echo $key['tanggal_mulai'] ?></td>
										<td><?php echo $key['tanggal_selesai'] ?></td>
										<td>
											<?php
												$now = strtotime(date('Y-m-d'));
												$mulai = strtotime(date($key['tanggal_mulai']));

												if ($now > $mulai) {
													$tanggal_lahir  = strtotime($key['tanggal_selesai']);
													$sekarang    = time();
													$diff   = $sekarang - $tanggal_lahir;
													echo 'Sisa '.floor($diff / (60 * 60 * 24)) . ' Hari';
												}else{
													echo "Penghitungan akan dimulai saat waktu booking terlewati";	
												}
											?>
										</td>
										<td>
											<a onclick="return confirm('Anda Yakin ?')" href="<?= base_url('booking/akhiri/'.$key['id_booking']) ?>" class="btn btn-danger btn-sm btn-block">Akhiri</a>
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
