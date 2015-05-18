<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Form;
use App\Models\Agama;
use Illuminate\Support\Facades\Session;
use App\Controllers\Interfaces\FeatureInterface;
use App\Helpers\FormHelper;
use App\Helpers\LocationHelper;
use App\DAO\FormDAO;
use App\DAO\SumberInformasiDAO;
use App\DAO\ContactPersonDAO;
use App\DAO\AnakDAO;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LKAHelper;
use App\Helpers\FormMultiHelper;
use App\Helpers\NotifikasiFormLKAHelper;

/**
* Description of Testerform1Controller
*
* @author aljufry
*/
class FormKA2Controller extends BaseController {

  public function view() {
    $year = date('Y');
    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 2 (KA2)',
      'panel_title' => 'Table View',
      'location' => 'view',
      'table'=> Form::where('nama', '=', 'ka2')
                     ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                     ->orderBy('no_lka', 'desc')->get(),
      'selectedYear'=>$year,
    ];
    return View::make('formka2.view', $data);
    // echo $year;
  }

  public function viewMe() {
    $year = date('Y');
    $username = Auth::user()->username;
    $form = Form::where('nama', '=', 'ka2')
                  ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                  ->orderBy('tanggal', 'desc');
    $form->whereHas('user', function ($qa) use ($username) {
      $qa->where('user.username', 'LIKE', '%' . $username . '%');
    });

    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 2 (KA2)',
      'panel_title' => 'Table View',
      'location' => 'view',
      'table' => $form->get(),
      'selectedYear'=>$year
    ];
    return View::make('formka2.view', $data);
  }

  public function viewYear() {
    $year = Input::get('year');
    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 2 (KA2)',
      'panel_title' => 'Table View',
      'location' => 'view',
      'table'=> Form::where('nama', '=', 'ka2')
                      ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                      ->orderBy('no_lka', 'desc')->get(),
      'selectedYear'=>$year
    ];
    return View::make('formka2.view', $data);
  }


  public function detailView($id) {
    $data = [
      'page_title' => 'Kasus Anak 2 (KA2)',
      'panel_title' => 'Detail View',
      'location' => 'view',
      'data' => Form::where('nama', '=', 'ka2')->where('id', '=', $id)->first(),
    ];
    return View::make('formka2.detail', $data);
  }

  public function addView() {
    $data = [
      'page_title' => 'Kasus Anak 2 (KA2)',
      'panel_title' => 'Form Add',
      'form_url' => '/dash/formka2/add',
      'form_status' => 'add',
      'location_anak' => LocationHelper::location(),
      'agama_lists' => Agama::lists('nama', 'nama'),
    ];
    return View::make('formka2.form', $data);
  }

  public function add() {
    $sum = Input::get('sumber');
    $an = Input::get('anak');
    $ct = Input::get('contact');
    $fm = Input::get('form');

    if (!isset($fm['no_lka'])){
      $fm['no_lka']=LKAHelper::getLKA();
    }

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

    //LKA do COunter
    LKAHelper::doCounter();


    //notifikasi
    NotifikasiFormLKAHelper::addNotif($form->id);

    Session::flash('message', "Form with No LKA $form->no_lka has been added!");
    return Redirect::to('/dash/formka2');
  }

  public function addMultiView() {
    $data = [
      'page_title' => 'Kasus Anak 2 (KA2)',
      'panel_title' => 'Form Add Multi',
      'form_url' => '/dash/formka2/addmulti',
      'form_status' => 'add',
      'location_pelapor' => LocationHelper::location(),
      'location_anak' => LocationHelper::location(),
      'agama_lists' => Agama::lists('nama', 'nama'),

    ];
    return View::make('formka2.multi', $data);
  }

  public function addMulti() {
    $fm = Input::get('form');

    // inject lka if not set
    if (!isset($fm['no_lka'])){
      $fm['no_lka']=LKAHelper::getLKA();
    }

    // inject tanggal if not set
    if (!isset($fm['tanggal'])){
      $fm['tanggal']=date('Y-m-d');
    }

    $lka = base64_encode($fm['no_lka']);

    Session::put('multi.lka', $fm['no_lka']);
    Session::put('multi.tanggal', $fm['tanggal']);

    return Redirect::to('/dash/formka2multi/view/'.$lka);
  }

  public function updateView($id) {
    $form = Form::find($id);
    $anak = $form->anak->first();
    $sumber = $anak->sumber_informasi->first();

    $data = [
      'page_title' => 'Kasus Anak 2 (KA2)',
      'panel_title' => 'Form Edit',
      'form_url' => '/dash/formka2/update',
      'form_status' => 'edit',
      'location_anak' => LocationHelper::location($anak->desa->id),
      'agama_lists' => Agama::lists('nama', 'nama'),
      'record' => Form::find($id),
    ];
    return View::make('formka2.form', $data);
  }

  public function update() {
    $fm = Input::get('form');
    $sum = Input::get('sumber');
    $an = Input::get('anak');
    $ct = Input::get('contact');


    //get no lka and tanggal for update
    $form = Form::find($fm['id']);
    $no_lka = $form->no_lka;;

    // inject lka if not set
    if (!isset($fm['no_lka'])){
      $fm['no_lka']=$form->no_lka;
    }

    // inject tanggal if not set
    if (!isset($fm['tanggal'])){
      $fm['tanggal']=$form->tanggal;
    }

    $user = Auth::user();
    $sign = [
      'penerima'=>$user
    ];
    $sign = json_encode($sign);
    $fm['sign'] = $sign;


    FormDAO::saveOrUpdate($fm);
    $anak = AnakDAO::saveOrUpdate($an);
    SumberInformasiDAO::saveOrUpdate($sum, $anak);
    ContactPersonDAO::saveOrUpdate($ct, $anak);

    $lka = $fm['no_lka'];

    //notifikasi
    NotifikasiFormLKAHelper::updateNotif($form->id);

    Session::flash('message', "Form with No LKA $lka has been updated!");
    return Redirect::to('dash/formka2');
  }

  public function delete($id) {
    //notifikasi
    NotifikasiFormLKAHelper::deleteNotif($id);

    $f = Form::find($id);
    $form = FormDAO::delete($id);

    if ($f->mode=="multiple"){
      FormMultiHelper::synchronize($f->no_lka);
    }

    if ($form) {
      Session::flash('message', "Form with $id has been deleted!");
    } else {
      Session::flash('message', "Error, Form with $id not found!");
    }
    return Redirect::to('/dash/formka2');
  }

  public function search() {
    $keyword = Input::get('keyword');
    $filter = Input::get('filter');

    $result = Form::where('nama', '=', 'ka2')->orderBy('tanggal', 'asc');

    if ($keyword != NULL) {
      if ($filter == "anak") {
        $result = $result->whereHas('anak', function ($qa) use ($keyword) {
          $qa->where('anak.nama', 'LIKE', '%' . $keyword . '%');
        });
      } else if ($filter == "sumber") {
        $result = $result->whereHas('anak', function ($qa) use ($keyword) {
          $qa->whereHas('sumberinformasi', function($qp) use ($keyword) {
            $qp->where('sumber_informasi.sumber', 'LIKE', '%' . $keyword . '%');
          });
        });
      } else if ($filter == "lka") {
        $result = $result->where('no_lka', 'LIKE', '%' . $keyword . '%');
      } else if ($filter == "kode" || $filter == NULL) {
        $result = $result->where('id', '=', $keyword);
      }
    }

    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 2 (KA2)',
      'panel_title' => 'Search View',
      'location' => 'search',
      'table' => $result->orderBy('created_at','desc')->get(),
    ];
    return View::make('formka2.view', $data);
  }

}
