<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Form;
use App\Models\TindakLanjut;
use App\Models\JenisKasus;
use App\Models\Agama;
use App\Models\Anak;
use Illuminate\Support\Facades\Session;
use App\Helpers\LocationHelper;
use App\Helpers\PrintLog;
use App\DAO\FormDAO,
App\DAO\AnakDAO,
App\DAO\GambaranFisikDAO,
App\DAO\KeluargaDAO,
App\DAO\AyahDAO,
App\DAO\IbuDAO,
App\DAO\IdentifikasiMasalahDAO,
App\DAO\KondisiPsikososialDAO;

use Illuminate\Support\Facades\Auth;
use App\Helpers\KA3DisposisiHelper;
use App\Helpers\FormKA4DisposisiHelper;

/**
* Description of Form4Controller
*
* @author aljufry
*/
class FormKA4Controller extends BaseController {

  private $basic = [
    'page_title' => 'Kasus Anak 4 (KA4)',
  ];

  public function view() {
    $year = date('Y');
    $data = [
      'panel_title' => 'Table View',
      'location' => 'view',
      'table'=> Form::where('nama', '=', 'ka4')
                    ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                    ->orderBy('no_lka', 'desc')->get(),
      'selectedYear' => $year,
      'disposisiCount'=>KA3DisposisiHelper::count($year),
    ];
    $data = array_merge($data, $this->basic);
    return View::make('formka4.view', $data);
  }

  public function viewMe() {
    $year = date('Y');
    $username = Auth::user()->username;
    $form = Form::where('nama', '=', 'ka4')
                  ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                  ->orderBy('no_lka', 'desc');
    $form->whereHas('user', function ($qa) use ($username) {
      $qa->where('user.username', 'LIKE', '%' . $username . '%');
    });

    $data = [
      'title' => '',
      'panel_title' => 'Table View',
      'location' => 'view',
      'table' => $form->get(),
      'selectedYear' => $year,
      'disposisiCount'=>KA3DisposisiHelper::count($year),
    ];
    $data = array_merge($data, $this->basic);
    return View::make('formka4.view', $data);
  }

  public function viewYear() {
    $year = Input::get('year');
    $data = [
      'title' => '',
      'panel_title' => 'Table View',
      'location' => 'view',
      'table'=> Form::where('nama', '=', 'ka4')
                      ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                      ->orderBy('no_lka', 'desc')->get(),
      'selectedYear'=>$year,
      'disposisiCount'=>KA3DisposisiHelper::count($year),
    ];
    $data = array_merge($data, $this->basic);
    return View::make('formka4.view', $data);
  }

  public function detailView($id) {
    $data = [
      'panel_title' => 'Detail View',
      'location' => 'view',
      'data' => Form::where('nama', '=', 'ka4')->where('id', '=', $id)->first(),
    ];
    $data = array_merge($data, $this->basic);
    return View::make('formka4.detail', $data);
  }


  public function disposisi(){
    $year = date('Y');
    $dis = KA3DisposisiHelper::getDisposisiForm($year);
    $data = [
      'panel_title' => 'Table View',
      'location' => 'disposisi',
      'table'=> $dis,
      'selectedYear' => $year,
      'disposisiCount'=>KA3DisposisiHelper::count($year),
    ];
    $data = array_merge($data, $this->basic);
    return View::make('formka4.view', $data);
  }

  public function disposisiYear(){
    $year = Input::get('year');
    $dis = KA3DisposisiHelper::getDisposisiForm($year);
    $data = [
      'panel_title' => 'Table View',
      'location' => 'disposisi',
      'table'=> $dis,
      'selectedYear' => $year,
      'disposisiCount'=>KA3DisposisiHelper::count($year),
    ];
    $data = array_merge($data, $this->basic);
    return View::make('formka4.view', $data);

  }

  public function preAddView() {
    $data = [
      'panel_title' => 'Form Pre Add',
      'form_url' => '/dash/formka4/preadd',
      'form_status' => 'add',
      'jenis_kasus' => JenisKasus::all(),
      'tindak_lanjut' => TindakLanjut::all(),
      'agama_lists' => Agama::lists('nama', 'nama'),
    ];
    $data = array_merge($data, $this->basic);
    return View::make('formka4.preadd', $data);
  }

  public function addView($anak_id) {
    $anak = Anak::find($anak_id);
    $data = [
      'panel_title' => 'Form Add',
      'form_url' => '/dash/formka4/add',
      'form_status' => 'add',
      'jenis_kasus' => JenisKasus::all(),
      'tindak_lanjut' => TindakLanjut::all(),
      'agama_lists' => Agama::lists('nama', 'nama'),
      'anak' => $anak,
      'location_anak' => LocationHelper::location($anak->desa->id),
      'location_ayah' => LocationHelper::location(),
      'location_ibu' => LocationHelper::location(),
      'form'=>Anak::find($anak_id)->form->first(),
    ];
    $data = array_merge($data, $this->basic);
    return View::make('formka4.form', $data);
  }

