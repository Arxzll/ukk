<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoribuku extends Model
{
    use HasFactory;

    protected $table = 'kategoribuku'; // Sesuaikan dengan nama tabel yang sesuai
    protected $primaryKey = 'KategoriID '; // Sesuaikan dengan nama kolom ID di tabel
    protected $fillable = ['KategoriID','NamaKategori']; // Sesuaikan dengan kolom yang diizinkan untuk mass assignment


}
