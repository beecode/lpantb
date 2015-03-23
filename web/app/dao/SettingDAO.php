<?php

namespace App\DAO;

use App\Models\Setting;

/**
* Description of SettingDAO
*
* @author nunenuh
*/
class SettingDAO {

  public static function getObject($prop){
    $set = Setting::where('property', '=', $prop)->get()->first();
    return $set;
  }

  public static function getValue($prop){
    $set = Setting::where('property', '=', $prop)->get()->first();
    return $set->value;
  }

  public static function setValue($prop, $value){
    $set = Setting::where('property', '=', $prop)->get()->first();
    if ($set){
      $set->value = $value;
      $set->update();
    }

    return $set;
  }

  public static function add($prop, $value){
    $set = new Setting();
    $set->property = $prop;
    $set->value = $value;
    $set->save();
    return $set;
  }

  public static function remove($property){
    $set = Setting::where('property', '=', $prop)->get()->first();
    if ($set){
      $set->delete();
    }
    return $set;
  }
}
