<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Form;
use App\Models\Agama;
use Illuminate\Support\Facades\Session;
use App\Helpers\LocationHelper;
use App\Models\Staff;
use App\DAO\StaffDAO;

/**
  * @author nunenuh
  */
class StaffController extends BaseController {

  public function view() {
    $data = [
      'title' => '',
      'page_title' => 'Staff',
      'panel_title' => 'Table View',
      'location' => 'view',
      'table' => Staff::paginate(6),
    ];
    return View::make('staff.view', $data);
  }

  public function detailView($id) {
    $data = [
      'page_title' => 'Staff',
      'panel_title' => 'Detail View',
      'location' => 'view',
      'data' => Form::where('nama', '=', 'ka1')->where('id', '=', $id)->first(),
    ];
    return View::make('staff.detail', $data);
  }

  public function addView() {
    $data = [
      'page_title' => 'Staff',
      'panel_title' => 'Form Add',
      'form_url' => '/lpantb/staff/add',
      'form_status' => 'add',
      'location_pelapor' => LocationHelper::location(),
      'location_anak' => LocationHelper::location(),
    ];
    return View::make('staff.form', $data);
  }

  public function add() {
    $st = Input::get('staff');
    $staff = StaffDAO::saveOrUpdate($st);
    Session::flash('message', "Staff telah berhasil di tambah!");
    return Redirect::to('/lpantb/staff');
  }

  public function updateView($id) {
    $staff = Staff::find($id);
    $data = [
      'page_title' => 'Staff',
      'panel_title' => 'Form Edit',
      'form_url' => '/lpantb/staff/update',
      'form_status' => 'edit',
      'staff' => $staff,
    ];
    return View::make('staff.form', $data);
  }

  public function update() {
    $st = Input::get('staff');
    $staff = StaffDAO::saveOrUpdate($st);
    Session::flash('message', "Staff telah berhasil di Ubah!");
    return Redirect::to('/lpantb/staff');
  }

  public function delete($id) {
    $staff = StaffDAO::delete($id);
    if ($staff) {
      Session::flash('message', "Staff dengan id $id telah berhasil di hapus!");
    } else {
      Session::flash('message', "Error, Staff dengan $id tidak ditemukan!");
    }
    return Redirect::to('/lpantb/staff');
  }

  public function search() {

  }

}
