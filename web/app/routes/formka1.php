<?php

$fk1 = 'FormKA1Controller';
$pr_k1 = '/dash/formka1';
//Crud Route
Route::get($pr_k1, $con . $fk1 . "@view")->before('auth');
Route::get($pr_k1 . "/viewMe", $con . $fk1 . "@viewMe")->before('auth');
Route::post($pr_k1 . "/viewYear", $con . $fk1 . "@viewYear")->before('auth');
Route::get($pr_k1 . '/detailview/{id}', $con . $fk1 . '@detailView')->before('auth');

Route::get($pr_k1 . "/addview", $con . $fk1 . "@addView")->before('auth');
Route::post($pr_k1 . "/add", $con . $fk1 . "@add")->before('auth');

// Route::get($pr_k1 . "/addmultiview", $con . $fk1 . "@addMultiView")->before('auth');
Route::get($pr_k1 . "/addmulti", $con . $fk1 . "@addMulti")->before('auth');

Route::get($pr_k1 . '/updateview/{id}', $con . $fk1 . '@updateView')->before('auth');

Route::post($pr_k1 . '/update', $con . $fk1 . '@update')->before('auth');

Route::get($pr_k1 . '/delete/{id}', $con . $fk1 . '@delete')->before('auth');
Route::get($pr_k1 . '/search', $con . $fk1 . '@search')->before('auth');
Route::post($pr_k1 . '/lka', $con . $fk1 . '@searchLKA');
