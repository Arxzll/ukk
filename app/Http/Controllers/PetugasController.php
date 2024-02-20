<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    function home(){
        return view('petugas.home');
    }
    
    function user(){
        $user = DB::table('user')->where('level','user')->get() ;
        return view('petugas/data_user',['user' => $user]);
      }
    function petugas(){
      if (Auth::user()->level=='petugas') 
      {
        return abort(403);
      }

        $user = DB::table('user')->where('level','petugas')->get() ;
        return view('petugas/data_petugas',['user' => $user]);
      }

      function hapus($id){
        DB::table('buku')->where('BukuID', $id)->delete();
        return redirect()->back();
    }
      function hapus_kategori($id){
        DB::table('kategoribuku')->where('KategoriID', '=', $id)->delete();
        return back();
    }

    // BukuController.php

    public function terima($id) {
      // Find all "pengaduan" rows with status $id and update their status to 'proses'
      DB  ::table('peminjaman')->where('PeminjamanID', '=', $id)->update(['StatusPeminjaman' => 'DiTerima']);

      // Redirect back or to a different route
      return redirect()->back();
    }

  public function pinjam($id) {
      // Find all "peminjaman" rows with PeminjamanID 'proses' and update their PeminjamanID to 'selesai'
      DB::table('peminjaman')->where('PeminjamanID', '=', $id)->update(['StatusPeminjaman' => 'Di Pinjam']);

      // Redirect back or to a different route
      return redirect()->back();
    }

    public function selesai($id) {
      // Find all "peminjaman" rows with PeminjamanID 'proses' and update their PeminjamanID to 'selesai'
      DB::table('peminjaman')->where('PeminjamanID', '=', $id)->update(['StatusPeminjaman' => 'Selesai']);

      // Redirect back or to a different route
      return redirect()->back();
    }


}
