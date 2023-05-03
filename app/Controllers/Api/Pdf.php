<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\TemplateDocument;
use CURLFile;
//use dompdf
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf extends BaseController
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

    public function upload()
    {
        $file = $this->request->getFile('file');
        $name = $this->request->getPost('name');
        if (!$file->isValid()) {
            return $this->getResponse('File tidak valid', [], 400);
        }
        //rename file
        $pdf = $file->getRandomName();
        $file->move(ROOTPATH . 'public/file/pdf', $pdf);

        //get the root path
        $rootPath = ROOTPATH . 'public/file/pdf/' . $pdf;
        $data = [
            'path' => $rootPath,
            'name' => $name,
            'pdf' => $pdf,
            'link' => base_url('file/pdf/' . $pdf),
        ];
        $this->newConvert($data, $rootPath);
        return $this->getResponse('Sukses upload pdf', $data);
    }

    public function newConvert($data, $file)
    {
        $url = "https://api.pdfcrowd.com/convert/20.10/";

        $body = array(
            'input_format' => 'pdf',
            'output_format' => 'html',
            'file' => new CURLFile($file)
        );

        //curl with Basic Authentication
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERPWD, $this->uname . ":" . $this->pass);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);

        $html = curl_exec($curl);

        curl_close($curl);

        $data = [
            'id_program' => 1,
            'name' => $data['name'],
            'pdf' => $data['pdf'],
            'html' => $html,
        ];

        $model = new TemplateDocument();
        $model->insert($data);
    }

    public function convert($data)
    {

        $apiKey = $this->key; // The authentication key (API Key). Get your own by registering at https://app.pdf.co

        $url = "https://api.pdf.co/v1/pdf/convert/to/html";

        $dummy = "https://b8e7-103-184-180-41.ngrok-free.app/file/pdf/1682936908_e586d7cad8fa723f37b6.pdf";

        $payload = json_encode(array(
            "url" => $dummy,
            "inline" => false,
            "async" => false
        ));

        // var_dump($payload);
        // die();

        $headers = array(
            "Content-Type: application/json",
            "x-api-key: " . $apiKey,
            "Content-Length: " . strlen($payload)
        );

        // Prepare request
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute request
        $response = curl_exec($curl);

        // Parse JSON response
        $json = json_decode($response);

        // return $this->getResponse('Sukses convert pdf', $response);
        // var_dump($json->error);
        // die();

        if ($json->error == false) {
            // Display link to the file with conversion results
            // echo json_encode($json->url);
            $this->saveHtmlToMysql($json->url, $data);
        } else {
            // Display service reported error
            // echo $json->message;
            return $this->getResponse('Gagal convert pdf', [], 400, $json->message);
        }
    }

    public function saveHtmlToMysql($link, $data)
    {
        //get html from link
        $html = file_get_contents($link);

        //donload html then save content to mysql
        $data = [
            'id_program' => 1,
            'name' => $data['name'],
            'pdf' => $data['pdf'],
            'html' => $html,
        ];

        $model = new TemplateDocument();
        $model->insert($data);
    }

    public function showHtmlFromMysql()
    {
        $model = new TemplateDocument();
        $data = $model->where('id', 7)->findAll();
        $html = $data[0]['html'];

        $payload = [
            'title' => 'Convert PDF to HTML',
            'html' => $html,
        ];
        return view('welcome_message', $payload);
    }

    public function convert2()
    {
        //get input file from post
        $file = $this->request->getFile('file');
        $root = getcwd();
        //get root project
        $root = str_replace("public", "", $root);
        //get public folder
        $pub = $root . "/public/file/";
        $source_pdf = $pub . "contoh1.pdf";
        $output_folder = $pub . "output/";

        if (!file_exists($output_folder)) {
            mkdir($output_folder, 0777, true);
        }
        //get root folder
        $pdftohtml = $root . "/utils/pdftohtml.exe";
        // $a = passthru("$pdftohtml $source_pdf $output_folder/new_file_name", $b);
        // var_dump($a);

        $cmd = $root . "utils/xpdf/bin32/pdftohtml $source_pdf $output_folder";

        // var_dump($cmd);
        // die();
        exec($cmd, $out, $ret);
        var_dump($out);
        echo "Exit code: $ret";
    }

    public function generatePdf()
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

        //response
        $data = [
            'title' => 'Convert PDF to HTML',
            'pdf' => $name,
        ];

        return $this->getResponse('Berhasil menyimpan dokumen', $data);
    }

    public function generatePdf3()
    {
        //retrieve input from post named 'html'
        $html = $this->request->getPost('html');

        //change html to pdf with dompdf
        $dompdf = new Dompdf();
        //loadHtml but font size set to 12px
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);
        $options = new Options();
        $options->setDpi(300);
        $options->set('defaultFont', 'Open Sans');
        $options->setIsFontSubsettingEnabled(true);

        //read local pdf named 7112935509.pdf.html
        // $html = file_get_contents(ROOTPATH . 'public/file/output/7112935509.pdf.html');
        $dompdf->loadHtml($html);
        // $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        //random name for pdf
        $name = rand(1000000000, 9999999999) . ".pdf";
        //save pdf to local file
        // $pdf = $dompdf->stream($name, array("Attachment" => false));
        $file = $dompdf->output();
        file_put_contents(ROOTPATH . 'public/file/output/' . $name, $file);

        //save the html to local file
        file_put_contents(ROOTPATH . 'public/file/output/' . $name . ".html", $html);

        //get result 
        $data = [
            'path' => ROOTPATH . 'public/file/output/' . $name,
            'name' => $name,
            'link' => base_url('file/pdf/' . $name),
        ];
        return $this->getResponse('Berhasil menyimpan dokumen', $data);
    }

    public function generatePdf2()
    {
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->request->getPost('html');

        $mpdf->WriteHTML($html);
        // $mpdf->Output();

        //save to local file
        $name = rand(1000000000, 9999999999) . ".pdf";
        $mpdf->Output(ROOTPATH . 'public/file/output/' . $name, \Mpdf\Output\Destination::FILE);

        //get result
        $data = [
            'path' => ROOTPATH . 'public/file/output/' . $name,
            'name' => $name,
            'link' => base_url('file/pdf/' . $name),
        ];
        return $this->getResponse('Sukses generate pdf', $data);
    }
}
