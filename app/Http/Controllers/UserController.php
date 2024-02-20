<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\user;

class UserController extends Controller
{
    function home(){
        $buku = DB::table('kategoribuku_relasi')
        ->join('kategoribuku', 'kategoribuku.KategoriID', '=', 'kategoribuku_relasi.KategoriID')
        ->join('buku', 'buku.BukuID', '=', 'kategoribuku_relasi.BukuID')
       ->get();

        return view('/home', ['buku' => $buku]);
    }
    public function user()
    {
        $user =  DB::table('user')->get();
        return view('layout.navbar', ['user' => $user]);
    }

    public function index(){
        return view('peminjaman');
    }
}