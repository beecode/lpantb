<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\Controllers\Interfaces\FeatureInterface;
use App\Models\User;
use App\DAO\UserDAO;
use Input;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;

/**
 * Description of UserController
 *
 * @author aljufry
 */
class MyAccountController extends BaseController {


    public function view() {
        $id = Auth::user()->id;
        $user = User::find($id);
        if ($user) {
            $data = [
                'page_title' => 'Form Ubah User',
                'panel_title' => 'Ubah User',
                'form_url' => '/dash/myaccount/update',
                'form_status' => 'edit',
                'user' => $user,
            ];
            return View::make('myaccount.form', $data);
        } else {
            return Redirect::to('/dash/myaccount');
        }
    }

    public function update() {
        $u = Input::get('user');
        $user = UserDAO::saveOrUpdate($u);
        Session::flash('message', "User dengan username $user->username  berhasil di ubah!");
        return Redirect::to('/dash/myaccount');
    }

}
