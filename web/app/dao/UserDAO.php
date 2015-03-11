<?php

namespace App\DAO;

use App\Models\User;

/**
 * Description of UserDAO
 *
 * @author nunenuh
 */
class UserDAO {

    public static function saveOrUpdate($ag) {
        $user = null;
        if (isset($ag['id'])) {
            $user = UserDAO::update($ag);
        } else {
            $user = UserDAO::save($ag);
        }
        return $user;
    }

    public static function save($ag) {
        $user = new User();
        $user = UserDAO::exchangeArray($user, $ag);
        $user->save();

        return $user;
    }

    public static function update($ag) {
        $user = User::find($ag['id']);
        $user = UserDAO::exchangeArray($user, $ag);
        $user->update();

        return $user;
    }

    public static function exchangeArray($user, $u) {
        $user->display_name = $u['display_name'];
        $user->email = $u['email'];
        $user->username = $u['username'];
        $user->password = $u['password'];
        $user->level = $u['level'];
        return $user;
    }

    public static function delete($id) {
        $user = User::find($id);
        if (!is_null($user->first())) {
            return $user->delete();
        } else {
            return false;
        }
    }

}
