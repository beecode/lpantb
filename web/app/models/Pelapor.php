<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Pelapor extends Eloquent {

    protected $table = "pelapor";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsToMany($this->ns . "Anak", "anak_has_pelapor")->withPivot("anak_id");
    }

    public function Desa() {
        return $this->belongsTo($this->ns . "Desa");
    }

}
