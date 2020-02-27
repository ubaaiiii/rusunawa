<div class="row">
    <div class="col-md-3">
        <div class="single-report mb-xs-30">
            <div class="s-report-inner pr--20 pt--30 mb-3">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="s-report-title d-flex justify-content-between">
                    <h4 class="header-title mb-0">User Laki-Laki</h4>

                </div>
                <div class="d-flex justify-content-between pb-2">
                    <h2><?php echo $laki ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="single-report mb-xs-30">
            <div class="s-report-inner pr--20 pt--30 mb-3">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="s-report-title d-flex justify-content-between">
                    <h4 class="header-title mb-0">User Perempuan</h4>

                </div>
                <div class="d-flex justify-content-between pb-2">
                    <h2><?php echo $cewe ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="single-report mb-xs-30">
            <div class="s-report-inner pr--20 pt--30 mb-3">
                <div class="icon"><i class="fa fa-bed"></i></div>
                <div class="s-report-title d-flex justify-content-between">
                    <h4 class="header-title mb-0">Jumlah Kamar</h4>

                </div>
                <div class="d-flex justify-content-between pb-2">
                    <h2><?php echo $kamar ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="single-report mb-xs-30">
            <div class="s-report-inner pr--20 pt--30 mb-3">
                <div class="icon"><i class="fa fa-bed"></i></div>
                <div class="s-report-title d-flex justify-content-between">
                    <h4 class="header-title mb-0">Sisa Kamar</h4>

                </div>
                <div class="d-flex justify-content-between pb-2">
                    <h2><?php echo $sisa ?></h2>
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-6">
        <hr>
        <div class="card">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-phone"></i> Contact Admin
            </div>
            <div class="card-body">
                <center>
                    <img src="<?= base_url('assets/img/whatsapp.png'); ?>" style="width: 20%">
                </center>
                <hr>
                <?php
                  ;
                  foreach ($admin as $admins):
                    $ptn = "/^0/";  // Regex
                    $str = $admins['no_telp']; //Your input, perhaps $_POST['textbox'] or whatever
                    $rpltxt = "+62";  // Replacement string?>
                    <div class="form-group">
                        <a target="_blank" href="https://wa.me/<?= preg_replace($ptn, $rpltxt, $str); ?>"><i class="fa fa-phone"></i> Contact Admin : <?php echo $admins['nama'] ?></a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</div>
