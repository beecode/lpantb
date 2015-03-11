<?php

namespace App\DAO;

use App\Models\JenisKasus;

/**
 * Description of JensiKasusDAO
 *
 * @author nunenuh
 */
class JenisKasusDAO {

    public static function saveOrUpdate($jk, $anak) {
        $jenis = null;
        if (isset($jk['other']['id'])) {
            $jenis = JenisKasusDAO::update($jk, $anak);
        } else {
            $jenis = JenisKasusDAO::save($jk, $anak);
        }
        return $jenis;
    }

    public static function save($jk, $anak = null) {
        $jenis = new JenisKasus();
        $jenis = JenisKasusDAO::exchangeArray($jenis, $jk);
        $jenis->save();
        if (!is_null($anak)) {
            $jenis->Anak()->attach($anak->id);
        }

        return $jenis;
    }

    public static function update($jk, $anak = null) {
        $jenis = JenisKasus::find($jk['other']['id']);
        if (isset($jk['other']['check'])) {
            $jenis = JenisKasusDAO::exchangeArray($jenis, $jk);
            $jenis->update();
            if (!is_null($anak)) {
                $jenis->Anak()->attach($anak->id);
            }
        } else {
            if (!is_null($anak)) {
                $jenis->Anak()->detach($anak->id);
            }
        }

        return $jenis;
    }

    public static function delete($id) {
        $tl = JenisKasus::find($id);
        if (!is_null($tl->first())) {
            return$tl->delete();
        } else {
            return false;
        }
    }

    public static function exchangeArray($jenis, $jk) {
        $jenis->jenis = $jk['other']['value'];
        $jenis->other = 'T';

        return $jenis;
    }

    public static function attachAll($jk, $anak) {
        if (isset($jk['def'])) {
            $def = $jk['def'];
            foreach ($anak->jenis_kasus as $vd) {
                $anak->JenisKasus()->detach($vd->id);
            }
            foreach ($def as $val) {
                $anak->JenisKasus()->attach($val['id']);
            }
        }
    }

}
