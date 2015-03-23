<?php

namespace App\DAO;

use App\Helpers\DateHelper;
use App\Models\Form;

/**
 * Description of FormDAO
 *
 * @author nunenuh
 */
class FormDAO {

    public static function save($fm) {
        $form = new Form();
        $form = FormDAO::exchangeArray($form, $fm);
        $form->save();

        return $form;
    }

    public static function update($fm) {
        $form = Form::find($fm['id']);
        $form = FormDAO::exchangeArray($form, $fm);
        $form->update();

        return $form;
    }

    public static function saveOrUpdate($fm) {
        $form = null;
        if (isset($fm['id'])) {
            $form = FormDAO::update($fm);
        } else {
            $form = FormDAO::save($fm);
        }
        return $form;
    }

    public static function delete($id) {
        $form = Form::find($id);
        if (!is_null($form->first())) {
            return $form->delete();
        } else {
            return false;
        }
    }

    private static function exchangeArray($form, $fm) {
        $form->nama = isset($fm['nama']) ? $fm['nama'] : null;
        $form->no_lka = isset($fm['no_lka']) ? $fm['no_lka'] : null;
        $form->tanggal = isset($fm['tanggal']) ? $fm['tanggal'] : null;
        $form->catatan = isset($fm['catatan']) ? $fm['catatan'] : null;
        $form->catatan_tindak_lanjut = isset($fm['catatan_tindak_lanjut']) ? $fm['catatan_tindak_lanjut'] : null;
        $form->ringkasan_kasus = isset($fm['ringkasan']) ? $fm['ringkasan'] : null;
        $form->rekomendasi = isset($fm['rekomendasi']) ? $fm['rekomendasi'] : null;
        $form->uraian_kasus = isset($fm['uraian_kasus']) ? $fm['uraian_kasus'] : null;
        $form->dasar_intervensi = isset($fm['dasar_intervensi']) ? $fm['dasar_intervensi'] : null;
        $form->catatan_intervensi = isset($fm['catatan_intervensi']) ? $fm['catatan_intervensi'] : null;
        $form->hasil_pendampingan = isset($fm['hasil_pendampingan']) ? $fm['hasil_pendampingan'] : null;

        return $form;
    }

}
