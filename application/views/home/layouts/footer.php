</div>

            <?php $setting = $this->db->get_where('setting', ['id' => 1])->row_array(); ?>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright <?php echo date('Y') ?>. <?= $setting['nama'] ?>  All right reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>


    <!-- <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script> -->
    <!-- bootstrap 4 js -->
    <script src="<?= base_url('assets/theme/') ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/metisMenu.min.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/jquery.slicknav.min.js"></script>
    <script src="<?= base_url('assets/plugin/') ?>jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/clock/dist/') ?>bootstrap-clockpicker.min.js"></script>
    <!-- all line chart activation -->
    <script src="<?= base_url('assets/theme/') ?>assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="<?= base_url('assets/theme/') ?>assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="<?= base_url('assets/theme/') ?>assets/js/plugins.js"></script>
    <script src="<?= base_url('assets/theme/') ?>assets/js/scripts.js"></script>

</body>

</html>
