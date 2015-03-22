<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Form;
use App\Models\Agama;
use Illuminate\Support\Facades\Session;
use App\Controllers\Interfaces\FeatureInterface;
use App\Helpers\FormHelper;
use App\Helpers\LocationHelper;
use App\DAO\FormDAO;
use App\DAO\SumberInformasiDAO;
use App\DAO\ContactPersonDAO;
use App\DAO\AnakDAO;

/**
 * Description of Testerform1Controller
 *
 * @author aljufry
 */
class FormKA2Controller extends BaseController {

    public function view() {
        $data = [
            'title' => '',
            'page_title' => 'Kasus Anak 2 (KA2)',
            'panel_title' => 'Table View',
            'location' => 'view',
            'table' => Form::where('nama', '=', 'ka2')->orderBy('created_at','desc')->get(),
        ];
        return View::make('formka2.view', $data);
    }

    public function detailView($id) {
        $data = [
            'page_title' => 'Kasus Anak 2 (KA2)',
            'panel_title' => 'Detail View',
            'location' => 'view',
            'data' => Form::where('nama', '=', 'ka2')->where('id', '=', $id)->first(),
        ];
        return View::make('formka2.detail', $data);
    }

    public function addView() {
        $data = [
            'page_title' => 'Kasus Anak 2 (KA2)',
            'panel_title' => 'Form Add',
            'form_url' => '/lpantb/formka2/add',
            'form_status' => 'add',
            'location_anak' => LocationHelper::location(),
            'agama_lists' => Agama::lists('nama', 'nama'),
        ];
        return View::make('formka2.form', $data);
    }

    public function add() {
        $sum = Input::get('sumber');
        $an = Input::get('anak');
        $ct = Input::get('contact');
        $fm = Input::get('form');

        $anak = AnakDAO::saveOrUpdate($an);
        $sum = SumberInformasiDAO::saveOrUpdate($sum, $anak);
        ContactPersonDAO::saveOrUpdate($ct, $anak);

        //save many to many
        $form = FormDAO::saveOrUpdate($fm);
        $form = Form::find($form->id);
        $form->anak()->attach($anak->id);
        $sum->anak()->attach($anak->id);

        Session::flash('message', "Form with No LKA $form->no_lka has been added!");
        return Redirect::to('/lpantb/formka2');
    }

    public function updateView($id) {
        $form = Form::find($id);
        $anak = $form->anak->first();
        $sumber = $anak->sumber_informasi->first();

        $data = [
            'page_title' => 'Kasus Anak 2 (KA2)',
            'panel_title' => 'Form Edit',
            'form_url' => '/lpantb/formka2/update',
            'form_status' => 'edit',
            'location_anak' => LocationHelper::location($anak->desa->id),
            'agama_lists' => Agama::lists('nama', 'nama'),
            'record' => Form::find($id),
        ];
        return View::make('formka2.form', $data);
    }

    public function update() {
        $fm = Input::get('form');
        $sum = Input::get('sumber');
        $an = Input::get('anak');
        $ct = Input::get('contact');

        FormDAO::saveOrUpdate($fm);
        $anak = AnakDAO::saveOrUpdate($an);
        SumberInformasiDAO::saveOrUpdate($sum, $anak);
        ContactPersonDAO::saveOrUpdate($ct, $anak);

        $lka = $fm['no_lka'];
        Session::flash('message', "Form with No LKA $lka has been updated!");

        return Redirect::to('lpantb/formka2');
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

        $result = Form::where('nama', '=', 'ka2')->orderBy('tanggal', 'asc');

        if ($keyword != NULL) {
            if ($filter == "anak") {
                $result = $result->whereHas('anak', function ($qa) use ($keyword) {
                    $qa->where('anak.nama', 'LIKE', '%' . $keyword . '%');
                });
            } else if ($filter == "sumber") {
                $result = $result->whereHas('anak', function ($qa) use ($keyword) {
                    $qa->whereHas('sumberinformasi', function($qp) use ($keyword) {
                        $qp->where('sumber_informasi.sumber', 'LIKE', '%' . $keyword . '%');
                    });
                });
            } else if ($filter == "lka") {
                $result = $result->where('no_lka', 'LIKE', '%' . $keyword . '%');
            } else if ($filter == "kode" || $filter == NULL) {
                $result = $result->where('id', '=', $keyword);
            }
        }

        $data = [
            'title' => '',
            'page_title' => 'Kasus Anak 2 (KA2)',
            'panel_title' => 'Search View',
            'location' => 'search',
            'table' => $result->orderBy('created_at','desc')->get(),
        ];
        return View::make('formka2.view', $data);
    }

}
