<?php

namespace App\DAO;

use App\Models\Desa;
use App\Models\Provinsi;
use App\Models\Kecamatan;

/**
 * Description of DesaDAO
 *
 * @author nunenuh
 */
class DesaDAO {

    public static function saveOrUpdate($in) {
        $desa = null;
        if (isset($in['id'])) {
            $desa = DesaDAO::update($in);
        } else {
            $desa = DesaDAO::save($in);
        }
        return$desa;
    }

    public static function save($in) {
        $desa = new Desa();
        $desa = DesaDAO:: exchangeArray($desa, $in);

        $kec = Kecamatan::find($in['kecamatan']);
        if (!is_null($kec->first())) {
            $desa->kecamatan()->associate($kec);
        }

        $desa->save();

        return $desa;
    }

    public static function update($in) {
        $desa = Desa::find($in['id']);
        $desa = DesaDAO::exchangeArray($desa, $in);

        $kec = Kecamatan::find($in['kecamatan']);
        if (!is_null($desa->first())) {
            $desa->kecamatan()->associate($kec);
        }

        $desa->update();


        return $desa;
    }

    public static function delete($id) {
        $desa = Desa::find($id);
        if (!is_null($desa->first())) {
            return $desa->delete();
        } else {
            return false;
        }
    }

    public static function search($keyword) {
        $desa = Desa::whereHas('kecamatan', function($q) use ($keyword) {
                    $q->whereHas("kabkota", function($q) use ($keyword) {
                        $q->whereHas('provinsi', function($q) use ($keyword) {
                            $q->where('nama', 'LIKE', '%' . $keyword . '%');
                        })->where('nama', 'LIKE', '%' . $keyword . '%');
                    })->where('nama', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhere('id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('nama', 'LIKE', '%' . $keyword . '%');
        return $desa;
    }

    public static function exchangeArray($desa, $in) {
        $desa->id = DesaDAO::getRandomIDs();
        $desa->nama = $in['desa'];
        return $desa;
    }

    private static function getRandomIDs() {
        $pr = Provinsi::all();
        $r = rand(1000000000, 9999999999);
        foreach ($pr as $val) {
            if ($val->id == $r) {
                $r = rand(1000000000, 9999999999);
            }
        }
        return $r;
    }

}
