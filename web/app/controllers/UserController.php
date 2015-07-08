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
            'table' => User::all(),
        ];
        return View::make('user.view', $data);
    }

    public function addView() {
        $data = [
            'page_title' => 'Form Tambah User',
            'panel_title' => 'Tambah User',
            'form_url' => '/dash/user/add',
            'form_status' => 'add'
        ];
        return View::make('user.form', $data);
    }

    public function add() {
        $u = Input::get('user');
        $user = UserDAO::saveOrUpdate($u);
        Session::flash('message', "User dengan username $user->username  berhasil di tambah!");
        return Redirect::to('/dash/user');
    }

    public function updateView($id) {
        $user = User::find($id);
        if ($user) {

            $data = [
                'page_title' => 'Form Ubah User',
                'panel_title' => 'Ubah User',
                'form_url' => '/dash/user/update',
                'form_status' => 'edit',
                'user' => $user,
            ];
            return View::make('user.form', $data);
        } else {
            return Redirect::to('/dash/user');
        }
    }

    public function update() {
        $u = Input::get('user');
        $user = UserDAO::saveOrUpdate($u);
        Session::flash('message', "User dengan username $user->username  berhasil di ubah!");
        return Redirect::to('/dash/user');
    }

    public function delete($id) {

        $user = User::find($id);
        $fms = $user->form;

        foreach($fms as $fm){
          if ($fm->nama == "ka1" || $fm->nama == "ka2"){
            $anak = $fm->anak->first();
            if ($anak){
              $form = $anak->form;
              foreach ($form as $fm) {
                  FormDAO::delete($fm->id);
              }

              $pendampingan = $anak->pendampingan;
              if ($pendampingan){
                foreach($pendampingan as $pen){
                  PendampinganDAO::delete($pen->id);
                }
              }

              $files = $anak->files;
              if ($files){
                foreach($files as $fl){
                  FilesDAO::delete($fl->id);
                }
              }

              $pelapor = $anak->pelapor->first();
              if ($pelapor) $pelapor->delete();

              $sumber = $anak->sumber_informasi->first();
              if ($sumber) $sumber->delete();

              $keluarga = $anak->keluarga;
              if ($keluarga) $keluarga->delete();

              $fisik = $anak->gambaran_fisik;
              if ($fisik) $fisik->delete();

              $identifikasi = $anak->identifikasi_masalah;
              if ($identifikasi) $identifikasi->delete();

              $psiko = $anak->kondisi_psikososial;
              if ($psiko) $psiko->delete();

              $contact = $anak->contact_person;
              if ($contact) $contact->delete();

              $nama_anak = $anak->nama;
              $anak->delete();
            }
          }
        }
        $nama = $user->name;
        UserDAO::delete($id);

        if ($user) {
            Session::flash('message', "User dengan Nama $nama berhasil dihapus!");
        } else {
            Session::flash('message', "Error, User dengan Nama $nama tidak ditemukan!");
        }
        return Redirect::to('/dash/user');
    }

    public function myaccount(){

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
