


		<div class="home_content_container" style="background: url('<?php echo base_url('assets/img/'.$gallery[0]['foto']) ?>')">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<br>
							<div class="home_location">Bisa Langsung Booking Rumah susun, sesuai Kamar</div>
							<div class="home_text">Membantu anda mendapatkan Kamar dari rumah susun yang sangat layak sekali, dan bisa langsung di bookin juga gayn</div>
							<div class="home_buttons">
								<div class="button home_button"><a href="<?php echo base_url('auth/daftar') ?>">Daftar Sekarang</a></div>
								<div class="button home_button"><a href="<?php echo base_url('auth') ?>">Login</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Intro -->

	<div class="intro">
		<center>
			<h2>GALLERY</h2>
			<hr>
		</center>
		<div class="intro_content d-flex flex-row flex-wrap align-items-start justify-content-between">
			<?php foreach ($gallery as $key): ?>
				<div class="intro_item">
					<div class="intro_image"><img src="<?php echo base_url('assets/img/'.$key['foto']) ?>" alt=""></div>
					<div class="intro_body">
						<div class="intro_title"><a href="#"><?php echo $key['deskripsi'] ?></a></div>
					</div>
				</div>
			<?php endforeach ?>

		</div>
	</div>

	<div class="calendar">
		<div class="container reset_container">
			<div class="row">
				<div class="col-xl-6 calendar_col">
					<div class="calendar_container">
						<div class="calendar_title_bar d-flex flex-row align-items-center justify-content-start">
							<div><div class="calendar_icon"></div></div>
							<div class="calendar_title">Kamar untuk Laki-Laki</div>
						</div>
						<div class="calendar_items" style="overflow:scroll; height:400px;">
							
							<!-- Calendar Item -->
							<?php foreach ($laki as $keys): ?>
								<div class="calendar_item d-flex flex-row align-items-center justify-content-start">
									<div><div class="">
										<a href="<?php echo base_url('auth') ?>">PESAN</a>
									</div></div>
									<div class="calendar_item_time">
										<div><?php echo $keys['code'] ?></div>
										<div>Code Kamar</div>
									</div>
									<div class="calendar_item_text">
										<div>Lantai : <?php echo $keys['tingkat'] ?></div>
										<div><?php echo 'Rp.'.number_format($keys['harga'], 2, ',', '.') ?></div>
									</div>
								</div>
							<?php endforeach ?>

						</div>
					</div>
				</div>

				<div class="col-xl-6 calendar_col">
					<div class="calendar_container">
						<div class="calendar_title_bar d-flex flex-row align-items-center justify-content-start">
							<div><div class="calendar_icon"></div></div>
							<div class="calendar_title">Kamar untuk Perempuan</div>
						</div>
						<div class="calendar_items"  style="overflow:scroll; height:400px;">
							<?php foreach ($cewe as $keys): ?>
								<div class="calendar_item d-flex flex-row align-items-center justify-content-start">
									<div><div class="">
										<a href="<?php echo base_url('auth') ?>"> PESAN</a>
									</div></div>
									<div class="calendar_item_time">
										<div><?php echo $keys['code'] ?></div>
										<div>Code Kamar</div>
									</div>
									<div class="calendar_item_text">
										<div>Lantai : <?php echo $keys['tingkat'] ?></div>
										<div><?php echo 'Rp.'.number_format($keys['harga'], 2, ',', '.') ?></div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- Call to action -->