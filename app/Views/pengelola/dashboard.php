<?= $this->extend('pengelola/layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="page-wrapper" style="display: block;">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12 align-self-center">
                <h4 class="text-muted mb-0 fw-normal">Welcome <?= $current_user['name'] ?></h4>
                <h1 class="mb-0 fw-bold">Dashboard Pengelola</h1>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 col-md-4 d-flex align-items-stretch">
                        <!-- earnings card -->
                        <div class="card bg-primary w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title text-white">Kategori</h4>
                                    <div class="ms-auto">
                                        <span class="btn btn-lg btn-info btn-circle d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-format-list-bulleted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h2 class="fs-8 text-white mb-0"><?= $jumlah_kategori ?></h2>
                                    <span class="text-white op-5">Jumlah Kategori</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex align-items-stretch">
                        <!-- earnings card -->
                        <div class="card bg-success w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title text-white">Program</h4>
                                    <div class="ms-auto">
                                        <span class="btn btn-lg btn-info btn-circle d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-beaker"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h2 class="fs-8 text-white mb-0"><?= $jumlah_program ?></h2>
                                    <span class="text-white op-5">Jumlah Program</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex align-items-stretch">
                        <!-- earnings card -->
                        <div class="card bg-danger w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title text-white">User</h4>
                                    <div class="ms-auto">
                                        <span class="btn btn-lg btn-info btn-circle d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-account"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h2 class="fs-8 text-white mb-0"><?= $jumlah_user ?></h2>
                                    <span class="text-white op-5">Jumlah User</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->


    <?= $this->endSection() ?>