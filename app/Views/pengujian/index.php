<?= $this->extend('top_layout') ?>
<?= $this->section('inline-css') ?>
<style>
    .wrapper-opsi {
        margin: 0 auto;
        width: 100%;
        border: 1px solid #ced4da;
        padding: 50px 100px;

    }

    .opsi {
        width: 50%;
        height: 400px;
        float: left;
        padding: 10px;
    }

    .opsi:hover {
        background-color: var(--green);
        cursor: pointer;
    }

    .opsi img {
        display: block;
        margin: auto;
        width: 100%;
        height: 100%;
    }

    .btn-navigasi {
        margin-top: 20px;
    }

    @media screen and (max-width: 768px) {
        .wrapper-opsi {
            padding: 0px;
        }
    }
</style>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pengujian</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 text-right">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="content-area">
                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <!-- your steps here -->
                                    <div class="step" data-target="#logins-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Bagian Atas</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Bagian Tengah</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#bawah-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="bawah-part" id="bawah-part-trigger">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Bagian Bawah</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <!-- your steps content here -->
                                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                                        <div class="wrapper-opsi">

                                            <div class="opsi">
                                                <img class="atas" data-tipe="atas" data-jawaban="B" src="<?= base_url() . '/uploads/' . $data_master['atas']['B']['file'] ?>" alt="">

                                            </div>
                                            <div class="opsi">
                                                <img class="atas" data-tipe="atas" data-jawaban="S" src="<?= base_url() . '/uploads/' . $data_master['atas']['S']['file'] ?>" alt="">

                                            </div>
                                            <div class="clearfix"></div>

                                        </div>


                                        <div class="btn-navigasi text-right">
                                            <button class="btn btn-primary" onclick="stepper.next()">Selanjutnya</button>

                                        </div>
                                    </div>
                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                                        <div class="wrapper-opsi">
                                            <div class="opsi">
                                                <img class="tengah" data-tipe="tengah" data-jawaban="B" src="<?= base_url() . '/uploads/' . $data_master['tengah']['B']['file'] ?>" alt="">

                                            </div>
                                            <div class="opsi">
                                                <img class="tengah" data-tipe="tengah" data-jawaban="S" src="<?= base_url() . '/uploads/' . $data_master['tengah']['S']['file'] ?>" alt="">

                                            </div>
                                            <div class="clearfix"></div>

                                        </div>
                                        <div class="btn-navigasi text-right">

                                            <button class="btn btn-primary" onclick="stepper.previous()">Sebelumnya</button>
                                            <button class="btn btn-primary" onclick="stepper.next()">Selanjutnya</button>
                                        </div>
                                    </div>
                                    <div id="bawah-part" class="content" role="tabpanel" aria-labelledby="bawah-part-trigger">
                                        <div class="wrapper-opsi">
                                            <div class="opsi">
                                                <img class="bawah" data-tipe="bawah" data-jawaban="B" src="<?= base_url() . '/uploads/' . $data_master['bawah']['B']['file'] ?>" alt="">

                                            </div>
                                            <div class="opsi">
                                                <img class="bawah" data-tipe="bawah" data-jawaban="S" src="<?= base_url() . '/uploads/' . $data_master['bawah']['S']['file'] ?>" alt="">

                                            </div>
                                            <div class="clearfix"></div>

                                        </div>
                                        <div class="btn-navigasi text-right">

                                            <button class="btn btn-primary" onclick="stepper.previous()">Sebelumnya</button>
                                            <button type="button" id="btn-submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('inline-js') ?>
<script>
    var stepper;
    $(document).ready(function() {
        stepper = new Stepper($('.bs-stepper')[0]);
        var opsi = {
            'atas': null,
            'bawah': null,
            'tengah': null,
        };

        var errors = [];

        $(".opsi").click(function(e) {

            var tipe = $(this).find('img').data('tipe');
            var jawaban = $(this).find('img').data('jawaban');
            opsi[tipe] = jawaban;
            console.log(opsi);
            $(this).siblings('.opsi').css({
                'backgroundColor': ''
            });
            $(this).css({
                'backgroundColor': "#00bc8c"
            });
        });

        $('#btn-submit').click(function(e) {


            if (opsi['atas'] == null) {
                errors.push('Pilihan atas tidak boleh kosong');
            }
            if (opsi['tengah'] == null) {
                errors.push('Pilihan tengah tidak boleh kosong');
            }
            if (opsi['bawah'] == null) {
                errors.push('Pilihan bawah tidak boleh kosong');
            }

            if (errors.length > 0) {
                errors.forEach(element => {
                    toastr.error(element);

                });
                errors = [];
                return;
            }

            showSpinner();
            $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>" + "/pengujian/uji",
                    data: opsi,
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            $(".content-area").html(response.html);
                        }
                    }
                })
                .always(function(e) {
                    hideSpinner();
                });
        })


    });
</script>
<?= $this->endSection() ?>