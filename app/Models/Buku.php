<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

        protected $table = 'buku'; // Sesuaikan dengan nama tabel yang sesuai
        protected $primaryKey = 'BukuID'; // Sesuaikan dengan nama kolom ID di tabel
        protected $fillable = ['BukuID', 'Judul', 'Penerbit','TahunTerbit'.'Deskripsi','Foto']; // Sesuaikan dengan kolom yang diizinkan untuk mass assignment
    
}
