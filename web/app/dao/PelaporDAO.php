<?php

namespace App\DAO;

use App\Models\Pelapor;
use App\Models\Desa;
use App\Helpers\DateHelper;

/**
 * Description of PelaporDAO
 *
 * @author nunenuh
 */
class PelaporDAO {

    public static function saveOrUpdate($pel, $anak) {
        $pr = null;
        if (isset($pel['id'])) {
            $pr = PelaporDAO::update($pel, $anak);
        } else {
            $pr = PelaporDAO::save($pel, $anak);
        }

        return $pr;
    }

    public static function save($pel, $anak = null) {
        $pr = new Pelapor();
        $pr = PelaporDAO::exchangeArray($pr, $pel);

        $pr_desa = Desa::find($pel['desa']);
        $pr->desa()->associate($pr_desa);

        $pr->save();

        if (!is_null($anak)) {
            $pr->Anak()->attach($anak->id);
        }

        return $pr;
    }

    public static function update($pel, $anak = null) {
        $pr = Pelapor::find($pel['id']);
        $pr = PelaporDAO::exchangeArray($pr, $pel);
        $pr_desa = Desa::find($pel['desa']);
        $pr->desa()->associate($pr_desa);
        $pr->update();

//        if (!is_null($anak)) {
//            $pr->Anak()->attach($anak->id);
//        }

        return $pr;
    }

    public static function exchangeArray($pr, $pel) {
        $pr->nama = isset($pel['nama']) ? $pel['nama'] : null;
        $pr->gender = isset($pel['gender']) ? $pel['gender'] : null;
        $pr->tempat_lahir = isset($pel['tempat_lahir']) ? $pel['tempat_lahir'] : null;
        $pr->tanggal_lahir =isset($pel['tanggal_lahir']) ? $pel['tanggal_lahir'] : null;
        $pr->bulan_lahir =isset($pel['bulan_lahir']) ? $pel['bulan_lahir'] : null;
        $pr->tahun_lahir =isset($pel['tahun_lahir']) ? $pel['tahun_lahir'] : null;
        $pr->pekerjaan = isset($pel['pekerjaan']) ? $pel['pekerjaan'] : null;
        $pr->alamat = isset($pel['alamat']) ? $pel['alamat'] : null;
        $pr->agama = isset($pel['agama']) ? $pel['agama'] : null;
        $pr->telp = isset($pel['telp']) ? $pel['telp'] : null;

        return $pr;
    }

    public static function delete($id) {
        $pr = Pelapor::find($id);
        if (!is_null($pr->first())) {
            return $pr->delete();
        } else {
            return false;
        }
    }

}
