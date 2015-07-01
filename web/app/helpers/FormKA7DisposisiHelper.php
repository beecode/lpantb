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
use App\Helpers\NotifikasiHelper;
use App\Helpers\NotifikasiFormHelper;
use Illuminate\Support\Facades\Auth;
use App\Models\Disposisi;
use App\Helpers\DisposisiHelper;
use App\Helpers\FormKA5DisposisiHelper;
use App\Helpers\KA5DisposisiHelper;

/**
* Notifikasi Helpers
* @author nunenuh
*/
class FormKA7DisposisiHelper{




  /**
   * Method ini digunakan untuk mendapatkan
   * jumlah form ka3 yang di disposisikan ke user yang sedang login
   *
   * Data dari form di dapatkan dari formka3
   * dan table disposisi pada field kepada
   *
   * Jumlah id FormKA3 ini digunakan pada Form KA4
   */
   public static function countMyDisposisi($year=null){
    $diska5 = KA5DisposisiHelper::getDisposisiForm($year);

    if ($diska5!=NULL){
      $mydis = [];
      $i=0;
      $c = 0;

      foreach($diska5 as $fm){

        //mengecek apakah form ka4 telah dibuat
        //pada sequence form secara menyeluruh
        $isFormKA7HasBeenCreated = false;
        $anak = $fm->anak->first();
        $fma = $anak->form;
        foreach($fma as $f){
          if ($f->nama == "ka7"){
              $isFormKA7HasBeenCreated = true;
          }
        }

        foreach($fma as $fm){
          if ($fm->nama == "ka6" && $isFormKA7HasBeenCreated==false){ //berarti ka6 udah dibuat
            $mydis[$c] = $fm->id;
            $c++;
          }
        }

      }
     return $mydis;
   } else {
     return [];
   }

   }

  public static function getDisposisiForm($year){
    $formDisArray = FormKA7DisposisiHelper::countMyDisposisi($year);
    if (is_array($formDisArray) && count($formDisArray)!=0){
      $form = Form::wherein('id',$formDisArray)
                    ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                    ->orderBy('no_lka', 'desc')->get();

      return $form;
    } else {
      return null;
    }
  }

  public static function count($year){
    return count(FormKA7DisposisiHelper::getDisposisiForm($year));
  }


  public static function addNotif($form_id){
    //notifikasi ke admin
    $user = Auth::user();
    $user_from_id = $user->id;

    $user_to = User::where('level','=','admin')->get();
    foreach($user_to as $u){
      NotifikasiFormHelper::formCreate($user_from_id, $u->id, $form_id);
    }

    $disposisi = FormKA7DisposisiHelper::getDisposisiKA5($form_id);
    var_dump($disposisi);
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

    $disposisi = FormKA7DisposisiHelper::getDisposisiKA5($form_id);
    var_dump($disposisi);
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


    $disposisi = FormKA7DisposisiHelper::getDisposisiKA5($form_id);
    var_dump($disposisi);
    foreach($disposisi as $dis){
      if ($dis->id != $user_from_id){ //jika bukan diri sendiri
        $user_to_id = $dis->id;
        NotifikasiFormHelper::formDelete($user_from_id, $user_to_id, $form_id);
      }
    }
  }

  public static function getDisposisiKA5($form_id){
    $form = Form::find($form_id); //ambil form id
    $fa  = $form->anak->first(); //ambil data anak dari form ini
    $anak = Anak::find($fa->id); //ambil data anak berdasarkan id anak pada form ka4
    $formAll = $anak->form; //ambil data banyak form dari anak
    $formDis = null;
    foreach($formAll as $fm){
      if ($fm->nama=="ka5"){ //jika form sama dengan form ka3 maka
        $formDis = $fm; //simpan data from ka3 ke $formDis
      }
    }
    //ambil data disposisi
    $disposisi = json_decode($formDis->disposisi->first()->kepada);
    return $disposisi;
  }

}
