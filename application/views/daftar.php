<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mendaftar Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/typography.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?= base_url('assets/theme/') ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>


<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="post" action="<?= base_url('auth/daftar_user') ?>">
                    <div class="login-form-head">
                        <h4>Mendaftar</h4>
                        <p>Silahkan untuk mendaftar untuk Login Aplikasi</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputName1">Nik</label>
                            <input type="text" name="nik" required="">
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" name="nama" required="">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" required="">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" min="6" required="">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputName1">No Telepon</label>
                            <input type="text" id="number" name="no_telp" required="">
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputName1">Alamat</label>
                            <input type="text" name="alamat" required="">
                        </div>
                        <div class="form-gp">
                            <select class="form-control" name="gender">
                                <option>-- Gender --</option>
                                <option value="1">Laki - Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>

                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Sudah Punya Akun? <a href="<?= base_url('auth') ?>">Masuk</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="<?= base_url('assets/theme/') ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="<?= base_url('assets/theme/') ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/metisMenu.min.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="<?= base_url('assets/theme/') ?>assets/js/plugins.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/scripts.js"></script>
</body>

</html>
