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
class NotifikasiFormHelper{

  public static function formCreate($user_from_id, $user_to_id, $form_id){
    $form = Form::find($form_id);
    $action_status = 'create';
    $title = "Form ".strtoupper($form->nama);
    NotifikasiHelper::formNotifNew($title, $action_status,$user_from_id, $user_to_id, $form_id);
  }

  public static function formUpdate($user_from_id, $user_to_id, $form_id){
    $form = Form::find($form_id);
    $action_status = 'update';
    $title = "Form ".strtoupper($form->nama);
    NotifikasiHelper::formNotifNew($title, $action_status,$user_from_id, $user_to_id, $form_id);
  }

  public static function formDelete($user_from_id, $user_to_id, $form_id){
    $form = Form::find($form_id);
    $action_status = 'delete';
    $title = "Form ".strtoupper($form->nama);
    NotifikasiHelper::formNotifNew($title, $action_status,$user_from_id, $user_to_id, $form_id);
  }

}