  public function add() {
    $fm = Input::get('form');
    $an = Input::get('anak');
    $fsk = Input::get('fisik');
    $kl = Input::get('keluarga');
    $ayh = Input::get('ayah');
    $ib = Input::get('ibu');
    $ms = Input::get('masalah');
    $ps = Input::get('psiko');


    $user = Auth::user();
    // inject lka if not set
    if (!isset($fm['no_lka'])){
      $form = Anak::find($an['id'])->form->first();
      $fm['no_lka']= $form->no_lka;
    }

    // inject tanggal if not set
    if (!isset($fm['tanggal'])){
      $fm['tanggal']=date('Y-m-d');
    }

    $form = FormDAO::saveOrUpdate($fm);
    $anak = AnakDAO::saveOrUpdate($an);
    $fisik = GambaranFisikDAO::saveOrUpdate($fsk, $anak);
    $masalah = IdentifikasiMasalahDAO::saveOrUpdate($ms, $anak);
    $psiko = KondisiPsikososialDAO::saveOrUpdate($ps, $anak);

    $keluarga = KeluargaDAO::saveOrUpdate($kl, $anak);
    $ayah = AyahDAO::saveOrUpdate($ayh, $keluarga);
    $ibu = IbuDAO::saveOrUpdate($ib, $keluarga);


    $form = Form::find($form->id);
    $form->Anak()->attach($an['id']);
    $form->user()->attach($user->id);

    //notifikasi
    FormKA4DisposisiHelper::addNotif($form->id);

    Session::flash('message', "Form with No LKA $form->no_lka has been added!");
    return Redirect::to('/dash/formka4');
  }

  public function updateView($id) {
    $rec = Form::find($id);
    $anak = $rec->anak->first();
    $data = [
      'panel_title' => 'Form Edit',
      'form_url' => '/dash/formka4/update',
      'form_status' => 'edit',
      'record' => Form::find($id),
      'jenis_kasus' => JenisKasus::all(),
      'tindak_lanjut' => TindakLanjut::all(),
      'agama_lists' => Agama::lists('nama', 'nama'),
      'anak' => $anak,
      'location_anak' => LocationHelper::location($anak->desa->id),
      'location_ayah' => LocationHelper::location(),
      'location_ibu' => LocationHelper::location(),
    ];
    $data = array_merge($data, $this->basic);
    return View::make('formka4.form', $data);
  }

  public function update() {
    $fm = Input::get('form');
    $an = Input::get('anak');
    $fsk = Input::get('fisik');
    $kl = Input::get('keluarga');
    $ayh = Input::get('ayah');
    $ib = Input::get('ibu');
    $ms = Input::get('masalah');
    $ps = Input::get('psiko');

    $pn = Input::get('penanganan');
    $as = Input::get('assesor');

    $sign = [
      'penanganan'=>$pn,
      'assesor'=>$as
    ];
    $sign = json_encode($sign);

    $fm['sign'] = $sign;

    // inject lka if not set
    if (!isset($fm['no_lka'])){
      $form = Anak::find($an['id'])->form->first();
      $fm['no_lka']= $form->no_lka;
    }

    // inject tanggal if not set
    if (!isset($fm['tanggal'])){
      $fm['tanggal']=date('Y-m-d');
    }

    $form = FormDAO::saveOrUpdate($fm);
    $anak = AnakDAO::saveOrUpdate($an);
    $fisik = GambaranFisikDAO::saveOrUpdate($fsk, $anak);
    $masalah = IdentifikasiMasalahDAO::saveOrUpdate($ms, $anak);
    $psiko = KondisiPsikososialDAO::saveOrUpdate($ps, $anak);

    $keluarga = KeluargaDAO::saveOrUpdate($kl, $anak);
    $ayah = AyahDAO::saveOrUpdate($ayh, $keluarga);
    $ibu = IbuDAO::saveOrUpdate($ib, $keluarga);


    $form = Form::find($form->id);

    //notifikasi
    FormKA4DisposisiHelper::updateNotif($form->id);

    Session::flash('message', "Form with No LKA $form->no_lka has been updated!");
    return Redirect::to('/dash/formka4');
  }

  public function delete($id) {
    //notifikasi
    FormKA4DisposisiHelper::deleteNotif($id);

    $form = FormDAO::delete($id);
    if ($form) {
      Session::flash('message', "Form with $id has been deleted!");
    } else {
      Session::flash('message', "Error, Form with $id not found!");
    }
    return Redirect::to('/dash/formka4');
  }

  public function search() {
    $keyword = Input::get('keyword');
    $filter = Input::get('filter');

    $result = Form::where('nama', '=', 'ka4')->orderBy('tanggal', 'asc');

    if ($keyword != NULL) {
      if ($filter == "kode" || $filter == NULL) {
        $result = $result->where('id', '=', $keyword);
      } else if ($filter == "lka") {
        $result = $result->where('no_lka', 'LIKE', '%' . $keyword . '%');
      } else if ($filter == "anak") {
        $result = $result->whereHas('anak', function ($qa) use ($keyword) {
          $qa->where('anak.nama', 'LIKE', '%' . $keyword . '%');
        });
      }
    }

    $data = [
      'title' => '',
      'page_title' => 'Kasus Anak 4 (KA4)',
      'panel_title' => 'Search View',
      'location' => 'search',
      'table' => $result->orderBy('created_at','desc')->get(),
    ];
    return View::make('formka4.view', $data);
  }

}
