<?php
use GuzzleHttp\Client;


function tes($id_ttd)
{

    return "TTD Berhasil. Id produk hukum : " . $id_ttd;
}

function ttd($username, $passphrase, $file_surat, $teks_qr, $file_gambar_ttd = false)
{
    // $api_tte_pemda = "https://suratku.kulonprogokab.go.id/index.php/web_service/tte/api";
    $api_tte_pemda = "http://103.135.180.100/";

    $client = new Client(
        [
            'base_uri' => $api_tte_pemda,
            'curl' => array(CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false),
            'allow_redirects' => false,
            'cookies' => true,
            'verify' => false
        ]
    );

    $multipart = [
        ['name' => 'nik', 'contents' => $username],
        ['name' => 'passphrase', 'contents' => $passphrase],
        ['name' => 'tampilan', 'contents' => 'visible'],
        // ['name' => 'halaman', 'contents' => 'pertama'],
        ['name' => 'page', 'contents' => 1],
        ['name' => 'image', 'contents' => 'false'],
        ['name' => 'linkQR', 'contents' => $teks_qr],
        ['name' => 'xAxis', 'contents' => 5],
        ['name' => 'yAxis', 'contents' => 5],
        ['name' => 'width', 'contents' => 600],
        ['name' => 'height', 'contents' => 60],
        ['name' => 'text', 'contents' => 'Dokumen ini ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan oleh BSrE'],
        ['Content-type' => 'multipart/form-data', 'name' => 'file', 'contents' => $file_surat],
    ];

    if ($file_gambar_ttd) {
        $multipart[] =  [
            'Content-type' => 'multipart/form-data',
            'name'     => 'imageTTD',
            'contents' => $file_gambar_ttd,
        ];
    }

    $res1 = $client->post(
        '/api/sign/pdf',
        [
            'auth' => ['esign', 'qwerty'],
            'multipart' => $multipart,
            'http_errors' => false,
            // 'stream' => true,
            // 'save_to' => fopen($saveTo, 'w+'),
        ]
    );

    $statuscode = $res1->getStatusCode();

    if ($statuscode === 200) {
        $response_body = $res1->getBody()->getContents();

        return [
            'success' => true,
            'response' => $response_body
        ];
    } else {
        $response_body = json_decode($res1->getBody(), true);

        // log_message('error', 'GAGAL_TTD: Username: '.$username.', passphrase: '.$passphrase.', Penandatangan: '.$username.', Response: '.json_encode(json_decode($res1->getBody())));

        // return ['success'=>false, 'response'=>$response_body, 'status_code'=>$statuscode];
        return [
            'success' => false,
            'response' => $response_body
        ];
    }
}

function save_to_file($data, $path_file)
{
    $path = $path_file;
    $content = $data;

    // save PDF buffer
    file_put_contents($path, $content);

    // ensure we don't have any previous output
    // if(headers_sent()){
    //     exit("PDF stream will be corrupted - there is already output from previous code.");
    // }

    // header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
    // header('Pragma: public');
    // header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    // header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');

    // // force download dialog
    // header('Content-Type: application/force-download');
    // header('Content-Type: application/octet-stream', false);
    // header('Content-Type: application/download', false);

    // // use the Content-Disposition header to supply a recommended filename
    // header('Content-Disposition: attachment; filename="'.basename($path).'";');
    // header('Content-Transfer-Encoding: binary');
    // header('Content-Length: '.filesize($path));
    // header('Content-Type: application/pdf', false);

    // // send binary stream directly into buffer rather than into memory
    // readfile($path);

    // // make sure stream ended
    // exit();
}
