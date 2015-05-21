<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\DAO\ReportDAO;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Helpers\NotifikasiHelper;
use App\DAO\NotifikasiDAO;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class NotifikasiController extends BaseController {

  public function view(){

    $year = date('Y');
    $user = Auth::user();
    $data = [
      'title' => '',
      'page_title' => 'Notifikasi',
      'panel_title' => 'Table View',
      'location' => 'view',
      'data'=>Notifikasi::where('action_to','=',$user->id),
    ];
    return View::make('notifikasi.view', $data);

  }



  public function read($id){
    $nt = Notifikasi::find($id);
    $url = $this->getRedirectURL($nt);

    $nt->status="read";
    $nt->update();

    //redirect after change status from new to read
    return Redirect::to($url);
  }



  public function markAllAsRead(){
    $user = Auth::user();
    $notif = Notifikasi::where('action_to','=',$user->id)->get();
    foreach ($notif as $nt){
      $nt->status = 'read';
      $nt->update();
    }
  }

  private function getRedirectURL($notifikasi){

    $form_id = $notifikasi->form_id;
    $form_nama = $notifikasi->form_nama;
    $url = 'dash/form'.$form_nama.'/detailview/'.$form_id;

    if ($notifikasi->action_status=='delete'){
      $url = 'dash/form'.$form_nama;
    }

    if ($notifikasi->action_status=="disposisi"){
      $url = 'dash/formka4/disposisi';
    }

    return $url;
  }

}
