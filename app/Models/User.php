<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'Email',
        'NamaLengkap',
        'Alamat',
        'level',
    ];  

    // Define the primary key for the 'user' table
    protected $primaryKey = "UserID";

    // Specify the table name for the model
    protected $table = 'user';

    public function scopeIsNotAdmin($query)
    {
        return $query->where('level', '!=', 'Admin');
    }

}
