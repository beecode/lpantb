<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Kecamatan extends Eloquent {

    protected $table = "kecamatan";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Desa() {
        return $this->hasMany($this->ns . "Desa");
    }

    public function KabKota() {
        return $this->belongsTo($this->ns . "KabKota", "kabkota_id");
    }

}
