<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Form
 *
 * @author nunenuh
 */
class Form extends Eloquent {

    protected $table = "form";
    public $timestamps = true;
    private $ns = "App\\Models\\";

    public function Staff() {
        return $this->belongsToMany($this->ns . "Sign", "form_has_staff")->withPivot("staff_id");
    }

    public function Anak() {
        return $this->belongsToMany($this->ns . "Anak", "form_has_anak")->withPivot("anak_id");
    }

    public function Disposisi() {
        return $this->hasMany($this->ns . "Disposisi");
    }

}
