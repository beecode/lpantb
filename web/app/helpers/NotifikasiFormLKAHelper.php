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

use Illuminate\Support\Facades\Auth;

/**
* Notifikasi Helpers
* @author nunenuh
*/
class NotifikasiFormLKAHelper{

  public static function addNotif($form_id){
    //notifikasi
    $user = Auth::user();
    $user_from_id = $user->id;

    $user_to = User::where('level','=','admin')->get();
    foreach($user_to as $u){
      NotifikasiFormHelper::formCreate($user_from_id, $u->id, $form_id);
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
  }

  public static function deleteNotif($form_id){
    //notifikasi
    $user = Auth::user();
    $user_from_id = $user->id;

    $user_to = User::where('level','=','admin')->get();
    foreach($user_to as $u){
      NotifikasiFormHelper::formDelete($user_from_id, $u->id, $form_id);
    }
  }

}
