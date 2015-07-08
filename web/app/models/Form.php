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

    public function User() {
        return $this->belongsToMany($this->ns . "User", "user_has_form")->withPivot("user_id");
    }

    public function Anak() {
        return $this->belongsToMany($this->ns . "Anak", "form_has_anak")->withPivot("anak_id");
    }
    

    public function Disposisi() {
        return $this->hasMany($this->ns . "Disposisi");
    }

}
