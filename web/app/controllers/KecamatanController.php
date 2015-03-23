<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\Controllers\Interfaces\FeatureInterface;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

/**
 * Description of KecamatanController
 *
 * @author nunenuh
 */
class KecamatanController extends BaseController {

    public function view() {
        $data = [
            'page_title' => 'Kecamatan',
            'panel_title' => 'Table View',
            'location' => 'view',
            'table' => Kecamatan::with("kabkota")->paginate(6),
        ];
        return View::make('kecamatan.view', $data);
    }

    public function addView() {
        $data = [
            'page_title' => 'Kecamatan',
            'panel_title' => 'Form Add',
            'form_url' => '/lpantb/kecamatan/add',
            'form_status' => 'add',
            'provinsi' => Provinsi::all(),
        ];

        return View::make('kecamatan.form', $data);
    }

    public function add() {
        $in = Input::all();
        print_r($in);
        $kk = KabKota::find($in['kabkota']);
        if (!is_null($kk->first())) {
            $kec = new Kecamatan();
            $kec->id = $this->getRandomIDs();
            $kec->nama = $in['kecamatan'];
            $kec->kabkota()->associate($kk);
            $kec->save();
            Session::flash('message', "Kecamatan $kec->nama Successfully Added");
            return Redirect::to('/lpantb/kecamatan');
        } else {
            $kc = $in['kecamatan'];
            Session::flash('message', "Error, Kecamatan $kc Failed to Add!");
            return Redirect::to('/lpantb/kecamatan');
        }
    }

    public function update() {
        $in = Input::all();
        $kec = Kecamatan::find($in['id']);
        $kk = KabKota::find($in['kabkota']);
        $pr = Provinsi::find($in['provinsi']);
        if (!is_null($kec->first())) {
            $kec->nama = $in['kecamatan'];
            $kec->kabkota()->associate($kk);
            $kec->update();
            Session::flash('message', "Kecamatan $kec->nama Successfully Updated");
            return Redirect::to('/lpantb/kecamatan');
        } else {
            Session::flash('message', "Error, Kecamatan with $kec->id not found!");
            return Redirect::to('/lpantb/kecamatan');
        }
    }

    public function updateView($id) {
        $rec = Kecamatan::find($id);
        if ($rec) {
            $data = [
                'page_title' => 'Kecamatan',
                'panel_title' => 'Form Edit',
                'form_url' => '/lpantb/kecamatan/update',
                'form_status' => 'update',
                'record' => $rec,
                'provinsi' => Provinsi::all(),
                'kabkota' => Provinsi::find($rec->kabkota->provinsi->id)->kabkota,
            ];
            return View::make("kecamatan.form", $data);
        } else {
            Session::flash('message', "Error,  Kecamatan with $id not found!");
            return Redirect::to('/lpantb/kecamatan');
        }
    }

    public function delete($id) {
        $kec = Kecamatan::find($id);
        $nama = $kec->nama;
        if (!is_null($kec->first())) {
            $kec->delete();
            Session::flash('message', "Kecamatan $nama has been deleted!");
            return Redirect::to('/lpantb/kecamatan');
        } else {
            Session::flash('message', "Error, Kecamatan with $id not found!");
            return Redirect::to('/lpantb/kecamatan');
        }
    }

    /**
     * masih bermasalah bagian search ini
     *
     * @return type
     */
    public function search() {
        $keyword = Input::get('keyword');
        $kbk = Kecamatan::whereHas("kabkota", function($q) use ($keyword) {
                    $q->whereHas('provinsi', function($q) use ($keyword) {
                        $q->where('nama', 'LIKE', '%' . $keyword . '%');
                    })
                    ->where('nama', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhere('id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('nama', 'LIKE', '%' . $keyword . '%')
                ->paginate(6);
        $data = [
            'page_title' => 'Kecamatan',
            'panel_title' => 'Search View',
            'location' => 'search',
            'table' => $kbk,
        ];
        return View::make('kecamatan.view', $data);
    }

    private function getRandomIDs() {
        $pr = Provinsi::all();
        $r = rand(1000000, 9999999);
        foreach ($pr as $val) {
//            echo "does id $val->id == $r ---- ";
            if ($val->id == $r) {
//                echo 'yes it does<br/>';
                $r = rand(1000000, 9999999);
            } else {
//                echo 'no it does not<br/>';
            }
        }
        return $r;
    }

    public function getKabKota($provinsi_id) {
        $res = KabKota::whereHas('provinsi', function($q) use ($provinsi_id) {
                    $q->where('id', '=', $provinsi_id);
                })->get();
        return $res->toJSON();
    }

}
