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
                        <form autocomplete="off" method="PATCH" action="<?= base_url('api/program') ?>" id="form">
                            <input type="hidden" class="form-control border border-info" name="id" placeholder="ID" value="<?= $program['id'] ?>">
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Kode Program</span>
                                </label>
                                <input type="text" class="form-control border border-info" name="kode_program" placeholder="Nama Program" value="<?= $program['kode_program'] ?>" readonly disabled>
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Nama Program</span>
                                </label>
                                <input type="text" class="form-control border border-info" name="name" placeholder="Nama Program" value="<?= $program['name'] ?>">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Nama Penyelenggara</span>
                                </label>
                                <input type="text" class="form-control border border-info" name="organizer" placeholder="Nama Program" value="<?= $program['organizer'] ?>">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Lokasi</span>
                                </label>
                                <input type="text" class="form-control border border-info" name="location" placeholder="Nama Program" value="<?= $program['location'] ?>">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Kuota</span>
                                </label>
                                <input type="text" class="form-control border border-info" name="slot" placeholder="Nama Program" value="<?= $program['slot'] ?>">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Deskripsi</span>
                                </label>
                                <textarea class="form-control border border-info" id="description" name="description" placeholder="Deskripsi" rows="5"><?= $program['description'] ?></textarea>
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Kualifikasi</span>
                                </label>
                                <textarea id="editor" type="text" class="form-control border border-info" name="qualification" placeholder="Deskripsi" rows="5"><?= $program['qualification'] ?></textarea>
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Tanggal Dimulai</span>
                                </label>
                                <input type="date" class="form-control border border-info" name="start_program" placeholder="Nama Program" value="<?= $program['start_program'] ?>">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <span class="border-info">Tanggal Berakhir</span>
                                </label>
                                <input type="date" class="form-control border border-info" name="end_program" placeholder="Nama Program" value="<?= $program['end_program'] ?>">
                                <span class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label>
                                        <span class="border-info">Dokumen</span>
                                    </label>
                                    <span class="fw-bold cursor-pointer" id="add-document">Tambahkan Dokumen</span>
                                </div>
                                <div id="dokumen">
                                </div>
                            </div>


                            <div class="d-md-flex align-items-center justify-content-end">
                                <div class="mt-3 mt-md-0 ms-auto">
                                    <a href="<?= base_url('pengelola/program') ?>" class="btn btn-danger font-weight-medium rounded-pill px-4 ">
                                        <div class="d-flex align-items-center">
                                            <i data-feather="x-circle" class="feather feather-save feather-sm text-white fill-white me-2"></i>
                                            Gak Jadi
                                        </div>
                                    </a>
                                    <button type="submit" class="btn btn-info font-weight-medium rounded-pill px-4 ">
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
            //ajax to get document by id
            const getDocument = async () => {
                $.ajax({
                    url: '<?= base_url('api/program/') ?>' + $('[name="id"]').val(),
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        $('#dokumen').html('<div class="d-flex justify-content-center my-3"><div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                    },
                    success: function(res) {
                        //remove spinner
                        $('#dokumen').html('')
                        // console.log(res);
                        if (!res.error) {
                            let files = res.data.program.files
                            //loop files
                            files.map((item, index) => {

                                //append to #dokumen
                                const html = `<div class="d-flex align-items-center"><a class="cursor-pointer d-flex align-items-center cursor-pointer text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-pdf='${item.pdf}' data-title='${item.name}'>
                            <i class="bi bi-file-earmark-pdf-fill me-2"></i> <span class="fw-bold fs-6">${item.name}</span>
                        </a><i class="ms-2 bi bi-x-lg text-danger cursor-pointer" data-id="${item.id}" id="remove-document"></i></div>`

                                $('#dokumen').append(html)

                            })
                        }
                    },

                })
            }

            getDocument()

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
                        $(document).find('span.invalid-feedback').remove();
                        $(document).find('.is-invalid').removeClass('is-invalid');
                    },
                    success: function(res) {
                        if (res.error) {
                            $.each(res.error, function(key, value) {
                                $('#' + key).addClass('is-invalid');
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
                                window.location.href = "<?= base_url('pengelola/program') ?>";
                            })
                        }
                    }
                })
            })

            $(document).on('click', '#remove-document', function() {
                const id = $(this).data('id')
                const el = $(this)
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Dokumen akan dihapus dari program ini",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',

                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= base_url('api/template/') ?>' + id,
                            type: 'DELETE',
                            dataType: 'json',
                            success: function(res) {
                                if (!res.error) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: res.success,
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(function() {
                                        el.closest('.d-flex').remove()
                                        getDocument()
                                    })
                                }
                            }
                        })
                    }
                })
            })
        })
    </script>
    <?= $this->endSection() ?>