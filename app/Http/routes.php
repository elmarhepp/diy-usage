<?php


Route::get('/', 'MyController@index');

// AJAX call to save a nexus address
Route::post('shopPage', 'MyController@shopPage');

