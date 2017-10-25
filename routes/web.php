<?php

Route::get('/', 'PagesController@index');

Route::get('dashboard', 'PagesController@dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('hubungi', 'PagesController@borangHubungi');
