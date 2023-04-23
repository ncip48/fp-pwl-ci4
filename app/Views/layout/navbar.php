<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('images/logo.png') ?>" height="50" width="150" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2 me-3">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('program') ?>">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('bantuan') ?>">Bantuan?</a>
                </li>
                <?php if (session('logged_in')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('notifikasi') ?>">Notifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('kegiatanku') ?>">Kegiatanku</a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if (!session('logged_in')) : ?>
                <a class="btn btn-light rounded-pill fw-bold py-2 d-flex align-items-center" type="submit" href="<?= base_url('auth') ?>">
                    <i class="bi bi-person-fill text-gray me-2" style="font-size:1.2rem"></i>
                    Masuk ke Akun
                </a>
            <?php else : ?>
                <div class="dropdown dropdown-user">
                    <a class="btn btn-light rounded-pill fw-bold py-2 d-flex align-items-center dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <i class="bi bi-person-fill text-gray me-2" style="font-size:1.2rem"></i> -->
                        <img src="<?= base_url('images/63307728.png') ?>" alt="" class="rounded-circle me-2" width="30" height="30">
                        <?php if (strpos(session('user')['name'], ' ') !== false) : ?>
                            <?= explode(' ', session('user')['name'])[0] ?>
                        <?php else : ?>
                            <?= session('user')['name'] ?>
                        <?php endif; ?>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= base_url('profile') ?>">Profil</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Keluar</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>