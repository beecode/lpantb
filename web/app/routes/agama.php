<?php

$ag = 'AgamaController';
$pr_ag = '/dash/setting/agama';
//Crud Route
Route::get($pr_ag, $con . $ag . "@view")->before('auth');
Route::get($pr_ag . "/addview", $con . $ag . "@addView")->before('auth');
Route::post($pr_ag . "/add", $con . $ag . "@add")->before('auth');
Route::get($pr_ag . '/updateview/{id}', $con . $ag . '@updateView')->before('auth');
Route::post($pr_ag . '/update', $con . $ag . '@update')->before('auth');
Route::get($pr_ag . '/delete/{id}', $con . $ag . '@delete')->before('auth');
Route::get($pr_ag . '/search', $con . $ag . '@search')->before('auth');
