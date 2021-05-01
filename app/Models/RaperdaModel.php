<?php

namespace App\Models;

use CodeIgniter\Model;

class RaperdaModel extends Model
{
    protected $table = 'mod_raperda';
    protected $allowedFields = ['id', 'judul', 'keterangan', 'url', 'hit', 'date', 'tahun', 'status'];

    public function raperda()
    {
        $query = $this->db->query('SELECT * FROM mod_raperda');
        $jumlah = $query->getNumRows();
        return $jumlah;
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

    public function getUrl($slug = false)
    {
        if ($slug == false) {
            // return $this->findAll();
            return $this->orderBy('id', 'desc')->findAll();
        }
        return $this->where(['url' => $slug])->first();
    }
}
