<?php

$fk4 = 'FormKA4Controller';
$pr_k4 = '/lpantb/formka4';
//Crud Route
Route::get($pr_k4, $con . $fk4 . "@view")->before('auth');
Route::get($pr_k4 . "/preaddview", $con . $fk4 . "@preAddView")->before('auth');
Route::get($pr_k4 . "/addview/{anak_id}", $con . $fk4 . "@addView")->before('auth');
Route::get($pr_k4 . "/detailview/{anak_id}", $con . $fk4 . "@detailView")->before('auth');
Route::post($pr_k4 . "/add", $con . $fk4 . "@add")->before('auth');
Route::get($pr_k4 . '/updateview/{id}', $con . $fk4 . '@updateView')->before('auth');
Route::post($pr_k4 . '/update', $con . $fk4 . '@update')->before('auth');
Route::get($pr_k4 . '/delete/{id}', $con . $fk4 . '@delete')->before('auth');
Route::get($pr_k4 . '/search', $con . $fk4 . '@search')->before('auth');
