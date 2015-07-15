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
            'location'=>'view',
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
        return View::make('dashboard.view', $data);
    }

    public function filter() {
      $in = Input::all();
      if (empty($in)){
        return Redirect::to('dash');
      } else {
        if ($in['start_year'] == "Tahun" ||
            $in['start_month']== "Bulan" ||
            $in['end_year'] == "Tahun" ||
            $in['end_month']== "Bulan"){

            Session::flash('message', "Error, Anda belum memilih Bulan dan Tahun untuk di Filter!");
            Session::flash('alert','danger');
            return Redirect::to('dash');

        } else {
          $start = $in['start_year']."-".$in['start_month']."-01";
          $end = $in['end_year']."-".$in['end_month']."-31";
          $data = [
              'panel_title' => 'dashboard',
              'location'=>'filter',
              'var_get'=>$in,
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
          return View::make('dashboard.view', $data);
        }
      }
    }

    public function printPrev($name){
      $in = Input::all();
      if (empty($in)){
        $data = [
            'panel_title' => $name,
            'mode'=>'normal',
            'var_get'=>$in,
        ];

        switch ($name) {
          case 'jenis':
            $jenis = ['jenis' => ReportDAO::jenisKasus()];
            $data = array_merge($data, $jenis);
            break;
          case 'usia':
            $usia = ['usia' => ReportDAO::usia()];
            $data = array_merge($data, $usia);
            break;
          case 'pendidikan':
            $pendidikan = ['pendidikan' => ReportDAO::pendidikan()];
            $data = array_merge($data, $pendidikan);
            break;
          case 'lokasi':
            $lokasi = ['lokasi' => ReportDAO::lokasi()];
            $data = array_merge($data, $lokasi);
            break;
          default:
            # code...
            break;
        }


      } else {
        $start = $in['start_year']."-".$in['start_month']."-01";
        $end = $in['end_year']."-".$in['end_month']."-31";
        $data = [
            'panel_title' => $name,
            'mode'=>'filter',
            'var_get'=>$in,
            'start'=>$start,
            'end'=>$end,
        ];

        switch ($name) {
          case 'jenis':
            $jenis = ['jenis' => ReportDAO::jenisKasus($start, $end)];
            $data = array_merge($data, $jenis);
            break;
          case 'usia':
            $usia = ['usia' => ReportDAO::usia($start, $end)];
            $data = array_merge($data, $usia);
            break;
          case 'pendidikan':
            $pendidikan = ['pendidikan' => ReportDAO::pendidikan($start, $end)];
            $data = array_merge($data, $pendidikan);
            break;
          case 'lokasi':
            $lokasi = ['lokasi' => ReportDAO::lokasi($start, $end)];
            $data = array_merge($data, $lokasi);
            break;
          default:
            # code...
            break;
        }

      }


      $data = array_merge($data, $this->basic);
      return View::make('dashboard.print.'.$name, $data);

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
