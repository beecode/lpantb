<?php

namespace App\DAO;

use App\Models\GambaranFisik;

/**
 * Description of GambaranFisikDAO
 *
 * @author nunenuh
 */
class GambaranFisikDAO {

    public static function saveOrUpdate($fsk, $anak = null) {
        $fisik = null;
        if (isset($fsk['id'])) {
            $fisik = GambaranFisikDAO::update($fsk, $anak);
        } else {
            $fisik = GambaranFisikDAO::save($fsk, $anak);
        }
        return $fisik;
    }

    public static function save($fsk, $anak = null) {
        $fisik = new GambaranFisik();
        $fisik = GambaranFisikDAO::exchangeArray($fisik, $fsk);
        if (!is_null($anak)) {
            $fisik->Anak()->associate($anak);
        }
        $fisik->save();

        return $fisik;
    }

    public static function update($fsk, $anak = null) {
        $fisik = GambaranFisik::find($fsk['id']);
        $fisik = GambaranFisikDAO::exchangeArray($fisik, $fsk);
        if (!is_null($anak)) {
            $fisik->Anak()->associate($anak);
        }
        $fisik->update();

        return $fisik;
    }

    public static function exchangeArray($fisik, $fsk) {
        $fisik->tinggi = $fsk['tinggi'];
        $fisik->berat = $fsk['berat'];
        $fisik->warna_kulit = $fsk['warna_kulit'];
        $fisik->rambut = $fsk['rambut'];
        $fisik->tanda_lain = $fsk['tanda_lain'];

        return $fisik;
    }

    public static function delete($id) {
        $fisik = GambaranFisik::find($id);
        if (!is_null($fisik->first())) {
            return $fisik->delete();
        } else {
            return false;
        }
    }

}
