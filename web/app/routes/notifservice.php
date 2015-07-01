<?php

$tc = 'NotifikasiServiceController';
$tc_pr = 'dash/notifserv';
//Crud Route

Route::get($tc_pr, $con . $tc . "@test");

Route::get($tc_pr . "/mynotif/{id}", $con . $tc . "@myNotif");
Route::get($tc_pr . "/mynotif/new/count/{id}", $con . $tc . "@myNewNotifCount");
Route::get($tc_pr . "/markread", $con . $tc . "@markAllAsRead");
Route::get($tc_pr . "/delete/{id}", $con . $tc . "@delete");
Route::get($tc_pr . "/deleteAll", $con . $tc . "@deleteAll");
