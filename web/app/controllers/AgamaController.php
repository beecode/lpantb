<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\Models\Agama;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Controllers\Interfaces\FeatureInterface;

/**
 * Description of AgamaController
 *
 * @author aljufry
 */
class AgamaController extends BaseController implements FeatureInterface {

    public function view() {
        $data = [
            'page_title' => 'Data Agama',
            'panel_title' => 'Tabel',
            'location' => 'view',
            'table' => Agama::paginate(6),
        ];
        return View::make('agama.view', $data);
    }

    public function addView() {
        $data = [
            'page_title' => 'Data Agama',
            'panel_title' => 'Form Add',
            'form_url' => '/lpantb/agama/add',
            'form_status' => 'add'
        ];
        return View::make("agama.form", $data);
    }

    public function add() {
        $in = Input::all();
        $ag = new Agama();
        $ag->nama = $in['agama'];
        $ag->save();
        Session::flash('message', "Agama Successfully Added");
        return Redirect::to('/lpantb/agama');
    }

    public function updateView($id) {
        $ag = Agama::find($id);
        if ($ag) {
            $data = [
                'page_title' => 'Data Agama',
                'panel_title' => ' Form Edit',
                'form_url' => '/lpantb/agama/update',
                'form_status' => 'update',
                'agama' => $ag,
            ];
            return View::make("agama.form", $data);
        } else {
            Session::flash('message', "Error, Agama with $id not found!");
            return Redirect::to('/lpantb/agama');
        }
    }

    public function update() {
        $in = Input::all();

        $ag = Agama::find($in['id']);
        if ($ag) {
            $ag->nama = $in['agama'];
            $ag->update();
            Session::flash('message', "Agama Successfully Updated");
            return Redirect::to('/lpantb/agama');
        } else {
            Session::flash('message', "Error, Agama with $id not found!");
            return Redirect::to('/lpantb/agama');
        }
    }

    public function delete($id) {
        $ag = Agama::find($id);
        if ($ag) {
            $ag->delete();
            return Redirect::to('/lpantb/agama');
        } else {
            Session::flash('message', "Error, Agama with $id not found!");
            return Redirect::to('/lpantb/agama');
        }
    }

    public function search() {
        $keyword = Input::get('keyword');
        $ag = Agama::where('nama', 'LIKE', '%' . $keyword . '%')
                ->orWhere('id', 'LIKE', '%' . $keyword . '%')
                ->paginate(6);
        $data = [
            'location' => 'search',
            'table' => $ag,
        ];
        return View::make('agama.view', $data);
    }

}
