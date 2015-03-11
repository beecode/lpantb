<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Session;
use App\Models\Provinsi;

/**
 * Description of TestController
 *
 * @author aljufry
 */
class TestController extends BaseController {

    public function test() {
//        echo $this->getRandomIDs();

        return View::make('admin.wizard', ['page_title' => '']);
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
