<?php

namespace App\DAO;

use App\Models\Disposisi;

/**
 * Description of DisposisiDAO
 *
 * @author nunenuh
 */
class DisposisiDAO {

    public static function saveOrUpdate($dis, $form = null) {
        $disposisi = null;
        if (isset($dis['id'])) {
            DisposisiDAO::update($dis, $form);
        } else {
            DisposisiDAO::save($dis, $form);
        }

        return $disposisi;
    }

    public static function save($dis, $form = null) {
        $disposisi = new Disposisi();
        $disposisi = DisposisiDAO::exchangeArray($disposisi, $dis);
        if (!is_null($form)) {
            $disposisi->Form()->associate($form);
        }
        $disposisi->save();
        return $disposisi;
    }

    public static function update($dis, $form = null) {
        $disposisi = Disposisi::find($dis['id']);
        $disposisi = DisposisiDAO::exchangeArray($disposisi, $dis);
        if (!is_null($form)) {
            $disposisi->Form()->associate($form);
        }
        $disposisi->update();

        return $disposisi;
    }

    public static function exchangeArray($disposisi, $dis) {
        $disposisi->kepada = $dis['kepada'];
        $disposisi->isi = $dis['isi'];

        return $disposisi;
    }

    public static function delete($id) {
        $dis = Disposisi::find($id);
        if (!is_null($dis->first())) {
            return $dis->delete();
        } else {
            return false;
        }
    }

}
