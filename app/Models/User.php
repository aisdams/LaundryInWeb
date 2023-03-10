<?php

namespace App\Models;
use App\Models\Outlet;

// use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Transaksi;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'outlet_id',
        'nama',
        'email',
        'level',
        'avatar',
        'notelp',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function useroutlet(){
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}