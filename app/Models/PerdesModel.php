<?php

namespace App\Models;

use CodeIgniter\Model;

class PerdesModel extends Model
{
    protected $table = 'perdes';
    protected $primaryKey = 'id_perdes';
    protected $allowedFields = ['id_desa', 'nomor', 'tahun', 'tentang', 'ket', 'file'];

    public function edit($id_perdes = false)
    {
        if ($id_perdes == false) {
            // return $this->findAll();
            return $this->orderBy('id', 'desc')->findAll();
        }
        return $this->where(['id_perdes' => $id_perdes])->first();
    }

    public function perdes()
    {
        $query = $this->db->query('SELECT * FROM perdes');
        $negatif = $query->getNumRows();
        return $negatif;
    }

    public function getdesa()
    {
        // $url = 'http://sidoharjo-kulonprogo.desa.id/index.php/apis/get_nik/' . $nik;
        $url = 'https://gsb.kulonprogokab.go.id/noauth/jdih_hargorejo/list_produk_hukum_desa';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $hasil = curl_exec($ch);
        if ($hasil === false) {
            echo curl_error($ch);
        }

        return $hasil;
    }

}
