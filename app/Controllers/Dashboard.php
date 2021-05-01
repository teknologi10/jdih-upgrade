<?php

namespace App\Controllers;

class Dashboard extends BaseController
{


    public function index()
    {
        $slug = 1;
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'peraturan' => $this->peraturanModel->orderBy('id', 'desc')->paginate(3),
            'berita' => $this->beritaModel->berita(),
            'pd' => $this->peraturanModel->peraturandaerah(),
            'pb' => $this->peraturanModel->peraturanbupati(),
            'kb' => $this->peraturanModel->keputusanbupati(),
            'ib' => $this->peraturanModel->instruksibupati(),
            'mou' => $this->peraturanModel->mou(),
            'perdes' => $this->perdesModel->perdes(),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];

        // echo view('front/header', $data);
        return view('front/dashboard', $data);
        // echo view('front/footer');
    }

    //--------------------------------------------------------------------

}
