<?php

namespace App\DAO;

use App\Models\TindakLanjut;

/**
 * Description of TindakLanjutDAO
 *
 * @author nunenuh
 */
class TindakLanjutDAO {

    public static function saveOrUpdate($ti, $anak) {
        $tindak = null;
        if (isset($ti['other']['id'])) {
            $tindak = TindakLanjutDAO::update($ti, $anak);
        } else {
            $tindak = TindakLanjutDAO::save($ti, $anak);
        }
        return $tindak;
    }

    public static function save($ti, $anak = null) {
        $tindak = new TindakLanjut();
        $tindak->aksi = $ti['other']['value'];
        $tindak->other = 'T';
        $tindak->save();
        if (!is_null($anak)) {
            $tindak->Anak()->attach($anak->id);
        }

        return $tindak;
    }

    public static function update($ti, $anak = null) {
        $tindak = TindakLanjut::find($ti['other']['id']);
        if (isset($ti['other']['check'])) {
            $tindak = TindakLanjutDAO::exchangeArray($tindak, $ti);
            $tindak->update();
            if (!is_null($anak)) {
                $tindak->Anak()->attach($anak->id);
            }
        } else {
            if (!is_null($anak)) {
                $tindak->Anak()->detach($anak->id);
            }
        }

        return $tindak;
    }

    public static function delete($id) {
        $tl = TindakLanjut::find($id);
        if (!is_null($tl->first())) {
            return$tl->delete();
        } else {
            return false;
        }
    }

    public static function exchangeArray($tindak, $ti) {
        $tindak->aksi = $ti['other']['value'];
        $tindak->other = 'T';

        return $tindak;
    }

    public static function attachAll($ti, $anak) {
        if (isset($ti['def'])) {
            $def = $ti['def'];
            foreach ($anak->tindak_lanjut as $vd) {
                $anak->TindakLanjut()->detach($vd->id);
            }
            foreach ($def as $val) {
                $anak->TindakLanjut()->attach($val['id']);
            }
        }
    }

}
