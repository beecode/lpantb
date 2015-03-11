<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class KabKota extends Eloquent {

    protected $table = "kabkota";
    protected $primaryKey = "id";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Kecamatan() {
        return $this->hasMany($this->ns . "Kecamatan");
    }

    public function Desa() {
        return $this->hasManyThrough($this->ns . "Desa", $this->ns . "Kecamatan");
    }

    public function Provinsi() {
        return $this->belongsTo($this->ns . "Provinsi", "provinsi_id");
    }

}
