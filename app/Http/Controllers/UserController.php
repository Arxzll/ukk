<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\kategori_buku_relasi;
use App\Models\kategoribuku;

class UserController extends Controller
{
    function home(){
    
        $buku = DB::table('kategoribuku_relasi')
        ->join('kategoribuku', 'kategoribuku.KategoriID', '=', 'kategoribuku_relasi.KategoriID')
        ->join('buku', 'buku.BukuID', '=', 'kategoribuku_relasi.BukuID')
       ->get();

       if(isset($_GET["q"])) {
        $buku = DB::table('kategoribuku_relasi')
            ->join('kategoribuku', 'kategoribuku.KategoriID', '=', 'kategoribuku_relasi.KategoriID')
            ->join('buku', 'buku.BukuID', '=', 'kategoribuku_relasi.BukuID')
            ->where('Judul', 'like', '%' . $_GET['q'] . '%')
            ->get();
    }

        return view('/home', ['buku' => $buku]);
    }
    function pencarian(){
        $buku = DB::table('kategoribuku_relasi')
        ->join('kategoribuku', 'kategoribuku.KategoriID', '=', 'kategoribuku_relasi.KategoriID')
        ->join('buku', 'buku.BukuID', '=', 'kategoribuku_relasi.BukuID')
       ->get();

       if(isset($_GET["q"])) {
        $buku = DB::table('kategoribuku_relasi')
            ->join('kategoribuku', 'kategoribuku.KategoriID', '=', 'kategoribuku_relasi.KategoriID')
            ->join('buku', 'buku.BukuID', '=', 'kategoribuku_relasi.BukuID')
            ->where('Judul', 'like', '%' . $_GET['q'] . '%')
            ->get();
    }

        return view('/pencarian', ['buku' => $buku]);
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