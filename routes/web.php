<?php

Route::get('/', function () {

    $page_title = 'Halaman Utama';
    $tarikh = date('D M Y');

    return view('welcome', compact('page_title', 'tarikh') );
});

Route::get('dashboard', function() {
  return view('template_dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('hubungi', function() {
  return view('template_hubungi');
});
