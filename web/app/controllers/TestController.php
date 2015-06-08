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
use App\Helpers\FormKA5AssessmentHelper;
use App\Helpers\FormKA6DisposisiHelper;
use App\Helpers\FormKA3Helper;
/**
 * Description of TestController
 *
 * @author aljufry
 */
class TestController extends BaseController {

    public function test() {
      $year = date('Y');
      // $c = FormKA5AssessmentHelper::count($year);
      // $form = FormKA5AssessmentHelper::getAssessment($year);
      // print_r($form);
      $c = FormKA6DisposisiHelper::getDisposisiForm($year);
      echo count($c);
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
