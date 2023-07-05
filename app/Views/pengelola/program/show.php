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
                            <a href="<?= base_url('admin/home') ?>" class="link"><i class="mdi mdi-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Programs
                        </li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Programs</h1>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="border-bottom title-part-padding">
                        <h4 class="mb-0">List Program</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('pengelola/tambah_program') ?>" class="btn btn-info btn-rounded m-t-10 mb-2">
                                <i class="mdi mdi-plus"></i>
                                Tambah Program
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table m-t-30 table-hover contact-list v-middle text-nowrap footable footable-5 footable-paging footable-paging-center breakpoint-lg" data-paging="true" data-paging-size="7" style="">
                                <thead>
                                    <tr class="footable-header">
                                        <th class="footable-first-visible">No</th>
                                        <th>Kode Program</th>
                                        <th>Nama Program</th>
                                        <th>Penyelenggara</th>
                                        <th>Lokasi</th>
                                        <th>Durasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($programs as $row) : ?>
                                        <tr>
                                            <td class="footable-first-visible"><?= $no++ ?></td>
                                            <td><?= $row['kode_program'] ?></td>

                                            <td><?= $row['name'] ?></td>

                                            <td><?= $row['organizer'] ?></td>

                                            <td><?= $row['location'] ?></td>

                                            <td><?= $row['duration'] ?></td>

                                            <td>
                                                <a href="<?= base_url('pengelola/program/') . $row['id'] ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i> Edit</a>
                                                <a class="btn btn-danger btn-sm" id="delete-form" data-id="<?= $row['id'] ?>"><i class="mdi mdi-delete"></i> Hapus</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        $(document).ready(function() {

            $('#datatables').on('click', '#delete-form', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',

                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?= base_url('api/program/') ?>" + id,
                            type: "DELETE",
                            success: function() {
                                Swal.fire(
                                    'Terhapus!',
                                    'Data berhasil dihapus.',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        });
                    }
                })
            });
        });
    </script>

    <?= $this->endSection() ?>