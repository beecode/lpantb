<?php


namespace App\Helpers;


/**
 * PrintLog Helpers
 * @author nunenuh
 */
 class PrintLog{

   public static function log($val, $detail=false)
   {
     if ($detail == true){
       echo "<pre>";
       var_dump($val);
       echo "</pre>";
     } else {
       echo "<pre>";
       print_r($val);
       echo "</pre>";
     }
   }
 }
