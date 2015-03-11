<?php

namespace App\DAO;

use App\Models\KondisiPsikososial;

/**
 * Description of KondisiPsikososialDAO
 *
 * @author nunenuh
 */
class KondisiPsikososialDAO {

    public static function saveOrUpdate($ps, $anak = null) {
        $psiko = null;
        if (isset($ps['id'])) {
            $psiko = KondisiPsikososialDAO::update($ps, $anak);
        } else {
            $psiko = KondisiPsikososialDAO::save($ps, $anak);
        }
        return $psiko;
    }

    public static function save($ps, $anak = null) {
        $psiko = new KondisiPsikososial();
        $psiko = KondisiPsikososialDAO::exchangeArray($psiko, $ps);
        if (!is_null($anak)) {
            $psiko->Anak()->associate($anak);
        }
        $psiko->save();

        return $psiko;
    }

    public static function update($ps, $anak = null) {
        $psiko = KondisiPsikososial::find($ps['id']);
        $psiko = KondisiPsikososialDAO::exchangeArray($psiko, $ps);
        if (!is_null($anak)) {
            $psiko->Anak()->associate($anak);
        }
        $psiko->update();

        return $psiko;
    }

    public static function exchangeArray($psiko, $ps) {
        $psiko->rk = $ps['rk'];
        $psiko->rp = $ps['rp'];
        $psiko->km = $ps['km'];
        $psiko->ks = $ps['ks'];

        return $psiko;
    }

    public static function delete($id) {
        $psiko = KondisiPsikososial::find($id);
        if (!is_null($psiko->first())) {
            return $psiko->delete();
        } else {
            return false;
        }
    }

}
