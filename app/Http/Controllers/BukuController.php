<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function tampil()
    {
        return view('/Petugas/tambah_buku');
    }
    public function store(Request $request)
    {
      

        DB::table('buku')->insert([
            'Judul' => $request->judul,
            'Penulis' => $request->penulis,
            'Penerbit' => $request->penerbit,
            'TahunTerbit' => $request->TahunTerbit,
            'Deskripsi' => $request->Deskripsi,
            'Foto' => $request->Foto,
        ]);

        return back()->with(['message' => 'Buku berhasil dibuat']);
    


    return redirect('/Petugas/tambah_buku');
    }

    public function tampil_kategori()
    {
        return view('/Petugas/tambah_kategori');
    }
    
    public function store_kategori(Request $request)
    {
        $user = DB::table('kategoribuku')->insert([
            'NamaKategori' => $request->NamaKategori,
        ]);
        
        return redirect('/Petugas/tambah_kategori')->with(['message' => 'Kategori berhasil dibuat']);
    }
    
    public function data_buku()
    {
        $judul = "Selamat Datang";
        $buku = DB::table('buku')->get();
        $peminjaman = DB::table('peminjaman')
        ->join('buku', 'buku.BukuID', '=', 'peminjaman.BukuID')
        ->join('user', 'user.UserID', '=', 'peminjaman.UserID')
        ->where('user.UserID', '=', Auth::user()->UserID)
        ->where('peminjaman.PeminjamanID', '=', 'PeminjamanID')
        ->get();
        return view('/Petugas/data_buku', ['judul' => $judul, 'buku' => $buku, 'peminjaman'=> $peminjaman]);
    }
    public function data_buku_update($id)
    {
        $buku = DB::table('buku')->where('BukuID', $id)->first();
        return view('Petugas.update_buku', ['buku' => $buku]);
    }

    public function data_buku_store(Request $request, $id)
    {
        // Validasi input
        $namaFoto = "";
        if ($request->hasFile('Foto')) {

            // return "hai";
             $namaFoto = time() . $request->Foto->getClientOriginalName();
             $request->Foto->move('image', $namaFoto);
        }

    // Update data buku
    DB::table('buku')->where('BukuID', $id)->update([
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'TahunTerbit' => $request->TahunTerbit,
        'Deskripsi' => $request->Deskripsi,
        'Foto' => $namaFoto,
    ]);

    // Redirect kembali ke halaman data buku dengan pesan sukses
    return redirect('/Petugas/data_buku')->with('success', 'Data buku berhasil diupdate.');
    }
    
    public function data_kategori()
    {
        $user = DB::table('kategoribuku')->get();
        return view('Petugas/data_kategori', ['user' => $user]);
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
        $peminjaman = DB::table('peminjaman')->where([['BukuID' ,'=',$buku->BukuID] , ['UserID','=', Auth::user()->UserID ]])->get();
        $kategori = DB::table('kategoribuku_relasi')->where('BukuID', '=', $buku->BukuID)
        ->join('kategoribuku', 'kategoribuku.KategoriID', '=', 'kategoribuku_relasi.KategoriID')
        ->first();
        $ulasan = DB::table('user')

        ->join('ulasanbuku', 'ulasanbuku.UserID', '=', 'user.UserID')
        ->where('BukuID', '=', $buku->BukuID)->get();
        // return count($peminjaman);
        return view('detail_buku', ['buku' => $buku, 'ulasan' => $ulasan, 'kategori'=>$kategori, 'peminjaman'=>$peminjaman]);
    }
    public function tampil_masuk_kategori(){
        $kategori = DB::table('kategoribuku')->get();
        $buku = DB::table('buku')->get();
        return view('/Petugas/masuk_kategori', ['kategori' => $kategori, 'buku' => $buku]);
    }
    public function masuk_kategori(Request $request){


        DB::table('kategoribuku_relasi')->insert([
            'BukuID' => $request->buku,
            'KategoriID' => $request->kategori,
            
        ]);

        return back()->with(['message' => 'Buku Berhasil Ditambahkan Kategori']);
    }
}    