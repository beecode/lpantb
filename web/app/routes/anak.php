<?php

$anak = 'AnakController';
$pr_ak = '/dash/anak';
//Crud Route
Route::get($pr_ak, $con . $anak . "@view")->before('auth');
Route::get($pr_ak . "/addview", $con . $anak . "@addView")->before('auth');
Route::post($pr_ak . "/add", $con . $anak . "@add")->before('auth');
Route::get($pr_ak . '/updateview/{id}', $con . $anak . '@updateView')->before('auth');
Route::get($pr_ak . '/detailview/{id}', $con . $anak . '@detailView')->before('auth');
Route::post($pr_ak . '/update', $con . $anak . '@update')->before('auth');
Route::get($pr_ak . '/delete/{id}', $con . $anak . '@delete')->before('auth');
Route::get($pr_ak . '/search', $con . $anak . '@search')->before('auth');
