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
    App\DAO\JenisKasusDAO,
    App\DAO\PendampinganDAO;

use Illuminate\Support\Facades\Auth;
use App\Helpers\FormKA6DisposisiHelper;

/**
 * Description of Testerform1Controller
 *
 * @author aljufry
 */
class FormKA6Controller extends BaseController {

    private $basic = [
      'page_title' => 'Kasus Anak 6 (KA6)',
    ];

    public function view() {
      $year = date('Y');
      $data = [
        'panel_title' => 'Table View',
        'location' => 'view',
        'table'=> Form::where('nama', '=', 'ka6')
                      ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                      ->orderBy('no_lka', 'desc')->get(),
        'selectedYear' => $year,
        'disposisiCount'=>count(FormKA6DisposisiHelper::getDisposisiForm($year)),
      ];
      $data = array_merge($data, $this->basic);
      return View::make('formka6.view', $data);
    }

    public function viewMe() {
      $year = date('Y');
      $username = Auth::user()->username;
      $form = Form::where('nama', '=', 'ka6')
                    ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                    ->orderBy('no_lka', 'desc');
      $form->whereHas('user', function ($qa) use ($username) {
        $qa->where('user.username', 'LIKE', '%' . $username . '%');
      });

      $data = [
        'title' => '',
        'panel_title' => 'Table View',
        'location' => 'view',
        'table' => $form->get(),
        'selectedYear' => $year,
        'disposisiCount'=>count(FormKA6DisposisiHelper::getDisposisiForm($year)),
      ];
      $data = array_merge($data, $this->basic);
      return View::make('formka6.view', $data);
    }

    public function viewYear() {
      $year = Input::get('year');
      $data = [
        'title' => '',
        'panel_title' => 'Table View',
        'location' => 'view',
        'table'=> Form::where('nama', '=', 'ka6')
                        ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                        ->orderBy('no_lka', 'desc')->get(),
        'selectedYear'=>$year,
        'disposisiCount'=>count(FormKA6DisposisiHelper::getDisposisiForm($year)),
      ];
      $data = array_merge($data, $this->basic);
      return View::make('formka6.view', $data);
    }

    public function detailView($id) {
        $data = [
            'page_title' => 'Kasus Anak 6 (KA6)',
            'panel_title' => 'Detail View',
            'location' => 'view',
            'data' => Form::where('nama', '=', 'ka6')->where('id', '=', $id)->first(),
        ];
        return View::make('formka6.detail', $data);
    }

    public function disposisi(){
      $year = date('Y');
      $dis = FormKA6DisposisiHelper::getDisposisiForm($year);
      $data = [
        'panel_title' => 'Table View',
        'location' => 'disposisi',
        'table'=> $dis,
        'selectedYear' => $year,
        'disposisiCount'=>count(FormKA6DisposisiHelper::getDisposisiForm($year)),
      ];
      $data = array_merge($data, $this->basic);
      return View::make('formka6.view', $data);
    }

    public function disposisiYear(){
      $year = Input::get('year');
      $dis = FormKA6DisposisiHelper::getDisposisiForm($year);
      $data = [
        'panel_title' => 'Table View',
        'location' => 'disposisi',
        'table'=> $dis,
        'selectedYear' => $year,
        'disposisiCount'=>count(FormKA6DisposisiHelper::getDisposisiForm($year)),
      ];
      $data = array_merge($data, $this->basic);
      return View::make('formka6.view', $data);

    }


    public function preAddView() {
        $data = [
            'page_title' => 'Kasus Anak 6 (KA6)',
            'panel_title' => 'Form Pre Add',
            'form_url' => '/dash/formka6/preadd',
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
            'form_url' => '/dash/formka6/add',
            'form_status' => 'add',
            'jenis_kasus' => JenisKasus::all(),
            'intervensi' => Intervensi::all(),
            'agama_lists' => Agama::lists('nama', 'nama'),
            'anak' => Anak::find($anak_id),
            'form'=>Anak::find($anak_id)->form->first(),
        ];
        return View::make('formka6.form', $data);
    }

    public function add() {
        $fm = Input::get('form');
        $an = Input::get('anak');
        $jk = Input::get('jenis_kasus');

        $user = Auth::user();

        // inject lka if not set
        if (!isset($fm['no_lka'])){
          $form = Anak::find($an['id'])->form->first();
          $fm['no_lka']= $form->no_lka;
        }

        // inject tanggal if not set
        if (!isset($fm['tanggal'])){
          $fm['tanggal']=date('Y-m-d');
        }

        $form = FormDAO::saveOrUpdate($fm);
        $anak = Anak::find($an['id']);
        JenisKasusDAO::saveOrUpdate($jk, $anak);
//
//        //save many to many
        $form = Form::find($form->id);
        $form->Anak()->attach($an['id']);
        $form->user()->attach($user->id);

        JenisKasusDAO::attachAll($jk, $anak);

        //notifikasi
        FormKA6DisposisiHelper::addNotif($form->id);

        Session::flash('message', "Form with No LKA $form->no_lka has been added!");
        return Redirect::to('/dash/formka6/pendampingan/view/' . $anak->id);
    }

    public function updateView($id) {
        $rec = Form::find($id);
        $anak = $rec->anak->first();
        $data = [
            'page_title' => 'Kasus Anak 6 (KA6)',
            'panel_title' => 'Form Edit',
            'form_url' => '/dash/formka6/update',
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


        // inject lka if not set
        if (!isset($fm['no_lka'])){
          $form = Anak::find($an['id'])->form->first();
          $fm['no_lka']= $form->no_lka;
        }

        // inject tanggal if not set
        if (!isset($fm['tanggal'])){
          $fm['tanggal']=date('Y-m-d');
        }

        $form = FormDAO::saveOrUpdate($fm);
        $anak = Anak::find($an['id']);

//        //save many to many
        $form = Form::find($form->id);
        JenisKasusDAO::attachAll($jk, $anak);
        JenisKasusDAO::saveOrUpdate($jk, $anak);

        //notifikasi
        FormKA6DisposisiHelper::updateNotif($id);


        Session::flash('message', "Form with No LKA $form->no_lka has been updated!");
        return Redirect::to('dash/formka6');
    }

    public function delete($id) {
      //notifikasi
      FormKA6DisposisiHelper::deleteNotif($id);

      $fm = Form::find($id);
      $anak = $fm->anak->first();
      $forms = $anak->form;

      //delete semua form yang berkaitan
      foreach ($forms as $form) {
        if ($form->nama=="ka6" || $form->nama=="ka7"){
              FormDAO::delete($form->id);
        }
      }

      //delete data pendampingan
      $pendamping = $anak->pendampingan;
      foreach($pendamping as $pd){
        PendampinganDAO::delete($pd->id);
      }


      if ($fm) {
        Session::flash('message', "Form with $id has been deleted!");
      } else {
        Session::flash('message', "Error, Form with $id not found!");
      }
      return Redirect::to('/dash/formka6');
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
            'table' => $result->orderBy('created_at','desc')->get(),
        ];
        return View::make('formka6.view', $data);
    }

}
