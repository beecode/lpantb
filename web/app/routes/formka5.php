<?php

$fk5 = 'FormKA5Controller';
$pr_k5 = '/dash/formka5';
//Crud Route
Route::get($pr_k5, $con . $fk5 . "@view")->before('auth');
Route::get($pr_k5 . "/viewMe", $con . $fk5 . "@viewMe")->before('auth');
Route::post($pr_k5 . "/viewYear", $con . $fk5 . "@viewYear")->before('auth');
Route::get($pr_k5 . "/detailview/{anak_id}", $con . $fk5 . "@detailView")->before('auth');

Route::get($pr_k5 . "/preaddview", $con . $fk5 . "@preAddView")->before('auth');
Route::get($pr_k5 . "/addview/{anak_id}", $con . $fk5 . "@addView")->before('auth');
Route::post($pr_k5 . "/add", $con . $fk5 . "@add")->before('auth');

Route::get($pr_k5 . '/updateview/{id}', $con . $fk5 . '@updateView')->before('auth');
Route::post($pr_k5 . '/update', $con . $fk5 . '@update')->before('auth');

Route::get($pr_k5 . '/delete/{id}', $con . $fk5 . '@delete')->before('auth');
Route::get($pr_k5 . '/search', $con . $fk5 . '@search')->before('auth');
