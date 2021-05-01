<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'user' => $this->userModel->findAll(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('user/tampil', $data);
    }

    public function input()
    {
        // session();
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'validation' => \Config\Services::validation(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('user/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[useraura.user]',
                'errors' => [
                    'required' => '{field} user belum diisi',
                    'is_unique' => '{field} user sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} user belum diisi'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} user belum dipilih'
                ]
            ],
            'tipe' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} user belum dipilih'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk_hukum/add')->withInput()->with('validation', $validation);
            return redirect()->to('/user/add')->withInput();
        }


        $password = md5($this->request->getVar('password'));
        $this->userModel->save([
            'user' => $this->request->getVar('nama'),
            'password' => $password,
            'email' => $this->request->getVar('email'),
            'level' => $this->request->getVar('level'),
            'tipe' => $this->request->getVar('tipe')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/user/tampil');
    }

    public function delete($UserId)
    {
        $this->userModel->delete($UserId);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/user/tampil');
    }

    //--------------------------------------------------------------------

}
