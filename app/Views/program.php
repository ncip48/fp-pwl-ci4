<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container program mt-4">
    <div class="d-flex align-items-center mb-2">
        <h3 class="fw-bold me-2 mb-0"><?= $category ?? "Semua Program" ?></h3>
    </div>
    <div class="card p-2">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-lg-5">
                    <div class="input-group mb-0">
                        <!-- input with icon in left bootstrap 5 -->
                        <span class="input-group-text bg-white border-end-0" id="button-addon1"><i class="bi bi-search bg-gray-input"></i></span>
                        <input id="query" name="query" type="text" class="form-control border-start-0 ps-0" placeholder="Cari program" aria-label="Cari program" aria-describedby="button-addon2" autocomplete="false">
                    </div>
                </div>


                <div class="col-12 col-lg-5">
                    <div class="input-group mb-0">
                        <!-- input with icon in left bootstrap 5 -->
                        <span class="input-group-text bg-white border-end-0" id="button-addon1"><i class="bi bi-geo-alt-fill bg-gray-input"></i></span>
                        <input id="location" name="location" type="text" class="form-control border-start-0 ps-0" placeholder="Lokasi" aria-label="Lokasi" aria-describedby="button-addon2" autocomplete="false">
                    </div>
                </div>
                <div class="col-12 col-lg-2">
                    <button class="btn btn-primary w-100 fw-bold" id="btn-search-program">Cari</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 filter-program d-none">
        <span class="badge bg-warning text-dark px-3 py-2 w-100 fw-normal fs-6 text-start">
            Mencari dengan kata kunci <span class="fw-bold" id="keyword">Semua Program</span>, Lokasi <span class="fw-bold" id="location-keyword">Semua Lokasi</span>
            <span class="text-underlined cursor-pointer" id="reset-filter">
                <i class="bi bi-x-circle-fill ms-2"></i>
                Hapus Filter
            </span>
        </span>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-lg-4 container-program">
            <div class="d-flex justify-content-center spinner-category py-5 align-items-center">
                <span class="spinner-grow spinner-grow-md text-dark me-2" role="status" aria-hidden="true">
                </span>
                Memuat...
            </div>
            <div class="row hidden-md-up list-program gy-2 gx-1 content-category d-none">
            </div>
        </div>
        <div class="col-12 col-lg-8 container-detail-program">
            <div class="card h-100 card-content">
                <div class="card-header card-header-detail d-none bg-white">
                    <h4 class="fw-bold">Informasi Kegiatan</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex d-none justify-content-center spinner-detail py-5 h-100 align-items-center">
                        <span class="spinner-grow spinner-grow-md text-dark me-2" role="status" aria-hidden="true">
                        </span>
                        Memuat...
                    </div>
                    <div class="hidden-md-up content-detail h-100">
                        <span class="text-muted detail-program d-flex justify-content-center align-items-center h-100">Pilih program dahulu yang ingin kamu ikuti</span>
                    </div>
                </div>
            </div>
            <div class="card card-files d-none mt-2">
                <div class="card-header bg-white">
                    <h4 class="fw-bold">Berkas</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column files">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fs-6" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="text-muted">Dokumen ini tidak perlu di download, dokumen ini hanya template yang akan diisi langsung pada saat mendaftar</span>
                    <div class="modal-body-files">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('customScripts') ?>
