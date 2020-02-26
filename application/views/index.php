<?php
	$setting = $this->db->get_where('setting', ['id' => 1])->row_array();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Booking Kamar di <?= $setting['nama'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="shortcut icon" href="<?= base_url('assets/img/') ?>rusun.png">

		<link rel="stylesheet" href="<?= base_url('assets/home/') ?>fonts/google.css">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/animate.css">

		<link rel="stylesheet" href="<?= base_url('assets/home/') ?>fonts/flaticon/font/flaticon.css">
		<link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/icomoon.css">
		<link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/aos.css">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/ionicons.min.css">

		<style>
		h4
		{
		 position: relative;
		 width: 100%;
		 font-size: 1.5em;
		 font-weight: bold;
		 padding: 6px 20px 6px 70px;
		 margin: 30px -50px 10px -35px;
		 color: #555;
		 background-color: #999;
		 text-shadow: 0px 1px 2px #bbb;
		 -webkit-box-shadow: 0px 2px 4px #888;
		 -moz-box-shadow: 0px 2px 4px #888;
		 box-shadow: 0px 2px 4px #888;
		}
		</style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html"><span><?= $setting['nama'] ?></span></a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="#" class="nav-link" data-nav-section="home"><span>Home</span></a></li>
	          <li class="nav-item"><a href="#" class="nav-link" data-nav-section="about"><span>About</span></a></li>
	          <li class="nav-item"><a href="#" class="nav-link" data-nav-section="projects"><span>Gallery</span></a></li>
	          <li class="nav-item"><a href="#" class="nav-link" data-nav-section="blog"><span>Booking</span></a></li>
	          <li class="nav-item"><a href="#" class="nav-link" data-nav-section="contact"><span>Contact</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>

    <section class="hero-wrap js-fullheight" style="background-image: url('<?= base_url('assets/home/') ?>images/bg_1.jpg');" data-section="home">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Booking Rusun</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Dengan Cara mudah, cepat, dan Murah</p>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-services ftco-no-pt">
      <div class="container">
        <div class="row services-section">
          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon"><span class="icon-asterisk"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Mendaftar</h3>
                <p>Mendaftar Akun, membantu anda mendapatkan informasi Bookingan Kamar Anda</p>
                <p><a href="<?= base_url('auth/daftar') ?>" class="btn btn-primary">Mendaftar</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon"><span class="icon-user"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Masuk Akun</h3>
                <p>Silahkan Login lalu pilih kamar, ketika anda telah berhasil mendaftar untuk melakukan Penyewaan Kamar</p>
                <p><a href="<?= base_url('auth') ?>" class="btn btn-primary">Masuk</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon"><span class="icon-bookmark-o"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Booking Cepat</h3>
                <p>Anda tidak perlu menunggu Waktu yang lama untuk Booking kamar</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon"><span class="icon-attach_money"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Harga Murah</h3>
                <p>Tidak perlu untuk menghabiskan kantong dompet anda</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon"><span class="oi oi-action-undo"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Cepat Dan Mudah</h3>
                <p>Anda dapat mencari Kamar yang cocok dengan selera anda dengan cepat</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-4 d-flex">
    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(<?= base_url('assets/home/') ?>images/about.jpg);">
    					<div class="request-quote py-5"></div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-8 pl-lg-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<span class="subheading">Selamat Datang di</span>
		            <h2 class="mb-4"><?= $setting['nama'] ?></h2>
		            <p><?= $setting['deskripsi'] ?></p>
		          </div>
		        </div>
		    		<div class="row">
		          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate d-flex">
		            <div class="block-18 text-center p-4 mb-4 align-self-stretch d-flex">
		              <div class="text">
		                <strong><?php echo $laki; ?></strong>
		                <span>Penghuni Laki-Laki</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate d-flex">
		            <div class="block-18 text-center py-4 px-3 mb-4 align-self-stretch d-flex">
		              <div class="text">
		                <strong><?php echo $cewe; ?></strong>
		                <span>Penghuni Perempuan</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-project bg-light" data-section="projects">
    	<div class="container-fluid px-md-5">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Gallery</span>
            <h2 class="mb-4">Gallery Photo</h2>
            <p>ini lah Gallery yang telah kami sediakan</p>
          </div>
        </div>
    		<div class="row">
					<?php foreach ($gallery as $key) { ?>
					<div class="col-md-3">
            <div class="media block-6 services text-center d-block">
              <div class="icon">
								<a href="<?= base_url('assets/img/'.$key['foto']) ?>" class="icon image-popup d-flex"> <img src="<?= base_url('assets/img/'.$key['foto']) ?>" class="img-fluid" alt="Colorlib Template"></a>
							</div>
              <div class="media-body">
                <h3 class="heading mb-3"><?=$key['deskripsi']?></h3>
              </div>
            </div>
          </div>
					<?php } ?>
    		</div>
    	</div>
    </section>

    <section class="ftco-section bg-light" data-section="blog">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Booking</span>
            <h2 class="mb-4">Booking Kamar</h2>
            <p>Kami Menyediakan Booking Kamar khusus Laki-Laki dan Perempuan</p>
          </div>
        </div>
				<div class="heading-section text-center ftco-animate">
					<h2 class="mb-4">Laki-Laki</h2>
				</div>
        <div class="row d-flex">
          <?php for ($i=1; $i <= $juml_lantai; $i++) { ?>
						<div class="col-md-3">
							<a href="<?= base_url('auth') ?>" class="icon d-flex">
		            <div class="media block-6 services text-center d-block">
		              <div class="icon">
										<h4>Lantai <?= $i; ?></h4>
										 <img src="<?= base_url('assets/img/'); ?><?=($kCowokL[$i]=="0")?('kasur-close.png'):('kasur.png');?>" class="img-fluid" alt="Colorlib Template">
									</div>

		              <div class="media-body">
		                <?php if($kCowokL[$i]!="0"){ ?><h3 class="heading mb-3"><?=$hCowokL[$i];?></h3><?php } ?>
										<p>Sisa Kamar : <?= $kCowokL[$i]; ?></p>
		              </div>

		            </div>
							</a>
	          </div>

					<?php } ?>
        </div>

				<div class="heading-section text-center ftco-animate">
					<h2 class="mb-4">Perempuan</h2>
				</div>
        <div class="row d-flex">
          <?php for ($i=1; $i <= $juml_lantai; $i++) { ?>
						<div class="col-md-3">
							<a href="<?= base_url('auth') ?>" class="icon d-flex">
		            <div class="media block-6 services text-center d-block">
		              <div class="icon">
										<h4>Lantai <?= $i; ?></h4>
										 <img src="<?= base_url('assets/img/'); ?><?=($kCewekL[$i]=="0")?('kasur-close.png'):('kasur.png');?>" class="img-fluid" alt="Colorlib Template">
									</div>

		              <div class="media-body">
		                <?php if($kCewekL[$i]!="0"){ ?><h3 class="heading mb-3"><?=$hCewekL[$i];?></h3><?php } ?>
										<p>Sisa Kamar : <?= $kCewekL[$i]; ?></p>
		              </div>
		            </div>
							</a>
	          </div>

					<?php } ?>
        </div>


      </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" data-section="contact">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Contact</span>
            <h2 class="mb-4">Contact Us</h2>
          </div>
        </div>
        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-secondary py-3 px-5">
              </div>
            </form>

          </div>

          <div class="col-md-6 d-flex">
          	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3302.7940866947383!2d107.16288255052795!3d-6.302955258652154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b3b8774791d%3A0xabdc149ae228469c!2sRumah%20Susun%20Sewa%20BPJS%20Ketenagakerjaan!5e0!3m2!1sid!2sid!4v1581442345512!5m2!1sid!2sid" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-6 col-lg-4 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">Address</h3>
	            <p><a target="_blank" href="http://maps.google.com/maps?q=<?=str_replace(" ","+",$setting['alamat']);?>">
								<?= $setting['alamat'] ?></a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-4 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel://<?= $setting['no_telp'] ?>"><?= $setting['no_telp'] ?></a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-4 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:<?= $setting['email'] ?>"><?= $setting['email'] ?></a></p>
	          </div>
          </div>

        </div>
      </div>
    </section>

		<!-- Large modal -->

		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      ini isinya gimana dah
		    </div>
		  </div>
		</div>


    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><?= $setting['nama'] ?></h2>
              <p><?= substr($setting['deskripsi'], 0, 100) ?>...</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2" data-nav-section="home"></span>Home</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2" data-nav-section="about"></span>About</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2" data-nav-section="blog"></span>Booking</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2" data-nav-section="projects"></span>Gallery</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2" data-nav-section="contact"></span>Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="<?= base_url() ?>" target="_blank"><?= $setting['nama'] ?></a></p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?= base_url('assets/home/') ?>js/jquery.min.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/popper.min.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/jquery.stellar.min.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/aos.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/jquery.animateNumber.min.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/scrollax.min.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/google-map.js"></script>
  <script src="<?= base_url('assets/home/') ?>js/main.js"></script>

  </body>
</html>
