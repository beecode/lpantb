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
use Illuminate\Support\Facades\DB;
use App\Models\Anak;
use Illuminate\Support\Facades\Auth;

use App\Helpers\LKAHelper;
use App\Helpers\NotifikasiFormLKAHelper;
use App\Models\User;

/**
* Description of Testerform1Controller
*
* @author aljufry
*/
class FormKA1Controller extends BaseController {

  public function view() {
    $year = date('Y');
    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 1 (KA1)',
      'panel_title' => 'Table View',
      'location' => 'view',
      'table'=> Form::where('nama', '=', 'ka1')
      ->whereRaw('YEAR(`tanggal`) = ?',array($year))
      ->orderBy('no_lka', 'desc')->get(),
      'selectedYear'=>$year,
    ];
    return View::make('formka1.view', $data);
    // echo $year;
  }

  public function viewMe() {
    $year = date('Y');
    $username = Auth::user()->username;
    $form = Form::where('nama', '=', 'ka1')
    ->whereRaw('YEAR(`tanggal`) = ?',array($year))
    ->orderBy('tanggal', 'desc');
    $form->whereHas('user', function ($qa) use ($username) {
      $qa->where('user.username', 'LIKE', '%' . $username . '%');
    });

    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 1 (KA1)',
      'panel_title' => 'Table View',
      'location' => 'view',
      'table' => $form->get(),
      'selectedYear'=>$year
    ];
    return View::make('formka1.view', $data);
  }

  public function viewYear() {
    $year = Input::get('year');
    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 1 (KA1)',
      'panel_title' => 'Table View',
      'location' => 'view',
      'table'=> Form::where('nama', '=', 'ka1')
      ->whereRaw('YEAR(`tanggal`) = ?',array($year))
      ->orderBy('no_lka', 'desc')->get(),
      'selectedYear'=>$year
    ];
    return View::make('formka1.view', $data);
  }


  public function detailView($id) {
    $data = [
      'page_title' => 'Kasus Anak 1 (KA1)',
      'panel_title' => 'Detail View',
      'location' => 'view',
      'data' => Form::where('nama', '=', 'ka1')->where('id', '=', $id)->first(),
    ];
    return View::make('formka1.detail', $data);
  }

  public function addView() {
    $data = [
      'page_title' => 'Kasus Anak 1 (KA1)',
      'panel_title' => 'Form Add',
      'form_url' => '/dash/formka1/add',
      'form_status' => 'add',
      'location_pelapor' => LocationHelper::location(),
      'location_anak' => LocationHelper::location(),
      'agama_lists' => Agama::lists('nama', 'nama'),

    ];
    return View::make('formka1.form', $data);
  }

  public function add() {
    $pel = Input::get('pelapor');
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
      'penerima'=>$user,
      'pelapor'=>$pel['nama']
    ];
    $sign = json_encode($sign);
    $fm['sign'] = $sign;

    $fm['mode']="single";

    $form = FormDAO::saveOrUpdate($fm);
    $anak = AnakDAO::saveOrUpdate($an);
    $pelapor = PelaporDAO::saveOrUpdate($pel, $anak);
    $ct = ContactPersonDAO::saveOrUpdate($ct, $anak);

    $form = Form::find($form->id);
    $form->anak()->attach($anak->id);
    $form->user()->attach($user->id);

    //counter tambah lka
    LKAHelper::doCounter();

    //notifikasi
    NotifikasiFormLKAHelper::addNotif($form->id);

    Session::flash('message', "Form with No LKA $form->no_lka has been added!");
    return Redirect::to('/dash/formka1');
  }


  public function addMultiView() {
    $data = [
      'page_title' => 'Kasus Anak 1 (KA1)',
      'panel_title' => 'Form Add',
      'form_url' => '/dash/formka1/addmulti',
      'form_status' => 'add',
      'location_pelapor' => LocationHelper::location(),
      'location_anak' => LocationHelper::location(),
      'agama_lists' => Agama::lists('nama', 'nama'),
    ];
    return View::make('formka1.multi', $data);
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


    return Redirect::to('/dash/formka1multi/view/'.$lka);
  }

  public function updateView($id) {
    $rec = Form::find($id);
    $anak = $rec->anak->first();
    $pelapor = $anak->pelapor->first();

    $data = [
      'page_title' => 'Kasus Anak 1 (KA1)',
      'panel_title' => 'Form Edit',
      'form_url' => '/dash/formka1/update',
      'form_status' => 'edit',
      'location_pelapor' => LocationHelper::location($pelapor->desa->id),
      'location_anak' => LocationHelper::location($anak->desa->id),
      'agama_lists' => Agama::lists('nama', 'nama'),
      'record' => Form::find($id),
    ];
    return View::make('formka1.form', $data);
  }

  public function update() {
    $fm = Input::get('form');
    $pel = Input::get('pelapor');
    $an = Input::get('anak');
    $ct = Input::get('contact');

    $user = Auth::user();
    $sign = [
      'penerima'=>$user,
      'pelapor'=>$pel['nama']
    ];
    $sign = json_encode($sign);
    $fm['sign'] = $sign;


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

    $form = FormDAO::saveOrUpdate($fm);
    $anak = AnakDAO::saveOrUpdate($an);
    $pelapor = PelaporDAO::saveOrUpdate($pel, $anak);
    $ct = ContactPersonDAO::saveOrUpdate($ct, $anak);



    //notifikasi
    NotifikasiFormLKAHelper::updateNotif($form->id);

    Session::flash('message', "Form with No LKA $no_lka has been updated!");
    return Redirect::to('dash/formka1');
  }

  public function delete($id) {
    //notifikasi
    NotifikasiFormLKAHelper::deleteNotif($id);

    $form = FormDAO::delete($id);
    if ($form) {
      Session::flash('message', "Form with $id has been deleted!");
    } else {
      Session::flash('message', "Error, Form with $id not found!");
    }
    return Redirect::to('/dash/formka1');
  }


  public function searchLKA(){
    $lka = Input::get('lka');
    $form = FormDAO::isLKAExist($lka);
    $data = [
      'result'=>$form
    ];
    return json_encode($data);
  }

  public function search() {
    $keyword = Input::get('keyword');
    $filter = Input::get('filter');

    $result = Form::where('nama', '=', 'ka1')->orderBy('tanggal', 'asc');

    if ($keyword != NULL) {
      if ($filter == "anak") {
        $result = $result->whereHas('anak', function ($qa) use ($keyword) {
          $qa->where('anak.nama', 'LIKE', '%' . $keyword . '%');
        });
      } else if ($filter == "pelapor") {
        $result = $result->whereHas('anak', function ($qa) use ($keyword) {
          $qa->whereHas('pelapor', function($qp) use ($keyword) {
            $qp->where('pelapor.nama', 'LIKE', '%' . $keyword . '%');
          });
        });
      } else if ($filter == "lka") {
        $result = $result->where('no_lka', 'LIKE', '%' . $keyword . '%');
      } else if ($filter == "tanggal") {
        $split = explode('-',$keyword);

        $tanggal = date("Y-m-d", strtotime($keyword));
        Session::flash('message', "$split[0],");
        $result = $result->where('tanggal', 'LIKE', $tanggal);
      } else if ($filter == "kode" || $filter == NULL) {
        $result = $result->where('id', '=', $keyword);
      }

    }

    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 1 (KA1)',
      'panel_title' => 'Search View',
      'location' => 'search',
      'filter'=>$filter,
      'table' => $result->orderBy('created_at', 'desc')->get(),
    ];
    return View::make('formka1.view', $data);
  }



}
