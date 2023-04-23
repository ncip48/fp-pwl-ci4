<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<header>
    <div class="container-fluid bg-toga p-0">
        <div class="glass py-5 h-100">
            <div class="container h-100 my-5">
                <div class="row h-100 d-flex align-items-center">
                    <div class="col-md-6 col-12">
                        <div class="jumbotron jumbotron-fluid">
                            <h1 class="display-6 fw-bold">Selamat Datang di <?= env('app.name') ?></h1>
                            <p class="lead text-justify mb-3">Portal informasi tentang magang, beasiswa, dan pertukaran pelajar di Amikom. Temukan program yang sesuai dengan minat dan bakatmu!</p>
                            <a class="btn btn-primary fw-bold" href="<?= base_url('program') ?>" role="button">Lihat Selengkapnya <i class="bi bi-arrow-up-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
<div class="container home mt-4">
    <div class="d-flex align-items center justify-content-between">
        <div class="d-flex align-items-center mb-2">
            <h3 class="fw-bold me-2 mb-0">Program Tersedia</h3>
            <i class="bi bi-question-circle fs-6 cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="right" title="Program yang tersedia di portal ini"></i>
        </div>
        <i class="bi bi-arrow-clockwise fs-4 cursor-pointer" id="refresh-category"></i>
    </div>
    <div class="d-flex justify-content-center spinner-category py-5">
        <span class="spinner-grow spinner-grow-md text-dark me-2" role="status" aria-hidden="true">
        </span>
        Memuat...
    </div>
    <div class="row hidden-md-up program gx-5 content-category d-none">
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('customScripts') ?>
<script>
    $(document).ready(function() {
        const getCategory = () => {
            $('.spinner-category').removeClass('d-none')
            $('.content-category').addClass('d-none')
            $('.program').empty()
            const url = '<?= base_url('api/categories') ?>'
            let html = ''
            let program = $('.program')
            $.ajax({
                type: 'GET',
                url,
                success: function(data, status) {
                    //handle if error
                    if (data.status == 'error') {
                        throw new Error(data.message)
                    }
                    const {
                        categories
                    } = data.data
                    //looping categories
                    categories.map((item, index) => {
                        //append to html
                        html += `<div class="col-md-6 col-lg-4 my-3 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-header">
                            <img src="<?= base_url('images/') ?>${item.image}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="h5 fw-bolder">${item.name}</h5>
                            <p class="mb-4 text-justify">${item.description}</p>
                            <a href="<?= base_url('sk/') ?>${item.slug}"><p class="fw-bold fs-6">Lihat Syarat & Ketentuan <i class="bi bi-arrow-right"></i></p></a>
                            <hr />
                            <a href="<?= base_url('jadwal/') ?>${item.slug}"><p class="fw-bold fs-6">Lihat Jadwal Pendaftaran <i class="bi bi-arrow-right"></i></p></a>
                            <hr />
                            <a href="<?= base_url('benefit/') ?>${item.slug}"><p class="fw-bold mb-4  fs-6">Lihat Benefit <i class="bi bi-arrow-right"></i></p></a>
                            <div class="d-grid gap-2">
                                <a type="button" class="btn btn-outline-dark fw-bold" href="<?= base_url('program/') ?>${item.slug}">Telusuri
                                    <i class="bi bi-search ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>`
                    })
                    //append to program
                    program.append(html)
                    $('.spinner-category').addClass('d-none')
                    $('.content-category').removeClass('d-none')
                },
                error: function(xhr, status, error) {
                    console.log(error)
                    $('.spinner-category').addClass('d-none')
                    $('.content-category').removeClass('d-none')
                    $('.program').append(`<div class="col-md-12 text-center py-5">
                    <h6 class="fw-bold">Terjadi Kesalahan</h6>
                    <p class="text-center">Silahkan refresh halaman ini</p>
                </div>`)
                }
            })
        }
        getCategory()
        $('#refresh-category').click(function() {
            getCategory()
        })
    });
</script>
<?= $this->endSection() ?>