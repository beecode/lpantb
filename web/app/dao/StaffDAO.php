<?php

namespace App\DAO;

use App\Models\Staff;

/**
 * Description of StaffDAO
 *
 * @author nunenuh
 */
class StaffDAO {

    public static function saveOrUpdate($st) {
        $staff = null;
        if (isset($st['id'])) {
            $staff = StaffDAO::update($st);
        } else {
            $staff = StaffDAO::save($st);
        }
        return $staff;
    }

    public static function save($st) {
        $staff = new Staff();
        $staff = StaffDAO::exchangeArray($staff, $st);
        $staff->save();

        return $staff;
    }

    public static function update($st) {
        $staff = Staff::find($st['id']);
        $staff = StaffDAO::exchangeArray($staff, $st);
        $staff->update();

        return $staff;
    }

    public static function exchangeArray($staff, $st) {
        $staff->nama = $st['nama'];
        $staff->jabatan = $st['jabatan'];
        return $staff;
    }

    public static function delete($id) {
        $staff = Staff::find($id);
        if (!is_null($staff->first())) {
            return $staff->delete();
        } else {
            return false;
        }
    }

}
