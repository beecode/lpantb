<?php

$desa = 'DesaController';
$pr_ds = '/lpantb/desa';
//Crud Route
Route::get($pr_ds, $con . $desa . "@view")->before('auth');
Route::get($pr_ds . "/addview", $con . $desa . "@addView")->before('auth');
Route::post($pr_ds . "/add", $con . $desa . "@add")->before('auth');
Route::get($pr_ds . '/updateview/{id}', $con . $desa . '@updateView')->before('auth');
Route::post($pr_ds . '/update', $con . $desa . '@update')->before('auth');
Route::get($pr_ds . '/delete/{id}', $con . $desa . '@delete')->before('auth');
Route::get($pr_ds . '/search', $con . $desa . '@search')->before('auth');
Route::get($pr_ds . '/getkabkota/{provinsi_id}', $con . $desa . '@getKabKota')->before('auth');
Route::get($pr_ds . '/getkecamatan/{kabkota_id}', $con . $desa . '@getKecamatan')->before('auth');
