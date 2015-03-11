<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Provinsi extends Eloquent {

    protected $table = "provinsi";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function KabKota() {
        return $this->hasMany($this->ns . "KabKota");
    }

    public function Kecamatan() {
        return $this->hasManyThrough($this->ns . "Kecamatan", $this->ns . "KabKota");
    }

}
