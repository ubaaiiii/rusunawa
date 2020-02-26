<div class="rows">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-book"></i> Data Booking </h4>
			</div>
			<div class="card-body table-responsive">
				<table id="table_booking" class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>User</th>
							<th>ID Kamar</th>
							<th>Tgl. Booking</th>
							<th>Tgl. Masuk</th>
							<th>Tgl. Keluar</th>
							<th>No Rek</th>
							<th>Keterangan</th>
							<th>Foto</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data as $key): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td style="text-align: center;"><?php echo $key['nama'] ?></td>
								<td style="text-align: center;"><?php echo $key['kamar_id'] ?></td>
								<td style="text-align: center;"><?php echo $key['tanggal_booking'] ?></td>
								<td style="text-align: center;"><?php echo $key['tanggal_mulai'] ?></td>
								<td style="text-align: center;"><?php echo $key['tanggal_selesai'] ?></td>
								<td style="text-align: center;"><?php echo $key['no_rek'] ?></td>
								<td style="text-align: center;"><?php echo $key['keterangan'] ?></td>
								<td style="text-align: center;"><a href="#" onclick="modal('<?= $key['upload_bukti'] ?>')"><i class="fa fa-eye"></i> Lihat</a></td>
								<td style="text-align: center;">
									<?php
										if ($key['status_booking'] == 0) {
											?>
											<a onclick="Confirm('Apakah Anda yakin ?')" href="<?= base_url('booking/confirm/'.$key['booking_id'].'/'.$key['kamar_id']) ?>" class="btn btn-sm btn-primary">Confirm</a>
											<?php
										}elseif($key['status_booking'] == 3){
											echo "<b class='text-danger'>SELESAI</b>";
										}else{
											echo "<b class='text-success'>DIPAKAI</b>";
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
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_show">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Foto Bukti Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="tampil_img">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  	</form>
      </div>
    </div>
  </div>
</div>

<script>
	function modal(link) {
		$('#modal_show').modal('show');
		var path = '<?= base_url("assets/bukti/") ?>';
		var img = `<img src="${path}${link}" />`;
		$('#tampil_img').html(img);
	}
</script>

<!-- id, tanggal_confirm, uang, id_booking  -->
