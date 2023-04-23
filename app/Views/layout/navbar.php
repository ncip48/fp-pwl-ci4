<nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-sm-3 pb-md-0 py-lg-3">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('images/logo.png') ?>" height="50" width="150" alt="">
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0 mb-lg-0 gap-2 me-lg-3">
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
                        <a class="nav-link" href="<?= base_url('kegiatanku') ?>">Kegiatanku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-none d-lg-block" href="<?= base_url('notifikasi') ?>"><i class="bi bi-bell-fill"></i></a>
                        <!-- <a class="nav-link d-block d-lg-none" href="<?= base_url('notifikasi') ?>">Notifikasi</i></a> -->
                    </li>
                    <div class="d-block d-lg-none">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-4 text-center border-end">
                                    <a class="nav-link" href="<?= base_url('notifikasi') ?>"><i class="bi bi-bell-fill fs-4"></i></a>
                                </div>
                                <div class="col-4 text-center border-end">
                                    <a class="nav-link" href="<?= base_url('profile') ?>"><i class="bi bi-person-fill fs-4"></i></a>
                                </div>
                                <div class="col-4 text-center">
                                    <a class="nav-link" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right fs-4"></i></a>
                                </div>
                            </div>
                            </li>
                        </div>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth') ?>">Masuk</a>
                        </li>
                    <?php endif; ?>
            </ul>
            <?php if (!session('logged_in')) : ?>
                <a class="btn btn-light rounded-pill fw-bold py-2 d-flex align-items-center d-none d-lg-flex" type="submit" href="<?= base_url('auth') ?>">
                    <i class="bi bi-person-fill text-gray me-2" style="font-size:1.2rem"></i>
                    Masuk ke Akun
                </a>
            <?php else : ?>
                <div class="dropdown dropdown-user d-none d-lg-block">
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