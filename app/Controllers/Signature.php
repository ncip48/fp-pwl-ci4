<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Signature as ModelsSignature;
use App\Models\SignatureDetail;
use App\Models\User;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Signature extends BaseController
{
    public static function generateQR($data)
    {
        //get base url
        $base_url = base_url();
        $data = $base_url . 'verify/' . $data;
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($data)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $result = $writer->write($qrCode);

        $dataUri = $result->getDataUri();
        return $dataUri;
    }

    public function index()
    {
        //find one signature with ci4 model
        $signature = new ModelsSignature();
        $signature = $signature->first();

        //generate qr code
        $qr = $this->generateQR($signature['hash']);

        $data = [
            'title' => 'Signature',
            'signature' => $signature,
            'qr' => $qr,
        ];

        return view('signature', $data);
    }

    public function verify($has)
    {
        $sign = new ModelsSignature();
        $sign = $sign->where('hash', $has);
        $details = new SignatureDetail();
        // $details = $details->where('signature_id', $sign['id'])->findAll();
        //join sign with details
        $details = $sign->join('signature_details', 'signature_details.signature_id = signatures.id', 'left')->where('signatures.hash', $has)->findAll();
        $sign = $sign->first();

        $valid = $details ? true : false;

        $name = [];
        $user_id = [];
        foreach ($details as $detail) {
            $user = new User();
            $user = $user->where('id', $detail['user_id'])->first();
            $name[] = $user['name'];
            $user_id[] = $user['id'];
        }

        //append $name to $details with variable 'user'
        foreach ($details as $key => $detail) {
            $details[$key]['user'] = $name[$key];
        }

        $name = implode(', ', $name);

        $data = [
            'valid' => $valid,
            'title' => 'Signature',
            'signature' => $sign,
            'name' => $name,
            'details' => $details,
            'qr' => $this->generateQR($sign['hash']),
        ];

        return view('verify', $data);
    }
}
