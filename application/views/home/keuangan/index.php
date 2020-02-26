<div class="row">
	<div class="col-lg-4">
		<form method="post" action="<?= base_url('home/search_keuangan') ?>">
		<div class="form-group">
			<select id="bulan" name="bulan" class="form-control">
				<option value="00">-- BULAN --</option>
				<option value="all">-- ALL --</option>
				<option value="01">Januari</option>
				<option value="02">Februari</option>
				<option value="03">Maret</option>
				<option value="04">April</option>
				<option value="05">Mei</option>
				<option value="06">Juni</option>
				<option value="07">Juli</option>
				<option value="08">Agustus</option>
				<option value="09">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
			</select>
		</div>
	</div>
	<div class="col-lg-4">
		<select id="tahun" name="tahun" class="form-control">
			<option value="00">-- TAHUN --</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option>
			<option value="2028">2028</option>
			<option value="2029">2029</option>
		</select>
	</div>
	<div class="col-lg-2">
		<div class="form-group">
			<button id="view" class="btn btn-success btn-sm btn-block">
				<i class="fa fa-eye"></i> View
			</button>
		</div>
	</div>
	<div class="col-lg-2">
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-sm btn-block">
				<i class="fa fa-print"></i> Cetak
			</button>
		</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<hr>
		<table class="table table-hover table-bordered">
			<thead class="bg-dark text-light">
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
			<tbody id="table_value">

			</tbody>
		</table>
	</div>
</div>

<script>
	$('#view').on('click', (e) => {
		e.preventDefault();

		$.ajax({
			url: '<?php echo base_url("home/view_laporan") ?>',
			method: 'POST',
			dataType: 'JSON',
			data: {
				bulan: $('#bulan').val(),
				tahun: $('#tahun').val()
			},
			success: (data) => {
				if(data.data.length > 0){
					var html = '';
					data.data.forEach((d, index) => {
						html += '<tr>'+
							'<td>'+(index+1)+'</td>'+
							'<td>'+d.tanggal_booking+'</td>'+
							'<td>'+d.tanggal_selesai+'</td>'+
							'<td>'+d.kamar_id+'</td>'+
							'<td>'+d.nama+'</td>'+
							'<td>'+d.no_rek+'</td>'+
							'<td>50%</td>'+
							'<td>'+(d.harga/2)+'</td>'+
							'</tr>';
					});
					console.log(html);
					$('#table_value').html(html);
				} else {
					html = '<tr><td colspan=8 align="center">No data available in table</td><tr>';
					console.log(html);
					$('#table_value').html(html);
				}
			}
		})
	})
</script>
