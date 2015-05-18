<?php

$tc = 'TestController';
$tc_pr = '/test';
//Crud Route

Route::get($tc_pr, $con . $tc . "@test");

Route::get($tc_pr . "/notifNew", $con . $tc . "@notifTest");
