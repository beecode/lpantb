<?php

$log = 'LoginController';
$pr_log = '/login';
//Crud Route
Route::get($pr_log, $con . $log . "@view");
Route::post($pr_log . "/doLogin", $con . $log . "@doLogin");
Route::get($pr_log . "/doLogout", $con . $log . "@doLogout");
