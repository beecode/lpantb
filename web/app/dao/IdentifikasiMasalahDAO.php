<?php

namespace App\DAO;

use App\Models\IdentifikasiMasalah;

/**
 * Description of IdentifikasiMasalahDAO
 *
 * @author nunenuh
 */
class IdentifikasiMasalahDAO {

    public static function saveOrUpdate($ms, $anak = null) {
        $masalah = null;
        if (isset($ms['id'])) {
            $masalah = IdentifikasiMasalahDAO::update($ms, $anak);
        } else {
            $masalah = IdentifikasiMasalahDAO::save($ms, $anak);
        }
        return $masalah;
    }

    public static function save($ms, $anak = null) {
        $masalah = new IdentifikasiMasalah();
        $masalah = IdentifikasiMasalahDAO::exchangeArray($masalah, $ms);
        if (!is_null($anak)) {
            $masalah->Anak()->associate($anak);
        }
        $masalah->save();

        return $masalah;
    }

    public static function update($ms, $anak = null) {
        $masalah = IdentifikasiMasalah::find($ms['id']);
        $masalah = IdentifikasiMasalahDAO::exchangeArray($masalah, $ms);
        if (!is_null($anak)) {
            $masalah->Anak()->associate($anak);
        }
        $masalah->update();

        return $masalah;
    }

    public static function exchangeArray($masalah, $ms) {
        $masalah->gka = $ms['gka'];
        $masalah->ha = $ms['ha'];
        $masalah->gkk = $ms['gkk'];
        $masalah->hk = $ms['hk'];
        $masalah->kesimpulan = $ms['kesimpulan'];

        return $masalah;
    }

    public static function delete($id) {
        $masalah = IdentifikasiMasalah::find($id);
        if (!is_null($masalah->first())) {
            return $masalah->delete();
        } else {
            return false;
        }
    }

}
