<?php

namespace App\DAO;

use App\Models\Intervensi;

/**
 * Description of JensiKasusDAO
 *
 * @author nunenuh
 */
class IntervensiDAO {

    public static function saveOrUpdate($int, $anak) {
        $inter = null;
        if (isset($int['other']['id'])) {
            $inter = IntervensiDAO::update($int, $anak);
        } else {
            $inter = IntervensiDAO::save($int, $anak);
        }
        return $inter;
    }

    public static function save($int, $anak = null) {
        $inter = new Intervensi();
        $inter = IntervensiDAO::exchangeArray($inter, $int);
        $inter->save();
        if (!is_null($anak)) {
            $inter->Anak()->attach($anak->id);
        }

        return $inter;
    }

    public static function update($int, $anak = null) {
        $inter = Intervensi::find($int['other']['id']);
        if (isset($int['other']['check'])) {
            $inter = IntervensiDAO::exchangeArray($inter, $int);
            $inter->update();
            if (!is_null($anak)) {
                $inter->Anak()->attach($anak->id);
            }
        } else {
            if (!is_null($anak)) {
                $inter->Anak()->detach($anak->id);
            }
        }

        return $inter;
    }

    public static function delete($id) {
        $tl = Intervensi::find($id);
        if (!is_null($tl->first())) {
            return$tl->delete();
        } else {
            return false;
        }
    }

    public static function exchangeArray($inter, $int) {
        $inter->jenis = $int['other']['value'];
        $inter->other = 'T';

        return $inter;
    }

    public static function attachAll($int, $anak) {
        if (isset($int['def'])) {
            $def = $int['def'];
            foreach ($anak->intervensi as $vd) {
                $anak->Intervensi()->detach($vd->id);
            }
            foreach ($def as $val) {
                $anak->Intervensi()->attach($val['id']);
            }
        }
    }

}
