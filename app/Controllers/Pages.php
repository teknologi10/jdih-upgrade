<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Home | Latihan CI 4',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'judul' => 'About | Latihan CI 4'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'judul' => 'Contact | Latihan CI 4',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. ABC',
                    'kota' => 'Purworejo'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl.XZY',
                    'kota' => 'Wates'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }
    //--------------------------------------------------------------------

}
