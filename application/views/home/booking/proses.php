<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h5>Code Kamar : <?php echo $data['code']; ?></h5>
			</div>
			<div class="card-body">
				<div class="form-group">
					<div class="alert alert-info">
						<b>Diharapkan untuk membayar DP 50%</b>
					</div>
				</div>
				<div class="form-group">
					<label><b>Detail Kamar</b> : </label>
				</div>
				<hr>
				<div class="form-group">
					<label>Lantai : </label>
					<input type="text" disabled="" class="form-control" value="<?= $data['tingkat'] ?>">
				</div>
				<div class="form-group">
					<label>Type : </label>
					<input type="text" disabled="" class="form-control" value="<?= ($data['gender'] == 1 ? 'Laki-Laki' : 'Perempuan' ) ?>">
				</div>
				<div class="form-group">
					<label>Harga : </label>
					<input type="text" disabled="" class="form-control" value="<?= 'Rp.'.number_format($data['harga'], 2, ',', '.') ?>">
				</div>
				<div class="form-group">
					<label>DP : </label>
					<input type="text" disabled="" class="form-control" value="50%">
				</div>
				<div class="form-group">
					<label>Total Pembayaran :</label>
					<h4><?php echo 'Rp.'.number_format($data['harga']/2, 2, ',', '.'); ?></h4>
				</div>
			</div>
		</div>
	</div>


	<div class="col-lg-8">
		<div class="card">
			<form method="post" action="<?= base_url('booking/proses_booking') ?>" enctype="multipart/form-data">
				<div class="card-header bg-dark text-light">
					<h5>Pengisian Data : </h5>
				</div>
				<div class="card-body">
					<input type="hidden" name="id_kamar" value="<?php echo $data['id'] ?>">
					<div class="form-group">
						<label>Tanggal Booking : </label>
						<input id="tanggal" type="date" name="tanggal" class="form-control" value="<?= date("Y-m-d");?>">
					</div>
					<div class="form-group">
						<label>Jam : </label>
						<input type="text" id="jam" name="jam" class="form-control clockpicker" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("H:i:s"); ?>">
					</div>
					<div class="form-group">
						<label>Untuk Berapa Bulan : </label>
						<input type="number" min=1 max=12 name="no_rek" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>No Rekening : </label>
						<input type="text" name="no_rek" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Atas Nama : </label>
						<input type="text" name="atasNama" class="form-control" required="">
					</div>
					<div class="form-group">
						<div class="alert alert-info">
							No Rekening : <br><br>
							<?php foreach($rekening as $key){
								echo "<b>".$key['bank']." ".$key['no_rek']." - ".$key['nama']."</b><br>";
							} ?>
						</div>
					</div>
					<div class="form-group">
						<label>Upload Bukti Transfer : </label>
						<input type="file" name="foto" class="form-control" required="">
					</div>
					<div class="form-group">
						<input type="submit" name="" class="btn btn-danger btn-sm btn-block" value="BOOKING">
					</div>
				</div>
			</form>
		</div>
	</div>

</div>

<script>
	$(document).ready(function(){
		
</script>
