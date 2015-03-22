<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\DAO\ReportDAO;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class DashboardController extends BaseController {

    private $basic = ['page_title' => 'Dashboard',];



    public function view() {
        $data = [
            'panel_title' => 'dashboard',
            'usia' => ReportDAO::usia(),
            'pendidikan' => ReportDAO::pendidikan(),
            'lokasi' => ReportDAO::lokasi(),
            'jenis' => ReportDAO::jenisKasus(),
            'option'=>[
              'month'=>$this->monthOption(),
              'start_year'=>$this->yearStartOption(),
              'end_year'=>$this->yearEndOption()

            ],
            'form'=>[
              'start_month'=>'Bulan',
              'start_year'=>'Tahun',
              'end_month'=>'Bulan',
              'end_year'=>'Tahun',
            ],
        ];
        $data = array_merge($data, $this->basic);
        return View::make('dashboard.home', $data);
    }

    public function filter() {
      $in = Input::all();
      if (empty($in)){
        return Redirect::to('lpantb/dashboard');
      } else {
        if ($in['start_year'] == "Tahun" ||
            $in['start_month']== "Bulan" ||
            $in['end_year'] == "Tahun" ||
            $in['end_month']== "Bulan"){

            Session::flash('message', "Error, Anda belum memilih Bulan dan Tahun untuk di Filter!");
            Session::flash('alert','danger');
            return Redirect::to('lpantb/dashboard');

        } else {
          $start = $in['start_year']."-".$in['start_month']."-01";
          $end = $in['end_year']."-".$in['end_month']."-31";
          $data = [
              'panel_title' => 'dashboard',
              'usia' => ReportDAO::usia($start, $end),
              'pendidikan' => ReportDAO::pendidikan($start, $end),
              'lokasi' => ReportDAO::lokasi($start, $end),
              'jenis' => ReportDAO::jenisKasus($start, $end),
              'form'=>$in,
              'option'=>[
                'month'=>$this->monthOption(),
                'start_year'=>$this->yearStartOption(),
                'end_year'=>$this->yearEndOption()

              ],
          ];
          $data = array_merge($data, $this->basic);
          return View::make('dashboard.home', $data);
        }
      }
    }

    private function monthOption(){

      $month = [
        'Bulan'=>'Bulan',
        '01'=>'Januari', '02'=>'Februari','03'=>'Maret',
        '04'=>'April','05'=>'Mei','06'=>'Juni',
        '07'=>'July','08'=>'Agustus','09'=>'September',
        '10'=>'Oktober','11'=>'November','12'=>'Desember',
      ];
      return $month;
    }

    private function yearEndOption(){
      $year_start = 2000;
      $year_end = date("Y");
      $year = [];
      $year['Tahun'] = 'Tahun';
      for ($i = $year_start; $i<=$year_end; $i++){
        $year[$i]=$i;
      }
      return $year;
    }

    private function yearStartOption(){
      $year_start = date("Y");
      $year_end = 2000;
      $year = [];
      $year['Tahun'] = 'Tahun';
      for ($i = $year_start; $i>=$year_end; $i--){
        $year[$i]=$i;
      }
      return $year;
    }

}
