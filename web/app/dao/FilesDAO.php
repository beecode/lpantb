<?php

namespace App\DAO;

use App\Models\Files;
use App\Helpers\DateHelper;

/**
 * Description of FilesDAO
 *
 * @author nunenuh
 */
class FilesDAO {

    /**
     * 
     * @param array $fl
     * @param \App\Models\Anak $anak
     * @return \App\Models\Files
     */
    public static function saveOrUpdate($file, $anak = null) {
        $fl = null;
        if (isset($file['id'])) {
            $fl = FilesDAO::update($file, $anak);
        } else {
            $fl = FilesDAO::save($file, $anak);
        }
        return $fl;
    }

    public static function save($file, $anak = null) {
        $fl = new Files();
        $fl = FilesDAO::exchangeArray($fl, $file);
        if (!is_null($anak)) {  
            $fl->Anak()->associate($anak);
        }
        $fl->save();

        return $fl;
    }

    public static function update($file, $anak = null) {
        $fl = Files::find($file['id']);
        $fl = FilesDAO::exchangeArray($fl, $file);
        if (!is_null($anak)) {
            $fl->Anak()->associate($anak);
        }
        $fl->update();

        return $fl;
    }

    public static function exchangeArray($fl, $file) {
        $fl->nama = $file['nama'];
        $fl->keterangan = $file['keterangan'];
        
        isset($file['file_name']) ? $fl->file_name = $file['file_name']: null;
        isset($file['file_type']) ? $fl->file_type = $file['file_type']: null;
        isset($file['file_size']) ? $fl->file_size = $file['file_size']: null;
        isset($file['file_path']) ? $fl->file_path = $file['file_path']: null;
        return $fl;
    }

    public static function delete($id) {
        $fl = Files::find($id);
        if (!is_null($fl->first())) {
            return $fl->delete();
        } else {
            return false;
        }
    }

}
