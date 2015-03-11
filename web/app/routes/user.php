<?php

$user = 'UserController';
$pr_ur = '/lpantb/user';
//Crud Route
Route::get($pr_ur, $con . $user . "@view")->before('auth');
Route::get($pr_ur . "/addview", $con . $user . "@addView")->before('auth');
Route::post($pr_ur . "/add", $con . $user . "@add")->before('auth');
Route::get($pr_ur . '/updateview/{id}', $con . $user . '@updateView')->before('auth');
Route::post($pr_ur . '/update', $con . $user . '@update')->before('auth');
Route::get($pr_ur . '/delete/{id}', $con . $user . '@delete')->before('auth');
Route::get($pr_ur . '/search', $con . $user . '@search')->before('auth');
