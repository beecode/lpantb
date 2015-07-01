<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\DAO\ReportDAO;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Helpers\NotifikasiHelper;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;



class NotifikasiServiceController extends BaseController {

  public function myNotif($id){
    return NotifikasiHelper::getAllNotifForMe($id);
  }

  public function myNewNotifCount($id){
    $nt = Notifikasi::where('action_to','=',$id)
                      ->where('status','=','new')
                      ->orderBy('created_at','desc')->count();

    return json_encode($nt);
  }

  public function markAllAsRead(){
    $user = Auth::user();
    $notif = Notifikasi::where('action_to','=',$user->id)->get();
    foreach ($notif as $nt){
      $nt->status = 'read';
      $nt->update();
    }
  }

  public function deleteAll(){
    $user = Auth::user();
    $notif = Notifikasi::where('action_to','=',$user->id)->get();
    foreach ($notif as $nt){
      $n = Notifikasi::find($nt->id);
      if ($n){
        $n->delete();
      }
    }
  }

  public function delete($id){
    $nt = Notifikasi::find($id);
    $nt->delete();
  }

}
