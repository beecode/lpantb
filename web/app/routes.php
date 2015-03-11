<?php

use Illuminate\Support\Facades\Redirect;

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

// pendeklarasi variabel
$con = 'App\\Controllers\\';
Route::get('/', $con. 'FrontController@home');

// dashboard
Route::get('/lpantb/dashboard', $con . 'DashboardController@home')->before('auth');

require "routes/login.php";
require "routes/anak.php";
require "routes/files.php";
require "routes/formka1.php";
require "routes/formka2.php";
require "routes/formka3.php";
require "routes/formka4.php";
require "routes/formka5.php";
require "routes/formka6.php";
require "routes/formka7.php";
require "routes/pendampingan.php";
require "routes/staff.php";

// route untuk menampilkan provinsi
require "routes/provinsi.php";
require "routes/kabkota.php";
require "routes/kecamatan.php";
require "routes/desa.php";
require "routes/user.php";
require "routes/agama.php";
require "routes/location.php";
require "routes/serviceQuery.php";







