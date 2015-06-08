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
use App\Models\Anak;
use App\Helpers\NotifikasiHelper;
use App\Helpers\NotifikasiFormHelper;
use Illuminate\Support\Facades\Auth;

/**
* Notifikasi Helpers
* @author nunenuh
*/
class NotifikasiDisposisiHelper{

  public static function disposisiCreate($form_id){
    //kirim notifikasi ke orang yang di disposisikan
    $user_from_id = Auth::user()->id;
    $form = Form::find($form_id);
    $disposisi = json_decode($form->disposisi->first()->kepada);
    $action_status = 'disposisi';
    $title = "Disposisi Form ".strtoupper($form->nama);

    foreach($disposisi as $dis){
      $user_to_id = $dis->id;
      NotifikasiHelper::disposisiNotifNew($title, $user_from_id, $dis->id, $form_id);
    }

    //kirim notifikasi ke orang yang membuat LKA
    NotifikasiDisposisiHelper::formCreate($form_id);

  }

  public static function disposisiUpdate($form_id){
    //kirim notifikasi ke orang yang di disposisikan
    $user_from_id = Auth::user()->id;
    $form = Form::find($form_id);
    $disposisi = json_decode($form->disposisi->first()->kepada);
    $action_status = 'disposisi';
    $title = "Disposisi Form ".strtoupper($form->nama);

    foreach($disposisi as $dis){
      $user_to_id = $dis->id;
      NotifikasiHelper::disposisiNotifNew($title, $user_from_id, $dis->id, $form_id);
    }

    //kirim notifikasi ke orang yang membuat LKA
    NotifikasiDisposisiHelper::formUpdate($form_id);

  }

  public static function formCreate($form_id){
    $user_from_id = Auth::user()->id;
    $form = Form::find($form_id);
    $fa  = $form->anak->first();
    $anak = Anak::find($fa->id);
    $formLKA = $anak->form->first();
    $user = $formLKA->user->first();

    $uf_id = $user_from_id;
    $ut_id = $user->id;

    NotifikasiFormHelper::formCreate($uf_id, $ut_id, $form_id);
  }

  public static function formUpdate($form_id){
    $user_from_id = Auth::user()->id;
    $form = Form::find($form_id);
    $fa  = $form->anak->first();
    $anak = Anak::find($fa->id);
    $formLKA = $anak->form->first();
    $user = $formLKA->user->first();

    $uf_id = $user_from_id;
    $ut_id = $user->id;

    NotifikasiFormHelper::formUpdate($uf_id, $ut_id, $form_id);
  }

  public static function formDelete($form_id){
    $user_from_id = Auth::user()->id;
    $form = Form::find($form_id);
    $fa  = $form->anak->first();
    $anak = Anak::find($fa->id);
    $formLKA = $anak->form->first();
    $user = $formLKA->user->first();

    $uf_id = $user_from_id;
    $ut_id = $user->id;

    NotifikasiFormHelper::formDelete($uf_id, $ut_id, $form_id);
  }







}
