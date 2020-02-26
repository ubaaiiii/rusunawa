<?php
    // if (empty($_SESSION['id'])) {
    //     return header('Location: ' . base_url('auth'));
    // }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url('assets/img/') ?>rusun.png">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/slicknav.min.css">
    <!-- amchart css -->

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugin/') ?>jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/clock/dist/') ?>bootstrap-clockpicker.min.css">

    <!-- others css -->
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/typography.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url('assets/theme/') ?>assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- jquery latest version -->
    <script src="<?= base_url('assets/theme/') ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
</head>

<body>
    <?php $setting = $this->db->get_where('setting', ['id' => 1])->row_array(); ?>
    <?php
        if (empty($_SESSION['admin'])) {
            $user = $this->db->get_where('users', ['nik' => $_SESSION['nik']])->row_array();
        } else {
            $user = $this->db->get_where('admin', ['id' => $_SESSION['id']])->row_array();
        }
    ?>
    <?php $booking = $this->db->get_where('booking', ['status' => 0])->num_rows(); ?>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="<?=base_url('home/profile');?>"><img style="border-radius: 100%" src="<?= base_url('assets/img/'.$user['foto']) ?>" alt="logo"></a>
                    <center>
                        <br>
                        <b style="color: white"><?php echo $_SESSION['nama'] ?></b>
                    </center>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">

                            <li><a href="<?= base_url('home') ?>"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                            <li><a href="<?= base_url('booking') ?>">
                                <?php if (!empty($_SESSION['admin'])): ?>
                                    <i class="ti-bookmark"></i> <span>Booking</span>
                                    <?php if ($booking > 0): ?>
                                        <span class="badge badge-danger"><?= $booking ?> Notif</span>
                                    <?php endif ?>
                                </a>
                                <?php else: ?>
                                    <i class="ti-bookmark"></i> <span>Booking</span></a>
                                <?php endif; ?>
                            </li>
                            <li><a href="<?= base_url('home/profile') ?>"><i class="ti-user"></i> <span>My Profile</span></a></li>
                            <li><a href="<?= base_url('home/reset_pass') ?>"><i class="ti-key"></i> <span>Reset Password</span></a></li>

                            <?php if (!empty($_SESSION['admin'])) {
        ?>
                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bookmark"></i><span> Kamar</span></a>
                                    <ul class="collapse">
                                        <li><a href="<?= base_url('home/kamar') ?>">Management</a></li>
                                        <li><a href="<?= base_url('home/sisa_waktu') ?>">Sisa Waktu</a></li>
                                    </ul>
                                </li>
                                <?php
    } ?>

                            <?php if (!empty($_SESSION['admin'])) {
        ?>
                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span> Laporan</span></a>
                                    <ul class="collapse">
                                        <li><a href="<?= base_url('home/report_keuangan') ?>">Keuangan</a></li>
                                    </ul>
                                </li>
                                <?php
    } ?>

                            <?php
                                if (!empty($_SESSION['admin'])) {
                                    ?>
                                <li><a href="<?= base_url('home/pembayaran') ?>"><i class="ti-layout-sidebar-left"></i> <span>Pembayaran</span></a></li>
                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bookmark"></i><span> Users</span></a>
                                    <ul class="collapse">
                                        <li><a href="<?= base_url('home/users') ?>"><i class="ti-user"></i> <span>User</span></a></li>
                                        <li><a href="<?= base_url('home/add_admin') ?>"><i class="ti-user"></i> <span>Admin</span></a></li>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url('home/gallery') ?>"><i class="ti-gallery"></i> <span>Gallery</span></a></li>
                                <li><a href="<?= base_url('home/settings') ?>"><i class="ti-settings"></i> <span>Setting</span></a></li>
                                    <?php
                                }
                            ?>
                            <li><a href="<?= base_url('auth/logout') ?>"><i class="ti-door"></i> <span>Keluar</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                </div>
            </div>
            <!-- header area end -->

            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
