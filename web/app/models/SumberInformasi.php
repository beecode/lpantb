<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class SumberInformasi extends Eloquent {

    protected $table = "sumber_informasi";
    // public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsToMany($this->ns . "Anak", "anak_has_sumber_informasi")->withPivot("anak_id");
    }

}
