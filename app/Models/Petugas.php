<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Authenticatable   
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'Email',
        'NamaLengkap',
        'Alamat',
        'level',
    ];  

    protected $table = "user";

    protected $primaryKey = "UserID";

}
