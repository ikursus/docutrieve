<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        // Dapatkan SEMUA rekod senarai users dari table users
        // $senarai_users = DB::table('users')->get();
        // Dapatkan data berdasarkan kondisi ID = 2
        // $senarai_users = DB::table('users')
        // //->where('id', '=', '2')
        // //->whereIn('id', ['2', '3'])
        // ->whereNotIn('id', ['2', '3'])
        // ->get();

        // $senarai_users = DB::table('users')
        // ->select('nama', 'no_kp', 'email')
        // ->get();

        // Kira jumlah users
        // $jumlah_users = DB::table('users')->count();

        // Query berdasarkan kondisi cawangan dalam table users
        if ( ! empty( $request->input('caw') ) )
        {
          $senarai_users = DB::table('users')
          ->where('cawangan', '=', $request->input('caw') )
          ->orderBy('id', 'desc')
          ->paginate(2);
        }
        else
        {
          $senarai_users = DB::table('users')
          ->orderBy('id', 'desc')
          ->paginate(2);
        }

        // Paparkan template index.blade.php dari folder users
        // dan pass kan variable $senarai_users untuk paparan di browser
        return view('folder_users/index', compact('senarai_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // Paparkan borang tambah user dari folder_users
        return view('folder_users/borang_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Data
        $request->validate([
          'nama' => 'required|string',
          'no_kp' => 'required|numeric',
          'email' => 'required|email',
          'cawangan' => 'required',
          'password' => 'required|min:3'
        ]);

        // Dapatkan rekod dari borang
        // $data = $request->only([
        //   'nama',
        //   'no_kp',
        //   'email',
        //   'cawangan'
        // ]);

        $data = $request->all();
        // Encrypt password
        $data['password'] = bcrypt( $request->input('password') );

        // Simpan rekod ke dalam database pada table users
        // DB::table('users')->insert($data);
        User::create($data);

        // Kembali ke halaman senarai users
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::find($id);
        $orders = DB::table('users')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->select('orders.id', 'orders.purpose', 'orders.status', 'users.nama')
        ->get();

        return view('folder_users/senarai_orders', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Dapatkan rekod user berdasarkan nombor ID dari table users
      //$user = DB::table('users')->where('id', '=', $id)->first();
      $user = User::find($id);

      // Paparkan borang edit user dari folder_users dan passkan variable $user
      return view('folder_users/borang_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // Validate Data
      $request->validate([
        'nama' => 'required|string',
        'no_kp' => 'required|numeric',
        'email' => 'required|email',
        'cawangan' => 'required'
      ]);

      // Dapatkan rekod dari borang
      $data = $request->only([
        'nama',
        'no_kp',
        'email',
        'cawangan'
      ]);
      // Encrypt password sekiranya wujud data password yang baru
      if( ! empty( $request->input('password') ) )
      {
        $data['password'] = bcrypt( $request->input('password') );
      }
      // Kemaskini rekod ke dalam database pada table users
      // berdasarkan ID yang di edit
      // DB::table('users')->where('id', '=', $id)->update($data);
      User::find($id)->update($data);

      // Kembali ke halaman borang kemaskini
      return redirect()->back()->with('alert-success', 'Data berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Dapatkan rekod data dan hapuskan data
        // DB::table('users')->where('id', '=', $id)->delete();
        User::find($id)->delete();

        // Redirect ke halaman senarai user
        return redirect()->route('senaraiUser')->with('alert-success', 'Data berjaya dihapuskan!');
    }
}
