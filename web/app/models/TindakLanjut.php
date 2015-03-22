<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class TindakLanjut extends Eloquent {

    protected $table = "tindak_lanjut";
    // public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsToMany($this->ns . "Anak", "anak_has_tindak_lanjut")->withPivot("anak_id");
    }

}
