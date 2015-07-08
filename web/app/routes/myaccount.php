<?php

$my = 'MyAccountController';
$pr_my = '/dash/myaccount';
//Crud Route
Route::get($pr_my, $con . $my . "@view")->before('auth');
Route::post($pr_my . '/update', $con . $my . '@update')->before('auth');
