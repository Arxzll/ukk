<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    
    public function pinjambuku(Request $request) {
        $user = Auth::user();
        $bukuId = $request->input('BukuID');
        
        // Lakukan validasi atau manipulasi data buku jika diperlukan
        $buku = Buku::find($bukuId);
        
        if (!$buku) {
            return "Buku tidak ditemukan.";
        }
        
        // Set waktu peminjaman menjadi hari ini
        $tanggalPeminjaman = now();
        
        // Set waktu pengembalian menjadi 7 hari setelah hari ini
        $tanggalPengembalian = now()->addDays(7);
        
        // Tetapkan status peminjaman sebagai "menunggu"
        $statusPeminjaman = 'menunggu';
        
        // Simpan data peminjaman ke dalam database
        Peminjaman::create([
            'UserID' => $user->UserID,
            'BukuID' => $bukuId,
            'TanggalPeminjaman' => $tanggalPeminjaman,
            'TanggalPengembalian' => $tanggalPengembalian,
            'StatusPeminjaman' => $statusPeminjaman,
        ]);
        
        return back();
    }
    
    public function terimapinjaman(Request $request) {
        $user = Auth::user();
        $bukuId = $request->input('BukuID');
        
        // Cari catatan peminjaman yang sudah ada oleh user untuk buku ini
        $peminjaman = Peminjaman::where('UserID', $user->UserID)
                                  ->where('BukuID', $bukuId)
                                  ->first();
        
        if ($peminjaman) {
            // Perbarui waktu peminjaman menjadi 1 hari setelah hari ini
            $peminjaman->TanggalPeminjaman = now()->addDays(1);
            
            // Perbarui waktu pengembalian menjadi 8 hari setelah hari ini
            $peminjaman->TanggalPengembalian = now()->addDays(8);
            
            // Simpan perubahan ke dalam database
            $peminjaman->save();
        } else {
            return "Peminjaman tidak ditemukan.";
        }
        
        return back();
    }
    
    

    public function list_pinjam(){

       $list = DB::table('peminjaman')
        ->join('buku', 'buku.BukuID', '=', 'peminjaman.BukuID')
        ->where('UserID', '=', Auth::user()->UserID)->get();
        return view('peminjaman' , ['list' => $list]);
    }
    public function list_pinjam_petugas(){

        
        $list = DB::table('peminjaman')
        ->join('buku', 'buku.BukuID', '=', 'peminjaman.BukuID')
        ->join('user', 'user.UserID', '=', 'peminjaman.UserID')
        ->get();


        if(isset($_GET["q"])){
            $list = DB::table('peminjaman')
            ->join('buku', 'buku.BukuID', '=', 'peminjaman.BukuID')
            ->join('user', 'user.UserID', '=', 'peminjaman.UserID')
            ->where('username', 'like', '%' .$_GET['q'].'%')->orWhere('PeminjamanID', '=',$_GET['q'])
            ->get();
        }
        return view('Petugas.peminjaman' , ['list' => $list]);
    }
    public function detail_peminjaman($PeminjamanID){

        $detail = DB::table('peminjaman')
        ->join('buku', 'buku.BukuID', '=', 'peminjaman.BukuID')
        ->join('user', 'user.UserID', '=', 'peminjaman.UserID')
        ->where('user.UserID', '=', Auth::user()->UserID)
        ->where('peminjaman.PeminjamanID', '=', $PeminjamanID)
        ->get();
    return view('pdf', ['detail' => $detail]);
    
     }
     public function hapus_peminjaman($id)
     {
         DB::table('peminjaman')->where('PeminjamanID', '=', $id)->delete();
         return back();
     }
}
