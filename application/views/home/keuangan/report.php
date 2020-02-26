<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/bootstrap.min.css">
	<title> Report Keuangan </title>
</head>
<body>

	<div class="container" id="div_print">
		<div class="content">
			<div class="col-lg-12">
				<center>
					<h2>SISTEM INFORMASI PEMESANAN KAMAR RUSUN</h2>
					<h4>Report Booking & Keuangan</h4>
					<h6><?= $setting['nama'] ?>, Alamat : <?= $setting['alamat'] ?>, Contac : <?= $setting['no_telp'] ?>, </h6>
				</center>
				<hr>
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Tgl. Booking</th>
							<th>Tgl. Selesai</th>
							<th>ID Kamar</th>
							<th>Nama</th>
							<th>No Rekening</th>
							<th>Uang DP</th>
							<th>Sisa</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1;foreach ($data as $key): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo date("d M Y", strtotime($key['tanggal_booking'])); ?></td>
								<td><?php echo date("d M Y", strtotime($key['tanggal_selesai'])); ?></td>
								<td><?php echo $key['kamar_id'] ?></td>
								<td><?php echo $key['nama'] ?></td>
								<td><?php echo $key['no_rek'] ?></td>
								<td>50%</td>
								<td><?php echo 'Rp.'.number_format(($key['harga'] / 2), 2, ',', '.') ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<script>
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
		printDiv('div_print');
	</script>
</body>
</html>
