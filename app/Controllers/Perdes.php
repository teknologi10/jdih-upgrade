<?php

namespace App\Controllers;

class Perdes extends BaseController
{
    public function desa()
    {
        $desa = $this->request->getVar('desa');
        $url = 'https://gsb.kulonprogokab.go.id/noauth/jdih_' . $desa . '/list_produk_hukum_desa/';
        $get_url = file_get_contents($url);
        $data = $get_url;


        $hapus_char_didepan = substr($data, 1);
        $hapus_char_terakhir = rtrim($hapus_char_didepan, '}');
        $list_perdes = $hapus_char_terakhir;

        $data_array = array(
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'aktif' => $this->uri->getSegment(1),
            'list' => json_decode($list_perdes)
        );


        return view('perdes/desa', $data_array);
    }

    // public function index()
    // {
    //     helper('curl_helper');

    //     $get_data = json_decode(curl_get('https://gsb.kulonprogokab.go.id/noauth/jdih_hargorejo/list_produk_hukum_desa'));

    //     $d['datalist'] = $get_data;

    //     echo json_encode($d);
    //     exit;

    // }

    public function index()
    {
        $data_array = array(
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'aktif' => $this->uri->getSegment(1)
        );


        return view('produk_hukum/perdes', $data_array);
    }

    // public function index()
    // {
    //     $url="https://gsb.kulonprogokab.go.id/noauth/jdih_hargorejo/list_produk_hukum_desa/";
    //     $get_url = file_get_contents($url);
    //     $data = $get_url;

    //     $data = [
    //             "judul" => "JDIH - Kabupaten Kulon Progo",
    //             "aktif" => $this->uri->getSegment(1),
    //             "keterangan" => "Keterangan",
    //         ];

    //     // echo json_encode($data);
    //     // exit();

    //     return view('produk_hukum/perdes', $data);
    // }

    // public function index()
    // {

    //     // $url="https://gsb.kulonprogokab.go.id/noauth/jdih_hargorejo/list_produk_hukum_desa";
    //     // $get_url = file_get_contents($url);
    //     // $data = json_decode($get_url);

    //     // $data_array = array(
    //     // 'judul' => 'JDIH - Kabupaten Kulon Progo',
    //     // 'aktif' => $this->uri->getSegment(1),
    //     // 'datalist' => $data
    //     // );

    //     $ambil_data = $this->get_produk_hukum();
    //     $data['datalist'] = json_decode($ambil_data, true);

    //     $data = [
    //         'judul' => 'JDIH - Kabupaten Kulon Progo',
    //         'aktif' => $this->uri->getSegment(1),
    //         'list' => $datalist
    //         // return $this->orderBy('id', 'desc')->findAll();
    //     ];

    //     echo json_encode($data);
    //     exit;

    //     return view('produk_hukum/perdes', $data);
    // }

    public function tampil()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'perdes' => $this->perdesModel->orderBy('id_perdes', 'desc')->findAll(),
            'desa' => $this->desaModel->orderBy('id_desa', 'desc')->findAll(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('perdes/tampil', $data);
    }

    public function input()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'desa' => $this->desaModel->orderBy('id_desa', 'desc')->findAll(),
            'validation' => \Config\Services::validation(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('perdes/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum dipilih'
                ]
            ],
            'nomor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk_hukum/add')->withInput()->with('validation', $validation);
            return redirect()->to('/perdes/add')->withInput();
        }

        $fileLamp = $this->request->getFile('lamp');
        if ($fileLamp == '') {
            $lampiran = '';
        } else {
            //pindah gambar
            $fileLamp->move('peraturan/perdes');

            //generate nama file
            $lampiran = $fileLamp->getName();
        }
        // dd($this->request->getVar());
        $this->perdesModel->save([
            'id_desa' => $this->request->getVar('desa'),
            'nomor' => $this->request->getVar('nomor'),
            'tahun' => $this->request->getVar('tahun'),
            'tentang' => $this->request->getVar('tentang'),
            'ket' => $this->request->getVar('ket'),
            'file' => $lampiran
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/perdes/tampil');
    }

    public function edit($id_perdes)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'desa' => $this->desaModel->findAll(),
            'validation' => \Config\Services::validation(),
            'perdes' => $this->perdesModel->edit($id_perdes),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('perdes/edit', $data);
    }

    public function update($id_perdes)
    {
        if (!$this->validate([
            'desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum dipilih'
                ]
            ],
            'nomor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk_hukum/add')->withInput()->with('validation', $validation);
            return redirect()->to('/perdes/edit/' . $this->request->getVar('perdeslama'))->withInput();
        }

        $fileLamp = $this->request->getFile('lamp');
        if ($fileLamp == '') {
            $lampiran = $this->request->getVar('lamplama');
        } else {
            //pindah gambar
            $fileLamp->move('peraturan/perdes');

            //generate nama file
            $lampiran = $fileLamp->getName();

            //hapus file
            unlink('peraturan/perdes/' . $this->request->getVar('lamplama'));
        }
        // dd($this->request->getVar());
        $this->perdesModel->save([
            'id_perdes' => $id_perdes,
            'id_desa' => $this->request->getVar('desa'),
            'nomor' => $this->request->getVar('nomor'),
            'tahun' => $this->request->getVar('tahun'),
            'tentang' => $this->request->getVar('tentang'),
            'ket' => $this->request->getVar('ket'),
            'file' => $lampiran
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/perdes/tampil');
    }

    public function delete($id_perdes)
    {
        //cari gambar berdasarkan id
        $perdes = $this->perdesModel->find($id_perdes);
        if ($perdes['file'] != '') {
            //hapus gambar
            unlink('peraturan/perdes/' . $perdes['file']);
        }

        $this->perdesModel->delete($id_perdes);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/perdes/tampil');
    }
    //--------------------------------------------------------------------

}
