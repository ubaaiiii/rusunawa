<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4>Belum Bayar</h4>
				<small><?php echo date('d/m/Y') ?></small>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Kamar</th>
							<th>ID User</th>
							<th>Tgl. Masuk</th>
							<th>Tgl. Keluar</th>
							<th>Sisa Waktu</th>
							<th style="text-align: center;">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($belum as $key): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $key['kamar_id'] ?></td>
								<td><?php echo $key['user_id'] ?></td>
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
											echo "Penghitungan Hari akan dimulai, Ketika Kamar telah di tempati";	
										}
									?>
								</td>
								<td style="text-align: center;">
									<?php
									if ($key['status'] == 0) {
										echo "Kamar Belum Lunas";
									}else{
										if($key['status_pdam'] == 0){
											?>
											<button class="btn btn-primary btn-sm" onclick="modal(<?php echo $key['id'] ?>)">Kirim Form</button>
											<?php
										}elseif($key['status_pdam'] == 1){
											echo "Pending";
										}elseif($key['status_pdam'] == 2){
											?>
											<input type="hidden" id="img_<?= $key['id'] ?>" value="<?php echo $key['bukti_pdam'] ?>">
											<input type="hidden" id="tgl_<?= $key['id'] ?>" value="<?php echo $key['tanggal_pdam'] ?>">
											<button class="btn btn-warning btn-sm" onclick="modal_show(<?php echo $key['id'] ?>)"><i class="fa fa-eye"></i> Info Pembayaran</button>
											<a href="<?php echo base_url('home/pdam_acc/'.$key['id']) ?>" class="btn btn-primary btn-sm">Accept</a>
											<a href="<?php echo base_url('home/pdam_reject/'.$key['id']) ?>" class="btn btn-danger btn-sm">Reject</a>
											<?php
										}
									}
									?>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<hr>
	</div>	
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4>Pembayran Lunas PDAM</h4>
				<small><?php echo date('d/m/Y') ?></small>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Kamar</th>
							<th>ID User</th>
							<th>Tgl. Pembayaran PDAM</th>
							<th>Satuan Liter</th>
							<th>Total</th>
							<th style="text-align: center;">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($lunas as $d): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $d['kamar_id'] ?></td>
								<td><?php echo $d['user_id'] ?></td>
								<td><?php echo $d['tanggal_pdam'] ?></td>
								<td><?php echo $d['satuan_pdam'] ?></td>
								<td><?php echo 'Rp.'.number_format($d['harga_pdam'], 2, ',', '.') ?></td>
								<td style="text-align: center;">
									<b style="color: #16ba1e">LUNAS</b>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kirim Form Pembayaran</h4>
      </div>
      <div class="modal-body">
      	<form method="post" id="form_update">
      		<div class="form-group">
      			<label>Satuan Liter : </label>
      			<input type="number" name="satuan" class="form-control">
      		</div>
      		<div class="form-group">
      			<label>Harga Satuan Liter : </label>
      			<input type="text" disabled="" class="form-control" value="<?php echo 'Rp.'.number_format($setting['satuan_pdam'], 2, ',','.') ?>">
      		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Kirim ke Users</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      	</form>
      </div>
    </div>

  </div>
</div>

<div id="modal_show" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Bukti Pembayaran PDAM</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		<label>Tanggal Pembayaran :</label>
      		<input type="text" disabled="" id="tanggl_pdam" class="form-control">
      	</div>
      	<div class="form-group">
      		<label>Foto Bukti :</label>
      		<img id="img_bukti">
      	</div>
      </div>
      <div class="modal-footer">
      	</form>
      </div>
    </div>

  </div>
</div>


<script>
	function modal(id){
		$('#myModal').modal('show');
		$('#form_update').attr('action', '<?php echo base_url("home/update_pdam/") ?>'+id);
	}

	function modal_show(id){
		$('#modal_show').modal('show');
		var tanggal = $('#tgl_'+id).val();
		var img = $('#img_'+id).val();
		
		$('#tanggl_pdam').val(tanggal);
		$('#img_bukti').attr('src', '<?php echo base_url("assets/img/") ?>'+img);
	}
</script>