<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\ThirdParty\FPDF;
use App\ThirdParty\FPDI\FPDI;
use App\ThirdParty\FPDI\PdfParser\PdfParser;
use App\ThirdParty\FPDI\PdfParser\StreamReader;
use App\ThirdParty\FPDI\PdfReader\PdfReader;

class Pdf extends BaseController
{
    private function getPageCountOfPdf($path)
    {
        $stream = StreamReader::createByFile($path);
        $parser = new PdfParser($stream);

        $pdfReader = new PdfReader($parser);

        return $pdfReader->getPageCount();
    }
    public function index()
    {
        $user_id = 1;
        $document_id = 1;
        $signature = 'blbS8YizTNINpV1gPUhs7Ms9tyokYZEvRsL9eSpoOx3t7syYnZ';

        $qrcode = Signature::generateQR($signature);
        //change base64 to image
        $img = explode(',', $qrcode, 2)[1];
        $qrcode = 'data://text/plain;base64,' . $img;
        //read existing pdf
        $pdf = new FPDI();
        $pdf->setSourceFile('file/contoh.pdf');
        $count = $this->getPageCountOfPdf('file/contoh.pdf');
        //loop through all pages
        for ($i = 1; $i <= $count; $i++) {
            // import a page
            $tplIdx = $pdf->importPage($i);
            // get the size of the imported page
            $size = $pdf->getTemplateSize($tplIdx);
            // create a page (landscape or portrait depending on the imported page size)
            if ($size['width'] > $size['height']) {
                $pdf->AddPage('L', array($size['width'], $size['height']));
            } else {
                $pdf->AddPage('P', array($size['width'], $size['height']));
            }
            // use the imported page
            $pdf->useTemplate($tplIdx);
            if ($signature != null) {
                $pdf->EnableFooterQrCode();
                $pdf->SetFooterQrCode($qrcode);
            }
        }
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output();
    }
}
