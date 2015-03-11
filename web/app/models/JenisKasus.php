<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class JenisKasus extends Eloquent {

    protected $table = "jenis_kasus";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsToMany($this->ns . "Anak", "anak_has_jenis_kasus")->withPivot("anak_id");
    }

}
