<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Berita extends BaseController
{
    public function index()
    {
        //  $artikel = $this->beritaModel->findAll();
        $cari = $this->request->getVar('cari');
        if ($cari != '') {
            $berita = $this->beritaModel->search($cari);
        } else {
            $berita = $this->beritaModel;
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'berita' => $berita->where('publikasi', 1)->orderBy('id', 'desc')->findAll(),
            'terbaru' => $this->beritaModel->berita(),
            'kategorib' => $this->beritaModel->kategoriberita(),
            'kategoria' => $this->beritaModel->kategoriartikel(),
            'kategorik' => $this->beritaModel->kategorikajian(),
            'pager' => $this->beritaModel->pager,
            'aktif' => $this->uri->getSegment(1)
        ];

        return view('berita/berita', $data);
    }

    public function topik($kategori)
    {
        $array = ['topik' => $kategori, 'publikasi' => 1];
        if ($kategori != '') {
            $berita = $this->beritaModel->where($array);
        } else {
            $berita = $this->beritaModel;
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'berita' => $berita->where('publikasi', 1)->orderBy('id', 'desc')->findAll(),
            'terbaru' => $this->beritaModel->berita(),
            'kategorib' => $this->beritaModel->kategoriberita(),
            'kategoria' => $this->beritaModel->kategoriartikel(),
            'kategorik' => $this->beritaModel->kategorikajian(),
            'pager' => $this->beritaModel->pager,
            'aktif' => $this->uri->getSegment(1)
        ];

        return view('berita/berita', $data);
    }

    public function detail($slug)
    {
        $data = [
            'berita' => $this->beritaModel->getBerita($slug),
            'terbaru' => $this->beritaModel->berita(),
            'aktif' => $this->uri->getSegment(1)
        ];
        $berita = $this->beritaModel->where('judul', $slug)->first();
        $id = $berita['id'];
        $read = $berita['hits'];
        $hits = $read + 1;

        // $read = $this->request->getVar('hits');
        // $hits = $read + 1;
        // $id = $this->request->getVar('id');

        $this->beritaModel
            ->where('id', $id)
            ->set(['hits' => $hits])
            ->update();

        // $this->beritaModel->save([
        //     'id' => $this->request->getVar('id'),
        //     'judul' => $this->request->getVar('judul'),
        //     'konten' => $this->request->getVar('konten'),
        //     'user' => $this->request->getVar('user'),
        //     'tgl' => $this->request->getVar('tgl'),
        //     'topik' => $this->request->getVar('topik'),
        //     'publikasi' => $this->request->getVar('publikasi'),
        //     'gambar' => $this->request->getVar('gambar'),
        //     'hits' => $hits,
        //     'tags' => $this->request->getVar('tags'),
        //     'attach' => $this->request->getVar('attach')
        // ]);
        return view('berita/detail', $data);
    }

    public function input()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        //  $artikel = $this->beritaModel->findAll();
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'topik' => $this->topikModel->findAll(),
            'validation' => \Config\Services::validation(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
        ];

        return view('berita/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ],
            'topik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum dipilih'
                ]
            ],
            'sumber' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ],
            'berita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,5120]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk_hukum/add')->withInput()->with('validation', $validation);
            return redirect()->to('/berita/add')->withInput();
        }
        $fileGambar = $this->request->getFile('foto');
        if ($fileGambar == '') {
            $foto = '';
        } else {
            //generate nama file
            $foto = $fileGambar->getRandomName();

            //pindah gambar
            $fileGambar->move('img/berita', $foto);
        }

        $fileLamp = $this->request->getFile('lampiran');
        if ($fileLamp == '') {
            $lampiran = '';
        } else {
            //pindah gambar
            $fileLamp->move('lampiran');

            //generate nama file
            $lampiran = $fileLamp->getName();
        }


        $date = date('Y-m-d H:i:s');
        $view = 0;
        $tampil = 1;
        $this->beritaModel->save([
            'judul' => $this->request->getVar('judul'),
            'konten' => $this->request->getVar('berita'),
            'user' => $this->request->getVar('sumber'),
            'tgl' => $date,
            'publikasi' => $tampil,
            'topik' => $this->request->getVar('topik'),
            'gambar' => $foto,
            'hits' => $view,
            'tags' => $this->request->getVar('ket'),
            'attach' => $lampiran
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/berita/tampil');
    }

    public function edit_berita($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        //  $artikel = $this->beritaModel->findAll();
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'topik' => $this->topikModel->findAll(),
            'validation' => \Config\Services::validation(),
            'berita' => $this->beritaModel->edit($id),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
        ];
        return view('berita/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ],
            'topik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum dipilih'
                ]
            ],
            'sumber' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ],
            'berita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,5120]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk_hukum/add')->withInput()->with('validation', $validation);
            return redirect()->to('/berita/edit/' . $id)->withInput();
        }
        $fileGambar = $this->request->getFile('foto');
        if ($fileGambar == '') {
            $foto = $this->request->getVar('fotolama');
        } else {
            //generate nama file
            $foto = $fileGambar->getRandomName();

            //pindah gambar
            $fileGambar->move('img/berita', $foto);

            //hapus file
            unlink('img/berita/' . $this->request->getVar('fotolama'));
        }

        $fileLamp = $this->request->getFile('lampiran');
        if ($fileLamp == '') {
            $lampiran = $this->request->getVar('fotolama');
        } else {
            //pindah gambar
            $fileLamp->move('lampiran');

            //generate nama file
            $lampiran = $fileLamp->getName();

            //hapus file
            unlink('lampiran/' . $this->request->getVar('lampiranlama'));
        }


        // $date = date('Y-m-d H:i:s');
        // $view = 0;
        // $tampil = 1;
        $this->beritaModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'konten' => $this->request->getVar('berita'),
            'user' => $this->request->getVar('sumber'),
            // 'tgl' => $date,
            // 'publikasi' => $tampil,
            'topik' => $this->request->getVar('topik'),
            'gambar' => $foto,
            // 'hits' => $view,
            'tags' => $this->request->getVar('ket'),
            'attach' => $lampiran
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/berita/tampil');
    }

    public function tampil()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        //  $artikel = $this->beritaModel->findAll();
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'berita' => $this->beritaModel->orderBy('id', 'desc')->findAll(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
        ];

        return view('berita/tampil', $data);
    }


    public function publikasi($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'berita' => $this->beritaModel->orderBy('id', 'desc')->findAll(),
            'username' => session()->get('username')
        ];
        // $fileGambar = $this->request->getFile('foto');
        // if ($fileGambar == '') {
        //     $foto = '';
        // } else {
        //     //pindah gambar
        //     $fileGambar->move('img');

        //     //generate nama file
        //     $foto = $fileGambar->getName();
        // }

        // $fileLamp = $this->request->getFile('lampiran');
        // if ($fileLamp == '') {
        //     $lampiran = '';
        // } else {
        //     //pindah gambar
        //     $fileLamp->move('img');

        //     //generate nama file
        //     $lampiran = $fileLamp->getName();
        // }
        $berita = $this->beritaModel->where('id', $id)->first();
        $publikasi = $berita['publikasi'];


        if ($publikasi == 0) {
            $view = 1;
        } else if ($publikasi == 1) {
            $view = 0;
        }

        $this->beritaModel
            ->where('id', $id)
            ->set(['publikasi' => $view])
            ->update();

        return redirect()->to('/berita/tampil');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $berita = $this->beritaModel->find($id);
        if ($berita['gambar'] != '') {
            //hapus gambar
            unlink('img/berita/' . $berita['gambar']);
        }
        if ($berita['attach'] != '') {
            //hapus gambar
            unlink('lampiran/' . $berita['attach']);
        }

        $this->beritaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/berita/tampil');
    }
    //--------------------------------------------------------------------

}
