<?= $this->extend('pengelola/layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12 align-self-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="link"><i class="mdi mdi-home fs-5"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Programs
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Program
                        </li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Edit Program</h1>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================= -->
    <!-- Container fluid  -->
    <!-- ============================================================= -->
    <div class="container-fluid">
        <!-- ============================================================= -->
        <!-- Start Page Content -->
        <!-- ============================================================= -->
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Program</h4>
                        <h5 class="card-subtitle mb-3 pb-3 border-bottom">
                            silahkan input untuk mengedit program
                        </h5>
                        <form autocomplete="off" method="POST" action="<?= base_url('api/program') ?>" id="form">
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Nama Program</span>
                                </label>
                                <input type="text" class="form-control border border-info" name="name" placeholder="Nama Program">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Nama Penyelenggara</span>
                                </label>
                                <input type="text" class="form-control border border-info" name="organizer" placeholder="Nama Program">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Lokasi</span>
                                </label>
                                <input type="text" class="form-control border border-info" name="location" placeholder="Nama Program">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Kuota</span>
                                </label>
                                <input type="text" class="form-control border border-info" name="slot" placeholder="Nama Program">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Deskripsi</span>
                                </label>
                                <textarea class="form-control border border-info" id="description" name="description" placeholder="Deskripsi" rows="5"></textarea>
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Kualifikasi</span>
                                </label>
                                <textarea id="editor" type="text" class="form-control border border-info" name="qualification" placeholder="Deskripsi" rows="5"></textarea>
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Tanggal Dimulai</span>
                                </label>
                                <input type="date" class="form-control border border-info" name="start_program" placeholder="Nama Program">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Tanggal Berakhir</span>
                                </label>
                                <input type="date" class="form-control border border-info" name="end_program" placeholder="Nama Program">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="d-md-flex align-items-center justify-content-end">
                                <div class="mt-3 mt-md-0 ms-auto">
                                    <a href="<?= base_url('pengelola/program') ?>" class="btn btn-danger font-weight-medium rounded-pill px-4 ">
                                        <div class="d-flex align-items-center">
                                            <i data-feather="x-circle" class="feather feather-save feather-sm text-white fill-white me-2"></i>
                                            Gak Jadi
                                        </div>
                                    </a>
                                    <button type="submit" class="btn btn-info font-weight-medium rounded-pill px-4 " id="submit-form">
                                        <div class="d-flex align-items-center">
                                            <i data-feather="send" class="feather feather-save feather-sm text-white fill-white me-2"></i>
                                            Simpan
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <!-- ============================================================= -->
        <!-- End PAge Content -->
        <!-- ============================================================= -->
    </div>
    <!-- ============================================================= -->
    <!-- End Container fluid  -->
    <!-- ============================================================= -->
    <!-- ============================================================= -->


    <?= $this->endSection() ?>


    <?= $this->section('customScripts') ?>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {

            $('#form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    //raw input send
                    data: JSON.stringify({
                        id: $('[name="id"]').val(),
                        name: $('[name="name"]').val(),
                        organizer: $('[name="organizer"]').val(),
                        location: $('[name="location"]').val(),
                        slot: $('[name="slot"]').val(),
                        description: $('#description').val(),
                        qualification: $('[name="qualification"]').val(),
                        start_program: $('[name="start_program"]').val(),
                        end_program: $('[name="end_program"]').val(),
                    }),
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        // $(document).find('span.invalid-feedback').remove();
                        // $(document).find('.is-invalid').removeClass('is-invalid');
                        $('#submit-form').html('<div class="spinner-border spinner-border-sm text-white" role="status"><span class="visually-hidden">Loading...</span></div>');
                        $('#submit-form').attr('disabled', true);
                    },
                    success: function(res) {
                        $('#submit-form').html('<i data-feather="send" class="feather feather-save feather-sm text-white fill-white me-2"></i>Simpan');
                        $('#submit-form').attr('disabled', false);
                        if (res.error) {
                            $.each(res.error, function(key, value) {
                                $('#' + key).addClass('is-invalid');
                                //remove border primary and border
                                $('#' + key).removeClass('border');
                                $('#' + key).removeClass('border-primary');
                                $('#' + key).closest('.form-group').find('.invalid-feedback').html(value);
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: res.success,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location.href = "<?= base_url('pengelola/program/') ?>" + res.data;
                            })
                        }
                    }
                })
            })
        })
    </script>
    <?= $this->endSection() ?>