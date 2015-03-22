<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Staff extends Eloquent {

    protected $table = "staff";
    // public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Form() {
        return $this->belongsToMany($this->ns . "Form", "form_has_staff")->withPivot("form_id");
    }

}
