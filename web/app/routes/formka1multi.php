<?php

$fk1 = 'FormKA1MultiController';
$pr_k1 = '/lpantb/formka1multi';
//Crud Route
Route::get($pr_k1 ."/view/{lka}", $con . $fk1 . "@view")->before('auth');
Route::get($pr_k1 . "/viewMe/{lka}", $con . $fk1 . "@viewMe")->before('auth');
Route::get($pr_k1 . '/detailview/{id}', $con . $fk1 . '@detailView')->before('auth');

Route::get($pr_k1 . "/addview/{lka}", $con . $fk1 . "@addView")->before('auth');
Route::post($pr_k1 . "/add", $con . $fk1 . "@add")->before('auth');

Route::get($pr_k1 . '/updateview/{id}', $con . $fk1 . '@updateView')->before('auth');

Route::post($pr_k1 . '/update', $con . $fk1 . '@update')->before('auth');

Route::get($pr_k1 . '/delete/{id}/{lka}', $con . $fk1 . '@delete')->before('auth');
