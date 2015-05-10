<?php

$kabkot = 'KabKotaController';
$pr_kk = '/dash/setting/kabkota';
//Crud Route
Route::get($pr_kk, $con . $kabkot . "@view")->before('auth');
Route::get($pr_kk . "/addview", $con . $kabkot . "@addView")->before('auth');
Route::post($pr_kk . "/add", $con . $kabkot . "@add")->before('auth');
Route::get($pr_kk . '/updateview/{id}', $con . $kabkot . '@updateView')->before('auth');
Route::post($pr_kk . '/update', $con . $kabkot . '@update')->before('auth');
Route::get($pr_kk . '/delete/{id}', $con . $kabkot . '@delete')->before('auth');
Route::get($pr_kk . '/search', $con . $kabkot . '@search')->before('auth');
Route::get($pr_kk . '/search', $con . $kabkot . '@search')->before('auth');
