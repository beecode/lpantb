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
use App\Helpers\KA5DisposisiHelper;

/**
* Notifikasi Helpers
* @author nunenuh
*/
class FormKA6DisposisiHelper{

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
     foreach($form as $fm){
       $dis = $fm->disposisi->first();
       if ($dis!=NULL){
         $kepada = json_decode($dis->kepada);
         foreach($kepada as $user){
           if ($user->id == $myUser->id){
             $mydis[$i] = $dis->form->id;
             $i++;
           }
         }
       }
     }

     return $mydis;
   }

  public static function countFormKA6($year){
    $fmOut = [];
    $c = 0;
    $forms  = KA5DisposisiHelper::getDisposisiForm($year);
    if ($forms!=null){
      foreach($forms as $fm){
        $anak = $fm->anak->first();
        $fmAll = $anak->form;

        foreach($fmAll as $fa){
          if (strftime("%Y", strtotime($fa->tanggal))==$year){
            if ($fa->nama == "ka5"){
              $fmOut[$c] = $fa->id;
              $c++;
            }
          }
        }
      }
    }

    return $fmOut;
  }

  public static function count($year){
    return count(FormKA6DisposisiHelper::countFormKA6($year));
  }

  public static function getDisposisiForm($year){
    $formDisArray = FormKA6DisposisiHelper::countFormKA6($year);
    if (is_array($formDisArray) && count($formDisArray)!=0){
      $form = Form::wherein('id',$formDisArray)
                    ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                    ->orderBy('no_lka', 'desc')->get();
      return $form;
    } else {
      return null;
    }
  }



}