<script>
    $(document).ready(function() {
        getDetail = function(id) {
            const url = '<?= base_url('api/program/') ?>' + id
            let html = ''
            let detail_program = $('.content-detail')
            $('.spinner-detail').removeClass('d-none')
            $('.content-detail').addClass('d-none')
            $('.card-header-detail').addClass('d-none')
            detail_program.empty()
            $.ajax({
                type: 'GET',
                url,
                success: function(data, status) {
                    //handle if error
                    if (data.status == 'error') {
                        throw new Error(data.message)
                    }
                    const {
                        program
                    } = data.data
                    //looping categories
                    //append to html
                    html += `
                        <div class="d-lg-flex justify-content-between align-items-start">
                            <div>
                                <h6 class='h6'><span class="badge rounded bg-success">${program.category_name}</span></h6>
                                <img src="<?= base_url('images/program/') ?>${program.image}" class="rounded mt-2" alt="..." height="70" width="70">
                                <p class="text-justify fw-bolder h5 mt-1">${program.name}</p>
                                <p class="text-justify mb-2"><i class="bi bi-geo-alt-fill me-1"></i>${program.organizer} di ${program.location}</p>
                            </div>
                            <div class="d-flex" align-items-center>
                                <button class="btn btn-primary h-100 fw-bold px-4 py-2 me-2"><i class="bi bi-pencil-square me-2"></i>Daftar</button>
                                <button class="btn btn-danger h-100 fw-bold px-3 py-2"><i class="bi bi-heart"></i></button>
                            </div>
                        </div>
                        <small class="text-justify text-muted">Kode Program</small>
                        <p class="text-justify mb-1"><i class="bi bi-tag-fill me-1"></i>${program.kode_program}</p>
                        <small class="text-justify text-muted">Kuota</small>
                        <p class="text-justify mb-1"><i class="bi bi-person-fill me-1"></i>${program.slot} peserta</p>
                        <small class="text-justify text-muted">Periode Kegiatan</small>
                        <p class="text-justify mb-3"><i class="bi bi-calendar3 me-1"></i>${program.start_program} - ${program.end_program} (${program.duration})</p>
                        <hr />
                        <h6 class="h6 fw-bold">Deskripsi Kegiatan</h6>
                        <p class="text-justify">${program.description}</p>
                        <hr />
                        <h6 class="h6 fw-bold">Kualifikasi</h6>
                        <p class="text-justify">${program.qualification}</p>`
                    //append to program
                    detail_program.append(html)
                    $('.card-header-detail').removeClass('d-none')
                    $('.card-content').removeClass('h-100')
                    $('.spinner-detail').addClass('d-none')
                    $('.content-detail').removeClass('d-none')
                    $('.card-files').removeClass('d-none')
                    var fileHtml = $('.files')
                    fileHtml.empty()
                    var files = program.files
                    if (files.length == 0) {
                        $('.files').append(`<span class="text-muted">Tidak ada berkas</span>`)
                    } else {
                        files.map((item, index) => {
                            fileHtml.append(`<a class="d-flex align-items-center cursor-pointer text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-pdf='${item.pdf}' data-title='${item.name}'>
                            <i class="bi bi-file-earmark-pdf-fill me-2"></i> <span class="fw-bold fs-6">${item.name}</span>
                        </a>`)
                        })
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error)
                    $('.spinner-detail').addClass('d-none')
                    $('.content-detail').removeClass('d-none')
                    detail_program.append(`<div class="col-md-12 text-center py-5 h-100 d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-column align-items-center">
                    <h6 class="fw-bold">Terjadi Kesalahan</h6>
                    <p class="text-center">Silahkan refresh halaman ini</p>
                    </div>
                </div>`)
                }
            })
        }
        const getPrograms = () => {
            $('.spinner-category').removeClass('d-none')
            $('.content-category').addClass('d-none')
            $('.list-program').empty()
            $('.filter-program').addClass('d-none')
            $('.card-content').addClass('h-100')
            $('.card-header-detail').addClass('d-none')
            $('.card-files').addClass('d-none')
            const url = '<?= base_url('api/programs') ?>'
            let html = ''
            let program = $('.list-program')
            let slug = "<?= $slug ?? '' ?>"
            let formData = {
                query: $('#query').val(),
                location: $('#location').val(),
                category: "<?= $slug ?? '' ?>",
            }
            $('.content-detail').html('<span class="text-muted detail-program d-flex justify-content-center align-items-center h-100">Pilih program dahulu yang ingin kamu ikuti</span>')
            $.ajax({
                type: 'POST',
                url,
                data: formData,
                dataType: 'json',
                encode: true,
                success: function(data, status) {
                    //handle if error
                    if (data.status == 'error') {
                        throw new Error(data.message)
                    }
                    const {
                        programs
                    } = data.data
                    //looping categories

                    if ($('#query').val() != '' || $('#location').val() != '') {
                        $('.filter-program').removeClass('d-none')
                        $('#keyword').text($('#query').val())
                        if ($('#location').val() != '') {
                            $('#location-keyword').text($('#location').val())
                        }
                    }

                    if (programs.length == 0) {
                        $('.list-program').append(`<div class="col-md-12 text-center py-5">
                            <h6 class="fw-bold">Tidak ada program</h6>
                            <p class="text-center">Silahkan cari program lainnya</p>
                        </div>`)
                        $('.spinner-category').addClass('d-none')
                        $('.content-category').removeClass('d-none')

                        return
                    }
                    programs.map((item, index) => {
                        //append to html
                        html += `<div class="card cursor-pointer" id="program-${item.id}" onclick="getDetail(${item.id})">
                                    <div class="card-body">
                                        ${slug == '' ? `<h6 class='h6'><span class="badge rounded bg-success">${item.category_name}</span></h6>` : ''}
                                        <p class="text-justify fw-bolder">${item.name}</p>
                                        <p class="text-justify">${item.organizer}</p>
                                        <small class="text-justify text-muted"><i class="bi bi-geo-alt-fill"></i> ${item.location}</small>
                                    </div>
                                </div>`
                    })
                    //append to program
                    program.append(html)
                    $('.spinner-category').addClass('d-none')
                    $('.content-category').removeClass('d-none')
                    $('.spinner-detail').addClass('d-none')
                    $('.content-detail').removeClass('d-none')
                },
                error: function(xhr, status, error) {
                    console.log(error)
                    $('.spinner-category').addClass('d-none')
                    $('.content-category').removeClass('d-none')
                    $('.spinner-detail').addClass('d-none')
                    $('.content-detail').removeClass('d-none')
                    $('.list-program').append(`<div class="col-md-12 text-center py-5">
                    <h6 class="fw-bold">Terjadi Kesalahan</h6>
                    <p class="text-center">Silahkan refresh halaman ini</p>
                </div>`)
                }
            })
        }
        getPrograms()

        //disable button
        $('#btn-search-program').attr('disabled', true)

        $('#query').keyup(function(e) {
            if ($('#query').val() == '') {
                //disable button
                $('#btn-search-program').attr('disabled', true)
            } else {
                $('#btn-search-program').attr('disabled', false)
            }
        })

        $('#btn-search-program').click(function() {
            if ($('#query').val() == '') {
                return
            }
            getPrograms()
        })

        $('#reset-filter').click(function() {
            $('#query').val('')
            $('#location').val('')
            getPrograms()
            $('.filter-program').addClass('d-none')
            $('#btn-search-program').attr('disabled', true)
        })

        //pass staticBackdrop modal data-pdf to modal-body-files
        $('#staticBackdrop').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var pdf = button.data('pdf') // Extract info from data-* attributes
            var modal = $(this)
            var title = button.data('title')
            modal.find('.modal-title').text(title)
            //find modal-body-files then append pdf and add #toolbar=0
            modal.find('.modal-body-files').html(`<object type="application/pdf" data="<?= base_url('file/pdf/') ?>${pdf}#toolbar=0" width="100%" height="500" style="height: 85vh;">No Support</object>`)
        })
    });
</script>
<?= $this->endSection() ?>