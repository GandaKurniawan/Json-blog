<?php

Route::resource('/artikel', 'PagesController');

Route::get('/', 'PagesController@index');

// Route::resource('/createartikel', 'PagesController');

// Route::resource('/updateartikel', 'PagesController');

// Route::resource('/beranda', 'PagesController');

// Route::resource('/home', 'PagesController');
