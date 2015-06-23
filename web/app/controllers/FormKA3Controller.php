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
use App\DAO\FormDAO;
use App\DAO\TindakLanjutDAO;
use App\DAO\JenisKasusDAO;
use App\DAO\DisposisiDAO;
use App\DAO\UserDAO;
use App\Helpers\PrintLog;
use Illuminate\Support\Facades\Auth;
use App\Helpers\NotifikasiDisposisiHelper;
use App\Helpers\FormKA3Helper;

/**
 * Description of Testerform1Controller
 *
 * @author aljufry
 * @author nunenuh
 */
class FormKA3Controller extends BaseController {

    public function view() {
      $year = date('Y');
      $data = [
          'title' => '',
          'page_title' => 'Kasus Anak 3 (KA3)',
          'panel_title' => 'Table View',
          'location' => 'view',
          'table' => Form::where('nama', '=', 'ka3')
                          ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                          ->orderBy('created_at','desc')->get(),
          'selectedYear'=>$year,
          'countLKA'=>FormKA3Helper::countLKAData($year)
      ];
      return View::make('formka3.view', $data);
    }

    public function viewYear() {
      $year = Input::get('year');
      $data = [
        'title' => '',
        'page_title' => 'Kasus Anak 3 (KA3)',
        'panel_title' => 'Table View',
        'location' => 'view',
        'table'=> Form::where('nama', '=', 'ka3')
                        ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                        ->orderBy('no_lka', 'desc')->get(),
        'selectedYear'=>$year,
        'countLKA'=>FormKA3Helper::countLKAData($year)
      ];
      return View::make('formka3.view', $data);
    }

    public function viewLKA(){
      $year = Input::get('year');
      if ($year==null){
        $year == date('Y');
      }
      $data = [
            'title' => '',
            'page_title' => 'Kasus Anak 3 (KA3)',
            'panel_title' => 'Table View',
            'location' => 'lka',
            'table' => FormKA3Helper::getLKAData($year),
            'selectedYear'=>$year,
            'countLKA'=> FormKA3Helper::countLKAData($year)
        ];
        return View::make('formka3.view', $data);
    }


    public function detailView($id) {
        $data = [
            'page_title' => 'Kasus Anak 3 (KA3)',
            'panel_title' => 'Detail View',
            'location' => 'view',
            'data' => Form::where('nama', '=', 'ka3')->where('id', '=', $id)->first(),
        ];
        return View::make('formka3.detail', $data);
    }

    public function preAddView() {
      $year = date('Y');
        $data = [
            'page_title' => 'Kasus Anak 3 (KA3)',
            'panel_title' => 'Form Pre Add',
            'form_url' => '/dash/formka3/preaddresult',
            'form_status' => 'add',
            'keyword' =>'',
            'based' =>'anak',
            'result_status'=> null,
            'selectedYear'=>$year,
        ];
        return View::make('formka3.preadd', $data);
    }

   public function preAddResult(){
     $keyword = Input::get('keyword');
     $based = Input::get('based');
     $year = Input::get('year');

     $result = null;
     $form = null;
     if ($based == "anak"){
       $result = Anak::where('nama','LIKE','%'.$keyword.'%');
       $result = $result->whereHas('form', function ($qa) use ($year) {
           $qa->whereRaw('YEAR(`tanggal`) = ?',array($year));
       });
     } else if ($based == "lka"){
       $result = Form::where('no_lka','LIKE','%'.$keyword.'%')
                      ->whereRaw('YEAR(`tanggal`) = ?',array($year))
                      ->whereRaw('nama IN (?,?)',['ka1','ka2']);
       $form = Form::where('no_lka','=','%'.$keyword.'%');
     }

     $status = 'multiple';
     if ($result->count() == 0){
       $status = null;
     } else if ($result->count()==1){
       $status == "single";
     }

     $data = [
         'page_title' => 'Kasus Anak 3 (KA3)',
         'panel_title' => 'Form Pre Add Result',
         'form_url' => '/dash/formka3/preaddresult',
         'form_status' => 'add',
         'keyword' =>$keyword,
         'based' =>$based,
         'selectedYear'=>$year,
         'result_status'=>$status,
         'result_data'=>$result->get(),
         'form'=>$form,
     ];
     return View::make('formka3.preadd', $data);
   }

