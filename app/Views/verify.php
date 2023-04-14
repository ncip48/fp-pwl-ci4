<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Tanda Tangan</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
    <style>
        h3 {
            font-weight: normal;
        }

        .border-dash {
            background: grey;
            text-align: center;
            background: linear-gradient(to right, orange 50%, rgba(255, 255, 255, 0) 0%), linear-gradient(blue 50%, rgba(255, 255, 255, 0) 0%), linear-gradient(to right, green 50%, rgba(255, 255, 255, 0) 0%), linear-gradient(red 50%, rgba(255, 255, 255, 0) 0%);
            background-position: top, right, bottom, left;
            background-repeat: repeat-x, repeat-y;
            background-size: 15px 1px, 1px 15px;
        }
    </style>
</head>

<body class="vh-100 d-flex flex-column justify-content-between">
    <div class="container">
        <?php if ($valid) { ?>
            <h3 class="pt-4">Signature <b>Valid</b> <i class="bi bi-check-circle-fill text-warning"></i></h3>
            <h3 class="pb-3">Dokumen ini telah ditandatangani secara <i><u>digital</u></i> oleh: <?= $name ?></h3>
            <hr />
            <div class="d-flex">
                <img src="<?= $qr ?>" alt="" height="150" width="150">
                <div class="col-6 ms-3">
                    <?php
                    foreach ($details as $detail) {
                    ?>
                        <div class="col-4">
                            <span class="fw-bold">Nama:</span> <?= $detail['user'] ?>
                            <br />
                            <span class="fw-bold">Tanggal:</span> <?= date('d M Y, H:i', strtotime($detail['created_at'])) ?>
                            <hr />
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php } else { ?>
            <h3 class="pt-4">Signature <b>Invalid</b> <i class="bi bi-x-circle-fill text-danger"></i></h3>
            <h3 class="pb-3">Dokumen ini <i><u>tidak dapat</u></i> diverifikasi</h3>
            <hr />
        <?php } ?>
    </div>

    <?php if ($valid) { ?>
        <footer class="">
            <div class="px-3 py-2 border-dash">
                <small><i>Halaman ini merupakan halaman verifikasi tanda tangan digital yang secara sah dan telah diverifikasi oleh sistem. </i></small>
            </div>
        </footer>
    <?php } ?>
</body>

</html>