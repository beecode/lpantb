<?php
namespace App\Helpers;

use App\DAO\SettingDAO;
use App\Models\Form;
use App\DAO\FormDAO;
use Auth;


/**
 * LKAHelper
 * @author nunenuh
 */
 class LKAHelper{


   public static function getLKA(){
     $pad = 4;
     $rand_max = 9999;

     $yearDb = SettingDAO::getValue("LKA_YEAR");
     $monthDb = SettingDAO::getValue("LKA_MONTH");

     $yearNow = date('Y');
     $part = SettingDAO::getValue('LKA_PART');

     $num = rand(1, $rand_max); //random number
     $number =  str_pad($num, $pad, "0", STR_PAD_LEFT);

     $year = date('Y');
     if ($yearDb!=$yearNow){
       $num = rand(1, $rand_max); //random number
       $number =  str_pad($num, $pad, "0", STR_PAD_LEFT);
        $year = $yearNow;
     }

     $year = date('Y');
     $month = RomanHelper::numberToRoman(date('m'));
     $lka = $number.'/'.$part.'/'.$month.'/'.$year;

     $unique = false;
     while ($unique==false){
       $f = Form::where('no_lka','=',$lka)->count();
       if ($f==0){
         $unique = true; //or break looping
       } else {

         $num = rand(1, $rand_max); //random number
         $number =  str_pad($num, $pad, "0", STR_PAD_LEFT);
         $lka = $number.'/'.$part.'/'.$month.'/'.$year;

         $f = Form::where('no_lka','=',$lka)->count();
         if ($f==0){
           $unique==true;
         }
       }
     }

     return $lka;


   }


  //  public static function getLKA(){
  //    $yearDb = SettingDAO::getValue("LKA_YEAR");
  //    $monthDb = SettingDAO::getValue("LKA_MONTH");
   //
  //    $yearNow = date('Y');
  //    $part = SettingDAO::getValue('LKA_P ART');
   //
  //    $last = SettingDAO::getValue("LKA_LAST_NUMBER");
  //    $active = SettingDAO::getValue("LKA_ACTIVE");
  //    $num = $last + $active;
  //    $number =  str_pad($num, 3, "0", STR_PAD_LEFT);
   //
  //    $year = date('Y');
  //    if ($yearDb!=$yearNow){
  //       $last = SettingDAO::getValue("LKA_START_NUMBER");
  //       $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
  //       $year = $yearNow;
  //    }
   //
  //    $year = date('Y');
  //    $month = RomanHelper::numberToRoman(date('m'));
  //    $lka = $number.'/'.$part.'/'.$month.'/'.$year;
   //
  //    $unique = false;
  //    while ($unique==false){
  //      $f = Form::where('no_lka','=',$lka)->count();
  //      if ($f==0){
  //        $unique = true; //or break looping
  //      } else {
   //
  //        $num = $last + $active + 1;
  //        $number =  str_pad($num, 3, "0", STR_PAD_LEFT);
  //        $lka = $number.'/'.$part.'/'.$month.'/'.$year;
   //
  //        $f = Form::where('no_lka','=',$lka)->count();
  //        if ($f==0){
  //          $unique==true;
  //        }
  //      }
  //    }
   //
  //    return $lka;
  //  }

  //  public static function getLKALastNumber(){
   //
  //    $yearDb = SettingDAO::getValue("LKA_YEAR");
  //    $monthDb = SettingDAO::getValue("LKA_MONTH");
   //
  //    $yearNow = date('Y');
  //    $part = SettingDAO::getValue('LKA_PART');
   //
  //    $last = SettingDAO::getValue("LKA_LAST_NUMBER");
  //    $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
   //
  //    if ($yearDb!=$yearNow){
  //       $last = SettingDAO::getValue("LKA_START_NUMBER");
  //       $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
  //       $year = $yearNow;
  //    } else {
  //      $year = $yearDb;
  //    }
   //
  //    $month = RomanHelper::numberToRoman(date('m'));
   //
  //    $lka = $number.'/'.$part.'/'.$month.'/'.$year;
   //
  //    $unique = false;
  //    while ($unique==false){
  //      $f = Form::where('no_lka','=',$lka)->count();
  //      if ($f==0){
  //        $unique = true; //or break looping
  //      } else {
  //        $last = $last + 1;
  //        $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
  //        $lka = $number.'/'.$part.'/'.$month.'/'.$year;
   //
  //        $f = Form::where('no_lka','=',$lka)->count();
  //        if ($f==0){
  //          $unique==true;
  //        }
  //      }
  //    }
   //
  //    return $last;
   //
  //  }

  //  public static function doCounter(){
  //    $last = LKAHelper::getLKALastNumber();
   //
  //    SettingDAO::setValue("LKA_LAST_NUMBER", $last);
  //  }
   //
  //  public static function getJsonOpen($user, $form_nama){
  //    $last_number = SettingDAO::getValue("LKA_LAST_NUMBER");
  //    $lka = LKAHelper::getLKA();
   //
  //    $data = [
  //      'last_number'=> $last_number,
  //      'form'=>[
  //        'nama'=>$form_nama,
  //        'no_lka'=>$lka,
  //      ],
  //      'user'=>$user
  //    ];
   //
  //    $json_data = json_encode($data);
  //    return $json_data;
  //  }
   //
   //
  //  public static function openLKA()
  //  {
  //    $active = SettingDAO::getValue('LKA_ACTIVE');
  //    $active = $active + 1;
  //    SettingDAO::setValue('LKA_ACTIVE',$active);
  //  }
   //
  //  public static function closeLKA()
  //  {
  //    $active = SettingDAO::getValue('LKA_ACTIVE');
  //    if ($active>0){
  //      $active = $active - 1;
  //    }
  //    SettingDAO::setValue('LKA_ACTIVE',$active);
  //  }


 }