    public function addView($anak_id) {
        $data = [
            'page_title' => 'Kasus Anak 3 (KA3)',
            'panel_title' => 'Form Add',
            'form_url' => '/dash/formka3/add',
            'form_status' => 'add',
            'jenis_kasus' => JenisKasus::all(),
            'tindak_lanjut' => TindakLanjut::all(),
            'agama_lists' => Agama::lists('nama', 'nama'),
            'anak' => Anak::find($anak_id),
            'form'=>Anak::find($anak_id)->form->first(),
            'user'=>UserDAO::jsonAllOperator(),
        ];
        return View::make('formka3.form', $data);
    }

    public function add() {
        $fm = Input::get('form');
        $an = Input::get('anak');
        $jk = Input::get('jenis_kasus');
        $ti = Input::get('tindak_lanjut');
        $dis = Input::get('disposisi');

        $user = Auth::user();
        $sign = [
          'penerima'=>$user
        ];
        $sign = json_encode($sign);
        $fm['sign'] = $sign;

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
        $disposisi = DisposisiDAO::saveOrUpdate($dis, $form);
        $anak = Anak::find($an['id']);
        TindakLanjutDAO::saveOrUpdate($ti, $anak);
        JenisKasusDAO::saveOrUpdate($jk, $anak);

       //save many to many
        $form = Form::find($form->id);
        $form->Anak()->attach($an['id']);
        $form->user()->attach($user->id);

        TindakLanjutDAO::attachAll($ti, $anak);
        JenisKasusDAO::attachAll($jk, $anak);


        //notifikasi
        NotifikasiDisposisiHelper::disposisiCreate($form->id);

        Session::flash('message', "Form with No LKA $form->no_lka has been added!");
        return Redirect::to('/dash/formka3');
    }

    public function updateView($id) {
//        $rec = Form::find($id);
        $data = [
            'page_title' => 'Kasus Anak 3 (KA3)',
            'panel_title' => 'Form Edit',
            'form_url' => '/dash/formka3/update',
            'form_status' => 'edit',
            'record' => Form::find($id),
            'jenis_kasus' => JenisKasus::all(),
            'tindak_lanjut' => TindakLanjut::all(),
            'user'=>UserDAO::jsonAllOperator(),
        ];
        return View::make('formka3.form', $data);
    }

    public function update() {
        $fm = Input::get('form');
        $an = Input::get('anak');
        $jk = Input::get('jenis_kasus');
        $ti = Input::get('tindak_lanjut');
        $dis = Input::get('disposisi');

        $user = Auth::user();
        $sign = [
          'penerima'=>$user
        ];
        $sign = json_encode($sign);
        $fm['sign'] = $sign;

        // inject lka if not set
        if (!isset($fm['no_lka'])){
          $form = Anak::find($an['id'])->form->first();
          $fm['no_lka']= $form->no_lka;
        }

        // inject tanggal if not set
        if (!isset($fm['tanggal'])){
          $form = Form::find($fm['id']);
          $fm['tanggal']=$form->tanggal;
        }


        $form = FormDAO::saveOrUpdate($fm);
        $disposisi = DisposisiDAO::saveOrUpdate($dis, $form);

        $anak = Anak::find($an['id']);
        TindakLanjutDAO::attachAll($ti, $anak);
        JenisKasusDAO::attachAll($jk, $anak);
        TindakLanjutDAO::saveOrUpdate($ti, $anak);
        JenisKasusDAO::saveOrUpdate($jk, $anak);

        $form = Form::find($form->id);

        //notifikasi
        NotifikasiDisposisiHelper::disposisiUpdate($form->id);

        Session::flash('message', "Form with No LKA $form->no_lka has been updated!");
        return Redirect::to('/dash/formka3');
    }

    public function delete($id) {
        //notifikasi
        NotifikasiDisposisiHelper::formDelete($form->id);

        $form = FormDAO::delete($id);
        if ($form) {
            Session::flash('message', "Form with $id has been deleted!");
        } else {
            Session::flash('message', "Error, Form with $id not found!");
        }
        return Redirect::to('/dash/formka3');
    }

    public function search() {
        $keyword = Input::get('keyword');
        $filter = Input::get('filter');

        $result = Form::where('nama', '=', 'ka3')->orderBy('tanggal', 'desc');

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
            } else if ($filter == "tindak") {
                $result = $result->whereHas('anak', function ($qa) use ($keyword) {
                    $qa->whereHas('tindaklanjut', function($qp) use ($keyword) {
                        $qp->where('tindak_lanjut.aksi', 'LIKE', '%' . $keyword . '%');
                    });
                });
            }
        }

        $data = [
            'title' => '',
            'page_title' => 'Kasus Anak 3 (KA3)',
            'panel_title' => 'Search View',
            'location' => 'search',
            'table' => $result->orderBy('created_at','desc')->get(),
        ];
        return View::make('formka3.view', $data);
    }

}
