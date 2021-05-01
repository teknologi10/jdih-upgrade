<?php

namespace App\Controllers;

class Raperda extends BaseController
{


    public function index()
    {
        $slug = 1;
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'raperda' => $this->raperdaModel->orderBy('id', 'desc')->findAll(),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];

        // echo view('front/header', $data);
        return view('raperda/raperda', $data);
        // echo view('front/footer');
    }

    public function preview($slug)
    {
        $data = [
            'url' => $this->raperdaModel->getUrl($slug)
        ];

        $raperda = $this->raperdaModel->where('url', $slug)->first();
        // dd($raperda);
        $id = $raperda['id'];
        $read = $raperda['hit'];
        $hits = $read + 1;

        // $read = $this->request->getVar('download');
        // $down = $read + 1;

        $this->raperdaModel
            ->where('id', $id)
            ->set(['hit' => $hits])
            ->update();

        return view('raperda/preview', $data);
    }

    public function tampil()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'raperda' => $this->raperdaModel->orderBy('id', 'desc')->findAll(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('raperda/tampil', $data);
    }

    public function input()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        // session();
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            // 'kategori' => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('raperda/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} raperda belum diisi'
                ]
            ],
            'raperda' => [
                'rules' => 'uploaded[raperda]|max_size[raperda,4048]|ext_in[raperda,pdf]',
                'errors' => [
                    'uploaded' => 'Pilih dokumen terlebih dahulu',
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in' => 'Format dokumen salah'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk_hukum/add')->withInput()->with('validation', $validation);
            return redirect()->to('/raperda/add')->withInput();
        }

        $fileFile = $this->request->getFile('raperda');
        $fileFile->move('peraturan/raperda');
        $url = $fileFile->getName();

        $date = strtotime($this->request->getVar('tanggal'));
        $this->raperdaModel->save([
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('ket'),
            'url' => $url,
            'date' => $date
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/raperda/tampil');
    }

    public function edit_raperda($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        //  $artikel = $this->beritaModel->findAll();
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'validation' => \Config\Services::validation(),
            'raperda' => $this->raperdaModel->edit($id),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
        ];
        return view('raperda/edit', $data);
    }

    public function update($id)
    {
        // dd($this->request->getVar());
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} raperda belum diisi'
                ]
            ]
        ])) {
            return redirect()->to('/raperda/edit_raperda/' . $id)->withInput();
        }
        $fileRaperda = $this->request->getFile('raperda');

        //cek gambar, apakah tetap gambar lama
        if ($fileRaperda == '') {
            $namaRaperda = $this->request->getVar('raperdalama');
        } else {
            //pindah gambar
            $fileRaperda->move('peraturan/raperda');

            //generate nama file
            $namaRaperda = $fileRaperda->getName();

            //hapus file
            unlink('peraturan/raperda/' . $this->request->getVar('raperdalama'));
        }
        // dd($this->request->getVar());
        $date = strtotime($this->request->getVar('tanggal'));
        $this->raperdaModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('ket'),
            'url' => $namaRaperda,
            'date' => $date
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/raperda/tampil');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $raperda = $this->raperdaModel->find($id);
        if ($raperda['url'] != '') {
            //hapus gambar
            unlink('peraturan/raperda/' . $raperda['url']);
        }

        $this->raperdaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/raperda/tampil');
    }
    //--------------------------------------------------------------------

}
