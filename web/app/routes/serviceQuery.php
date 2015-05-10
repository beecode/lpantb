<?php

$svc = 'ServiceQueryController';
$pr_sv = '/dash/service';
//Crud Route
Route::get($pr_sv . "/anak/list", $con . $svc . "@anakAll")->before('auth');
Route::get($pr_sv . "/anak/nama/{q}", $con . $svc . "@anakQueryNama")->before('auth');
Route::get($pr_sv . "/pelapor/list", $con . $svc . "@pelaporAll")->before('auth');
Route::get($pr_sv . "/pelapor/nama/{q}", $con . $svc . "@pelaporQueryNama")->before('auth');
