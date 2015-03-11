<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

/**
 * Description of AgamaController
 *
 * @author aljufry
 */
class ReportControllerr extends BaseController {

    public function view() {
        $data = [
            'page_title' => 'Data Agama',
            'panel_title' => 'Tabel',
            'location' => 'view',
            'table' => Agama::paginate(6),
        ];
        return View::make('agama.view', $data);
    }

}
