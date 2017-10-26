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
Route::get('users', 'UsersController@index')->name('senaraiUser');
// Untuk paparkan borang tambah user
Route::get('users/add', 'UsersController@create')->name('borangTambahUser');
// Untuk terima data dari borang tambah user dan simpan rekod baru
// dalam database table users
Route::post('users/tambah', 'UsersController@store')->name('simpanRekodUser');
// Untuk paparkan borang edit user
Route::get('users/{id}', 'UsersController@edit')->name('borangEditUser');
// Untuk terima data dari borang edit user dan simpan kemaskini rekod
// dalam database table users
Route::patch('users/{id}', 'UsersController@update')->name('kemaskiniRekodUser');

// Untuk hapuskan data user
Route::delete('users/{id}', 'UsersController@destroy')->name('deleteUser');
Route::get('users/{id}/orders', 'UsersController@show')->name('orderUser');
