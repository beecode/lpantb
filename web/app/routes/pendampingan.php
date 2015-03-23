<?php

$fkp6 = 'PendampinganController';
$pr_pk6 = '/lpantb/formka6/pendampingan';
//Crud Route
Route::get($pr_pk6 . "/view/{form_id}", $con . $fkp6 . "@view")->before('auth');
Route::get($pr_pk6 . "/preaddview/{form_id}", $con . $fkp6 . "@preAddView")->before('auth');
Route::get($pr_pk6 . "/addview/{form_id}", $con . $fkp6 . "@addView")->before('auth');
Route::get($pr_pk6 . "/detailview/{form_id}", $con . $fkp6 . "@detailView")->before('auth');
Route::get($pr_pk6 . "/printPreview/{form_id}", $con . $fkp6 . "@printPreview")->before('auth');
Route::post($pr_pk6 . "/add", $con . $fkp6 . "@add")->before('auth');
Route::get($pr_pk6 . '/updateview/{id}', $con . $fkp6 . '@updateView')->before('auth');
Route::post($pr_pk6 . '/update', $con . $fkp6 . '@update')->before('auth');
Route::get($pr_pk6 . '/delete/{id}', $con . $fkp6 . '@delete')->before('auth');
Route::get($pr_pk6 . '/search', $con . $fkp6 . '@search')->before('auth');
