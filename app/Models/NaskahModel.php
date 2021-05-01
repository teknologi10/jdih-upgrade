<?php

namespace App\Models;

use CodeIgniter\Model;

class NaskahModel extends Model
{
    protected $table = 'naskah_akademik';
    protected $primaryKey = 'id_naskah_akademik';
    protected $allowedFields = ['judul', 'tanggal', 'file'];

    public function edit($id = false)
    {
        if ($id == false) {
            // return $this->findAll();
            // return $this->orderBy('id', 'desc')->findAll();
            return $this->where(['id_naskah_akademik' => $id])->orderBy('id_naskah_akademik', 'desc');
        }
        return $this->where(['id_naskah_akademik' => $id])->first();
    }

    public function naskah()
    {
        $query = $this->db->query('SELECT * FROM naskah_akademik');
        $jumlah = $query->getNumRows();
        return $jumlah;
    }
}
