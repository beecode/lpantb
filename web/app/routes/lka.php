<?php

$lka = 'LKASettingController';
$pr_lka = '/lpantb/lka';
//Crud Route
Route::get($pr_lka, $con . $lka . "@view")->before('auth');
Route::get($pr_lka . "/addview", $con . $lka . "@addView")->before('auth');
Route::post($pr_lka . "/add", $con . $lka . "@add")->before('auth');
Route::get($pr_lka . '/updateview/{id}', $con . $lka . '@updateView')->before('auth');
Route::post($pr_lka . '/update', $con . $lka . '@update')->before('auth');
Route::get($pr_lka . '/delete/{id}', $con . $lka . '@delete')->before('auth');
Route::get($pr_lka . '/search', $con . $lka . '@search')->before('auth');
