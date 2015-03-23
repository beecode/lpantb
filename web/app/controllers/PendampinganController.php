<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Form;
use Illuminate\Support\Facades\Session;
use App\Models\Pendampingan;
use App\Models\Anak;
use App\DAO\PendampinganDAO,
App\DAO\AnakDAO;

/**
* Description of Pendampingan
*
* @author nunenuh
*/
class PendampinganController extends BaseController {

  public function view($anak_id) {
    $anak = Anak::find($anak_id);
    $form = $anak->form->first();
    $pendampingan = Pendampingan::where('anak_id', '=', $anak->id)->paginate(100);
    $data = [
      'page_title' => 'Kasus Anak 6 (KA6) - Pendampingan',
      'panel_title' => 'Pendampingan Table View',
      'location' => 'view',
      'table' => $pendampingan,
      'form' => $form,
      'anak' => $anak,
      'form_id' => $form->id,
    ];
    return View::make('formka6.pendampingan.view', $data);
  }

  public function addView($anak_id) {
    $anak = Anak::find($anak_id);
    $form = $anak->form->first();
    $pendampingan = Pendampingan::where('anak_id', '=', $anak->id)->paginate(100);
    $data = [
      'page_title' => 'Kasus Anak 6 (KA6) - Pendampingan',
      'panel_title' => 'Pendampingan Add View',
      'form_url' => '/lpantb/formka6/pendampingan/add',
      'form_status' => 'add',
      'form_id' => $form->id,
      'location' => 'addView',
      'table' => Form::where('nama', '=', 'ka6')->paginate(5),
      'anak' => $anak,
    ];
    return View::make('formka6.pendampingan.form', $data);
  }

  public function add() {
    $f = Input::get('form');
    $form = Form::find($f['id']);
    $pen = Input::get('pendamping');

    $anak = Anak::find(Input::get('anak')['id']);
    $pendamping = PendampinganDAO::saveOrUpdate($pen, $anak);
    //
    Session::flash('message', "Data Pendampingan with $pendamping->id has been added!");
    return Redirect::to('/lpantb/formka6/pendampingan/view/' . $anak->id);
  }

  public function updateView($id) {
    $pen = Pendampingan::find($id);
    $data = [
      'page_title' => 'Kasus Anak 6 (KA6) - Pendampingan',
      'panel_title' => 'Pendampingan ',
      'form_url' => '/lpantb/formka6/pendampingan/update',
      'form_status' => 'edit',
      'location' => 'editView',
      'data' => $pen,
      'anak_id' => $pen->anak->id,
      'anak' => $pen->anak,
    ];
    return View::make('formka6.pendampingan.form', $data);
  }

  public function update() {
    $pen = Input::get('pendamping');
    $anak = Anak::find(Input::get('anak')['id']);
    $pendamping = PendampinganDAO::saveOrUpdate($pen, $anak);

    Session::flash('message', "Data Pendampingan with $pendamping->id has been updated!");
    return Redirect::to('/lpantb/formka6/pendampingan/view/' . $anak->id);
  }

  public function delete($id) {
    $pen = Pendampingan::find($id);
    $anak = $pen->anak;
    $del = PendampinganDAO::delete($id);
    if ($del) {
      Session::flash('message', "Pendampingan with tanggal $pen->tanggal has been deleted!");
    } else {
      Session::flash('message', "Error, Pendampingan with $id not found!");
    }
    return Redirect::to('/lpantb/formka6/pendampingan/view/' . $anak->id);
  }

  public function printPreview($anak_id){
    $anak = Anak::find($anak_id);
    $form = $anak->form->first();
    $pendampingan = Pendampingan::where('anak_id', '=', $anak->id)->paginate(100);
    $data = [
      'page_title' => 'Kasus Anak 6 (KA6) - Pendampingan',
      'panel_title' => 'Pendampingan Table View',
      'location' => 'view',
      'table' => $pendampingan,
      'form' => $form,
      'anak' => $anak,
      'form_id' => $form->id,
    ];
    return View::make('formka6.pendampingan.printpreview', $data);
  }

  public function detailView($id){
    $pen = Pendampingan::find($id);
    $data = [
      'page_title' => 'Kasus Anak 6 (KA6) - Pendampingan',
      'panel_title' => 'Pendampingan ',
      'form_url' => '/lpantb/formka6/pendampingan/update',
      'form_status' => 'edit',
      'location' => 'editView',
      'data' => $pen,
      'anak_id' => $pen->anak->id,
      'anak' => $pen->anak,
    ];
    return View::make('formka6.pendampingan.detail', $data);
  }

}
