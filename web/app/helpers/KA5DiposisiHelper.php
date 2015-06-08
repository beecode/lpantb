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

/**
* Notifikasi Helpers
* @author nunenuh
*/
class KA5DisposisiHelper{

  /**
   * Method ini digunakan untuk mendapatkan
   * jumlah formka5 yang di disposisikan ke user yang sedang login
   *
   * Data dari form di dapatkan dari formka5
   * dan table disposisi pada field kepada
   *
   * Jumlah id FormKA5 ini digunakan pada FormKA6 dan FormKA7
   */
  public static function countMyDisposisi($year=null){
    $myUser = Auth::user();
    if ($year!=null){
      $form = Form::whereRaw('YEAR(`tanggal`) = ?',array($year))->get();
    } else {
      $form = Form::all();
    }


    $mydis = [];
    $i=0;
    $isFormKA6HasBeenCreated = false;
    foreach($form as $fm){
      $dis = $fm->disposisi->first();
      if ($fm->nama == "ka6"){
          $isFormKA6HasBeenCreated = true;
      }
      if ($dis!=NULL && $fm->nama ="ka5"){
        $kepada = json_decode($dis->kepada);
        foreach($kepada as $user){
          if ($user->id == $myUser->id){
            if (strftime("%Y", strtotime($dis->form->tanggal))==$year){
              $mydis[$i] = $dis->form->id;
              $i++;
            }
          }
        }
      }
    }

    if ($isFormKA6HasBeenCreated==true){
      return [];
    } else {
      return $mydis;
    }
  }

  /**
   * Hitung jumlah disposisi yang berasal dari FormKA5
   * dengan hitungan berdasarkan user yang sedang login
   * untuk digunakan pada FormKA6 dan FormKA7
   */
  public static function count($year)
  {
    return count(KA5DisposisiHelper::countMyDisposisi($year));
  }

  public static function getDisposisiForm($year)
  {
    $formDisArray = KA5DisposisiHelper::countMyDisposisi($year);
    // var_dump($formDisArray);
    if (is_array($formDisArray) && count($formDisArray)!=0){
      $form = Form::wherein('id',$formDisArray)
                    ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                    ->orderBy('no_lka', 'desc')->get();
      // var_dump($form);
      return $form;
    } else {
      return null;
    }
  }




}
