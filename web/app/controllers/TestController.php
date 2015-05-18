<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Session;
use App\Models\Provinsi;
use App\Helpers\NotifikasiHelper;
use App\Models\Notifikasi;

/**
 * Description of TestController
 *
 * @author aljufry
 */
class TestController extends BaseController {

    public function test() {
      $user_from_id = 5;
      $user_to_id = 1;
      $form_id = 58;
      NotifikasiHelper::KA2Create($user_from_id, $user_to_id, $form_id);
      return  Notifikasi::all()->toJson();
    }


    public function wizardTest() {
        return View::make('tester.Wizardtes');
    }

    public function show() {
        $in = Input::all();
        $wizard = array(
            'name' => $in['nama_first'],
            'last' => $in['nama_last'],
            'Company Name' => $in['company'],
            'Company Address' => $in['address']
        );
        Session::put('user', $wizard);
        $wizard = Session::get('user');
        echo '<pre>';
        print_r($wizard);
        echo '</pre>';
    }

}
