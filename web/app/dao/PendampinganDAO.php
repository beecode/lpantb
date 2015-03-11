<?php

namespace App\DAO;

use App\Models\Pendampingan;
use App\Helpers\DateHelper;
/**
 * Description of PendampinganDAO
 *
 * @author nunenuh
 */
class PendampinganDAO {

    /**
     * 
     * @param array $pen
     * @param \App\Models\Anak $anak
     * @return \App\Models\Pendampingan
     */
    public static function saveOrUpdate($pen, $anak = null) {
        $pd = null;
        if (isset($pen['id'])) {
            $pd = PendampinganDAO::update($pen, $anak);
        } else {
            $pd = PendampinganDAO::save($pen, $anak);
        }
        return $pd;
    }

    public static function save($pen, $anak = null) {
        $pd = new Pendampingan();
        $pd = PendampinganDAO::exchangeArray($pd, $pen);
        if (!is_null($anak)) {
            $pd->Anak()->associate($anak);
        }
        $pd->save();

        return $pd;
    }

    public static function update($pen, $anak = null) {
        $pd = Pendampingan::find($pen['id']);
        $pd = PendampinganDAO::exchangeArray($pd, $pen);
        if (!is_null($anak)) {
            $pd->Anak()->associate($anak);
        }
        $pd->update();

        return $pd;
    }

    public static function exchangeArray($pd, $pen) {
        $pd->tanggal = DateHelper::toDate($pen['tanggal']);
        $pd->bentuk = $pen['bentuk'];
        $pd->tempat = $pen['tempat'];
        $pd->pelaksana = $pen['pelaksana'];
        $pd->hasil = $pen['hasil'];
        $pd->rencana = $pen['rencana'];
        $pd->keterangan = $pen['keterangan'];

        return $pd;
    }

    public static function delete($id) {
        $pd = Pendampingan::find($id);
        if (!is_null($pd->first())) {
            return $pd->delete();
        } else {
            return false;
        }
    }

}
