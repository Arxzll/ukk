<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BukuController extends Controller
{
    public function tampil()
    {
        return view('/petugas/tambah_buku');
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima
        // $validatedData = $request->validate([
        //     'judul' => 'required|string|max:255',
        //     'penulis' => 'required|string|max:255',
        //     'penerbit' => 'required|string|max:255',
        //     'TahunTerbit' => 'required|integer',
        //     'Deskripsi' => 'required|text',
        // ]);

        // Memeriksa apakah judul buku sudah ada dalam database
        // $existingBook = DB::table('buku')->where('Judul', $validatedData['judul'])->first();

        // Jika judul buku sudah ada, kirim pesan kesalahan dengan menggunakan redirect back
        // if ($existingBook) {
        //     return back()->with(['error' => 'Judul buku sudah ada dalam database.']);
        // }

        // Jika judul buku belum ada, tambahkan data ke dalam tabel 'buku'
        $namaFoto = "";
        if ($request->hasFile('Foto')) {

            // return "hai";
             $namaFoto = time() . $request->Foto->getClientOriginalName();
             $request->Foto->move('image', $namaFoto);
        }

        DB::table('buku')->insert([
            'Judul' => $request->judul,
            'Penulis' => $request->penulis,
            'Penerbit' => $request->penerbit,
            'TahunTerbit' => $request->TahunTerbit,
            'Deskripsi' => $request->Deskripsi,
            'Foto' => $namaFoto,
            'Stok' => $request->Stok,
        ]);

        return back()->with(['message' => 'Buku berhasil dibuat']);
    


    return redirect('/petugas/tambah_buku');
    }

    public function tampil_kategori()
    {
        return view('/petugas/tambah_kategori');
    }
    
    public function store_kategori(Request $request)
    {
        $user = DB::table('kategoribuku')->insert([
            'NamaKategori' => $request->NamaKategori,
        ]);
        
        return redirect('/petugas/tambah_kategori')->with(['message' => 'Kategori berhasil dibuat']);
    }
    
    public function data_buku()
    {
        $judul = "Selamat Datang";
        $buku = DB::table('buku')->get();
        return view('/petugas/data_buku', ['judul' => $judul, 'buku' => $buku]);
    }
    
    public function data_kategori()
    {
        $user = DB::table('kategoribuku')->get();
        return view('petugas/data_kategori', ['user' => $user]);
    }
    
    public function hapus($id)
    {
        DB::table('buku')->where('BukuID', '=', $id)->delete();
        return back();
    }
    
    public function detail_buku($Judul)
    {
        $buku = DB::table('buku')->where('Judul', '=', $Judul)
        ->first();
        $peminjaman = DB::table('peminjaman')->where([['BukuID' ,'=',$buku->BukuID] , ['UserID','=', Auth::user()->UserID ]]);
        $kategori = DB::table('kategoribuku_relasi')->where('BukuID', '=', $buku->BukuID)
        ->join('kategoribuku', 'kategoribuku.KategoriID', '=', 'kategoribuku_relasi.KategoriID')
        ->first();
        
        $ulasan = DB::table('user')

        ->join('ulasanbuku', 'ulasanbuku.UserID', '=', 'user.UserID')
        ->where('BukuID', '=', $buku->BukuID)->get();
        
        return view('detail_buku', ['buku' => $buku, 'ulasan' => $ulasan, 'kategori'=>$kategori]);
    }
    public function tampil_masuk_kategori(){
        $kategori = DB::table('kategoribuku')->get();
        $buku = DB::table('buku')->get();
        return view('/petugas/masuk_kategori', ['kategori' => $kategori, 'buku' => $buku]);
    }
    public function masuk_kategori(Request $request){


        DB::table('kategoribuku_relasi')->insert([
            'BukuID' => $request->buku,
            'KategoriID' => $request->kategori,
            
        ]);

        return back()->with(['message' => 'Buku Berhasil Ditambahkan Kategori']);
    }
}    