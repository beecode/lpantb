<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Desa extends Eloquent {

    protected $table = "desa";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Kecamatan() {
        return $this->belongsTo($this->ns . "Kecamatan", "kecamatan_id");
    }

    public function Anak() {
        return $this->hasOne($this->ns . "Anak");
    }

    public function Pelapor() {
        return $this->hasOne($this->ns . "Pelapor");
    }

    public function Ibu() {
        return $this->hasOne($this->ns . "Ibu");
    }

    public function Ayah() {
        return $this->hasOne($this->ns . "Ayah");
    }

}
