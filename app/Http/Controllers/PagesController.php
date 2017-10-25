<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {

         $page_title = 'Halaman Utama';
         $tarikh = date('D M Y');

         return view('welcome', compact('page_title', 'tarikh') );
     }

     public function dashboard()
     {
       return view('template_dashboard');
     }

     public function borangHubungi()
     {
       return view('template_hubungi');
     }
}
