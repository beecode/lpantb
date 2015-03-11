<?php

namespace App\DAO;

use App\Models\Anak;
use App\Helpers\DateHelper;
use App\Models\Desa;

/**
 * Description of AnakDAO
 *
 * @author nunenuh
 */
class AnakDAO {

    public static function saveOrUpdate($an) {
        $anak = null;
        if (isset($an['id'])) {
            $anak = AnakDAO::update($an);
        } else {
            $anak = AnakDAO::save($an);
        }
        return$anak;
    }

    public static function save($an) {
        $anak = new Anak();
        $anak = AnakDAO::exchangeArray($anak, $an);
        $anak_desa = Desa::find($an['desa']);
        $anak->desa()->associate($anak_desa);
        $anak->save();

        return $anak;
    }

    public static function update($an) {
        $anak = Anak::find($an['id']);
        $anak = AnakDAO::exchangeArray($anak, $an);
        $anak_desa = Desa::find($an['desa']);
        $anak->desa()->associate($anak_desa);
        $anak->update();

        return $anak;
    }

    public static function delete($id) {
        $anak = Anak::find($id);
        if (!is_null($anak->first())) {
            return$anak->delete();
        } else {
            return false;
        }
    }

    public static function exchangeArray($anak, $an) {
        $anak->nama = isset($an['nama']) ? $an['nama'] : null;
        $anak->gender = isset($an['gender']) ? $an['gender'] : null;
        $anak->umur = isset($an['umur']) ? $an['umur'] : null;
        $anak->umur_satuan = isset($an['umur_satuan']) ? $an['umur_satuan'] : null;
        $anak->tanggal_lahir = isset($an['tanggal_lahir']) ? DateHelper::toDate($an['umur_satuan']) : null;
        $anak->alamat = isset($an['alamat']) ? $an['alamat'] : null;
        $anak->agama = isset($an['agama']) ? $an['agama'] : null;
        $anak->tempat_lahir = isset($an['tempat_lahir']) ? $an['tempat_lahir'] : null;
        $anak->pendidikan = isset($an['pendidikan']) ? $an['pendidikan'] : null;
        $anak->suku = isset($an['suku']) ? $an['suku'] : null;
        $anak->anak_ke = isset($an['anak_ke']) ? $an['anak_ke'] : null;
        $anak->jumlah_saudara = isset($an['jumlah_saudara']) ? $an['jumlah_saudara'] : null;
        $anak->akta_kelahiran = isset($an['akta_kelahiran']) ? $an['akta_kelahiran'] : null;
        $anak->disabilitas = isset($an['disabilitas']) ? $an['disabilitas'] : null;
        $anak->disabilitas_keterangan = isset($an['disabilitas_keterangan']) ? $an['disabilitas_keterangan'] : null;

        return $anak;
    }

}
