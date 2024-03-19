<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PeminjamanController;


Route::get('/logout', [LoginController::class, 'logout']);

route::get('/index1', function(){
return view('index1');
});
Route::middleware(['redirectIfAuthenticated'])->group(function () {
    Route::get('/login', [LoginController::class, 'tampil']);
    Route::post('/login', [LoginController::class, 'login'])->name("login");

    Route::post('/register', [AuthController::class, 'store']);
    Route::get('/register', [AuthController::class, 'tampil']);
});

Route::group(['middleware' => 'level:user'], function(){
// Rute yang memerlukan middleware "user"
    Route::get('/home', [UserController::class, 'home' ]);
    Route::get('/pencarian', [UserController::class, 'pencarian' ]);
    Route::get('/detail_buku/{Judul}', [BukuController::class, 'detail_buku']);
    Route::POST('/CommentController/komen/{id}', [CommentController::class, 'komen']);
    Route::get('/layout/navbar', [UserController::class, 'user']);
    Route::post('/peminjaman/pinjambuku', [PeminjamanController::class, 'pinjambuku'])->name('peminjaman.pinjambuku');
    Route::get('/peminjaman', [PeminjamanController::class, 'tampil_peminjaman']);
    Route::get('/peminjaman', [PeminjamanController::class, 'list_pinjam']);
    Route::get('/pdf/{PeminjamanID}', [PeminjamanController::class, 'detail_peminjaman']);
    Route::get('/peminjaman/hapus_peminjaman/{id}', [PeminjamanController::class, 'hapus_peminjaman']);
    // Route::get('/peminjaman', [UserController::class, 'index']);
    
});

Route::group(['middleware' => 'level:petugas,admin'], function(){
    // Rute yang memerlukan middleware AdminPetugasMiddleware
    Route::get('/petugas/tambah_buku', [BukuController::class, 'tampil']);
    Route::post('/petugas/tambah_buku', [BukuController::class, 'store']);
    Route::get('/petugas/update_buku{BukuID}', [BukuController::class, 'data_buku_update'])->name("buku.edit");
    Route::post('/petugas/update_buku{BukuID}', [BukuController::class, 'data_buku_store'])->name("buku.update");
    Route::get('/petugas/hapus/{BukuID}', [PetugasController::class, 'hapus']);
    Route::get('/petugas/hapus_kategori/{KategoriID}', [PetugasController::class, 'hapus_kategori']);
    Route::post('/petugas/tambah_petugas', [AuthController::class, 'store_petugas']);
    Route::get('/petugas/tambah_petugas', [AuthController::class, 'tampil_petugas']);
    Route::get('/petugas/home', [PetugasController::class, 'home' ]);
    Route::get('/petugas/tambah_kategori', [BukuController::class, 'tampil_kategori']);
    Route::post('/petugas/tambah_kategori', [BukuController::class, 'store_kategori']);
    Route::get('/petugas/peminjaman', [PeminjamanController::class, 'list_pinjam_petugas']);
    Route::post('/petugas/peminjaman', [PeminjamanController::class, 'updatebuku']);
    route::get('/petugas/data_buku', [BukuController::class, 'data_buku']);
    route::get('/petugas/data_kategori', [BukuController::class, 'data_kategori']);
    route::get('/petugas/masuk_kategori', [BukuController::class, 'tampil_masuk_kategori']);
    route::post('/petugas/masuk_kategori', [BukuController::class, 'masuk_kategori']);
    Route::get('/petugas/data_user', [PetugasController::class, 'user']);
    Route::get('/petugas/data_petugas', [PetugasController::class, 'petugas']);
    Route::get('/peminjaman/hapus_peminjaman/{id}', [PeminjamanController::class, 'hapus_peminjaman']);
    // Route to handle 'Terima' action for all "pengaduan" rows with status '0'
Route::get('/petugas/terima-buku/{id}', [PetugasController::class, 'terima']);
Route::get('/petugas/pinjam-buku/{id}', [PetugasController::class, 'pinjam']);

// Route to handle 'Selesai' action for all "pengaduan" rows with status 'proses'
Route::get('/petugas/selesai-buku/{id}', [PetugasController::class, 'selesai']);


});


