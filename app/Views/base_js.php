<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('plugins/bs-stepper/js/bs-stepper.min.js') ?>"></script>
<script src="<?= base_url('plugins/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('plugins/spinjs/spin.umd.js') ?>"></script>
<script src="<?= base_url('plugins/lightbox/js/lightbox.min.js') ?>"></script>

<?= $this->renderSection('import-js') ?>

<!-- AdminLTE App -->
<script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>

<script>
    function showSpinner() {
        // Initialize
        if ($('.kintone-spinner').length == 0) {
            // Create elements for the spinner and the background of the spinner
            var spin_div = $('<div id ="kintone-spin" class="kintone-spinner"></div>');
            var spin_bg_div = $('<div id ="kintone-spin-bg" class="kintone-spinner"></div>');

            // Append spinner to the body
            $(document.body).append(spin_div, spin_bg_div);

            // Set a style for the spinner
            $(spin_div).css({
                'position': 'fixed',
                'top': '50%',
                'left': '50%',
                'z-index': '25005',
                'padding': '26px',
                '-moz-border-radius': '4px',
                '-webkit-border-radius': '4px',
                'border-radius': '4px'
            });
            $(spin_bg_div).css({
                'position': 'fixed',
                'top': '0px',
                'left': '0px',
                'z-index': '2500',
                'width': '100%',
                'height': '200%',
                'background-color': '#000',
                'opacity': '0.5',
                'filter': 'alpha(opacity=50)',
                '-ms-filter': "alpha(opacity=50)"
            });

            // Set options for the spinner
            var opts = {
                'color': '#fff'
            };

            // Create the spinner
            new Spin.Spinner(opts).spin(document.getElementById('kintone-spin'));
        }

        // Display the spinner
        $('.kintone-spinner').show();
    }

    // Function to hide the spinner
    function hideSpinner() {
        // Hide the spinner
        $('.kintone-spinner').hide();
    }
</script>
<?= $this->renderSection('inline-js') ?>
<script>
</script>