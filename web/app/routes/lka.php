<?php

$lka = 'LKASettingController';
$pr_lka = '/dash/setting/lka';
//Crud Route
Route::get($pr_lka, $con . $lka . "@view")->before('auth');
Route::post($pr_lka . '/update', $con . $lka . '@update')->before('auth');
