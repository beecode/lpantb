<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\Controllers\Interfaces\FeatureInterface;
use App\Models\Provinsi;
use App\Models\KabKota;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

/**
 * Description of KabkotaController
 *
 * @author nunenuh
 */
class KabKotaController extends BaseController implements FeatureInterface {

    public function add() {
        $in = Input::all();
        $pr = Provinsi::find($in['provinsi']);
        if (!is_null($pr->first())) {

            $kk = new KabKota();
            $kk->id = $this->getRandomIDs();
            $kk->nama = $in['kabkota'];
            $kk->provinsi()->associate($pr);
            $kk->save();
            Session::flash('message', "Kabupaten Kota $kk->nama Successfully Added");
            return Redirect::to('/dash/setting/kabkota');
        } else {
            Session::flash('message', "Error, Kabupaten Kota with $kk->nama Failed to Add!");
            return Redirect::to('/dash/setting/kabkota');
        }
    }

    private function getRandomIDs() {
        $pr = Provinsi::all();
        $r = rand(1000, 9999);
        foreach ($pr as $val) {
//            echo "does id $val->id == $r ---- ";
            if ($val->id == $r) {
//                echo 'yes it does<br/>';
                $r = rand(1000, 9999);
            } else {
//                echo 'no it does not<br/>';
            }
        }
        return $r;
    }

    public function addView() {
        $data = [
            'page_title' => 'Kabupaten / Kota',
            'panel_title' => 'Form Add',
            'form_url' => '/dash/setting/kabkota/add',
            'form_status' => 'add',
            'provinsi' => Provinsi::all(),
        ];
        return View::make('kabkota.form', $data);
    }

    public function delete($id) {
        $kbk = KabKota::find($id);
        $nama = $kbk->nama;
        if ($kbk) {
            $kbk->delete();
            Session::flash('message', "Kabupaten / Kota $nama has been deleted!");
            return Redirect::to('/dash/setting/kabkota');
        } else {
            Session::flash('message', "Error, Kabupaten / Kota with $id not found!");
            return Redirect::to('/dash/setting/kabkota');
        }
    }

    public function search() {
        $keyword = Input::get('keyword');
        $kbk = KabKota::whereHas("provinsi", function($query) use ($keyword) {
                    $query->where('nama', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhere('id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('nama', 'LIKE', '%' . $keyword . '%')
                ->paginate(6);
        $data = [
            'page_title' => 'Kabupaten / Kota',
            'panel_title' => 'Search View',
            'location' => 'search',
            'table' => $kbk,
        ];
        return View::make('kabkota.view', $data);
    }

    public function update() {
        $in = Input::all();
        $kk = KabKota::find($in['id']);
        $pr = Provinsi::find($in['provinsi']);
        if (!is_null($kk->first())) {
            $kk->nama = $in['kabkota'];
            $kk->provinsi()->associate($pr);
            $kk->update();
            Session::flash('message', "Kabupaten / Kota $kk->nama Successfully Updated");
            return Redirect::to('/dash/setting/kabkota');
        } else {
            Session::flash('message', "Error, Kabupaten / Kota with $kk->id not found!");
            return Redirect::to('/dash/setting/kabkota');
        }
    }

    public function updateView($id) {
        $rec = KabKota::find($id);
        if ($rec) {
            $data = [
                'page_title' => 'Kabupaten / Kota',
                'panel_title' => 'Form Edit',
                'form_url' => '/dash/setting/kabkota/update',
                'form_status' => 'update',
                'record' => $rec,
                'provinsi' => Provinsi::all(),
            ];
            return View::make("kabkota.form", $data);
        } else {
            Session::flash('message', "Error,  Kabupaten/Kota with $id not found!");
            return Redirect::to('/dash/setting/kabkota');
        }
    }

    public function view() {
        $data = [
            'page_title' => 'Kabupaten / Kota',
            'panel_title' => 'Table View',
            'location' => 'view',
            'table' => KabKota::all(),
        ];
        return View::make('kabkota.view', $data);
    }

}
