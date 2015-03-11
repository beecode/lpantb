<?php

$prov = 'LocationController';
$pr_pr = '/lpantb/location';
//Crud Route
Route::get($pr_pr . "/provinsi/all", $con . $prov . "@getAllProvinsi")->before('auth');
Route::get($pr_pr . "/provinsi/{provinsi_id}", $con . $prov . "@getProvinsiByID")->before('auth');
Route::get($pr_pr . "/kabkota/{provinsi_id}", $con . $prov . "@getKabKotaByProvinsiID")->before('auth');
Route::get($pr_pr . "/kecamatan/{kabkota_id}", $con . $prov . "@getKecamatanByKabKotaID")->before('auth');
Route::get($pr_pr . "/desa/{kecamatan_id}", $con . $prov . "@getDesaByKecamatanID")->before('auth');
