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
        $tanggalPeminjaman = now(); // Tambahkan 1 hari dari sekarang
            $tanggalPengembalian = now()->addDays(7); // Tambahkan 8 hari dari sekarang
        // Lakukan validasi atau manipulasi data buku jika diperlukan
        $buku = Buku::find($bukuId);
    
        if (!$buku) {
            return "Buku tidak ditemukan.";
        }
    
        // Simpan data peminjaman ke dalam database
        Peminjaman::create([
            'UserID' => $user->UserID,
            'BukuID' => $bukuId,
            'TanggalPeminjaman' => $tanggalPeminjaman,
            'TanggalPengembalian' => $tanggalPengembalian,
            'StatusPeminjaman' => 'menunggu',
        ]);
    
        return back();
    }
    
    public function updatebuku(Request $request) {
        $user = Auth::user();
        $bukuId = $request->input('BukuID');
    
        // Lakukan validasi atau manipulasi data buku jika diperlukan
        $buku = Buku::find($bukuId);
    
        if (!$buku) {
            return "Buku tidak ditemukan.";
        }
    
        // Lakukan pembaruan data buku sesuai dengan input yang diterima dari form
        $buku->judul = $request->input('judul');
        $buku->pengarang = $request->input('pengarang');
        // Tambahkan atribut-atribut lainnya yang ingin Anda perbarui
    
        // Mengisi waktu pembaruan otomatis
        $buku->updated_at = now();
    
        // Jika status buku diubah menjadi "Diterima"
        if ($request->input('StatusPeminjaman') === 'menunggu') {
            // Set status menjadi "Dipinjam"
            $buku->status = 'Dipinjam';
    
            // Update waktu peminjaman dan waktu pengembalian
            $tanggalPeminjaman = now(); // Tambahkan 1 hari dari sekarang
            $tanggalPengembalian = now()->addDays(7); // Tambahkan 8 hari dari sekarang
    
            $buku->tanggal_peminjaman = $tanggalPeminjaman;
            $buku->tanggal_pengembalian = $tanggalPengembalian;
        }
    
        // Simpan perubahan ke dalam database
        $buku->save();
    
        // Kembalikan ke halaman sebelumnya atau halaman tertentu setelah berhasil mengupdate
        return redirect()->route('petugas.peminjaman')->with('success', 'Buku berhasil diperbarui');
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
