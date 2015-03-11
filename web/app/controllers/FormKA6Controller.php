<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Form;
use App\Models\TindakLanjut;
use App\Models\JenisKasus;
use App\Models\Agama;
use App\Models\Anak;
use Illuminate\Support\Facades\Session;
use App\Models\Intervensi;
use App\DAO\FormDAO,
    App\DAO\JenisKasusDAO;

/**
 * Description of Testerform1Controller
 *
 * @author aljufry
 */
class FormKA6Controller extends BaseController {

    public function view() {
        $data = [
            'page_title' => 'Kasus Anak 6 (KA6)',
            'panel_title' => 'Pendapingan Table View',
            'location' => 'view',
            'table' => Form::where('nama', '=', 'ka6')->paginate(5),
        ];
        return View::make('formka6.view', $data);
    }

    public function detailView($id) {
        $data = [
            'page_title' => 'Kasus Anak 6 (KA6)',
            'panel_title' => 'Detail View',
            'location' => 'view',
            'data' => Form::where('nama', '=', 'ka5')->where('id', '=', $id)->first(),
        ];
        return View::make('formka6.detail', $data);
    }

    public function preAddView() {
        $data = [
            'page_title' => 'Kasus Anak 6 (KA6)',
            'panel_title' => 'Form Pre Add',
            'form_url' => '/lpantb/formka6/preadd',
            'form_status' => 'add',
            'jenis_kasus' => JenisKasus::all(),
            'tindak_lanjut' => TindakLanjut::all(),
            'agama_lists' => Agama::lists('nama', 'nama'),
        ];
        return View::make('formka6.preadd', $data);
    }

    public function addView($anak_id) {
        $data = [
            'page_title' => 'Kasus Anak 6 (KA6)',
            'panel_title' => 'Form Add',
            'form_url' => '/lpantb/formka6/add',
            'form_status' => 'add',
            'jenis_kasus' => JenisKasus::all(),
            'intervensi' => Intervensi::all(),
            'agama_lists' => Agama::lists('nama', 'nama'),
            'anak' => Anak::find($anak_id),
        ];
        return View::make('formka6.form', $data);
    }

    public function add() {
        $fm = Input::get('form');
        $an = Input::get('anak');
        $jk = Input::get('jenis_kasus');

        $form = FormDAO::saveOrUpdate($fm);
        $anak = Anak::find($an['id']);
        JenisKasusDAO::saveOrUpdate($jk, $anak);
//
//        //save many to many
        $form = Form::find($form->id);
        $form->Anak()->attach($an['id']);
        JenisKasusDAO::attachAll($jk, $anak);

        Session::flash('message', "Form with No LKA $form->no_lka has been added!");
        return Redirect::to('/lpantb/formka6/pendampingan/view/' . $anak->id);
    }

    public function updateView($id) {
        $rec = Form::find($id);
        $anak = $rec->anak->first();
        $data = [
            'page_title' => 'Kasus Anak 6 (KA6)',
            'panel_title' => 'Form Edit',
            'form_url' => '/lpantb/formka6/update',
            'form_status' => 'edit',
            'record' => Form::find($id),
            'jenis_kasus' => JenisKasus::all(),
            'intervensi' => Intervensi::all(),
        ];
        return View::make('formka6.form', $data);
    }

    public function update() {
        $fm = Input::get('form');
        $an = Input::get('anak');
        $jk = Input::get('jenis_kasus');
        $int = Input::get('intervensi');
        $dis = Input::get('disposisi');

        $form = FormDAO::saveOrUpdate($fm);
        $anak = Anak::find($an['id']);

//        //save many to many
        $form = Form::find($form->id);
        JenisKasusDAO::attachAll($jk, $anak);
        JenisKasusDAO::saveOrUpdate($jk, $anak);

        Session::flash('message', "Form with No LKA $form->no_lka has been updated!");
        return Redirect::to('lpantb/formka6');
    }

    public function delete($id) {
        $form = FormDAO::delete($id);
        if ($form) {
            Session::flash('message', "Form with $id has been deleted!");
        } else {
            Session::flash('message', "Error, Form with $id not found!");
        }
        return Redirect::to('/lpantb/formka6');
    }

    public function search() {
        $keyword = Input::get('keyword');
        $filter = Input::get('filter');

        $result = Form::where('nama', '=', 'ka6')->orderBy('tanggal', 'asc');

        if ($keyword != NULL) {
            if ($filter == "kode" || $filter == NULL) {
                $result = $result->where('id', '=', $keyword);
            } else if ($filter == "lka") {
                $result = $result->where('no_lka', 'LIKE', '%' . $keyword . '%');
            } else if ($filter == "anak") {
                $result = $result->whereHas('anak', function ($qa) use ($keyword) {
                    $qa->where('anak.nama', 'LIKE', '%' . $keyword . '%');
                });
            } else if ($filter == "jenis") {
                $result = $result->whereHas('anak', function ($qa) use ($keyword) {
                    $qa->whereHas('jeniskasus', function($qp) use ($keyword) {
                        $qp->where('jenis_kasus.jenis', 'LIKE', '%' . $keyword . '%');
                    });
                });
            } else if ($filter == "intervensi") {
                $result = $result->whereHas('anak', function ($qa) use ($keyword) {
                    $qa->whereHas('intervensi', function($qp) use ($keyword) {
                        $qp->where('intervensi.jenis', 'LIKE', '%' . $keyword . '%');
                    });
                });
            }
        }

        $data = [
            'title' => '',
            'page_title' => 'Kasus Anak 6 (KA6)',
            'panel_title' => 'Search View',
            'location' => 'search',
            'table' => $result->paginate(6),
        ];
        return View::make('formka6.view', $data);
    }

}
