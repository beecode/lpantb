<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Disposisi extends Eloquent {

    protected $table = "disposisi";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Form() {
        return $this->belongsTo($this->ns . "Form");
    }

}
