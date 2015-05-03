<?php
namespace App\Helpers;

use App\DAO\SettingDAO;


/**
 * PrintLog Helpers
 * @author nunenuh
 */
 class LKAHelper{

   public static function getLKA(){
     $last = SettingDAO::getValue("LKA_LAST_NUMBER");

     $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
     $part = SettingDAO::getValue('LKA_PART');
     $month = RomanHelper::numberToRoman(date('m'));
     $year = date('Y');

     $lka = $number.'/'.$part.'/'.$month.'/'.$year;

     return $lka;
   }

   public static function doCounter(){
     $last = SettingDAO::getValue("LKA_LAST_NUMBER");
     $last = $last+ 1;
     SettingDAO::setValue("LKA_LAST_NUMBER", $last);
   }
   
 }
