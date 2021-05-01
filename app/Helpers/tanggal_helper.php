<?php
function tjs($tgl)
{
    if ($tgl != "") {
        $pc_satu = explode(" ", $tgl);
        if (count($pc_satu) < 2) {
            $tgl1 = $pc_satu[0];
            $jam1 = "";
        } else {
            $jam1 = $pc_satu[1];
            $tgl1 = $pc_satu[0];
        }
        $pc_dua = explode("-", $tgl1);
        $tgl = $pc_dua[2];
        $bln = $pc_dua[1];
        $thn = $pc_dua[0];
        if ($bln == "01") {
            $bln_txt = "Januari";
        } else if ($bln == "02") {
            $bln_txt = "Februari";
        } else if ($bln == "03") {
            $bln_txt = "Maret";
        } else if ($bln == "04") {
            $bln_txt = "April";
        } else if ($bln == "05") {
            $bln_txt = "Mei";
        } else if ($bln == "06") {
            $bln_txt = "Juni";
        } else if ($bln == "07") {
            $bln_txt = "Juli";
        } else if ($bln == "08") {
            $bln_txt = "Agustus";
        } else if ($bln == "09") {
            $bln_txt = "September";
        } else if ($bln == "10") {
            $bln_txt = "Oktober";
        } else if ($bln == "11") {
            $bln_txt = "November";
        } else if ($bln == "12") {
            $bln_txt = "Desember";
        } else {
            $bln_txt = "";
        }

        $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
        $nama_hari = "";
        if ($nama == "Sunday") {
            $nama_hari = "Minggu";
        } else if ($nama == "Monday") {
            $nama_hari = "Senin";
        } else if ($nama == "Tuesday") {
            $nama_hari = "Selasa";
        } else if ($nama == "Wednesday") {
            $nama_hari = "Rabu";
        } else if ($nama == "Thursday") {
            $nama_hari = "Kamis";
        } else if ($nama == "Friday") {
            $nama_hari = "Jumat";
        } else if ($nama == "Saturday") {
            $nama_hari = "Sabtu";
        }
        // return $nama_hari.','.$tgl.' '.$bulan.' '.$thn;
        return $nama_hari . ", " . $tgl . " " . $bln_txt . " " . $thn . "  " . $jam1;
    } else {
        return "";
    }
}
