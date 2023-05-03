<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= env('app.name') ?> | <?= $title ?></title>

    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Schibsted+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/jquery-ui.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/print.min.css') ?>" />
</head>

<body>

    <?= $this->include('layout/navbar') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('layout/footer') ?>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery-3.6.4.min.js') ?>"></script>
    <script src="<?= base_url('js/popper.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('js/print.min.js') ?>"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->

    <script>
        window.jsPDF = window.jspdf.jsPDF;
        window.html2canvas = html2canvas;
        window.dompurify = DOMPurify;

        $(document).ready(function() {
            $("body").tooltip({
                selector: '[data-bs-toggle=tooltip]'
            });
        });
    </script>
    <?= $this->renderSection('customScripts') ?>

</body>

</html>