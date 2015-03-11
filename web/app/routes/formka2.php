<?php

$fk2 = 'FormKA2Controller';
$pr_k2 = '/lpantb/formka2';
//Crud Route
Route::get($pr_k2, $con . $fk2 . "@view")->before('auth');
Route::get($pr_k2 . "/addview", $con . $fk2 . "@addView")->before('auth');
Route::post($pr_k2 . "/add", $con . $fk2 . "@add")->before('auth');
Route::get($pr_k2 . '/updateview/{id}', $con . $fk2 . '@updateView')->before('auth');
Route::get($pr_k2 . '/detailview/{id}', $con . $fk2 . '@detailView')->before('auth');
Route::post($pr_k2 . '/update', $con . $fk2 . '@update')->before('auth');
Route::get($pr_k2 . '/delete/{id}', $con . $fk2 . '@delete')->before('auth');
Route::get($pr_k2 . '/search', $con . $fk2 . '@search')->before('auth');
