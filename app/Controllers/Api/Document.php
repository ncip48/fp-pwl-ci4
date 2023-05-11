<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Document as ModelsDocument;

class Document extends BaseController
{
    private $key;
    private $uname;
    private $pass;

    public function __construct()
    {
        $this->key = env('api.key.pdf.co');
        $this->uname = env('api.uname.pdfcrowd');
        $this->pass = env('api.key.pdfcrowd');
    }

    public function submit()
    {
        $url = "https://api.pdfcrowd.com/convert/20.10/";

        $html = $this->request->getPost('html');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERPWD, $this->uname . ":" . $this->pass);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'text' => $html,
            'no_margins' => true,
            'viewport_width' => 800,
            'rendering_mode' => 'viewport',
            'smart_scaling_mode' => 'viewport-fit',
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        //save response to file
        $name = rand(1000000000, 9999999999) . '.pdf';
        $file = fopen(ROOTPATH . 'public/file/output/' . $name, 'w');
        fwrite($file, $response);

        $session = \Config\Services::session();
        $id_user = $session->get('user')['id'];
        $id_template = $this->request->getPost('id_template');
        $id_kegiatan = $this->request->getPost('id_kegiatan');
        $status = 0;
        $pdf = $name;

        $document = new ModelsDocument();
        $document->insert([
            'id_user' => $id_user,
            'id_template' => $id_template,
            'id_kegiatan' => $id_kegiatan,
            'status' => $status,
            'pdf' => $pdf,
        ]);

        //response
        $data = [
            'pdf' => $name,
        ];

        return $this->getResponse('Berhasil menyimpan dokumen', $data);
    }
}
