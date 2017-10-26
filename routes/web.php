<?php

Route::get('/', 'PagesController@index');

Route::get('dashboard', 'PagesController@dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Untuk papar borang hubungi
Route::get('hubungi', 'PagesController@borangHubungi');
// Untuk terima data daripada borang hubungi
Route::post('hubungi', 'PagesController@prosesHubungi');

// Untuk papar rekod senarai users dari Database
Route::get('users', 'UsersController@index');
// Untuk paparkan borang tambah user
Route::get('users/tambah', 'UsersController@create');
// Untuk terima data dari borang tambah user dan simpan rekod baru
// dalam database table users
Route::post('users/tambah', 'UsersController@store');
