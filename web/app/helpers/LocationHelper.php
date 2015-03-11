<?php

namespace App\Helpers;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\KabKota;
use App\Models\Provinsi;

/**
 * Description of LocationHelper
 *
 * @author nunenuh
 */
class LocationHelper {

    public static function location($desa_id = null) {
        if ($desa_id != null) {
            $ds = Desa::find($desa_id);

            $ds_id = $ds->id;
            $kec_id = $ds->kecamatan->id;
            $kk_id = $ds->kecamatan->kabkota->id;
            $pr_id = $ds->kecamatan->kabkota->provinsi->id;

            $pr_lists = Provinsi::lists('nama', 'id');
            $kk_lists = Kabkota::select('nama', 'id')->where('provinsi_id', '=', $pr_id)->lists('nama', 'id');
            $kec_lists = Kecamatan::select('nama', 'id')->where('kabkota_id', '=', $kk_id)->lists('nama', 'id');
            $ds_lists = Desa::select('nama', 'id')->where('kecamatan_id', '=', $kec_id)->lists('nama', 'id');

            $data = [
                'provinsi_lists' => $pr_lists,
                'provinsi_sel' => $pr_id,
                'kabkota_lists' => $kk_lists,
                'kabkota_sel' => $kk_id,
                'kecamatan_lists' => $kec_lists,
                'kecamatan_sel' => $kec_id,
                'desa_lists' => $ds_lists,
                'desa_sel' => $ds_id,
            ];
            return $data;
        } else {
            $ds_id = 5271010009;
            $kec_id = 5271010;
            $kk_id = 5271;
            $pr_id = 52;

            $pr_lists = Provinsi::lists('nama', 'id');
            $kk_lists = Kabkota::select('nama', 'id')->where('provinsi_id', '=', $pr_id)->lists('nama', 'id');
            $kec_lists = Kecamatan::select('nama', 'id')->where('kabkota_id', '=', $kk_id)->lists('nama', 'id');
            $ds_lists = Desa::select('nama', 'id')->where('kecamatan_id', '=', $kec_id)->lists('nama', 'id');

            $data = [
                'provinsi_lists' => $pr_lists,
                'provinsi_sel' => $pr_id,
                'kabkota_lists' => $kk_lists,
                'kabkota_sel' => $kk_id,
                'kecamatan_lists' => $kec_lists,
                'kecamatan_sel' => $kec_id,
                'desa_lists' => $ds_lists,
                'desa_sel' => $ds_id,
            ];
            return $data;
        }
    }

}
