<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Files extends Eloquent {

    protected $table = "files";
   public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsTo($this->ns . "Anak");
    }

}
