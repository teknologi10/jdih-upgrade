<?php

namespace App\Models;

use CodeIgniter\Model;

class PeraturanModel extends Model
{
    protected $table = 'mod_download';
    protected $allowedFields = ['judul', 'keterangan', 'url', 'hit', 'date', 'kid', 'tahun', 'status', 'is_ttd'];

    public function getUrl($slug = false)
    {
        if ($slug == false) {
            // return $this->findAll();
            return $this->orderBy('id', 'desc')->findAll();
        }
        return $this->where(['url' => $slug])->first();
    }

    public function search($cari)
    {
        // $builder = $this->table('peraturan');
        // $builder->like('keterangan', $keyword);
        // return $builder;

        return $this->table('peraturan')->like('keterangan', $cari);
    }

    public function peraturan()
    {
        $query = $this->db->query('SELECT * FROM mod_download');
        $negatif = $query->getNumRows();
        return $negatif;
    }

    public function peraturandaerah()
    {
        $query = $this->db->query('SELECT * FROM mod_download WHERE kid= "1"');
        $negatif = $query->getNumRows();
        return $negatif;
    }

    public function peraturanbupati()
    {
        $query = $this->db->query('SELECT * FROM mod_download WHERE kid= "2"');
        $negatif = $query->getNumRows();
        return $negatif;
    }

    public function keputusanbupati()
    {
        $query = $this->db->query('SELECT * FROM mod_download WHERE kid= "3"');
        $negatif = $query->getNumRows();
        return $negatif;
    }

    public function instruksibupati()
    {
        $query = $this->db->query('SELECT * FROM mod_download WHERE kid= "4"');
        $negatif = $query->getNumRows();
        return $negatif;
    }

    public function mou()
    {
        $query = $this->db->query('SELECT * FROM mod_download WHERE kid= "5"');
        $negatif = $query->getNumRows();
        return $negatif;
    }
}
