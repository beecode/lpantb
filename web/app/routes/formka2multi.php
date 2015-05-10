<?php

$fk2multi = 'FormKA2MultiController';
$pr_k2multi = '/dash/formka2multi';
//Crud Route
Route::get($pr_k2multi ."/view/{lka}", $con . $fk2multi . "@view")->before('auth');
Route::get($pr_k2multi . "/viewMe/{lka}", $con . $fk2multi . "@viewMe")->before('auth');
Route::get($pr_k2multi . '/detailview/{id}', $con . $fk2multi . '@detailView')->before('auth');

Route::get($pr_k2multi . "/addview/{lka}", $con . $fk2multi . "@addView")->before('auth');
Route::post($pr_k2multi . "/add", $con . $fk2multi . "@add")->before('auth');

Route::get($pr_k2multi . '/updateview/{id}', $con . $fk2multi . '@updateView')->before('auth');
Route::post($pr_k2multi . '/update', $con . $fk2multi . '@update')->before('auth');

Route::get($pr_k2multi . '/delete/{id}/{lka}', $con . $fk2multi . '@delete')->before('auth');
