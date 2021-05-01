<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'artikel';
    protected $allowedFields = ['judul', 'konten', 'user', 'email', 'tgl', 'publikasi', 'topik', 'gambar', 'hits', 'tags', 'attach'];

    public function getBerita($slug = false)
    {
        if ($slug == false) {
            // return $this->findAll();
            // return $this->orderBy('id', 'desc')->findAll();
            return $this->where(['publikasi' => "1"])->orderBy('id', 'desc')->paginate(10, 'berita');
        }
        return $this->where(['judul' => $slug])->first();
    }
    public function berita($slug = false)
    {
        if ($slug == false) {
            // return $this->findAll();
            // return $this->orderBy('id', 'desc')->findAll();
            return $this->where(['publikasi' => "1"])->orderBy('id', 'desc')->paginate(3, 'berita');
        }
        return $this->where(['judul' => $slug])->first();
    }

    public function edit($id = false)
    {
        if ($id == false) {
            // return $this->findAll();
            // return $this->orderBy('id', 'desc')->findAll();
            return $this->where(['id' => $id])->orderBy('id', 'desc');
        }
        return $this->where(['id' => $id])->first();
    }

    public function search($cari)
    {
        // $builder = $this->table('peraturan');
        // $builder->like('keterangan', $keyword);
        // return $builder;
        $array = ['judul' => $cari, 'konten' => $cari];
        return $this->table('artikel')->like($array);
    }

    public function allberita()
    {
        $query = $this->db->query('SELECT * FROM mod_download');
        $negatif = $query->getNumRows();
        return $negatif;
    }

    public function kategoriberita()
    {
        $query = $this->db->query('SELECT * FROM artikel WHERE publikasi= "1" AND topik="2"');
        $negatif = $query->getNumRows();
        return $negatif;
    }

    public function kategorikajian()
    {
        $query = $this->db->query('SELECT * FROM artikel WHERE publikasi= "1" AND topik="3"');
        $negatif = $query->getNumRows();
        return $negatif;
    }

    public function kategoriartikel()
    {
        $query = $this->db->query('SELECT * FROM artikel WHERE publikasi= "1" AND topik="4"');
        $negatif = $query->getNumRows();
        return $negatif;
    }
}
