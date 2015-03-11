<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Intervensi extends Eloquent {

    protected $table = "intervensi";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsToMany($this->ns . "Anak", "anak_has_intervensi")->withPivot("anak_id");
    }

}
