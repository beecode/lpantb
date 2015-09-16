<?php

namespace App\DAO;

use App\Models\Anak;
use App\DAO\AnakDAO;
use App\DAO\JenisKasusDAO;
use App\Models\JenisKasus;
use App\Models\Provinsi;
use App\Models\KabKota;

/**
 * Description of ReportDAO
 *
 * @author nunenuh
 */
class ReportDAO {

    public static function usia($start = null, $end = null) {
        $anak = ReportDAO::getAnakBetween($start, $end);
        $a = 0;
        $b = 0;
        $c = 0;
        foreach ($anak as $va) {
            if ($va->umur_satuan == "Tahun") {
                if ($va->umur >= 11 && $va->umur <= 18) {
                    $c++;
                } else if ($va->umur >= 6 && $va->umur <= 10) {
                    $b++;
                } else if ($va->umur >= 0 && $va->umur <= 5) {
                    $a++;
                }
            } else {
                $a++;
            }
        }
        $out = [
            '0-5' => $a,
            '6-10' => $b,
            '11-18' => $c,
            'total' => $a + $b + $c,
        ];

        return $out;
    }

    public static function pendidikan($start = null, $end = null) {
        $anak = ReportDAO::getAnakBetween($start, $end);
        $out = [
            'BelumSekolah' => 0,
            'TidakSekolah' => 0,
            'TK' => 0,
            'SD/MI' => 0,
            'SMP/MTS' => 0,
            'SMA/SMK/MA' => 0,
        ];
        foreach ($anak as $va) {
            if ($va->pendidikan == "Belum Sekolah") {
                $out['BelumSekolah'] = $out['BelumSekolah'] + 1;
            } else if ($va->pendidikan == "Tidak Sekolah") {
                $out['TidakSekolah'] = $out['TidakSekolah'] + 1;
            } else if ($va->pendidikan == "TK") {
                $out['TK'] = $out['TK'] + 1;
            } else if ($va->pendidikan == "SD/MI") {
                $out['SD/MI'] = $out['SD/MI'] + 1;
            } else if ($va->pendidikan == "SMP/MTS") {
                $out['SMP/MTS'] = $out['SMP/MTS'] + 1;
            } else if ($va->pendidikan == "SMA/SMK/MA") {
                $out['SMA/SMK/MA'] = $out['SMA/SMK/MA'] + 1;
            }
        }
        $out['Total'] = $out['BelumSekolah'] + $out['TidakSekolah'] + $out['TK'] + $out['SD/MI'] + $out['SMP/MTS'] + $out['SMA/SMK/MA'];

        return $out;
    }

    public static function jenisKasus($start = null, $end = null) {
        $anak = ReportDAO::getAnakBetween($start, $end);
        $out = ReportDAO::getJenisKasusDefault();
        foreach ($anak as $an) {
            // jenis kasus yang berelasi dengan  anak
            foreach ($an->jenis_kasus as $jk) {
                //cek gender anak yang mengalami kasus
                if ($an->gender == "Laki-Laki") {
                    //cek jika jenis kasus merupakan standar dari LPA, bukan lainnya
                    if ($jk->other == "F") {
                        $out[$jk->jenis]["P"] = $out[$jk->jenis]["P"] + 1;
                    } else {
                        $out["Other"]["P"] = $out["Other"]["P"] + 1;
                    }
                } else {
                    if ($jk->other == "F") {
                        $out[$jk->jenis]["W"] = $out[$jk->jenis]["W"] + 1;
                    } else {
                        $out["Other"]["W"] = $out["Other"]["W"] + 1;
                    }
                }
            }
        }
        $out['Total'] = 0;

        return $out;
    }

    public static function lokasi($start = null, $end = null) {
        $anak = ReportDAO::getAnakBetween($start, $end);
        $out = ReportDAO::getKabupatenNTB();
        $total = 0;

        foreach ($anak as $val) {
            $kabupaten = $val->desa->kecamatan->kabkota->nama;
            if ($val->gender =="Laki-Laki"){
              $out[$kabupaten]['p'] = $out[$kabupaten]['p'] + 1;
            }
            if ($val->gender =="Perempuan"){
                $out[$kabupaten]['w'] = $out[$kabupaten]['w'] + 1;
            }
            $out[$kabupaten]['total']  ++;
              $out[$kabupaten]['total'] = $out[$kabupaten]['total'] + 1;

            $total++;
        }
        $out['Total'] = $total;
        return $out;
    }

    public static function getJenisKasusDefault() {
        $jenis = JenisKasus::all();
        $out = [];
        foreach ($jenis as $val) {
            if ($val->other == "F") {
                $a = [$val->jenis => ["P" => 0, "W" => 0]];
                $out = array_merge($out, $a);
            }
        }
        $out["Other"] = ["P" => 0, "W" => 0];


        return $out;
    }

    public static function getKabupatenNTB() {
        $prov = Provinsi::where('nama', '=', 'Nusa Tenggara Barat')->first();
        $kabkota = KabKota::where('provinsi_id', '=', $prov->id)->get();
        $out = [];
        foreach ($kabkota as $val) {
            $kab = [$val->nama=>['total'=>0,'p'=>0,'w'=>0]];
            $out = array_merge($out, $kab);
        }

        return $out;
    }

    /**
     *
     * @param string $start example 1998-12-25
     * @param string $end example 1999-12-25
     * @return boolean | Anak
     */
    public static function getAnakBetween($start = null, $end = null) {
        if (!is_null($start)) {
            if (!is_null($end)) {
                $start = date("Y-m-d", strtotime($start));
                $end = date("Y-m-d", strtotime($end));
                return Anak::where('created_at', '>=', $start)->where('created_at', '<=', $end)->get();
            } else {
                return false;
            }
        } else {
            return Anak::all();
        }
    }

}
