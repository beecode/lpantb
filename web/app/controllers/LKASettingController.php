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
use App\DAO\SettingDAO;

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

  public function update() {
    $part = Input::get('lka_part');
    SettingDAO::setValue("LKA_PART",$part);


    Session::flash('message', "LKA Setting telah di ubah!");
    return Redirect::to('/dash/setting/lka');
  }
}
