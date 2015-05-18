<?php
namespace App\Helpers;

use App\DAO\SettingDAO;
use App\Models\Form;
use App\DAO\FormDAO;


/**
 * PrintLog Helpers
 * @author nunenuh
 */
 class LKAHelper{

   public static function getLKA(){
     $yearDb = SettingDAO::getValue("LKA_YEAR");
     $monthDb = SettingDAO::getValue("LKA_MONTH");

     $yearNow = date('Y');
     $part = SettingDAO::getValue('LKA_PART');

     $last = SettingDAO::getValue("LKA_LAST_NUMBER");
     $number =  str_pad($last, 3, "0", STR_PAD_LEFT);

     $year = date('Y');
     if ($yearDb!=$yearNow){
        $last = SettingDAO::getValue("LKA_START_NUMBER");
        $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
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
         $last = $last + 1;
         $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
         $lka = $number.'/'.$part.'/'.$month.'/'.$year;

         $f = Form::where('no_lka','=',$lka)->count();
         if ($f==0){
           $unique==true;
         }
       }
     }

     return $lka;
   }

   public static function getLKALastNumber(){

     $yearDb = SettingDAO::getValue("LKA_YEAR");
     $monthDb = SettingDAO::getValue("LKA_MONTH");

     $yearNow = date('Y');
     $part = SettingDAO::getValue('LKA_PART');

     $last = SettingDAO::getValue("LKA_LAST_NUMBER");
     $number =  str_pad($last, 3, "0", STR_PAD_LEFT);

     if ($yearDb!=$yearNow){
        $last = SettingDAO::getValue("LKA_START_NUMBER");
        $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
        $year = $yearNow;
     } else {
       $year = $yearDb;
     }

     $month = RomanHelper::numberToRoman(date('m'));

     $lka = $number.'/'.$part.'/'.$month.'/'.$year;

     $unique = false;
     while ($unique==false){
       $f = Form::where('no_lka','=',$lka)->count();
       if ($f==0){
         $unique = true; //or break looping
       } else {
         $last = $last + 1;
         $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
         $lka = $number.'/'.$part.'/'.$month.'/'.$year;

         $f = Form::where('no_lka','=',$lka)->count();
         if ($f==0){
           $unique==true;
         }
       }
     }

     return $last;

   }

   public static function doCounter(){
     $last = LKAHelper::getLKALastNumber();
     SettingDAO::setValue("LKA_LAST_NUMBER", $last);
   }



 }
