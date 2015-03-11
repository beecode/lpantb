<?php

$files = 'FilesController';
$pr_fl = '/lpantb/anak/files';
//Crud Route
Route::get($pr_fl . "/view/{form_id}", $con . $files . "@view")->before('auth');
Route::get($pr_fl . "/preaddview/{form_id}", $con . $files . "@preAddView")->before('auth');
Route::get($pr_fl . "/addview/{form_id}", $con . $files . "@addView")->before('auth');
Route::get($pr_fl . "/detailview/{form_id}", $con . $files . "@detailView")->before('auth');
Route::post($pr_fl . "/add", $con . $files . "@add")->before('auth');
Route::get($pr_fl . '/updateview/{id}', $con . $files . '@updateView')->before('auth');
Route::post($pr_fl . '/update', $con . $files . '@update')->before('auth');
Route::get($pr_fl . '/delete/{id}', $con . $files . '@delete')->before('auth');
Route::get($pr_fl . '/search', $con . $files . '@search')->before('auth');

