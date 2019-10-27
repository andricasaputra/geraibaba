    <!-- partial:partials/_footer.html -->
    </div>
    <!-- content-wrapper ends -->
    <footer class="footer">
      <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019
          <a href="<?= base_url() ?>" target="_blank">Gerai Baba</a>. All rights reserved.</span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->

<script src="<?php echo base_url() ?>assets/template/staradmin/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo base_url() ?>assets/template/staradmin/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?php echo base_url() ?>assets/template/staradmin/js/off-canvas.js"></script>
<script src="<?php echo base_url() ?>assets/template/staradmin/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo base_url() ?>assets/template/staradmin/js/dashboard.js"></script>
<!-- End custom js for this page-->

<script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/ckeditor/adapters/jquery.js"></script>

<!-- highcharts online -->
<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->

<!-- highcharts offline -->
<script src="<?php echo base_url() ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/js/app.js"></script>

<script>
  $("textarea.deskripsi").ckeditor();
</script>
</body>

</html>