<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Pendampingan
 *
 * @author nunenuh
 */
class Anak extends Eloquent {

    protected $table = "anak";
    public $timestamps = true;
    private $ns = "App\\Models\\";

    public function Form() {
        return $this->belongsToMany($this->ns . "Form", "form_has_anak")->withPivot("form_id");
    }

    public function Desa() {
        return $this->belongsTo($this->ns . "Desa");
    }

    public function TindakLanjut() {
        return $this->belongsToMany($this->ns . "TindakLanjut", "anak_has_tindak_lanjut")->withPivot("tindak_lanjut_id");
    }

    public function JenisKasus() {
        return $this->belongsToMany($this->ns . "JenisKasus", "anak_has_jenis_kasus")->withPivot("jenis_kasus_id");
    }

    public function Intervensi() {
        return $this->belongsToMany($this->ns . "Intervensi", "anak_has_intervensi")->withPivot("intervensi_id");
    }

    public function SumberInformasi() {
        return $this->belongsToMany($this->ns . "SumberInformasi", "anak_has_sumber_informasi")->withPivot("sumber_informasi_id");
    }

    public function Pelapor() {
        return $this->belongsToMany($this->ns . "Pelapor", "anak_has_pelapor")->withPivot("pelapor_id");
    }

    public function KondisiPsikososial() {
        return $this->hasOne($this->ns . "KondisiPsikososial");
    }

    public function IdentifikasiMasalah() {
        return $this->hasOne($this->ns . "IdentifikasiMasalah");
    }

    public function ContactPerson() {
        return $this->hasOne($this->ns . "ContactPerson", "anak_id", "id");
    }

    public function GambaranFisik() {
        return $this->hasOne($this->ns . "GambaranFisik");
    }

    public function Pendampingan() {
        return $this->hasMany($this->ns . "Pendampingan");
    }

    public function Keluarga() {
        return $this->hasOne($this->ns . "Keluarga");
    }

}
