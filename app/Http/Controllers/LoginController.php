<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function tampil(){
        return view("login");
    }

function login(Request $request)
{
    $dataLogin = $request->only("username", "password");

    if (Auth::attempt($dataLogin)) {
        $user = Auth::user();
    
        if ($user->level == "user") {
            return redirect("/home")->with(['success' => 'Anda Berhasil Login']);
        } elseif ($user->level == "petugas" || $user->level == "admin") {
            auth()->guard('petugas')->login($user); // Log in as 'petugas' guard
            return redirect("/Petugas/home")->with(['success' => 'Anda Berhasil Login']);
        }
    } else {
        return back()->with(['error' => 'Akun tidak ditemukan!']);
    }
    
}

    

    function logout(){
        // Session::flush();
        Auth::logout();

        return redirect('/login');
    }
}
