<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\DAO\ReportDAO;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController {

    private $basic = ['page_title' => 'Login',];

    public function view() {
        return View::make('login.view', $this->basic);
    }

    public function doLogin() {
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {

            return Redirect::to('/login')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));

        } else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            if (Input::get('remember_me') == 'on') {
                $isAuth = Auth::attempt($userdata, TRUE);
            } else {
                $isAuth = Auth::attempt($userdata);
            }

            if ($isAuth) {
                return Redirect::intended('/dash');
            } else {
                Session::flash('message', "Login Gagal!, Username atau/dan Password anda salah!");
                return Redirect::to('/login');
            }
        }
    }

    public function doLogout() {
        Auth::logout(); // log the user out of our application
        return Redirect::to('/'); // redirect the user to the login
    }

}
