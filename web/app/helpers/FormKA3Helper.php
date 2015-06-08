<?php

namespace App\Helpers;

use App\Models\Form;
use App\Models\Anak;

/**
 * @author nunenuh
 */
class FormKA3Helper{

  public static function countLKAData($year=null){
    return count(FormKA3Helper::getLKAData($year));
  }

  public static function getLKAData($year=null)
  {
    if ($year!=null){
      $form = Form::where('nama','=','ka1')
                  ->orWhere('nama','=','ka2')
                  ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                  ->get();
    } else {
      $form = Form::where('nama','=','ka1')
                  ->orWhere('nama','=','ka2')
                  ->get();
    }
    //only form that dont have form ka3 will be indexed
    $outform = [];
    $c = 0;
    foreach ($form as $fm) {
      $anak = $fm->anak->first();
      $isFormKA3HasBeenCreated=FALSE;
      foreach ($anak->form as $fa) {
        if ($fa->nama == "ka3"){
            //this form cannot be included...
            $isFormKA3HasBeenCreated = TRUE;
        }
      }
      if ($isFormKA3HasBeenCreated==FALSE){
          $outform[$c]=$fm;
          $c++;
      }
    }

    return $outform;
  }

}
