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
    <div class="row mt-3">
        <div class="col-12 col-lg-4 container-program">
            <div class="d-flex justify-content-center spinner-category py-5">
                <span class="spinner-grow spinner-grow-md text-dark me-2" role="status" aria-hidden="true">
                </span>
                Memuat...
            </div>
            <div class="row hidden-md-up list-program gy-2 gx-1 content-category d-none">
            </div>
        </div>
        <div class="col-12 col-lg-8 container-detail-program">
            <div class="card h-100">
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
                    html += `<h6 class='h6'>${program.category_name}</h6>
                                    <p class="text-justify fw-bolder">${program.name}</p>
                                    <p class="text-justify">${program.organizer}</p>
                                    <p class="text-justify text-muted fs-6">${program.location}</p>
                                    <p class="text-justify">${program.description}</p>
                                    <p class="text-justify text-muted fs-6">Kuota: ${program.quota}</p>
                                    <p class="text-justify text-muted fs-6">Tanggal: ${program.date}</p>
                                    <p class="text-justify text-muted fs-6">Waktu: ${program.time}</p>
                                    <p class="text-justify text-muted fs-6">Kontak: ${program.contact}</p>
                                    <p class="text-justify text-muted fs-6">Link: <a href="${program.link}" target="_blank">${program.link}</a></p>`
                    //append to program
                    detail_program.append(html)
                    $('.spinner-detail').addClass('d-none')
                    $('.content-detail').removeClass('d-none')
                },
                error: function(xhr, status, error) {
                    console.log(error)
                    $('.spinner-detail').addClass('d-none')
                    $('.content-detail').removeClass('d-none')
                    detail_program.append(`<div class="col-md-12 text-center py-5 h-100 d-flex justify-content-center align-items-center">
                    <h6 class="fw-bold">Terjadi Kesalahan</h6>
                    <p class="text-center">Silahkan refresh halaman ini</p>
                </div>`)
                }
            })
        }
        const getPrograms = () => {
            $('.spinner-category').removeClass('d-none')
            $('.content-category').addClass('d-none')
            $('.list-program').empty()
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
                                        ${slug == '' ? `<h6 class='h6'>${item.category_name}</h6>` : ''}
                                        <p class="text-justify fw-bolder">${item.name}</p>
                                        <p class="text-justify">${item.organizer}</p>
                                        <p class="text-justify text-muted fs-6">${item.location}</p>
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
                    $('.program').append(`<div class="col-md-12 text-center py-5">
                    <h6 class="fw-bold">Terjadi Kesalahan</h6>
                    <p class="text-center">Silahkan refresh halaman ini</p>
                </div>`)
                }
            })
        }
        getPrograms()
        $('#btn-search-program').click(function() {
            getPrograms()
        })
    });
</script>
<?= $this->endSection() ?>