<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class IdentifikasiMasalah extends Eloquent {

    protected $table = "identifikasi_masalah";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsTo($this->ns . "Anak");
    }

}
