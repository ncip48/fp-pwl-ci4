<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <form action="<?= base_url('auth/login') ?>" method="post" autocomplete="off">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                <?php if (session()->getFlashdata('error')) : ?>
                    <span class="text-danger"><?= session()->getFlashdata('error')['email'] ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                <?php if (session()->getFlashdata('error')) : ?>
                    <span class="text-danger"><?= session()->getFlashdata('error')['password'] ?></span>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>