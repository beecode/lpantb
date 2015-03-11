<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Keluarga extends Eloquent {

    protected $table = "keluarga";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsTo($this->ns . "Anak");
    }

    public function Ayah() {
        return $this->hasOne($this->ns . "Ayah");
    }

    public function Ibu() {
        return $this->hasOne($this->ns . "Ibu");
    }

}
