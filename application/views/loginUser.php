<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login User</title>
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

    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="post" action="<?= base_url('auth/login') ?>">
                    <div class="login-form-head">
                        <h4>Login User</h4>
                        <p>Silahkan Masuk, untuk bisa menggunakan Aplikasi</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" required="">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" required="">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Login <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Belum Punya Akun ? <a href="<?= base_url('auth/daftar') ?>">Mendaftar</a></p>
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