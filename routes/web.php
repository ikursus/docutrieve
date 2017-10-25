<?php

Route::get('/', 'PagesController@index');

Route::get('dashboard', 'PagesController@dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Untuk papar borang hubungi
Route::get('hubungi', 'PagesController@borangHubungi');
// Untuk terima data daripada borang hubungi
Route::post('hubungi', 'PagesController@prosesHubungi');
