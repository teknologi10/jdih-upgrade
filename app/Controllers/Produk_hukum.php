<?php

namespace App\Controllers;

class Produk_hukum extends BaseController
{


    public function index()
    {
        $cari = $this->request->getVar('cari');
        if ($cari != '') {
            $peraturan = $this->peraturanModel->search($cari);
        } else {
            $peraturan = $this->peraturanModel;
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'peraturan' => $peraturan->orderBy('id', 'desc')->findAll(),
            // 'pager' => $peraturan->pager,
            'pd' => $this->peraturanModel->peraturandaerah(),
            'pb' => $this->peraturanModel->peraturanbupati(),
            'kb' => $this->peraturanModel->keputusanbupati(),
            'ib' => $this->peraturanModel->instruksibupati(),
            'mou' => $this->peraturanModel->mou(),
            'terbaru' => $this->peraturanModel->orderBy('id', 'desc')->paginate(3),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('produk_hukum/produk_hukum', $data);
    }

    public function kategori($kategori)
    {
        if ($kategori != '') {
            $peraturan = $this->peraturanModel->where('kid', $kategori);
        } else {
            $peraturan = $this->peraturanModel;
        }


        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'peraturan' => $peraturan->orderBy('id', 'desc')->findAll(),
            // 'pager' => $peraturan->pager,
            'pd' => $this->peraturanModel->peraturandaerah(),
            'pb' => $this->peraturanModel->peraturanbupati(),
            'kb' => $this->peraturanModel->keputusanbupati(),
            'ib' => $this->peraturanModel->instruksibupati(),
            'mou' => $this->peraturanModel->mou(),
            'terbaru' => $this->peraturanModel->orderBy('id', 'desc')->paginate(3),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('produk_hukum/produk_hukum', $data);
    }

    public function tampil()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'peraturan' => $this->peraturanModel->orderBy('id', 'desc')->findAll(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('produk_hukum/tampil', $data);
    }

    public function input()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        // session();
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'kategori' => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('produk_hukum/tambah', $data);
    }

