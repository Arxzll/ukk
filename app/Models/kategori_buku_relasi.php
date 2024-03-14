<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_buku_relasi extends Model
{
    use HasFactory;

    protected $table = 'kategoribuku_relasi'; // Sesuaikan dengan nama tabel yang sesuai
    protected $primaryKey = 'KategoriBukuID '; // Sesuaikan dengan nama kolom ID di tabel
    protected $fillable = ['KategoriBukuID', 'BukuID', 'KategoriID']; // Sesuaikan dengan kolom yang diizinkan untuk mass assignment


    public function kategoribuku()
    {
        return $this->belongsTo(kategoribuku::class , 'KategoriID' , 'KategoriID');
    }
    public function Buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID','BukuID');
    }
}
