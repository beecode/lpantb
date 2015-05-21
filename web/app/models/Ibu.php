<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Ibu extends Eloquent {

    protected $table = "ibu";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Keluarga() {
        return $this->belongsTo($this->ns . "Keluarga");
    }

    public function Desa() {
        return $this->belongsTo($this->ns . "Desa");
    }

}
