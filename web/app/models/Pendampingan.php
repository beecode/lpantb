<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Pendampingan extends Eloquent {

    protected $table = "pendampingan";
    // public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsTo($this->ns . "Anak");
    }

}
