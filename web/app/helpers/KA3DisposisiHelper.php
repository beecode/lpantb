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
class KA3DisposisiHelper{

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
    $myUser = Auth::user();
    if ($year!=null){
      $form = Form::whereRaw('YEAR(`tanggal`) = ?',array($year))->get();
    } else {
      $form = Form::all();
    }


    $mydis = [];
    $i=0;
    $isFormKA4HasBeenCreated = false;
    foreach($form as $fm){
      $dis = $fm->disposisi->first();
      if ($fm->nama == "ka4"){
          $isFormKA4HasBeenCreated = true;
      }
      if ($dis!=NULL && $fm->nama =="ka3"){
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

    if ($isFormKA4HasBeenCreated==true){
      return [];
    } else {
      return $mydis;
    }
  }

  /**
   * Hitung jumlah disposisi yang berasal dari FormKA3
   * dengan hitungan berdasarkan user yang sedang login
   * untuk digunakan pada FormKA4
   */
  public static function count($year)
  {
    return count(KA3DisposisiHelper::countMyDisposisi($year));
  }

  public static function getDisposisiForm($year)
  {
    $formDisArray = KA3DisposisiHelper::countMyDisposisi($year);
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
