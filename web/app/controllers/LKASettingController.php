<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
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

/**
* Description of Testerform1Controller
*
* @author nunenuh
*/
class LKASettingController extends BaseController {

  public function view() {
    $data = [
      'title' => '',
      'page_title' => 'LKA Setting',
      'panel_title' => 'View',
      'location' => 'view',
    ];
    return View::make('lka.view', $data);
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
      'form_url' => '/dash/setting/lka/add',
      'form_status' => 'add',
      'location_pelapor' => LocationHelper::location(),
      'location_anak' => LocationHelper::location(),
      'agama_lists' => Agama::lists('nama', 'nama'),
    ];
    return View::make('formka1.form', $data);
  }
}
