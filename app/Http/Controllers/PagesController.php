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

     // Paparkan template borang hubungi
     public function borangHubungi()
     {
       return view('template_hubungi');
     }

     // Terima dan proses data dari borang hubungi
     public function prosesHubungi(Request $request)
     {
       // Validasi data dari borang
       // $this->validate( $request, [''] );
       $request->validate([
          'nama' => 'required|min:3|string',
          'email' => 'required|email',
          'telefon' => 'required|numeric',
          'pertanyaan' => 'required|min:6|string'
       ]);


       // Terima SEMUA data dari borang
       $data = $request->all();

       // Terima data yang dipilih dari borang
       // $data = $request->only('nama', 'email');

       // Terima semua data dari borang kecuali yang dinyatakan
       // $data = $request->except('nama', 'email');

       // Terima 1 data dari ruangan yang diperlukan
       // $data = $request->input('nama');

       return $data;
     }
}
