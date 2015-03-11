<?php

namespace App\DAO;

use App\Models\Ayah;
use App\Models\Desa;
use App\Helpers\DateHelper;

/**
 * Description of AyahDAO
 *
 * @author nunenuh
 */
class AyahDAO {

    public static function saveOrUpdate($ayh, $keluarga = null) {
        $ayah = null;
        if (isset($ayh['id'])) {
            $ayah = AyahDAO::update($ayh, $keluarga);
        } else {
            $ayah = AyahDAO::save($ayh, $keluarga);
        }
        return $ayah;
    }

    public static function save($ayh, $keluarga = null) {
        $ayah = new Ayah();
        $ayah = AyahDAO::exchangeArray($ayah, $ayh);
        if (!is_null($keluarga)) {
            $ayah->Keluarga()->associate($keluarga);
        }
        $ayah_desa = Desa::find($ayh['desa']);
        $ayah->Desa()->associate($ayah_desa);
        $ayah->save();

        return $ayah;
    }

    public static function update($ayh, $keluarga = null) {
        $ayah = Ayah::find($ayh['id']);
        $ayah = AyahDAO::exchangeArray($ayah, $ayh);
        if (!is_null($keluarga)) {
            $ayah->Keluarga()->associate($keluarga);
        }
        $ayah_desa = Desa::find($ayh['desa']);
        $ayah->Desa()->associate($ayah_desa);
        $ayah->update();

        return $ayah;
    }

    public static function exchangeArray($ayah, $ayh) {
        $ayah->nama = $ayh['nama'];
        $ayah->tempat_lahir = $ayh['tempat_lahir'];
        $ayah->tanggal_lahir = DateHelper::toDate($ayh['tanggal_lahir']);
        $ayah->alamat = $ayh['alamat'];
        $ayah->pekerjaan = $ayh['pekerjaan'];
        $ayah->telp = $ayh['telp'];
        $ayah->pendidikan_terakhir = $ayh['pendidikan'];

        return $ayah;
    }

    public static function delete($id) {
        $ayah = Ayah::find($id);
        if (!is_null($ayah->first())) {
            return $ayah->delete();
        } else {
            return false;
        }
    }

}
