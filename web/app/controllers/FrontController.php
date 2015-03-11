<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\DAO\ReportDAO;

class FrontController extends BaseController {

    private $basic = ['page_title' => 'Lembaga Perlindungan Anak',];

    public function home() {
        $data = [
            'panel_title' => 'dashboard',
            'usia' => ReportDAO::usia(),
            'pendidikan' => ReportDAO::pendidikan(),
            'lokasi' => ReportDAO::lokasi(),
            'jenis' => ReportDAO::jenisKasus(),
        ];
        $data = array_merge($data, $this->basic);
        return View::make('front.home', $data);
    }

}
