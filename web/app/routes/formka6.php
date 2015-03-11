<?php

$fk6 = 'FormKA6Controller';
$pr_k6 = '/lpantb/formka6';
//Crud Route
Route::get($pr_k6, $con . $fk6 . "@view")->before('auth');
Route::get($pr_k6 . "/preaddview", $con . $fk6 . "@preAddView")->before('auth');
Route::get($pr_k6 . "/addview/{anak_id}", $con . $fk6 . "@addView")->before('auth');
Route::get($pr_k6 . "/detailview/{anak_id}", $con . $fk6 . "@detailView")->before('auth');
Route::post($pr_k6 . "/add", $con . $fk6 . "@add")->before('auth');
Route::get($pr_k6 . '/updateview/{id}', $con . $fk6 . '@updateView')->before('auth');
Route::post($pr_k6 . '/update', $con . $fk6 . '@update')->before('auth');
Route::get($pr_k6 . '/delete/{id}', $con . $fk6 . '@delete')->before('auth');
Route::get($pr_k6 . '/search', $con . $fk6 . '@search')->before('auth');

