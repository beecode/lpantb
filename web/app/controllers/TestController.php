<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Session;
use App\Models\Provinsi;
use App\Helpers\NotifikasiHelper;
use App\Models\Notifikasi;
use App\Helpers\NotifikasiDisposisiHelper;
use App\Helpers\DisposisiHelper;
use App\Models\Form;
use App\Helpers\FormKA5DisposisiHelper;
use App\Helpers\FormKA6DisposisiHelper;
/**
 * Description of TestController
 *
 * @author aljufry
 */
class TestController extends BaseController {

    public function test() {
      $year = "2015";
      $dis = DisposisiHelper::getDisposisiForm($year);
      // var_dump($dis);
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
