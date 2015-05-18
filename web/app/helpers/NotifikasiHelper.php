<?php
namespace App\Helpers;

use App\DAO\SettingDAO;
use App\DAO\NotifikasiDAO;
use App\DAO\FormDAO;
use App\DAO\UserDAO;
use App\DAO\PendampinganDAO;

use App\Models\Setting;
use App\Models\Notifikasi;
use App\Models\Form;
use App\Models\User;
use App\Models\Pendampingan;

/**
* Notifikasi Helpers
* @author nunenuh
*/
class NotifikasiHelper{

  public static function getAllNotifForMe($user_id){
    $notif = Notifikasi::where('action_to','=',$user_id)
    ->orderBy('created_at','desc')->get();
    return $notif;
  }


  /**
  *
  */
  public static function formNotifNew($title, $action_status_form, $user_from_id, $user_to_id, $form_id){
    $user_from = User::find($user_from_id);
    $user_to = User::find($user_to_id);
    $form = Form::find($form_id);

    $user_from_level = ucfirst($user_from->level);
    $user_from_name = $user_from->name;
    $form_nama = strtoupper($form->nama);

    $status = 'new';
    $action_status = $action_status_form;

    $action_translate = NotifikasiHelper::translateActionStatus($action_status);
    $desc = "<b>".$user_from_level."</b> dengan Nama <b>".$user_from_name."</b>"
    ."<br/>melakukan ".$action_translate." pada Form <b>".$form_nama."</b>"
    ." dengan Nomer LKA ".$form->no_lka;

    $action_from = $user_from->id;
    $action_from_json = json_encode($user_from->get());

    $action_to = $user_to->id;
    $action_to_json = json_encode($user_to);

    $form_id = $form->id;
    $form_nama = $form->nama;
    $form_json = json_encode($form);

    $notif = [
      'status' => $status,
      'title'=>$title,
      'desc'=> $desc,
      'action_status'=>$action_status,
      'action_from'=>$action_from,
      'action_from_json'=>$action_from_json,
      'action_to'=>$action_to,
      'action_to_json'=>$action_to_json,
      'form_id'=>$form_id,
      'form_nama'=>$form_nama,
      'form_json'=>$form_json,
    ];

    NotifikasiDAO::saveOrUpdate($notif);
  }


  public function FunctionName(){
  }


  public static function translateActionStatus($action_status){
    if ($action_status == 'create'){
      return '<b>Penambahan</b>';
    } else if ($action_status == 'update'){
      return '<b>Pengubahan</b>';
    } else if ($action_status == 'delete'){
      return '<b>Penghapusan</b>';
    } else {
      return '<b>unknown error</b>';
    }
  }





}
