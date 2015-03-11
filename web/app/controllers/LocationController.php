<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Desa;

/**
 * Description of LocationController
 *
 * @author nunenuh
 */
class LocationController extends BaseController {

    public function getAllProvinsi() {
        return Provinsi::all()->toJson();
    }

    public function getProvinsiByID($provinsi_id) {
        $prov = Provinsi::find($provinsi_id);
        return $prov->toJson();
    }

    public function getKabKotaByProvinsiID($provinsi_id) {
        $res = KabKota::whereHas('provinsi', function($q) use ($provinsi_id) {
                    $q->where('id', '=', $provinsi_id);
                })->get();
        return $res->toJSON();
    }

    public function getKecamatanByKabKotaID($kabkota_id) {
        $res = Kecamatan::whereHas('kabkota', function($q) use ($kabkota_id) {
                    $q->where('id', '=', $kabkota_id);
                })->get();
        return $res->toJSON();
    }

    public function getDesaByKecamatanID($kecamatan_id) {
        $res = Desa::whereHas('kecamatan', function($q) use ($kecamatan_id) {
                    $q->where('id', '=', $kecamatan_id);
                })->get();
        return $res->toJSON();
    }

}
