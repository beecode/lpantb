<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class GambaranFisik extends Eloquent {

    protected $table = "gambaran_fisik";
    // public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsTo($this->ns . "Anak");
    }

}
