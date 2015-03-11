<?php

namespace App\DAO;

use App\Models\Keluarga;

/**
 * Description of KeluargaDAO
 *
 * @author nunenuh
 */
class KeluargaDAO {

    public static function saveOrUpdate($kl, $anak = null) {
        $keluarga = null;
        if (isset($kl['id'])) {
            $keluarga = KeluargaDAO::update($kl, $anak);
        } else {
            $keluarga = KeluargaDAO::save($kl, $anak);
        }
        return $keluarga;
    }

    public static function save($kl, $anak = null) {
        $keluarga = new Keluarga();
        $keluarga = KeluargaDAO::exchangeArray($keluarga, $kl);
        if (!is_null($anak)) {
            $keluarga->Anak()->associate($anak);
        }
        $keluarga->save();

        return $keluarga;
    }

    public static function update($kl, $anak = null) {
        $keluarga = Keluarga::find($kl['id']);
        $keluarga = KeluargaDAO::exchangeArray($keluarga, $kl);
        if (!is_null($anak)) {
            $keluarga->Anak()->associate($anak);
        }
        $keluarga->update();

        return $keluarga;
    }

    public static function exchangeArray($keluarga, $kl) {
        $keluarga->status = $kl['status'];

        return $keluarga;
    }

    public static function delete($id) {
        $keluarga = Keluarga::find($id);
        if (!is_null($keluarga->first())) {
            return $keluarga->delete();
        } else {
            return false;
        }
    }

}
