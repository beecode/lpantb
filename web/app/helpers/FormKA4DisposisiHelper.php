<?php
namespace App\Helpers;

use App\DAO\SettingDAO;
use App\DAO\NotifikasiDAO;
use App\DAO\FormDAO;
use App\DAO\UserDAO;
use App\DAO\PendampinganDAO;

use App\Models\Setting;
use App\Models\Notifikasi;
use App\Models\Form;
use App\Models\User;
use App\Models\Pendampingan;
use App\Models\Anak;

use Illuminate\Support\Facades\Auth;
use App\Helpers\NotifikasiFormHelper;
/**
* Notifikasi Helpers
* @author nunenuh
*/
class FormKA4DisposisiHelper{

  public static function addNotif($form_id){
    //notifikasi ke admin
    $user = Auth::user();
    $user_from_id = $user->id;

    $user_to = User::where('level','=','admin')->get();
    foreach($user_to as $u){
      NotifikasiFormHelper::formCreate($user_from_id, $u->id, $form_id);
    }

    $disposisi = FormKA4DisposisiHelper::getDisposisi($form_id);
    foreach($disposisi as $dis){
      if ($dis->id != $user_from_id){ //jika bukan diri sendiri
        $user_to_id = $dis->id;
        NotifikasiFormHelper::formCreate($user_from_id, $user_to_id, $form_id);
      }
    }
  }

  public static function updateNotif($form_id){
    //notifikasi
    $user = Auth::user();
    $user_from_id = $user->id;

    $user_to = User::where('level','=','admin')->get();
    foreach($user_to as $u){
      NotifikasiFormHelper::formUpdate($user_from_id, $u->id, $form_id);
    }


    $disposisi = FormKA4DisposisiHelper::getDisposisi($form_id);
    foreach($disposisi as $dis){
      if ($dis->id != $user_from_id){ //jika bukan diri sendiri
        $user_to_id = $dis->id;
        NotifikasiFormHelper::formUpdate($user_from_id, $user_to_id, $form_id);
      }
    }
  }

  public static function deleteNotif($form_id){
    //notifikasi
    $user = Auth::user();
    $user_from_id = $user->id;

    $user_to = User::where('level','=','admin')->get();
    foreach($user_to as $u){
      NotifikasiFormHelper::formDelete($user_from_id, $u->id, $form_id);
    }


    $disposisi = FormKA4DisposisiHelper::getDisposisi($form_id);
    foreach($disposisi as $dis){
      if ($dis->id != $user_from_id){ //jika bukan diri sendiri
        $user_to_id = $dis->id;
        NotifikasiFormHelper::formDelete($user_from_id, $user_to_id, $form_id);
      }
    }
  }

  private static  function getDisposisi($form_id){
    //mengirim ke sesama teman yang dapet diposisi
    $form = Form::find($form_id); //ambil form id
    $fa  = $form->anak->first(); //ambil data anak dari form ini
    $anak = Anak::find($fa->id); //ambil data anak berdasarkan id anak pada form ka4
    $formAll = $anak->form; //ambil data banyak form dari anak
    $formDis = null;
    foreach($formAll as $fm){
      if ($fm->nama=="ka3"){ //jika form sama dengan form ka3 maka
        $formDis = $fm; //simpan data from ka3 ke $formDis
      }
    }
    //ambil data disposisi
    $disposisi = json_decode($formDis->disposisi->first()->kepada);
    return $disposisi;
  }

}
