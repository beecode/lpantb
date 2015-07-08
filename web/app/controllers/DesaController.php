<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\DAO\DesaDAO;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Datatable;

/**
 * Description of DesalurahController
 *
 * @author aljufry
 */
class DesaController extends BaseController {

    public function view() {
        $data = [
            'page_title' => 'Desa',
            'panel_title' => 'Table View',
            'location' => 'view',
            'table' => Desa::paginate(10),
        ];
        return View::make('desa.view', $data);
    }

    public function viewAjax() {
      $orm = Desa::All();
      $dt = Datatable::collection($orm)
      ->showColumns('id','nama')
      ->addColumn('kecamatan',
        function($model){
            return $model->kecamatan->nama;
        }
      )
      ->addColumn('kabkota',
        function($model){
            return $model->kecamatan->kabkota->nama;
        }
      )
      ->addColumn('provinsi',
        function($model){
            return $model->kecamatan->kabkota->provinsi->nama;
        }
      )
      ->addColumn('aksi',
        function ($model){
          return $this->buttonAksi($model->id);
        }
      )
      ->make(true);

        return $dt;
    }

    private function buttonAksi($id){
      $updateURL = URL::to('dash/setting/desa/updateview/'.$id);
      $deleteURL = URL::to('dash/setting/desa/delete/'.$id);

      $out = "";
      $out = $out."<div class='btn btn-group btn-group-sm' style='margin: 0px; padding: 0px; text-align:center;'>";
      $out = $out."<a class='btn btn-small btn-success' title='Update' href='$updateURL'>";
      $out = $out.'<span class=" glyphicon glyphicon-edit"></span>';
      $out = $out.'</a>';
      $out = $out."<a class='btn btn-small btn-danger' title='Delete' href='$deleteURL'>";
      $out = $out.'<span class="glyphicon glyphicon-trash"></span>';
      $out = $out.'</a>';
      $out = $out.'</div>';

      return $out;
    }

    /**
     * masih bermasalah bagian search ini
     *
     * @return type
     */
    public function search() {
        $keyword = Input::get('keyword');
        $desa = DesaDAO::search($keyword)->paginate(10);
        $data = [
            'page_title' => 'Desa',
            'panel_title' => 'Search View',
            'location' => 'search',
            'table' => $desa,
        ];
        return View::make('desa.view', $data);
    }

    public function addView() {
        $data = [
            'page_title' => 'Desa',
            'panel_title' => 'Form Add',
            'form_url' => '/dash/setting/desa/add',
            'form_status' => 'add',
            'provinsi' => Provinsi::all(),
        ];

        return View::make('desa.form', $data);
    }

    public function add() {
        $in = Input::all();
        $desa = DesaDAO::save($in);
        if (!empty($desa->id)) {
            Session::flash('message', "Desa $desa->nama Successfully Added");
        } else {
            Session::flash('message', "Error, Desa $desa->nama Failed to Add!");
        }
        return Redirect::to('/dash/setting/desa');
    }

    public function updateView($id) {
        $rec = Desa::find($id);
        if ($rec) {
            $data = [
                'page_title' => 'Desa',
                'panel_title' => 'Form Edit',
                'form_url' => '/dash/setting/desa/update',
                'form_status' => 'update',
                'record' => $rec,
                'provinsi' => Provinsi::all(),
                'kabkota' => Provinsi::find($rec->kecamatan->kabkota->provinsi->id)->kabkota,
                'kecamatan' => Kecamatan::where("kabkota_id", "=", $rec->kecamatan->kabkota->id)->get(),
            ];
            return View::make("desa.form", $data);
        } else {
            Session::flash('message', "Error,  Desa with $id not found!");
            return Redirect::to('/dash/setting/desa');
        }
    }

    public function update() {
        $in = Input::all();
        $nama = $in['desa'];
        $id = $in['desa'];

        $desa = DesaDAO::update($in);
        if ($desa) {
            Session::flash('message', "Desa $nama Successfully Updated");
        } else {
            Session::flash('message', "Error, Desa with $id not found!");
        }

        return Redirect::to('/dash/setting/desa');
    }

    public function delete($id) {
        $ds = Desa::find($id);
        $nama = $ds->nama;
        $id = $ds->id;
        $desa = DesaDAO::delete($id);
        if ($desa) {
            Session::flash('message', "Desa $nama has been deleted!");
        } else {
            Session::flash('message', "Error, Desa with $id not found!");
        }

        return Redirect::to('/dash/setting/desa');
    }

    public function getKabKota($provinsi_id) {
        $res = KabKota::whereHas('provinsi', function($q) use ($provinsi_id) {
                    $q->where('id', '=', $provinsi_id);
                })->get();
        return $res->toJSON();
    }

    public function getKecamatan($kabkota_id) {
        $res = Kecamatan::whereHas('kabkota', function($q) use ($kabkota_id) {
                    $q->where('id', '=', $kabkota_id);
                })->get();
        return $res->toJSON();
    }

}
