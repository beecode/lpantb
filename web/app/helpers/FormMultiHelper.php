<?php
namespace App\Helpers;

use App\DAO\FormDAO;
use App\Models\Form;


/**
 * PrintLog Helpers
 * @author nunenuh
 */
 class FormMultiHelper{

   public static function synchronize($lka){
     $form = Form::where('no_lka','=',$lka);
     $count = $form->count();
     if ($count > 1){

       // looping pada tiap data..
       $fm = $form->orderBy('tanggal', 'asc')->get();
       $c=1;
       foreach($fm as $ofm){
         if ($ofm->mode=="multiple"){
           // cek nilai multiple total dan ubah nilai multiple total
           // sesuai dengan jumlah mutilple total
           $upFm = Form::find($ofm->id);
           if ($ofm->multiple_total != $count){
             $upFm->multiple_total = $count;
           }

           // ubah nilai multiple sequence
           $upFm->multiple_sequence = $c;
           $c++;

           // ubah data
           $upFm->save();
         }
       }

     } else {
         $fm = $form->first();
         if ($fm->mode=="multiple"){
           $fm->multiple_total = 1;
           $fm->multiple_sequence = 1;
           $fm->update();
         }

     }
   }
 }
