<?php

namespace App\DAO;

use App\Models\SumberInformasi;
use App\Helpers\DateHelper;

/**
 * Description of SumberInformasiDAO
 *
 * @author nunenuh
 */
class SumberInformasiDAO {

    public static function saveOrUpdate($sum, $anak = null) {
        $sb = null;
        if (isset($sum['id'])) {
            $sb =SumberInformasiDAO::update($sum);
        } else {
            $sb =SumberInformasiDAO::save($sum);
        }

        return $sb;
    }

    public static function save($sum, $anak = null) {
        $sb = new SumberInformasi();
        $sb = SumberInformasiDAO::exchangeArray($sb, $sum);
        $sb->save();

        if (!is_null($anak)) {
            $sb->Anak()->attach($anak->id);
        }

        return $sb;
    }

    public static function update($sum, $anak = null) {
        $sb = SumberInformasi::find($sum['id']);
        $sb = SumberInformasiDAO::exchangeArray($sb, $sum);
        $sb->update();

        if (!is_null($anak)) {
            $sb->Anak()->attach($anak->id);
        }

        return $sb;
    }

    public static function exchangeArray($sb, $sum) {
        $sb->sumber = $sum['sumber'];
        $sb->tanggal = DateHelper::toDate($sum['tanggal_informasi']);
        $sb->dasar_rujukan = $sum['dasar_rujukan'];
        $sb->contact_person = $sum['contact_person'];
        $sb->telp = $sum['telp'];

        return$sb;
    }

    public static function delete($id) {
        $sb = SumberInformasi::find($id);
        if (!is_null($sb->first())) {
            return $sb->delete();
        } else {
            return false;
        }
    }

}
