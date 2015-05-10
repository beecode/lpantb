<?php

$st = 'StaffController';
$pr_st = '/dash/staff';
//Crud Route
Route::get($pr_st, $con . $st . "@view")->before('auth');
Route::get($pr_st . "/addview", $con . $st . "@addView")->before('auth');
Route::post($pr_st . "/add", $con . $st . "@add")->before('auth');
Route::get($pr_st . '/updateview/{id}', $con . $st . '@updateView')->before('auth');
Route::post($pr_st . '/update', $con . $st . '@update')->before('auth');
Route::get($pr_st . '/delete/{id}', $con . $st . '@delete')->before('auth');
Route::get($pr_st . '/search', $con . $st . '@search')->before('auth');
