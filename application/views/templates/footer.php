      </main>
    </div> 

   <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/simplebar.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.stickOnScroll.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/tinycolor-min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/config.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/d3.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/topojson.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/datamaps.all.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/datamaps-zoomto.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/datamaps.custom.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/gauge.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.sparkline.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/apexcharts.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/apexcharts.custom.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.mask.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.steps.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.timepicker.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/dropzone.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/uppy.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/quill.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/apps.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/daterangepicker.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js'); ?>"></script>
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
   <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Semua"]
            ]
        });
    </script>

        <footer class="text-center" style="margin-top: 50px;">
            <hr>
            <p>&copy; <?= date('Y') ?> SIMRS - Sistem Informasi Manajemen Rumah Sakit</p>
        </footer>
    </body>
</html>
