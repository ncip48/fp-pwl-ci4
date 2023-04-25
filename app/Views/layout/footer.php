<footer class="jumbotron jumbotron-fluid mt-5 mb-0 pt-lg-5 pb-lg-3 bg-dark text-light">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-md-4 col-12">
                <div class="d-lg-flex align-items-start">
                    <img src="<?= base_url('images/logo-mini.png') ?>" alt="logo" width="80" height="80">
                    <div class="ms-lg-4 mt-3 mt-lg-0">
                        <h6 class="fw-bold mb-1">Universitas Amikom</h6>
                        <h5 class="fw-bold mb-3">Yogyakarta</h5>
                        <small><i class="bi bi-envelope-fill me-2"></i> amikom@amikom.ac.id</small>
                        <hr />
                        <small>Jl. Padjajaran, Ring Road Utara, Kel. Condongcatur, Kec. Depok, Kab. Sleman, Prop. Daerah Istimewa Yogyakarta 55283</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 d-flex flex-column">
                <h6 class="text-decoration-underline fw-bold mb-3">Sitemap</h6>
                <ul class="list-unstyled">
                    <li><a href="<?= base_url('tentang') ?>" class="text-decoration-none text-white">Tentang Kami</a></li>
                    <li><a href="<?= base_url('hubungi') ?>" class="text-decoration-none text-white">Hubungi Kami</a></li>
                    <?php if (session()->get('isLoggedIn')) { ?>
                        <li><a href="<?= base_url('auth') ?>" class="text-decoration-none text-white">Login</a></li>
                    <?php } else { ?>
                        <li><a href="<?= base_url('akun') ?>" class="text-decoration-none text-white">Akun Saya</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-4 col-12">
                <h6 class="text-decoration-underline fw-bold text-lg-end mb-3">Social Media</h6>
                <div class="d-flex gap-3 float-lg-end">
                    <a href="https://www.facebook.com/amikomjogja" target="_blank">
                        <i class="bi bi-facebook fs-4 text-white"></i>
                    </a>
                    <a href="https://www.instagram.com/amikomjogja" target="_blank">
                        <i class="bi bi-instagram fs-4 text-white"></i>
                    </a>
                    <a href="https://twitter.com/amikomjogja" target="_blank">
                        <i class="bi bi-twitter fs-4 text-white"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCNMwEZ8Y3JIod-d22o8yxZQ?view_as=subscriber" target="_blank">
                        <i class="bi bi-youtube fs-4 text-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <span class="d-flex justify-content-center">Copyright &copy <?= Date('Y') ?> Kiyowo Group - PWL</span>
</footer>