    public function input_tte()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        // session();
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'kategori' => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1),
            'id_produk_hukum' => $this->uri->getSegment(3),
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('produk_hukum/input_tte', $data);
    }

    public function ttd_ok()
    {
        $post = $this->request->getPost();

        // get id produk hukum yang diambil dari post form
        $id_produk_hukum = $post['id_produk_hukum'];
        $passphrase = $post['passphrase'];

        //ubah is_ttd menjadi 1
        $p = $this->peraturanModel->where('id', $id_produk_hukum)->first();
        $ttd = $p['is_ttd'];


        if ($ttd == 0) {
            $is_ttd = 1;
        }
        // dd($is_ttd);
        $this->peraturanModel
            ->where('id', $id_produk_hukum)
            ->set(['is_ttd' => $is_ttd])
            ->update();

        // ambil file dari
        $get_file_produk_hukum = $this->db->table('mod_download')
            ->where('id', $id_produk_hukum)
            ->get()->getRowArray();
        $file_produk_hukum = $get_file_produk_hukum['url'];
        // letak path file disini
        $path_file_produk_hukum = './peraturan/files/' . $file_produk_hukum;

        // jika file ditemukan
        if (is_file($path_file_produk_hukum)) {

            helper('ttd_helper');

            $username = '3401021805680001';
            $passphrase = $passphrase;
            // $passphrase = 'Ekowisnu1968';
            $file_surat = fopen($path_file_produk_hukum, 'r');
            // $file_gambar_ttd = fopen($file_image_ttd, 'r');

            // proses TTD
            $ttd = ttd($username, $passphrase, $file_surat, 'http://jdih.kulonprogokab.go.id/detil_produk_hukum/' . $id_produk_hukum);

            if ($ttd['success']) {
                // jika sukses, simpan ke folder `signed`
                save_to_file($ttd['response'], './peraturan/files/signed/produk_hukum_' . str_pad($id_produk_hukum, 4, "0", STR_PAD_LEFT) . '.pdf');

                session()->setFlashdata('pesan', '<div class="alert alert-success">Berhasil ditandatangani. Lihat file : <a href="' . base_url('peraturan/files/signed/produk_hukum_' . str_pad($id_produk_hukum, 4, "0", STR_PAD_LEFT) . '.pdf') . '" target="_blank">klik disini</a></div>');

                // TODO : tambahkan skrip untuk update table field is_ttd = 1;


                return redirect()->to('/produk_hukum/input_tte/' . $id_produk_hukum);
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger">' . json_encode($ttd['response']) . '</div>');
                return redirect()->to('/produk_hukum/input_tte/' . $id_produk_hukum);
            }

            // echo var_dump($ttd);
        }
    }

    public function save()
    {
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk hukum belum dipilih'
                ]
            ],
            'nomor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk hukum belum diisi'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk hukum belum diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk hukum belum dipilih'
                ]
            ],
            'peraturan' => [
                'rules' => 'uploaded[peraturan]|max_size[peraturan,4048]|ext_in[peraturan,pdf]',
                'errors' => [
                    'uploaded' => 'Pilih dokumen terlebih dahulu',
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in' => 'Format dokumen salah'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk_hukum/add')->withInput()->with('validation', $validation);
            return redirect()->to('/produk_hukum/add')->withInput();
        }

        $fileFile = $this->request->getFile('peraturan');
        $fileFile->move('peraturan/files');
        $url = $fileFile->getName();

        $date = strtotime($this->request->getVar('tanggal'));
        $this->peraturanModel->save([
            'judul' => $this->request->getVar('nomor'),
            'keterangan' => $this->request->getVar('ket'),
            'url' => $url,
            'date' => $date,
            'kid' => $this->request->getVar('kategori'),
            'tahun' => $this->request->getVar('tahun'),
            'status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/produk_hukum/tampil');
    }

    public function preview($slug)
    {
        $data = [
            'url' => $this->peraturanModel->getUrl($slug)
        ];

        $peraturan = $this->peraturanModel->where('url', $slug)->first();
        $id = $peraturan['id'];
        $read = $peraturan['hit'];
        $hits = $read + 1;

        // $read = $this->request->getVar('download');
        // $down = $read + 1;

        $this->peraturanModel
            ->where('id', $id)
            ->set(['hit' => $hits])
            ->update();
        // $this->peraturanModel->save([
        //     'id' => $this->request->getVar('id'),
        //     'judul' => $this->request->getVar('judul'),
        //     'keterangan' => $this->request->getVar('keterangan'),
        //     'url' => $this->request->getVar('url'),
        //     'hit' => $down,
        //     'date' => $this->request->getVar('date'),
        //     'kid' => $this->request->getVar('kid'),
        //     'tahun' => $this->request->getVar('tahun'),
        //     'status' => $this->request->getVar('status')
        // ]);
        return view('produk_hukum/preview', $data);
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $peraturan = $this->peraturanModel->find($id);
        if ($peraturan['url'] != '') {
            //hapus gambar
            unlink('peraturan/files/' . $peraturan['url']);
        }
        if ($peraturan['is_ttd'] == 1) {
            //hapus gambar
            unlink('peraturan/files/signed/' . 'produk_hukum_' . $peraturan['id'] . '.pdf');
        }

        $this->peraturanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/produk_hukum/tampil');
    }

    public function edit($slug)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'kategori' => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
            'peraturan' => $this->peraturanModel->getUrl($slug),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('produk_hukum/edit', $data);
    }

    public function update($id)
    {
        // dd($this->request->getVar());
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk hukum belum dipilih'
                ]
            ],
            'nomor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk hukum belum diisi'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk hukum belum diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk hukum belum dipilih'
                ]
            ]
        ])) {
            return redirect()->to('/produk_hukum/edit/' . $this->request->getVar('peraturanlama'))->withInput();
        }
        $filePeraturan = $this->request->getFile('peraturan');

        //cek gambar, apakah tetap gambar lama
        if ($filePeraturan == '') {
            $namaPeraturan = $this->request->getVar('peraturanlama');
        } else {
            //pindah gambar
            $filePeraturan->move('peraturan/files');

            //generate nama file
            $namaPeraturan = $filePeraturan->getName();

            //hapus file
            unlink('peraturan/files/' . $this->request->getVar('peraturanlama'));
        }
        // dd($this->request->getVar());
        $date = strtotime($this->request->getVar('tanggal'));
        $this->peraturanModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('nomor'),
            'keterangan' => $this->request->getVar('ket'),
            'url' => $namaPeraturan,
            'date' => $date,
            'kid' => $this->request->getVar('kategori'),
            'tahun' => $this->request->getVar('tahun'),
            'status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/produk_hukum/tampil');
    }

    //--------------------------------------------------------------------

}
