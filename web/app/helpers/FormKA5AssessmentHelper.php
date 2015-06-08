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

/**
* Notifikasi Helpers
* @author nunenuh
*/
class FormKA5AssessmentHelper{

  public static function count($year){
    return count(FormKA5AssessmentHelper::getAssessment($year));
  }

   public static function getAssessment($year=null){
     if ($year!=null){
       $form = Form::where('nama','=','ka4')
                   ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                   ->get();
     } else {
       $form = Form::where('nama','=','ka4')
                   ->get();
     }

     //only form that dont have form ka3 will be indexed
     $outform = [];
     $c = 0;
     foreach ($form as $fm) {
       $anak = $fm->anak->first();
       $isFormKA4HasBeenCreated=FALSE;
       foreach ($anak->form as $fa) {
         if ($fa->nama == "ka5"){
             //this form cannot be included...
             $isFormKA4HasBeenCreated = TRUE;
         }
       }

       if ($isFormKA4HasBeenCreated==FALSE){
           $outform[$c]=$fm;
           $c++;
       }
     }

     return $outform;
   }




}
