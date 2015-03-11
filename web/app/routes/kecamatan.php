<?php

$kec = 'KecamatanController';
$pr_kc = '/lpantb/kecamatan';
//Crud Route
Route::get($pr_kc, $con . $kec . "@view")->before('auth');
Route::get($pr_kc . "/addview", $con . $kec . "@addView")->before('auth');
Route::post($pr_kc . "/add", $con . $kec . "@add")->before('auth');
Route::get($pr_kc . '/updateview/{id}', $con . $kec . '@updateView')->before('auth');
Route::post($pr_kc . '/update', $con . $kec . '@update')->before('auth');
Route::get($pr_kc . '/delete/{id}', $con . $kec . '@delete')->before('auth');
Route::get($pr_kc . '/search', $con . $kec . '@search')->before('auth');
Route::get($pr_kc . '/getkabkota/{provinsi_id}', $con . $kec . '@getKabKota')->before('auth');
