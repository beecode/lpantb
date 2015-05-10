<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use App\Models\Form;
use App\Models\Agama;
use Illuminate\Support\Facades\Session;
use App\Helpers\FormHelper;
use App\Helpers\LocationHelper;
use App\DAO\FormDAO;
use App\DAO\PelaporDAO;
use App\DAO\AnakDAO;
use App\DAO\ContactPersonDAO;
use App\DAO\SumberInformasiDAO;
use Illuminate\Support\Facades\DB;
use App\Models\Anak;
use Illuminate\Support\Facades\Auth;
use App\Helpers\FormMultiHelper;

/**
* Description of Testerform1Controller
*
* @author aljufry
*/
class FormKA2MultiController extends BaseController {

  public function view($enc_lka) {
    $lka = base64_decode($enc_lka);
    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 2 (KA2) Multi',
      'panel_title' => 'Table Multi View',
      'location' => 'view',
      'table' => Form::where('nama', '=', 'ka2')
      ->where('no_lka','=',$lka)
      ->orderBy('created_at', 'desc')->get(),

      'lka' => $enc_lka
    ];
    return View::make('formka2multi.view', $data);
  }

  public function viewMe($enc_lka) {
    $lka = base64_decode($enc_lka);
    $username = Auth::user()->username;
    $form = Form::where('nama', '=', 'ka2')
                  ->where('no_lka','=',$lka)
                  ->orderBy('created_at', 'desc');
    $form->whereHas('user', function ($qa) use ($username) {
      $qa->where('user.username', 'LIKE', '%' . $username . '%');
    });

    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 2 (KA2) Multi',
      'panel_title' => 'Table View',
      'location' => 'view',
      'table' => $form->get(),
      'lka' => $enc_lka
    ];
    return View::make('formka2multi.view', $data);
  }

  public function detailView($id) {
    $data = [
      'page_title' => 'Kasus Anak 2 (KA2) Multi',
      'panel_title' => 'Detail View',
      'location' => 'view',
      'data' => Form::where('nama', '=', 'ka2')->where('id', '=', $id)->first(),
    ];
    return View::make('formka2multi.detail', $data);
  }

  public function addView($enc_lka) {
    $lka = base64_decode($enc_lka);
    $data = [
      'page_title' => 'Kasus Anak 2 (KA2) Multi',
      'panel_title' => 'Form Add Multi',
      'form_url' => '/dash/formka2multi/add',
      'form_status' => 'add',
      'location_pelapor' => LocationHelper::location(),
      'location_anak' => LocationHelper::location(),
      'agama_lists' => Agama::lists('nama', 'nama'),
      'lka'=>$lka

    ];
    return View::make('formka2multi.form', $data);
  }

  public function add() {
    $sum = Input::get('sumber');
    $an = Input::get('anak');
    $ct = Input::get('contact');
    $fm = Input::get('form');


    // inject tanggal if not set
    if (!isset($fm['tanggal'])){
      $fm['tanggal']=date('Y-m-d');
    }

    $user = Auth::user();
    $sign = [
      'penerima'=>$user
    ];
    $sign = json_encode($sign);
    $fm['sign'] = $sign;

    $anak = AnakDAO::saveOrUpdate($an);
    $sum = SumberInformasiDAO::saveOrUpdate($sum, $anak);
    ContactPersonDAO::saveOrUpdate($ct, $anak);

    //save many to many
    $form = FormDAO::saveOrUpdate($fm);
    $form = Form::find($form->id);
    $form->anak()->attach($anak->id);
    $sum->anak()->attach($anak->id);
    $form->user()->attach($user->id);

    //synchornize multiple total and sequence multiview
    FormMultiHelper::synchronize($fm['no_lka']);


    $lka = base64_encode($fm['no_lka']);
    Session::flash('message', "Form with No LKA $form->no_lka has been added!");
    return Redirect::to('/dash/formka2multi/view/'.$lka);
  }

  public function updateView($id) {
    $rec = Form::find($id);
    $anak = $rec->anak->first();
    $pelapor = $anak->pelapor->first();

    $form = Form::find($id);
    $data = [
      'page_title' => 'Kasus Anak 2 (KA2) Multi',
      'panel_title' => 'Form Edit',
      'form_url' => '/dash/formka2multi/update',
      'form_status' => 'edit',
      'location_anak' => LocationHelper::location($anak->desa->id),
      'agama_lists' => Agama::lists('nama', 'nama'),
      'record' => $form,
      'lka'=>$form->no_lka
    ];
    return View::make('formka2multi.form', $data);
  }

  public function update() {
    $fm = Input::get('form');
    $sum = Input::get('sumber');
    $an = Input::get('anak');
    $ct = Input::get('contact');

    // inject tanggal if not set
    if (!isset($fm['tanggal'])){
      $fm['tanggal']=$fm['tanggal_old'];
    }

    $user = Auth::user();
    $sign = [
      'penerima'=>$user,
      'sumber'=>$sum['sumber']
    ];
    $sign = json_encode($sign);
    $fm['sign'] = $sign;


    $form = FormDAO::saveOrUpdate($fm);
    $anak = AnakDAO::saveOrUpdate($an);
    SumberInformasiDAO::saveOrUpdate($sum, $anak);
    ContactPersonDAO::saveOrUpdate($ct, $anak);

    //synchornize multiple total and sequence multiview
    FormMultiHelper::synchronize($fm['no_lka']);

    $lka = base64_encode($fm['no_lka']);
    Session::flash('message', "Form with No LKA $form->no_lka has been updated!");

    return Redirect::to('dash/formka2multi/view/'.$lka);
  }

  public function delete($id, $enc_lka) {
    $form = FormDAO::delete($id);
    if ($form) {
      Session::flash('message', "Form with $id has been deleted!");
    } else {
      Session::flash('message', "Error, Form with $id not found!");
    }

    $lka = base64_decode($enc_lka);
    //synchornize multiple total and sequence multiview
    FormMultiHelper::synchronize($lka);


    return Redirect::to('/dash/formka2multi/view/'.$enc_lka);
  }

  public function searchLKA(){
    $lka = Input::get('lka');
    $form = FormDAO::isLKAExist($lka);
    $data = [
      'result'=>$form
    ];
    return json_encode($data);
  }


}
