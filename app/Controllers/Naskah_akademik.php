<?php

namespace App\Controllers;

class Naskah_akademik extends BaseController
{


    public function index()
    {

        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'naskah' => $this->naskahModel->orderBy('id_naskah_akademik', 'desc')->findAll(),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];

        // echo view('front/header', $data);
        return view('naskah_akademik/naskah_akademik', $data);
        // echo view('front/footer');
    }

    public function tampil()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'naskah' => $this->naskahModel->orderBy('id_naskah_akademik', 'desc')->findAll(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('naskah_akademik/tampil', $data);
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
        return view('naskah_akademik/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} naskah akademik belum diisi'
                ]
            ],
            'naskah' => [
                'rules' => 'uploaded[naskah]|max_size[naskah,4048]|ext_in[naskah,pdf]',
                'errors' => [
                    'uploaded' => 'Pilih dokumen terlebih dahulu',
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in' => 'Format dokumen salah'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk_hukum/add')->withInput()->with('validation', $validation);
            return redirect()->to('/naskah_akademik/add')->withInput();
        }

        $fileFile = $this->request->getFile('naskah');
        $fileFile->move('peraturan/naskah_akademik');
        $url = $fileFile->getName();

        $date = date('Y-m-d');
        $this->naskahModel->save([
            'judul' => $this->request->getVar('judul'),
            // 'keterangan' => $this->request->getVar('ket'),
            'file' => $url,
            'tanggal' => $date
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/naskah_akademik/tampil');
    }

    public function edit_naskah($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        //  $artikel = $this->beritaModel->findAll();
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'validation' => \Config\Services::validation(),
            'naskah' => $this->naskahModel->edit($id),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
        ];
        return view('naskah_akademik/edit', $data);
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
            return redirect()->to('/naskah_akademik/edit_naskah/' . $id)->withInput();
        }
        $fileRaperda = $this->request->getFile('naskah');

        //cek gambar, apakah tetap gambar lama
        if ($fileRaperda == '') {
            $namaRaperda = $this->request->getVar('naskahlama');
        } else {
            //pindah gambar
            $fileRaperda->move('peraturan/naskah_akademik');

            //generate nama file
            $namaRaperda = $fileRaperda->getName();

            //hapus file
            unlink('peraturan/naskah_akademik/' . $this->request->getVar('naskahlama'));
        }
        // dd($this->request->getVar());
        $date = $this->request->getVar('tangallama');
        $this->naskahModel->save([
            'id_naskah_akademik' => $id,
            'judul' => $this->request->getVar('judul'),
            'file' => $namaRaperda,

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/naskah_akademik/tampil');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $naskah = $this->naskahModel->find($id);
        if ($naskah['file'] != '') {
            //hapus gambar
            unlink('peraturan/naskah_akademik/' . $naskah['file']);
        }

        $this->naskahModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/naskah_akademik/tampil');
    }
    //--------------------------------------------------------------------

}
