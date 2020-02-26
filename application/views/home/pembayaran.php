<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4>Pembayaran</h4>
				<small><?php echo date('d/m/Y') ?></small>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Masukan Code Booking</label>
					<input type="text" id="code_booking" class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-sm" id="searchData">Search</button>
					<br><small id="loading"></small>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-8">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4>Hasil Data</h4>
				<small><?php echo date('d/m/Y') ?></small>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" id="nama" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" id="email" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label>No Telepon</label>
					<input type="text" id="no_telp" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label>Nik</label>
					<input type="text" id="nik" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label>Gender</label>
					<input type="text" id="gender" class="form-control" readonly="">
				</div>

				<!-- input hidden -->
				<input type="hidden" id="kamar_id">
				<input type="hidden" id="user_id">
				<input type="hidden" id="booking_id">
				<input type="hidden" id="tanggal_selesai">
				<input type="hidden" id="harga_kamar">

				<hr>
				<div class="form-group" id="lanjut" style="display: none;">
					<label>Jenis Pembayaran</label>
					<select id="jenis" class="form-control" name="jenis">
						<option value="">-- Jenis --</option>
						<option value="pelunasan">Pelunasan</option>
						<option value="perpanjang">Perpanjang</option>
					</select>
				</div>
				<!-- sisa lunas -->
				<div id="sisaLunas" style="display: none;">
					<div class="form-group">
						<label>Sisa Pelunasan</label>
						<input type="text" id="sisa_pelunasan" class="form-control" readonly="">
					</div>
					<div class="form-group">
						<a id="linkLunas" class="btn btn-danger btn-block btn-sm">PELUNASAN</a>
					</div>
				</div>
				<!-- perpanjang -->
				<div id="Perpanjang" style="display: none;">
					<form method="post" id="formPerpanjang">
						<div class="form-group">
							<label>Biaya Kamar : </label>
							<input type="text" id="biaya_kamar" class="form-control" readonly="">
						</div>
						<div class="form-group">
							<label>Perpanjang</label>
							<select class="form-control" name="perpanjang" id="_perpanjang">
								<?php
									for($a = 1; $a <= 12; $a++){
										echo "<option value='".$a."'>".$a." Bulan</option>";
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Total Biaya</label>
							<input type="text" id="total_biaya" class="form-control" name="total_biaya" readonly="">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-danger btn-block btn-sm text-light">PERPANJANG</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('#searchData').on('click', (e) => {
		e.preventDefault();
		var code_booking = $('#code_booking').val();
		console.log(code_booking);
		if (code_booking === '') {
			alert('Code Booking Tidak Boleh Kosong !');
		}else{

			$.ajax({
				url: '<?php echo base_url("booking/search_code_booking/") ?>'+code_booking,
				method: 'GET',
				dataType: 'JSON',
				beforeSend: () => {
					$('#loading').html('Loading....');
				},
				success: (data) => {
					$('#loading').html('');
					if(data.status === 0){
						alert(data.data);
					}else{
						$('#nama').val(data.user.nama);
						$('#email').val(data.user.email);
						$('#no_telp').val(data.user.no_telp);
						$('#nik').val(data.user.nik);
						$('#gender').val(data.user.gender);
						$('#kamar_id').val(data.data.kamar_id);
						$('#user_id').val(data.data.user_id);
						$('#booking_id').val(data.data.id);
						$('#tanggal_selesai').val(data.data.tanggal_selesai);
						$('#harga_kamar').val(data.kamar.harga);
						$('#biaya_kamar').val(data.kamar.harga)
						$('#lanjut').show();
					}
				}
			})
		}
	});

	$('#jenis').on('change', (e) => {
		e.preventDefault();
		var jenis = e.target.value;
		var id 	  = $('#user_id').val();
		var booking_id = $('#booking_id').val();

		if(jenis === 'pelunasan'){
			$.ajax({
				url: '<?php echo base_url("booking/search_kamar_by_id") ?>/'+id,
				method: 'GET',
				dataType: 'JSON',
				success: (e) => {
					var harga = parseInt(e.harga) / 2;
					$('#sisa_pelunasan').val(harga);

					var link = '<?php echo base_url("booking/pelunasan/") ?>' + booking_id

					$('#linkLunas').attr('href', link);
					$('#sisaLunas').show();
				}
			})
		}else{
			$('#Perpanjang').show();
		}
	});

	$('#_perpanjang').on('change', (e) => {
		var bulan = e.target.value;
		var harga = $('#harga_kamar').val();
		var total = parseInt(harga) * parseInt(bulan);
		var booking_id = $('#booking_id').val();


		var link = '<?php echo base_url("booking/perpanjang/") ?>' + booking_id

		$('#total_biaya').val(total);
		$('#formPerpanjang').attr('action', link);
	})
</script>
