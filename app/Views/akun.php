<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content'); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-12 col-lg-4 rounded">
            <div class="d-flex justify-content-start p-2 bg-light">
                <div class="img p-2">
                    <img src="https://via.placeholder.com/70" class="rounded-circle" alt="...">
                    <!-- <img src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg" class="rounded-circle" alt="..."> -->
                </div>
                <div class="mt-3 mb-0 ms-3 col-8">
                    <p class="text-start mb-0">Herly Chahya</p>
                    <p class="text-start">21.01.4556</p>
                </div>
            </div>
            <div class="list-group container-profil">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    <i class="bi bi-person-fill"></i> Profil
                </a>
                <!-- <a href="#" class="list-group-item list-group-item-action">Ubah Profil</a> -->
                <a href="#editPassword" class="list-group-item list-group-item-action"><i class="bi bi-key-fill"></i> Ubah Password</a>
                <a href="#changePhotoProfile" class="list-group-item list-group-item-action"><i class="bi bi-camera-fill"></i> Ubah Foto</a>
            </div>
        </div>
        <div class="col-12 col-lg-8 container-detail-profil bg-light rounded">
            <h4 class="pt-4">Detail Profil</h4>
            <form action="#" method="post" class="p-2">
                <div class="mt-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="Herly Chahya" readonly>
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="2017051010" readonly>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" value="Teknik Informatika" readonly>
                </div>
                <div class="mb-3">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <input type="text" class="form-control" id="fakultas" name="fakultas" value="Teknik" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="herly@gmail.com" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="08123456789" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <!-- <textarea class="form-control" id="alamat" name="alamat" rows="3">Jl. Raya ITS</textarea> -->
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="Jl. Raya ITS" readonly>
                </div>
            </form>
            <div class="d-flex justify-content-start">
                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#editProfile">Edit Profil</button>
                <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusAkun">Hapus Akun</button> -->
            </div>
        </div>
    </div>
</div>

<!-- edit menu  -->
<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-4 ps-5 pb-0 border-bottom-0">
                <h5 class="modal-title" id="editProfileLabel">Edit Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body p-4 pt-0">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="Herly Chahya">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="2017051010">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" value="Teknik Informatika">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <input type="text" class="form-control" id="fakultas" name="fakultas" value="Teknik">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="email">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="08123456789">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="Jl. Raya ITS">
                    </div>
                </form>
            </div>
            <div class="modal-footer p-4 pt-0 border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editPassword" tabindex="-1" aria-labelledby="editPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-4 ps-5 pb-0 border-bottom-0">
                <h5 class="modal-title" id="editPasswordLabel">Edit Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body p-4 pt-0">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" id="password" name="password" value="password"> 
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password" value="password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password" value="password">
                    </div>
                </form>
            </div>
            <div class="modal-footer p-4 pt-0 border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePhotoProfile" tabindex="-1" aria-labelledby="changePhotoProfileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-4 ps-5 pb-0 border-bottom-0">
                <h5 class="modal-title" id="changePhotoProfileLabel">Ganti Foto Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body p-4 pt-0">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="password" class="form-label">Foto Profil</label>
                        <input type="file" class="form-control" id="password" name="password" value="Herly Chahya">
                    </div>
                </form>
            </div>
            <div class="modal-footer p-4 pt-0 border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('customScripts') ?>
<script>
    $(document).ready(function() {
        $('.list-group-item').click(function() {
            if ($(this).attr('href') === '#editProfile') {
                $('#editProfile').modal('show');
            }
        });
    });
    $(document).ready(function() {
        $('.list-group-item').click(function() {
            if ($(this).attr('href') === '#changePhotoProfile') {
                $('#changePhotoProfile').modal('show');
            }
        });
    });
    $(document).ready(function() {
        $('.list-group-item').click(function() {
            if ($(this).attr('href') === '#editPassword') {
                $('#editPassword').modal('show');
            }
        });
    });
</script>
<?= $this->endSection(); ?>