<?php

namespace App\Helpers;

use App\Models\Form;
use App\Models\Anak;
use App\Models\Pelapor;
use App\Models\SumberInformasi;
use App\Models\ContactPerson;
use App\Models\Desa;
use App\Models\Disposisi;
use App\Models\TindakLanjut;
use App\Models\JenisKasus;
use App\Helpers\DateHelper;
use App\Models\GambaranFisik;
use App\Models\Keluarga;
use App\Models\Ibu;
use App\Models\Ayah;
use App\Models\IdentifikasiMasalah;
use App\Models\KondisiPsikososial;
use App\Models\Intervensi;
use App\Models\Pendampingan;

/**
 * Description of FormHelper
 *
 * @author nunenuh
 */
class FormHelper {

    public static function intervensiSaveOrUpdate($form, $inter) {
        $intervensi = null;
        if (isset($inter['other']['id'])) {
            $intervensi = Intervensi::find($inter['other']['id']);
            if (isset($inter['other']['check'])) {
                $intervensi->jenis = $inter['other']['value'];
                $intervensi->other = 'T';
                $intervensi->update();

                $intervensi->Form()->attach($form->id);
            } else {
                $intervensi->Form()->detach($form->id);
            }
        } else {
            $intervensi = new Intervensi();
            $intervensi->jenis = $inter['other']['value'];
            $intervensi->other = 'T';
            $intervensi->save();

            $intervensi->Form()->attach($form->id);
        }

        return $intervensi;
    }

    public static function intervensiAttach($form, $inter) {
        if (isset($inter['def'])) {
            $def = $inter['def'];

            foreach ($form->intervensi as $vd) {
                $form->Intervensi()->detach($vd->id);
            }

            foreach ($def as $vf) {
                $form->Intervensi()->attach($vf['id']);
            }
        }
    }

    public static function identifikasiMasalahSaveOrUpdate($ms, $form) {
        $masalah = null;
        if (isset($ms['id'])) {
            $masalah = IdentifikasiMasalah::find($ms['id']);
            $masalah->gka = $ms['gka'];
            $masalah->ha = $ms['ha'];
            $masalah->gkk = $ms['gkk'];
            $masalah->hk = $ms['hk'];
            $masalah->kesimpulan = $ms['kesimpulan'];
            $masalah->Form()->associate($form);
            $masalah->update();
        } else {
            $masalah = new IdentifikasiMasalah();
            $masalah->gka = $ms['gka'];
            $masalah->ha = $ms['ha'];
            $masalah->gkk = $ms['gkk'];
            $masalah->hk = $ms['hk'];
            $masalah->kesimpulan = $ms['kesimpulan'];
            $masalah->Form()->associate($form);
            $masalah->save();
        }

        return $masalah;
    }

   

   

    public static function contactSaveOrUpdate($ct, $anak) {
        $contact = null;
        if (empty($ct['id'])) {
            if (isset($ct['nama']) || isset($ct['telp'])) {
                $contact = new ContactPerson();
                $contact->nama = $ct['nama'];
                $contact->telp = $ct['telp'];
                $contact->anak()->associate($anak);
                $contact->save();
            }
        } else {
            $contact = ContactPerson::find($ct['id']);
            if (count($contact)) {
                $contact->nama = $ct['nama'];
                $contact->telp = $ct['telp'];
                $contact->update();
            }
        }
        return $contact;
    }

    public static function keluargaSaveOrUpdate($kl, $anak) {
        $keluarga = null;
        if (isset($kl['id'])) {
            $keluarga = Keluarga::find($kl['id']);
            $keluarga->status = $kl['status'];
            $keluarga->update();
        } else {
            $keluarga = new Keluarga();
            $keluarga->status = $kl['status'];
            $keluarga->Anak()->associate($anak);
            $keluarga->save();
        }

        return $keluarga;
    }

    public static function ibuSaveOrUpdate($ib, $keluarga) {
        $ibu = null;
        if (isset($ib['id'])) {
            $ibu = Ibu::find($ib['id']);
            $ibu->nama = $ib['nama'];
            $ibu->tempat_lahir = $ib['tempat_lahir'];
            $ibu->tanggal_lahir = DateHelper::toDate($ib['tanggal_lahir']);
            $ibu->alamat = $ib['alamat'];
            $ibu->pekerjaan = $ib['pekerjaan'];
            $ibu->telp = $ib['telp'];
            $ibu->pendidikan_terakhir = $ib['pendidikan'];
            $ibu->Keluarga()->associate($keluarga);

            $ibu_desa = Desa::find($ib['desa']);
            $ibu->Desa()->associate($ibu_desa);
            $ibu->update();
        } else {
            $ibu = new Ibu();
            $ibu->nama = $ib['nama'];
            $ibu->tempat_lahir = $ib['tempat_lahir'];
            $ibu->tanggal_lahir = DateHelper::toDate($ib['tanggal_lahir']);
            $ibu->alamat = $ib['alamat'];
            $ibu->pekerjaan = $ib['pekerjaan'];
            $ibu->telp = $ib['telp'];
            $ibu->pendidikan_terakhir = $ib['pendidikan'];
            $ibu->Keluarga()->associate($keluarga);

            $ibu_desa = Desa::find($ib['desa']);
            $ibu->Desa()->associate($ibu_desa);
            $ibu->save();
        }

        return $ibu;
    }

    public static function ayahSaveOrUpdate($ayh, $keluarga) {
        $ayah = null;
        if (isset($ayh['id'])) {
            $ayah = Ayah::find($ayh['id']);
            $ayah->nama = $ayh['nama'];
            $ayah->tempat_lahir = $ayh['tempat_lahir'];
            $ayah->tanggal_lahir = DateHelper::toDate($ayh['tanggal_lahir']);
            $ayah->alamat = $ayh['alamat'];
            $ayah->pekerjaan = $ayh['pekerjaan'];
            $ayah->telp = $ayh['telp'];
            $ayah->pendidikan_terakhir = $ayh['pendidikan'];
            $ayah->Keluarga()->associate($keluarga);

            $ayah_desa = Desa::find($ayh['desa']);
            $ayah->Desa()->associate($ayah_desa);
            $ayah->update();
        } else {
            $ayah = new Ayah();
            $ayah->nama = $ayh['nama'];
            $ayah->tempat_lahir = $ayh['tempat_lahir'];
            $ayah->tanggal_lahir = DateHelper::toDate($ayh['tanggal_lahir']);
            $ayah->alamat = $ayh['alamat'];
            $ayah->pekerjaan = $ayh['pekerjaan'];
            $ayah->telp = $ayh['telp'];
            $ayah->pendidikan_terakhir = $ayh['pendidikan'];
            $ayah->Keluarga()->associate($keluarga);

            $ayah_desa = Desa::find($ayh['desa']);
            $ayah->Desa()->associate($ayah_desa);
            $ayah->save();
        }

        return $ayah;
    }

}
