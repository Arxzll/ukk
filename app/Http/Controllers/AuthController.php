<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AuthController extends Controller
{
     public function tampil()
    {
        return view('register');
    }
    public function store(Request $request)
    {

    $user = DB::table('user')->insert([
        'NamaLengkap'=> $request->NamaLengkap,
        'Username' => $request->Username,
        'Password' => Hash::make($request->Password),
        'Email' => $request->Email,
        'Alamat' => $request->Alamat,
        'Level' => 'user'
        
        
    ]);
    return redirect('/login')->with(['message' => 'Akun berhasil dibuat']);;
    
    
}
     public function tampil_petugas()
    {
        if (Auth::user()->level=='petugas') 
        {
            return abort(403);
          }
          
        return view('/Petugas/tambah_petugas');
    }
    public function store_petugas(Request $request)
    {

    $user = DB::table('user')->insert([
        'NamaLengkap'=> $request->NamaLengkap,
        'Username' => $request->Username,
        'Password' => Hash::make($request->Password),
        'Email' => $request->Email,
        'Alamat' => $request->Alamat,
        'Level' => 'petugas',
        
        
    ]);
    return back()->with(['message' => 'Akun Petugas berhasil dibuat']);
    // return redirect('/petugas/tambah_petugas');
    
    
}
}
