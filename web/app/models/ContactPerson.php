<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class ContactPerson extends Eloquent {

    protected $table = "contact_person";
    public $timestamps = false;
    private $ns = "App\\Models\\";

    public function Anak() {
        return $this->belongsTo($this->ns . "Anak", "anak_id");
    }

}
