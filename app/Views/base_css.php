
<!-- Google Font: Source Sans Pro -->
<style>
  /* source-sans-pro-300 - latin */
  @font-face {
    font-family: 'Source Sans Pro';
    font-style: normal;
    font-weight: 300;
    src:url('<?= base_url("fonts/source-sans-pro-v14-latin-300.eot") ?>'); /* IE9 Compat Modes */
    src: local(''),
    url('<?= base_url("fonts/source-sans-pro-v14-latin-300.eot?#iefix") ?>') format('embedded-opentype'), /* IE6-IE8 */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-300.woff2") ?>') format('woff2'), /* Super Modern Browsers */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-300.woff") ?>') format('woff'), /* Modern Browsers */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-300.ttf") ?>') format('truetype'), /* Safari, Android, iOS */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-300.svg#SourceSansPro") ?>') format('svg'); /* Legacy iOS */
  }
  /* source-sans-pro-regular - latin */
  @font-face {
    font-family: 'Source Sans Pro';
    font-style: normal;
    font-weight: 400;
    src:url('<?= base_url("fonts/source-sans-pro-v14-latin-regular.eot") ?>'); /* IE9 Compat Modes */
    src: local(''),
    url('<?= base_url("fonts/source-sans-pro-v14-latin-regular.eot?#iefix") ?>') format('embedded-opentype'), /* IE6-IE8 */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-regular.woff2") ?>') format('woff2'), /* Super Modern Browsers */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-regular.woff") ?>') format('woff'), /* Modern Browsers */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-regular.ttf") ?>') format('truetype'), /* Safari, Android, iOS */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-regular.svg#SourceSansPro") ?>') format('svg'); /* Legacy iOS */
  }
  @font-face {
    font-family: 'Source Sans Pro';
    font-style: italic;
    font-weight: 400;
    src:url('<?= base_url("fonts/source-sans-pro-v14-latin-italic.eot") ?>'); /* IE9 Compat Modes */
    src: local(''),
    url('<?= base_url("fonts/source-sans-pro-v14-latin-italic.eot?#iefix") ?>') format('embedded-opentype'), /* IE6-IE8 */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-italic.woff2") ?>') format('woff2'), /* Super Modern Browsers */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-italic.woff") ?>') format('woff'), /* Modern Browsers */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-italic.ttf") ?>') format('truetype'), /* Safari, Android, iOS */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-italic.svg#SourceSansPro") ?>') format('svg'); /* Legacy iOS */
  }
  /* source-sans-pro-700 - latin */
  @font-face {
    font-family: 'Source Sans Pro';
    font-style: normal;
    font-weight: 700;
    src:url('<?= base_url("fonts/source-sans-pro-v14-latin-700.eot") ?>'); /* IE9 Compat Modes */
    src: local(''),
    url('<?= base_url("fonts/source-sans-pro-v14-latin-700.eot?#iefix") ?>') format('embedded-opentype'), /* IE6-IE8 */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-700.woff2") ?>') format('woff2'), /* Super Modern Browsers */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-700.woff") ?>') format('woff'), /* Modern Browsers */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-700.ttf") ?>') format('truetype'), /* Safari, Android, iOS */
    url('<?= base_url("fonts/source-sans-pro-v14-latin-700.svg#SourceSansPro") ?>') format('svg'); /* Legacy iOS */
  }
</style>
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('plugins/bs-stepper/css/bs-stepper.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('plugins/toastr/toastr.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('plugins/spinjs/spin.css') ?>">
<link rel="stylesheet" href="<?= base_url('plugins/lightbox/css/lightbox.min.css') ?>">

<?= $this->renderSection('import-css') ?>

<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">

<?= $this->renderSection('inline-css') ?>
<style>
  .table .btn-group {
    white-space: nowrap;
  }
  .table .btn-group .btn {
    display: inline-block;
    float: none;
  }
  .table .btn-group .btn + .btn {
    margin-left: -5px;
  }

  .table .btn {
    display: inline-block;
    float: none;
  }
  #content-hasil > p {
    margin: 0px;
    letter-spacing: 1px;
  }

  #content-hasil > .hasil-stemming {
    margin-top: 10px;
  }
</style>