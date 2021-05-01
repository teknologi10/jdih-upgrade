<?php

namespace App\Controllers;

class Konsultasi extends BaseController
{


    public function index()
    {

        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];

        // echo view('front/header', $data);
        return view('konsultasi_hukum', $data);
        // echo view('front/footer');
    }

    //--------------------------------------------------------------------

}
