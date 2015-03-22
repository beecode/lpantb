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
 * @author aljufry
 */
class FormKA1Controller extends BaseController {

    public function view() {
        $data = [
            'title' => '',
            'page_title' => 'Kasus Anak 1 (KA1)',
            'panel_title' => 'Table View',
            'location' => 'view',
            'table' => Form::where('nama', '=', 'ka1')->orderBy('created_at', 'desc')->get(),
        ];
        return View::make('formka1.view', $data);
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
            'form_url' => '/lpantb/formka1/add',
            'form_status' => 'add',
            'location_pelapor' => LocationHelper::location(),
            'location_anak' => LocationHelper::location(),
            'agama_lists' => Agama::lists('nama', 'nama'),
        ];
        return View::make('formka1.form', $data);
    }

    public function add() {
        $pel = Input::get('pelapor');
        $an = Input::get('anak');
        $ct = Input::get('contact');
        $fm = Input::get('form');

        $form = FormDAO::saveOrUpdate($fm);
        $anak = AnakDAO::saveOrUpdate($an);
        $pelapor = PelaporDAO::saveOrUpdate($pel, $anak);
        $ct = ContactPersonDAO::saveOrUpdate($ct, $anak);

        $form = Form::find($form->id);
        $form->anak()->attach($anak->id);


        Session::flash('message', "Form with No LKA $form->no_lka has been added!");
        return Redirect::to('/lpantb/formka1');
    }

    public function updateView($id) {

        $rec = Form::find($id);
        $anak = $rec->anak->first();
        $pelapor = $anak->pelapor->first();



        $data = [
            'page_title' => 'Kasus Anak 1 (KA1)',
            'panel_title' => 'Form Edit',
            'form_url' => '/lpantb/formka1/update',
            'form_status' => 'edit',
            'location_pelapor' => LocationHelper::location($pelapor->desa->id),
            'location_anak' => LocationHelper::location($anak->desa->id),
            'agama_lists' => Agama::lists('nama', 'nama'),
            'record' => Form::find($id),
        ];
        return View::make('formka1.form', $data);
    }

    public function update() {
        $fm = Input::get('form');
        $pel = Input::get('pelapor');
        $an = Input::get('anak');
        $ct = Input::get('contact');

        $form = FormDAO::saveOrUpdate($fm);
        $anak = AnakDAO::saveOrUpdate($an);
        $pelapor = PelaporDAO::saveOrUpdate($pel, $anak);
        $ct = ContactPersonDAO::saveOrUpdate($ct, $anak);

//        $form = Form::find($form->id);
        $no_lka = $fm['no_lka'];
        Session::flash('message', "Form with No LKA $no_lka has been updated!");

        return Redirect::to('lpantb/formka1');
    }

    public function delete($id) {
        $form = FormDAO::delete($id);
        if ($form) {
            Session::flash('message', "Form with $id has been deleted!");
        } else {
            Session::flash('message', "Error, Form with $id not found!");
        }
        return Redirect::to('/lpantb/formka1');
    }

    public function search() {
        $keyword = Input::get('keyword');
        $filter = Input::get('filter');

        $result = Form::where('nama', '=', 'ka1')->orderBy('tanggal', 'asc');

        if ($keyword != NULL) {
            if ($filter == "anak") {
                $result = $result->whereHas('anak', function ($qa) use ($keyword) {
                    $qa->where('anak.nama', 'LIKE', '%' . $keyword . '%');
                });
            } else if ($filter == "pelapor") {
                $result = $result->whereHas('anak', function ($qa) use ($keyword) {
                    $qa->whereHas('pelapor', function($qp) use ($keyword) {
                        $qp->where('pelapor.nama', 'LIKE', '%' . $keyword . '%');
                    });
                });
            } else if ($filter == "lka") {
                $result = $result->where('no_lka', 'LIKE', '%' . $keyword . '%');
            } else if ($filter == "tanggal") {
                $split = explode('-',$keyword);

                $tanggal = date("Y-m-d", strtotime($keyword));
                Session::flash('message', "$split[0],");
                $result = $result->where('tanggal', 'LIKE', $tanggal);
            } else if ($filter == "kode" || $filter == NULL) {
                $result = $result->where('id', '=', $keyword);
            }

        }

        $data = [
            'title' => '',
            'page_title' => 'Kasus Anak 1 (KA1)',
            'panel_title' => 'Search View',
            'location' => 'search',
            'filter'=>$filter,
            'table' => $result->orderBy('created_at', 'desc')->get(),
        ];
        return View::make('formka1.view', $data);
    }

}
