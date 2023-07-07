<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Document as ModelsDocument;
use App\Models\TemplateDocument;
use CURLFile;

class Document extends BaseController
{
    private $uname;
    private $pass;

    public function __construct()
    {
        $this->uname = env('api.uname.pdfcrowd');
        $this->pass = env('api.key.pdfcrowd');
    }

    public function submit()
    {
        $html = $this->request->getVar('html');
        $name = rand(1000000000, 9999999999) . '.pdf';
        try {
            // create the API client instance
            $client = new \Pdfcrowd\HtmlToPdfClient($this->uname, $this->pass);

            // run the conversion and write the result to a file
            $client->convertStringToFile(
                $html,
                ROOTPATH . 'public/file/output/' . $name
            );
        } catch (\Pdfcrowd\Error $why) {
            // report the error
            error_log("Pdfcrowd Error: {$why}\n");

            // rethrow or handle the exception
            throw $why;
        }

        $session = \Config\Services::session();
        $id_user = $session->get('user')['id'];
        // dd($session->get('user'));
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

    public function deleteDocument($id)
    {
        $document = new ModelsDocument();
        $document = $document->find($id);
        unlink(ROOTPATH . 'public/file/output/' . $document['pdf']);
        $document->delete($id);
        return $this->getResponse('Berhasil menghapus dokumen');
    }

    public function deleteTemplateDocument($id)
    {
        $document = new TemplateDocument();
        $document = $document->find($id);
        unlink(ROOTPATH . 'public/file/pdf/' . $document['pdf']);
        $document = new TemplateDocument();
        $document->where('id', $id)->delete();
        return $this->getResponse('Berhasil menghapus dokumen');
    }
}
