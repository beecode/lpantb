<?php

$tc = 'NotifikasiController';
$tc_pr = 'dash/notifikasi';
//Crud Route

Route::get($tc_pr . "/view", $con . $tc . "@view");
Route::get($tc_pr . "/read/{id}", $con . $tc . "@read");

Route::get($tc_pr . "/markread", $con . $tc . "@markAllAsRead");
