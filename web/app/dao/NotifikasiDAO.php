<?php

namespace App\DAO;

use App\Models\Notifikasi;

/**
 * Description of NotifikasiDAO
 *
 * @author nunenuh
 */
class NotifikasiDAO {

    public static function saveOrUpdate($notif) {
        $nt = null;
        if (isset($notif['id'])) {
            $nt = NotifikasiDAO::update($notif);
        } else {
            $nt = NotifikasiDAO::save($notif);
        }

        return $nt;
    }

    public static function save($notif) {
        $nt = new Notifikasi();
        $nt = NotifikasiDAO::exchangeArray($nt, $notif);
        $nt->save();

        return $nt;
    }

    public static function update($notif) {
        $nt = Notifikasi::find($notif['id']);
        $nt = NotifikasiDAO::exchangeArray($nt, $notif);
        $nt_desa = Desa::find($notif['desa']);
        $nt->desa()->associate($nt_desa);
        $nt->update();

        return $nt;
    }

    public static function exchangeArray($nt, $notif) {
        $nt->status = isset($notif['status']) ? $notif['status'] : null;
        $nt->title = isset($notif['title']) ? $notif['title'] : null;
        $nt->desc = isset($notif['desc']) ? $notif['desc'] : null;
        $nt->action_status = isset($notif['action_status']) ? $notif['action_status'] : null;

        $nt->action_from = isset($notif['action_from']) ? $notif['action_from'] : null;
        $nt->action_from_json = isset($notif['action_from_json']) ? $notif['action_from_json'] : null;


        $nt->action_to = isset($notif['action_to']) ? $notif['action_to'] : null;
        $nt->action_to_json = isset($notif['action_to_json']) ? $notif['action_to_json'] : null;


        $nt->form_id = isset($notif['form_id']) ? $notif['form_id'] : null;
        $nt->form_nama = isset($notif['form_nama']) ? $notif['form_nama'] : null;
        $nt->form_json = isset($notif['form_json']) ? $notif['form_json'] : null;


        $nt->pendampingan_id = isset($notif['pendampingan_id']) ? $notif['pendampingan_id'] : null;
        $nt->pendampingan_json = isset($notif['pendampingan_json']) ? $notif['pendampingan_json'] : null;



        return $nt;
    }

    public static function delete($id) {
        $nt = Notifikasi::find($id);
        if (!is_null($nt->first())) {
            return $nt->delete();
        } else {
            return false;
        }
    }

}
