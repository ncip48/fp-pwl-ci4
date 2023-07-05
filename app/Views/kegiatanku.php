<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container program mt-4">
    <div class="d-flex align-items-center mb-2">
        <h3 class="fw-bold me-2 mb-0">Kegiatanku</h3>
    </div>
    <!-- <div class="card p-2">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-lg-5">
                    <div class="input-group mb-0">
                        <span class="input-group-text bg-white border-end-0" id="button-addon1"><i class="bi bi-search bg-gray-input"></i></span>
                        <input id="query" name="query" type="text" class="form-control border-start-0 ps-0" placeholder="Cari program" aria-label="Cari program" aria-describedby="button-addon2" autocomplete="false">
                    </div>
                </div>


                <div class="col-12 col-lg-5">
                    <div class="input-group mb-0">
                        <span class="input-group-text bg-white border-end-0" id="button-addon1"><i class="bi bi-geo-alt-fill bg-gray-input"></i></span>
                        <input id="location" name="location" type="text" class="form-control border-start-0 ps-0" placeholder="Lokasi" aria-label="Lokasi" aria-describedby="button-addon2" autocomplete="false">
                    </div>
                </div>
                <div class="col-12 col-lg-2">
                    <button class="btn btn-primary w-100 fw-bold" id="btn-search-program">Cari</button>
                </div>
            </div>
        </div>
    </div> -->
    <div class="mt-3 filter-kegiatan">
        <span class="badge bg-warning text-dark px-3 py-2 w-100 fw-normal fs-6 text-start text-wrap">
            Berikut merupakan kegiatan yang sedang di daftarkan, silahkan lengkapi dokumen yang dibutuhkan di masing masing kegiatan
        </span>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-lg-4 container-program">
            <div class="d-flex justify-content-center spinner-category py-5 align-items-center">
                <span class="spinner-grow spinner-grow-md text-dark me-2" role="status" aria-hidden="true">
                </span>
                Memuat...
            </div>
            <div class="row hidden-md-up list-kegiatan gy-2 gx-1 content-category d-none">
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
                        <span class="text-muted detail-program d-flex justify-content-center align-items-center h-100">Pilih kegiatan dahulu yang ingin dilihat</span>
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
        <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fs-6 fw-bold" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8 my-2">
                                <div class="pdf" id="printable">

                                </div>
                            </div>
                            <div class="col-lg-4 my-2">
                                <div class="input-form">

                                </div>
                                <input id="id_template" type="hidden" />
                                <button id="tutupdokumen" class="btn btn-primary w-100 mt-2 fw-bold">Submit Dokumen</button>
                                <div class="d-flex flex-column mt-3">
                                    <small class="text-danger">*Pastikan dokumen yang diisi sudah benar</small>
                                    <small class="text-danger">*Dokumen yang sudah diisi tidak dapat diubah</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-6 fw-bold" id="staticBackdrop2Label"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pdf">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRegister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" id="modal-dialog-msg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0 title-message">
                    <h5 class="modal-title fs-6 fw-bold" id="modalRegisterLabel">Pendaftaran Berhasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="icon-message" class="d-flex justify-content-center"></div>
                    <span class="fs-6 modal-message">Pendaftaran berhasil, silahkan lengkapi dokumen yang dibutuhkan di bagian <b>kegiatanku</b></span>
                </div>
                <div class="modal-footer p-0 border-0">
                    <div id="btn-message" class="m-0"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonfirmasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" id="modal-dialog-msg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0 title-message">
                    <h5 class="modal-title fs-6 fw-bold" id="modalKonfirmasiLabel">Konfirmasi</h5>
                </div>
                <div class="modal-body">
                    <div id="icon-message" class="d-flex justify-content-center"></div>
                    <input id="id_template_popup" type="hidden" />
                    <span class="fs-6 modal-message">Apakah anda yakin untuk menyimpan dokumen?</b></span>
                    <span class="fs-6 modal-message">Dokumen yang sudah disimpan tidak dapat diubah</b></span>
                </div>
                <div class="modal-footer p-0 border-0">
                    <div id="btn-message" class="m-0 w-100">
                        <div class="d-flex">
                            <div class="d-grid gap-2 w-100"><button type="button" class="btn btn-primary fw-bold border-0" id="savepdf">YA</button></div>
                            <div class="d-grid gap-2 w-100"><button type="button" class="btn btn-danger fw-bold border-0" data-bs-dismiss="modal" id="cancelpdf">TIDAK</button></div>
                        </div>
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
            const url = '<?= base_url('api/kegiatan/') ?>' + id
            let html = ''
            let detail_program = $('.content-detail')
            $('.spinner-detail').removeClass('d-none')
            $('.content-detail').addClass('d-none')
            $('.card-header-detail').addClass('d-none')
            $('.card-files').addClass('d-none')
            $('.card-content').addClass('h-100')
            detail_program.empty()
            $.ajax({
                type: 'GET',
                url,
                success: function(data, status) {
                    detail_program.empty()
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
                        <div class="d-lg-flex justify-content-between align-items-start" id="program-show" data-id="${program.id}">
                            <div>
                                <input id="id_program" value="${program.id}" type="hidden" />
                                <h6><span class="badge rounded bg-success">${program.category_name}</span></h6>
                                <img src="<?= base_url('images/program/') ?>${program.image}" class="rounded mt-2" alt="..." height="70" width="70">
                                <h5 class="text-justify fw-bolder mt-1">${program.name}</p>
                                <h5 class="text-justify mb-2"><i class="bi bi-geo-alt-fill me-1" style="position:relative"></i>${program.organizer} di ${program.location}</p>
                            </div>
                        </div>
                        <small class="text-justify text-muted">Kode Program</small>
                        <p class="text-justify mb-1"><i class="bi bi-tag-fill me-1" style="position:relative"></i>${program.kode_program}</p>
                        <small class="text-justify text-muted">Kuota</small>
                        <p class="text-justify mb-1"><i class="bi bi-person-fill me-1" style="position:relative"></i>${program.slot} peserta</p>
                        <small class="text-justify text-muted">Periode Kegiatan</small>
                        <p class="text-justify mb-3"><i class="bi bi-calendar3 me-1" style="position:relative"></i>${program.start_program} - ${program.end_program} (${program.duration})</p>
                        <hr />
                        <h6 class="fw-bold">Deskripsi Kegiatan</h6>
                        <p class="text-justify">${program.description}</p>
                        <hr />
                        <h6 class="fw-bold">Kualifikasi</h6>
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
                            fileHtml.append(`<div class="d-flex align-items-center justify-content-between"><div class="d-flex align-items-center text-dark">
                            <i class="bi bi-file-earmark-pdf-fill me-2" style="position:relative"></i> <span class="fw-bold fs-6">${item.name}</span>
                        </div>
                        <a id="lihat-dokumen" class="btn btn-sm btn-outline-dark fw-bold ${item.result !== null ? "d-block" : "d-none"} lihat-${item.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" data-title="${item.name}" data-pdf="${item.result}" data-id="${item.id}">Lihat</a>
                        <a id="isi-dokumen" class="btn btn-sm btn-outline-dark fw-bold ${item.result === null ? "d-block" : "d-none"} isi-${item.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-title="Lengkapi Dokumen ${item.name}" data-id="${item.id}">Isi Dokumen</a>
                        </div>`)
                            if (item.result !== null) {
                                //append in modal staticbackdrop2 with class pdf
                                $('#staticBackdrop2').find('.pdf').html(`<object type="application/pdf" data="<?= base_url('file/output/') ?>${item.result}#toolbar=0" width="100%" height="100%" style="height: 100vh;">No Support</object>`)
                            }
                            console.log(item.html)
                            //append all item.html to printable id 
                            $('#printable').html(item.html);
                            // $('#printable').html(item.html)
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
        const getKegiatan = () => {
            //empty inpu-form
            $('.input-form').empty()
            $('.spinner-category').removeClass('d-none')
            $('.content-category').addClass('d-none')
            $('.list-kegiatan').empty()
            $('.card-content').addClass('h-100')
            $('.card-header-detail').addClass('d-none')
            $('.card-files').addClass('d-none')
            const url = '<?= base_url('api/kegiatanku') ?>'
            let html = ''
            let activity = $('.list-kegiatan')
            let slug = "<?= $slug ?? '' ?>"
            $('.content-detail').html('<span class="text-muted detail-program d-flex justify-content-center align-items-center h-100">Pilih kegiatan dahulu yang ingin dilihat</span>')
            $.ajax({
                type: 'GET',
                url,
                dataType: 'json',
                encode: true,
                success: function(data, status) {
                    //handle if error
                    if (data.status == 'error') {
                        throw new Error(data.message)
                    }
                    const {
                        activities
                    } = data.data
                    //looping categories

                    if ($('#query').val() != '' || $('#location').val() != '') {
                        $('#keyword').text($('#query').val())
                        if ($('#location').val() != '') {
                            $('#location-keyword').text($('#location').val())
                        } else {
                            $('#location-keyword').text('Semua Lokasi')
                        }
                    }

                    if (activities.length == 0) {
                        $('.list-kegiatan').append(`<div class="col-md-12 text-center py-5">
                            <h6 class="fw-bold">Tidak ada kegiatan</h6>
                            <p class="text-center">Silahkan mendaftar program dahulu</p>
                        </div>`)
                        $('.spinner-category').addClass('d-none')
                        $('.content-category').removeClass('d-none')

                        return
                    }
                    activities.map((item, index) => {
                        //append to html
                        const {
                            program
                        } = item
                        html += `<div class="card cursor-pointer card-kegiatan-outer" id="kegiatan-${program.id}" onclick="getDetail(${program.id})">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class='h6'><span class="badge rounded bg-success">${program.category_name}</span></h6>
                                            <small class="text-muted fst-italic">${item.statusText}</small>
                                        </div>
                                        <p class="text-justify fw-bolder">${program.name}</p>
                                        <p class="text-justify">${program.organizer}</p>
                                        <small class="text-justify text-muted"><i class="bi bi-geo-alt-fill"></i> ${program.location}</small>
                                    </div>
                                </div>`
                    })
                    //append to program
                    activity.append(html)
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
                    $('.list-kegiatan').append(`<div class="col-md-12 text-center py-5">
                    <h6 class="fw-bold">Terjadi Kesalahan</h6>
                    <p class="text-center">Silahkan refresh halaman ini</p>
                </div>`)
                }
            })
        }
        getKegiatan()

        //pass staticBackdrop modal data-pdf to modal-body-files
        $('#staticBackdrop').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var pdf = button.data('pdf') // Extract info from data-* attributes
            var modal = $(this)
            var title = button.data('title')
            modal.find('.modal-title').text(title)
            modal.find('#id_template').val(button.data('id'))

            //find modal-body-files then append pdf and add #toolbar=0 and set height to matched pdf height

            modal.find('.modal-body-files').html(`<object type="application/pdf" data="<?= base_url('file/pdf/') ?>${pdf}#toolbar=0" width="100%" height="100%" style="height: 100vh;">No Support</object>`)
        })

        $('#staticBackdrop2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var pdf = button.data('pdf') // Extract info from data-* attributes
            var modal = $(this)
            var title = button.data('title')
            modal.find('.modal-title').text(title)
        })


        //find bi class
        // var bi = $('.bi');
        // bi.css('position', 'relative');

        $('#tutupdokumen').on('click', function() {
            //hide modal staticBackdrop
            $('#staticBackdrop').modal('hide')
            $('#modalKonfirmasi').modal('show')
        })

        //detect modalKonfirmasi close
        // $('#modalKonfirmasi').on('hidden.bs.modal', function(event) {
        //     $('#staticBackdrop').modal('show')
        // })

        $('#cancelpdf').on('click', function() {
            $('#modalKonfirmasi').modal('hide')
            $('#staticBackdrop').modal('show')
        })

        $('#savepdf').on('click', function() {
            var print = $('#printable');

            var printContent = print.html();
            //change the page-container inside printcontent to relative
            printContent = '<html><head><title>Print</title></head><body>' + printContent + '</body></html>';
            printContent = printContent.replace('class="page w0 h0"', 'class="page w0 h0" style="margin:0;"');
            printContent = printContent.replace('position: absolute;', 'position: relative;');
            //find class page then add style margin:0
            console.log(printContent)
            // return;

            //check if all input is empty then alert
            var input = $('.input-form');
            var count = input.find('input').length;
            var empty = 0;
            for (var i = 0; i < count; i++) {
                if ($('#inputted' + i).val() == '') {
                    empty++;
                }
            }
            if (empty > 0) {
                alert('Harap isi semua input');
                // return;
            }

            var id_template = $('#id_template_popup').val();

            // ajax to path 'api/generate-pdf'
            $.ajax({
                url: '<?= base_url('api/submit-dokumen') ?>',
                type: 'POST',
                data: {
                    html: printContent,
                    id_template: id_template,
                    id_kegiatan: $('#id_program').val(),
                },
                success: function(result) {
                    //if success, redirect to path 'api/download-pdf'
                    console.log(result)
                    // window.location.href = 'api/download-pdf/' + result;
                    //close modal
                    $('#modalKonfirmasi').modal('hide')
                    $('#staticBackdrop').modal('hide')
                    //find data-id-${id_template} in id named id_kegiatan a href then change display to block
                    $(`.lihat-${id_template}`).removeClass('d-none')
                    $(`.lihat-${id_template}`).addClass('d-block')
                    //find data-id-${id_template} in id named id_kegiatan a href then change display to none
                    $(`.isi-${id_template}`).removeClass('d-block')
                    $(`.isi-${id_template}`).addClass('d-none')
                    $('#staticBackdrop2').find('.pdf').html(`<object type="application/pdf" data="<?= base_url('file/output/') ?>${result.data.pdf}#toolbar=0" width="100%" height="100%" style="height: 100vh;">No Support</object>`)
                }
            });
            console.log(printContent)
        });
    });

    $(document).on('click', '.card-kegiatan-outer', function(e) {
        console.log('clicked')
        //remove h6 height
        $('.h6').css('height', 'auto');
        //h5 
        $('.h5').css('height', 'auto');
        var bi = $('.bi');
        bi.css('position', 'relative');
        //change h6, h5 in class .content-detail to auto
        var content_detail = $('.content-detail');
        //search h6 and h5 in content-detail
        content_detail.find('h6').css('height', 'auto');
    })


    //detect modal #modalRegister open and then auto close after 3 seconds
    // $('#modalRegister').on('shown.bs.modal', function() {
    //     setTimeout(function() {
    //         $('#modalRegister').modal('hide')
    //     }, 3000);
    // })


    $(document).on('click', '#daftar-program', function(e) {
        const url = '<?= base_url('api/daftar-program') ?>'
        $('#icon-message').empty();
        $('#btn-message').empty();
        $('#daftar-program').attr('disabled', true)
        //fill with spinner
        $('#daftar-program').html(`<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>`)
        let formData = {
            id_program: $('#program-show').attr('data-id'),
        }
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
                $('#modal-dialog-msg').removeClass('modal-sm')
                $('#modalRegister').modal('show')
                //remove modal-sm in #modalRegister
            },
            error: function(xhr, status, error) {
                // console.log('error', error, status, xhr)
                $('#modal-dialog-msg').addClass('modal-sm')
                $('#icon-message').html('<i class="bi bi-x-circle-fill fs-1 text-danger"></i>')
                $('#modalRegisterLabel').text('Unauthorized')
                $('.modal-message').text(xhr.responseJSON.msg)
                //center $.modal-message
                $('.modal-message').addClass('d-flex justify-content-center align-items-center fw-bold text-danger')
                $('#modalRegister').modal('show')
                //display none modal-header in modalRegister
                $('.title-message').addClass('d-none')
                $('#btn-message').addClass('w-100')
                $('#btn-message').html(`<div class="d-grid gap-2"><button type="button" class="btn btn-danger fw-bold border-top-0" data-bs-dismiss="modal">Tutup</button></div>`)
                $('#daftar-program').attr('disabled', false)
                $('#daftar-program').html('<i class="bi bi-pencil-square me-2"></i>Daftar')
            }
        })
    });

    $(document).on('click', '#isi-dokumen', function() {
        $('#id_template_popup').val($(this).data('id'))
        //get the id page-container
        var page = $('#page-container');
        //change position to relative
        page.css('position', 'relative');

        var pdf = $('.pdf');
        //find the inner pdf with {{input}}
        var pdfContent = pdf.html().trim();
        //count the number of {{input}}
        var count = (pdfContent.match(/{{input}}/g) || []).length;
        console.log(count);
        //replace {{input}} with <div id="forminput"></div> and set the id with forminput + index
        for (var i = 0; i < count; i++) {
            pdfContent = pdfContent.replace(/{{input}}/, '<span class="divinput fw-bold" id="forminput' + i + '">Input ' + (i + 1) + '</span>');
            //find child page-container first then set margin to 0
            // pdfContent = pdfContent.replace('class="page w0 h0"', 'class="page w0 h0" style="margin:0;"');
            // pdfContent = pdfContent.replace('class="page-container"', 'class="paxge-container w0"');
        }
        //set the pdf with the new content
        pdf.html(pdfContent);

        //empty the input
        $('.input-form').empty();
        //get the input
        var input = $('.input-form');
        //loop through the input
        for (var i = 0; i < count; i++) {
            //append the input
            input.append(`
            <div class="mb-2">
                <label class="form-label text-dark mb-1" for="inputted${i}">Input ${i + 1}</label>
                <input type="text" class="form-control form-control-sm" placeholder="Input ${i + 1}" id="inputted${i}">
            </div>
            `);
        }

        //loop through the input
        for (var i = 0; i < count; i++) {
            //set the #forminput+index with the input when onchangetext
            $('#inputted' + i).on('keyup', function() {
                var index = $(this).attr('id').replace('inputted', '');
                console.log(index);
                let value
                if ($(this).val() == '') {
                    value = 'Input ' + (parseInt(index) + 1)
                } else {
                    value = $(this).val()
                }
                $('#forminput' + index).html(value);
            });
        }
    });
</script>
<?= $this->endSection() ?>