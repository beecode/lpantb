<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\Models\Pelapor;
use App\Models\Anak;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Controllers\Interfaces\FeatureInterface;
use Illuminate\Support\Facades\Response;

/**
 * Description of ServiceQueryController
 *
 * @author nunenuh
 */
class ServiceQueryController extends BaseController {

    public function anakAll() {
        return Anak::all()->toJson();
    }

    public function pelaporAll() {
        return Pelapor::all()->toJson();
    }

    public function anakQueryNama($q) {
        $anak = Anak::where('nama', 'LIKE', '%' . $q . '%')->get();
        $anak[0]->form->first();
        return $anak->toJSON();
    }

    public function pelaporQueryNama($q) {
//        $pelapor = Pelapor::where('nama', 'LIKE', '%' . $q . '%')->get();
//        return $pelapor->toJSON();

        $pelapor = Pelapor::lists('nama');
        return Response::json($pelapor);
    }

}
