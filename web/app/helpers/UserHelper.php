<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class UserHelper{

  public static function isLoggedUserIncluded($users)
  {
    $out = false;
    foreach ($users as $user) {
      if (Auth::user()->id == $user->id){
        $out = true;
      }
    }
    return $out;
  }

  public static function isOperatorAuthority($users){
    $out = false;
    $isIncluded = UserHelper::isLoggedUserIncluded($users);
    if (Auth::user()->level == "operator"){
      if ($isIncluded == true){
        $out = true;
      }
    }

    return $out;
  }

  public static function isAdminAuthority($users){
    $isIncluded = UserHelper::isLoggedUserIncluded($users);
  }

  public static function amIAdmin()
  {
    if (Auth::user()->level=="admin"){
      return true;
    } else {
      return false;
    }
  }

}
