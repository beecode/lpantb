<?php

$dash = 'DashboardController';
$pr_da = '/dash';
//Crud Route
Route::get($pr_da, $con . $dash . "@view")->before('auth');
Route::get($pr_da . "/filter", $con . $dash . "@filter")->before('auth');
