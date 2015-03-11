<?php

namespace App\DAO;

use App\Models\Ibu;
use App\Models\Desa;
use App\Helpers\DateHelper;

/**
 * Description of IbuDAO
 *
 * @author nunenuh
 */
class IbuDAO {

    public static function saveOrUpdate($ib, $keluarga = null) {
        $ibu = null;
        if (isset($ib['id'])) {
            $ibu = IbuDAO::update($ib, $keluarga);
        } else {
            $ibu = IbuDAO::save($ib, $keluarga);
        }
        return $ibu;
    }

    public static function save($ib, $keluarga = null) {
        $ibu = new Ibu();
        $ibu = IbuDAO::exchangeArray($ibu, $ib);
        if (!is_null($keluarga)) {
            $ibu->Keluarga()->associate($keluarga);
        }
        $ibu_desa = Desa::find($ib['desa']);
        $ibu->Desa()->associate($ibu_desa);
        $ibu->save();

        return $ibu;
    }

    public static function update($ib, $keluarga = null) {
        $ibu = Ibu::find($ib['id']);
        $ibu = IbuDAO::exchangeArray($ibu, $ib);
        if (!is_null($keluarga)) {
            $ibu->Keluarga()->associate($keluarga);
        }
        $ibu_desa = Desa::find($ib['desa']);
        $ibu->Desa()->associate($ibu_desa);
        $ibu->update();

        return $ibu;
    }

    public static function exchangeArray($ibu, $ib) {
        $ibu->nama = $ib['nama'];
        $ibu->tempat_lahir = $ib['tempat_lahir'];
        $ibu->tanggal_lahir = DateHelper::toDate($ib['tanggal_lahir']);
        $ibu->alamat = $ib['alamat'];
        $ibu->pekerjaan = $ib['pekerjaan'];
        $ibu->telp = $ib['telp'];
        $ibu->pendidikan_terakhir = $ib['pendidikan'];

        return $ibu;
    }

    public static function delete($id) {
        $ibu = Ibu::find($id);
        if (!is_null($ibu->first())) {
            return $ibu->delete();
        } else {
            return false;
        }
    }

}
