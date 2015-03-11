<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\DAO\ReportDAO;

class DashboardController extends BaseController {

    private $basic = ['page_title' => 'Dashboard',];

    public function home() {
        $data = [
            'panel_title' => 'dashboard',
            'usia' => ReportDAO::usia(),
            'pendidikan' => ReportDAO::pendidikan(),
            'lokasi' => ReportDAO::lokasi(),
            'jenis' => ReportDAO::jenisKasus(),
        ];
        $data = array_merge($data, $this->basic);
        return View::make('dashboard.home', $data);
    }

}
