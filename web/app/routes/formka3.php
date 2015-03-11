<?php

$fk3 = 'FormKA3Controller';
$pr_k3 = '/lpantb/formka3';
//Crud Route
Route::get($pr_k3, $con . $fk3 . "@view")->before('auth');
Route::get($pr_k3 . "/preaddview", $con . $fk3 . "@preAddView")->before('auth');
Route::get($pr_k3 . "/addview/{anak_id}", $con . $fk3 . "@addView")->before('auth');
Route::get($pr_k3 . "/detailview/{anak_id}", $con . $fk3 . "@detailView")->before('auth');
Route::post($pr_k3 . "/add", $con . $fk3 . "@add")->before('auth');
Route::get($pr_k3 . '/updateview/{id}', $con . $fk3 . '@updateView')->before('auth');
Route::post($pr_k3 . '/update', $con . $fk3 . '@update')->before('auth');
Route::get($pr_k3 . '/delete/{id}', $con . $fk3 . '@delete')->before('auth');
Route::get($pr_k3 . '/search', $con . $fk3 . '@search')->before('auth');
