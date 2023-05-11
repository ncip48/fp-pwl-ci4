<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 my-2">
            <div class="pdf" id="printable">
                <?= $html ?>
            </div>
        </div>
        <div class="col-lg-4 my-2">
            <div class="input-form">

            </div>
            <button id="print" class="btn btn-danger">Print</button>
            <button id="savepdf" class="btn btn-warning">Save PDF</button>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('customScripts') ?>
<script>
    $(document).ready(function() {
        //get the id page-container
        var page = $('#page-container');
        //change position to relative
        page.css('position', 'relative');

        //find bi class
        var bi = $('.bi');
        bi.css('position', 'relative');

        var pdf = $('.pdf');
        //find the inner pdf with {{input}}
        var pdfContent = pdf.html().trim();
        //count the number of {{input}}
        var count = (pdfContent.match(/{{input}}/g) || []).length;
        console.log(count);
        //replace {{input}} with <div id="forminput"></div> and set the id with forminput + index
        for (var i = 0; i < count; i++) {
            pdfContent = pdfContent.replace(/{{input}}/, '<span class="divinput fw-bold" id="forminput' + i + '">Input ' + (i + 1) + '</span>');
            //find child page-container first then set margin to 0
            // pdfContent = pdfContent.replace('class="page w0 h0"', 'class="page w0 h0" style="margin:0;"');
            // pdfContent = pdfContent.replace('class="page-container"', 'class="paxge-container w0"');
        }
        //set the pdf with the new content
        pdf.html(pdfContent);

        //get the input
        var input = $('.input-form');
        //loop through the input
        for (var i = 0; i < count; i++) {
            //append the input
            input.append('<input type="text" class="form-control" placeholder="Input ' + (i + 1) + '" id="inputted' + i + '">');
        }

        //loop through the input
        for (var i = 0; i < count; i++) {
            //set the #forminput+index with the input when onchangetext
            $('#inputted' + i).on('keyup', function() {
                var index = $(this).attr('id').replace('inputted', '');
                console.log(index);
                let value
                if ($(this).val() == '') {
                    value = 'Input ' + (parseInt(index) + 1)
                } else {
                    value = $(this).val()
                }
                $('#forminput' + index).html(value);
            });
        }
    });

    $('#print').on('click', function() {
        //get id printable
        var print = $('#printable');
        // var page = $('#page-container');
        //change page to absolute
        // page.css('position', 'absolute');
        //get the html
        var printContent = print.html();
        //change the page-container inside printcontent to relative
        printContent = printContent.replace('position: absolute;', 'position: relative;');
        //create new window
        var WinPrint = window.open('', '', 'width=900,height=650');
        //set the content
        WinPrint.document.write(printContent);
        //print
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
        //change page to relative when done or cancel
        // page.css('position', 'relative');
    });

    // $('#savepdf').on('click', function() {
    //     var print = $('#printable');

    //     var printContent = print.html();
    //     //change the page-container inside printcontent to relative
    //     printContent = '<html><head><title>Print</title></head><body>' + printContent + '</body></html>';
    //     printContent = printContent.replace('class="page w0 h0"', 'class="page w0 h0" style="margin:0;"');
    //     printContent = printContent.replace('position: absolute;', 'position: relative;');
    //     //find class page then add style margin:0


    //     // ajax to path 'api/generate-pdf'
    //     $.ajax({
    //         url: '<?= base_url('api/generate-pdf') ?>',
    //         type: 'POST',
    //         data: {
    //             html: printContent
    //         },
    //         success: function(result) {
    //             //if success, redirect to path 'api/download-pdf'
    //             console.log(result)
    //             // window.location.href = 'api/download-pdf/' + result;
    //         }
    //     });
    // });
</script>
<?= $this->endSection() ?>