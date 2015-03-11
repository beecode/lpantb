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

/**
 * Description of UserController
 *
 * @author aljufry
 */
class UserController extends BaseController {

    public function view() {
        $data = [
            'page_title' => 'User',
            'panel_title' => 'List User',
            'location' => 'view',
            'table' => User::paginate(5),
        ];
        return View::make('user.view', $data);
    }

    public function addView() {
        $data = [
            'page_title' => 'Form Tambah User',
            'panel_title' => 'Tambah User',
            'form_url' => '/lpantb/user/add',
            'form_status' => 'add'
        ];
        return View::make('user.form', $data);
    }

    public function add() {
        $u = Input::get('user');
        $user = UserDAO::saveOrUpdate($u);
        Session::flash('message', "User dengan username $user->username  berhasil di tambah!");
        return Redirect::to('/lpantb/user');
    }

    public function updateView($id) {
        $user = User::find($id);
        if ($user) {

            $data = [
                'page_title' => 'Form Ubah User',
                'panel_title' => 'Ubah User',
                'form_url' => '/lpantb/user/update',
                'form_status' => 'edit',
                'user' => $user,
            ];
            return View::make('user.form', $data);
        } else {
            return Redirect::to('/lpantb/user');
        }
    }

    public function update() {
        $u = Input::get('user');
        $user = UserDAO::saveOrUpdate($u);
        Session::flash('message', "User dengan username $user->username  berhasil di ubah!");
        return Redirect::to('/lpantb/user');
    }

    public function delete($id) {
        $form = UserDAO::delete($id);
        if ($form) {
            Session::flash('message', "User dengan id $id berhasil dihapus!");
        } else {
            Session::flash('message', "Error, User dengan id $id tidak ditemukan!");
        }
        return Redirect::to('/lpantb/user');
    }

    public function search() {
        $keyword = Input::get('keyword');
        $filter = Input::get('filter');

        $result = User::orderBy('created_at', 'asc');

        if ($keyword != NULL) {
            if ($filter == "kode" || $filter == NULL) {
                $result = $result->where('id', '=', $keyword);
            } else if ($filter == "nama") {
                $result = $result->where('display_name', 'LIKE', '%' . $keyword . '%');
            } else if ($filter == "email") {
                $result = $result->where('email', 'LIKE', '%' . $keyword . '%');
            } else if ($filter == "username") {
                $result = $result->where('username', 'LIKE', '%' . $keyword . '%');
            } else if ($filter == "level") {
                $result = $result->where('level', '=', $keyword);
            }
        }

        $data = [
            'title' => '',
            'page_title' => 'User',
            'panel_title' => 'Search View',
            'location' => 'search',
            'table' => $result->paginate(6),
        ];
        return View::make('user.view', $data);
    }

}
