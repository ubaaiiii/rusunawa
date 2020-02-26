<!-- Admin Page -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<h4><i class="fa fa-bed"></i> Management Kamar :</h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<button class="btn btn-sm btn-primary" onclick="add_kamar()"><i class="fa fa-plus-circle"></i> Tambah Kamar</button>
				</div>

				<div class="form-group">
					<table class="table table-bordered table-hover" id="table">
						<thead class="bg-info text-light">
							<tr>
								<th style="text-align: center;">No</th>
								<th style="text-align: center;">Code</th>
								<th style="text-align: center;">Lantai</th>
								<th style="text-align: center;">Type</th>
								<th style="text-align: center;">Status</th>
								<th style="text-align:center">Actions</th>
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
										<?php 
											if($key['status'] == 1){
												echo "<b class='text-success'>KOSONG</b>";
											}elseif($key['status'] == 3){
												echo "<b class='text-danger'>CLOSE</b>";
											}else{
												echo "<b class='text-warning'>PENDING</b>";
											}
										?>
									</td>
									<td style="text-align: center;">
										<button class="btn btn-sm btn-warning" onclick="_edit('<?= $key['id'] ?>')"><i class="fa fa-edit"></i> Edit</button>
										<button class="btn btn-sm btn-danger" onclick="hapus(<?= $key['id'] ?>)"><i class="fa fa-trash"></i> Hapus</button>
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
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_show">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" action="<?= base_url('home/tambah_kamar') ?>">
      		<div class="form-group">
      			<label>Harga Kamar : </label>
      			<input type="number" name="harga" class="form-control" required="">
      			<small>Masukan Nominal Uang ex: 3000000</small>
      		</div>
      		<div class="form-group">
      			<label>DP Kamar : <b>50 %</b></label>
      		</div>
      		<div class="form-group">
      			<label>Lantai Kamar : </label>
      			<select class="form-control" name="lantai" required="">
      				<option value="1">Lantai 1</option>
      				<option value="2">Lantai 2</option>
      				<option value="3">Lantai 3</option>
      				<option value="4">Lantai 4</option>
      			</select>
      		</div>
      		<div class="form-group">
      			<label>Kamar Laki/Perempuan : </label>
      			<select class="form-control" name="gender" required="">
      				<option value="1">Laki - Laki</option>
      				<option value="2">Perempuan</option>
      			</select>
      		</div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  	</form>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="editKamar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" action="<?= base_url('home/update_kamar') ?>">
      		<div class="form-group">
      			<label>Harga Kamar : </label>
      			<input type="number" name="edit_harga" id="edit_harga" class="form-control" required="">
      			<input type="hidden" id="edit_id" name="edit_id" value="">
      			<small>Masukan Nominal Uang ex: 3000000</small>
      		</div>
      		<div class="form-group">
      			<label>DP Kamar : <b>50 %</b></label>
      		</div>
      		<div class="form-group">
      			<label>Lantai Kamar : </label>
      			<select class="form-control" name="edit_lantai" required="">
      				<option value="1">Lantai 1</option>
      				<option value="2">Lantai 2</option>
      				<option value="3">Lantai 3</option>
      				<option value="4">Lantai 4</option>
      			</select>
      		</div>
      		<div class="form-group">
      			<label>Kamar Laki/Perempuan : </label>
      			<select class="form-control" name="edit_gender" required="">
      				<option value="1">Laki - Laki</option>
      				<option value="2">Perempuan</option>
      			</select>
      		</div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  	</form>
      </div>
    </div>
  </div>
</div>



<script>
	
	$(document).ready(function(){
		$('#table').DataTable({
            responsive: true
        });
	})

	function hapus(id){
		window.location = '<?= base_url("home/hapus_kamar/") ?>' + id;
	}

	function _edit(id){
		$.ajax({
			url: '<?php echo base_url("home/getKamarId/") ?>'+id,
			method: 'GET',
			dataType: 'JSON',
			success: (data) => {
				$('#editKamar').modal('show');
				$('#edit_harga').val(data.harga);
				$('#edit_id').val(id);
			}
		})
	}

	function add_kamar(){
		$('#modal_show').modal('show');
	}
</script>