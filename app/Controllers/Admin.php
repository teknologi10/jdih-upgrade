<?php

namespace App\Controllers;

class Admin extends BaseController
{


    public function index()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk_hukum/add')->withInput()->with('validation', $validation);
            return redirect()->to('/login')->withInput();
        }

        $session = \Config\Services::session();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        $user = $this->userModel->where('user', $username)->first();
        if (empty($user)) {
            session()->setFlashdata('pesan', 'Username Belum Terdaftar');
            return redirect()->to('/login')->withInput();
        }
        if ($user['password'] != $password) {
            session()->setFlashdata('pesan', 'Password Salah');
            return redirect()->to('/login')->withInput();
        }

        $session->set('username', $username);

        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'berita' => $this->beritaModel->orderBy('id', 'desc')->countAll(),
            'ph' => $this->peraturanModel->peraturan(),
            'perdes' => $this->perdesModel->perdes(),
            'raperda' => $this->raperdaModel->raperda(),
            'naskah' => $this->naskahModel->naskah(),
            'username' => $session->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        echo view('admin/header', $data);
        echo view('admin/body', $data);
        echo view('admin/footer');
    }

    public function admin()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'judul' => 'JDIH - Kabupaten Kulon Progo',
            'berita' => $this->beritaModel->orderBy('id', 'desc')->countAll(),
            'ph' => $this->peraturanModel->peraturan(),
            'perdes' => $this->perdesModel->perdes(),
            'raperda' => $this->raperdaModel->raperda(),
            'naskah' => $this->naskahModel->naskah(),
            'username' => session()->get('username'),
            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        echo view('admin/header', $data);
        echo view('admin/body', $data);
        echo view('admin/footer');
    }

    public function login()
    {
        $data = [
            'validation' => \Config\Services::validation()
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        // echo view('front/header');
        return view('login', $data);
        // echo view('front/footer');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        // session_destroy();
        return redirect()->to('/login');
    }

    //--------------------------------------------------------------------

}
