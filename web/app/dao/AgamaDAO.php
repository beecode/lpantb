<?php

namespace App\DAO;

use App\Models\Agama;

/**
 * Description of AgamaDAO
 *
 * @author nunenuh
 */
class AgamaDAO {

    public static function saveOrUpdate($ag) {
        $agama = null;
        if (isset($ag['id'])) {
            $agama = AgamaDAO::update($ag);
        } else {
            $agama = AgamaDAO::save($ag);
        }
        return $agama;
    }

    public static function save($ag) {
        $agama = new Agama();
        $agama = AgamaDAO::exchangeArray($agama, $ag);
        $agama->save();

        return $agama;
    }

    public static function update($ag) {
        $agama = Agama::find($ag['id']);
        $agama = AgamaDAO::exchangeArray($agama, $ag);
        $agama->update();

        return $agama;
    }

    public static function exchangeArray($agama, $ag) {
        $agama->nama = $ag['nama'];
        return $agama;
    }

    public static function delete($id) {
        $agama = Agama::find($id);
        if (!is_null($agama->first())) {
            return $agama->delete();
        } else {
            return false;
        }
    }

}
