<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content'); ?>

<div class="container p-2 ">
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="d-flex justify-content-center p-2">
                <img src="https://via.placeholder.com/150" class="rounded-circle" alt="...">
            </div>
            <p class="text-center">Herly Chahya</p>
            <div class="list-group container-profil">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    Profil
                </a>
                <a href="#" class="list-group-item list-group-item-action">Ubah Profil</a>
                <a href="#" class="list-group-item list-group-item-action">Ubah Password</a>
                <a href="#" class="list-group-item list-group-item-action">Ubah Foto</a>
            </div>
        </div>
        <div class="col-12 col-lg-8 container-detail-profil">
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
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
