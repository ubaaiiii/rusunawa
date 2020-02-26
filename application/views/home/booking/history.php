<div class="rows">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h5>History Booking : </h5>
			</div>
			<div class="card-body">
					<?php if ($count['status'] == 0): ?>
						<div class="alert alert-info">
							<b>Menunggu Konfirmasi oleh Pihak Admin</b>
						</div>
					<?php endif ?>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Code Kamar</th>
							<th>Code Booking</th>
							<th>Lantai</th>
							<th>Tgl. Pembayaran</th>
							<th>Tgl. Booking</th>
							<th>Tgl. Selesai</th>
							<th>Harga</th>
							<th>DP</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data as $key): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $key['code'] ?></td>
								<td><?php echo $key['code_booking'] ?></td>
								<td><?php echo $key['tingkat'] ?></td>
								<td><?php echo $key['tanggal_booking'] ?></td>
								<td><?php echo $key['tanggal_mulai'] ?></td>
								<td><?php echo $key['tanggal_selesai'] ?></td>
								<td><?php echo $key['harga'] ?></td>
								<td>50%</td>
								<td><?php
									if ($key['status_booking'] == 0) {
										echo "<b class='text-warning'>Pending</b>";
									}elseif($key['status_booking'] == 3){
										echo "<b class='text-danger'>Berakhir</b>";
									}elseif($key['status_booking'] == 4){
										echo "<b class='text-success'>LUNAS</b>";
									}else{
										echo "<b class='text-success'>Confirm</b>";
									}
								?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
