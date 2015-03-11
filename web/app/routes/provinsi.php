<?php

$prov = 'ProvinsiController';
$pr_pr = '/lpantb/provinsi';
//Crud Route
Route::get($pr_pr, $con . $prov . "@view")->before('auth');
Route::get($pr_pr . "/addview", $con . $prov . "@addView")->before('auth');
Route::post($pr_pr . "/add", $con . $prov . "@add")->before('auth');
Route::get($pr_pr . '/updateview/{id}', $con . $prov . '@updateView')->before('auth');
Route::post($pr_pr . '/update', $con . $prov . '@update')->before('auth');
Route::get($pr_pr . '/delete/{id}', $con . $prov . '@delete')->before('auth');
Route::get($pr_pr . '/search', $con . $prov . '@search')->before('auth');
