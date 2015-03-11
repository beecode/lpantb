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
        $pr->nama = $pel['nama'];
        $pr->gender = $pel['gender'];
        $pr->tempat_lahir = $pel['tempat_lahir'];
        $pr->tanggal_lahir = DateHelper::toDate($pel['tanggal_lahir']);
        $pr->pekerjaan = $pel['pekerjaan'];
        $pr->alamat = $pel['alamat'];
        $pr->agama = $pel['agama'];
        $pr->telp = $pel['telp'];

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
