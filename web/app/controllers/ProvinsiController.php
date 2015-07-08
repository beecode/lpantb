<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\Models\Provinsi;
use App\Controllers\Interfaces\FeatureInterface;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

/**
 * Description of ProvinsiController
 *
 * @author aljufry
 */
class ProvinsiController extends BaseController implements FeatureInterface {

    public function add() {
        $in = Input::all();
        $pr = new Provinsi();
        $pr->id = $this->getRandomIDs();
        $pr->nama = $in['provinsi'];
        $pr->save();
        Session::flash('message', "Provinsi Successfully Added");
        return Redirect::to('/dash/setting/provinsi');
    }

    private function getRandomIDs() {
        $pr = Provinsi::all();
        $r = rand(10, 99);
        foreach ($pr as $val) {
//            echo "does id $val->id == $r ---- ";
            if ($val->id == $r) {
//                echo 'yes it does<br/>';
                $r = rand(10, 99);
            } else {
//                echo 'no it does not<br/>';
            }
        }
        return $r;
    }

    public function addView() {
        $data = [
            'page_title' => 'Provinsi',
            'panel_title' => 'Form Add',
            'form_url' => '/dash/setting/provinsi/add',
            'form_status' => 'add'
        ];
        return View::make('provinsi.form', $data);
    }

    public function delete($id) {
        $prov = Provinsi::find($id);
        if ($prov) {
            $prov->delete();
            return Redirect::to('/dash/setting/provinsi');
        } else {
            Session::flash('message', "Error, Provinsi with $id not found!");
            return Redirect::to('/dash/setting/provinsi');
        }
    }

    public function search() {
        $keyword = Input::get('keyword');
        $prov = Provinsi::where('nama', 'LIKE', '%' . $keyword . '%')
                ->orWhere('id', 'LIKE', '%' . $keyword . '%')
                ->paginate(6);
        $data = [
            'page_title' => 'Provinsi',
            'panel_title' => 'Search View',
            'location' => 'search',
            'table' => $prov,
        ];
        return View::make('provinsi.view', $data);
    }

    public function update() {
        $in = Input::all();

        $ag = Provinsi::find($in['id']);
        if ($ag) {
            $ag->nama = $in['provinsi'];
            $ag->update();
            Session::flash('message', "Provinsi Successfully Updated");
            return Redirect::to('/dash/setting/provinsi');
        } else {
            Session::flash('message', "Error, Provinsi with $id not found!");
            return Redirect::to('/dash/setting/provinsi');
        }
    }

    public function updateView($id) {
        $rec = Provinsi::find($id);
        if ($rec) {
            $data = [
                'page_title' => 'Provinsi',
                'panel_title' => 'Form Edit',
                'form_url' => '/dash/setting/provinsi/update',
                'form_status' => 'update',
                'provinsi' => $rec,
            ];
            return View::make("provinsi.form", $data);
        } else {
            Session::flash('message', "Error, Provinsi with $id not found!");
            return Redirect::to('/dash/setting/provinsi');
        }
    }

    public function view() {
        $data = [
            'page_title' => 'Provinsi',
            'panel_title' => 'Table View',
            'location' => 'view',
            'table' => Provinsi::all(),
        ];
        return View::make('provinsi.view', $data);
    }

}
