<?php

namespace App\Models;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\PaketLaundries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'notelp',
    ];

    public function outletuser(){
        return $this->hasMany(User::class);
    }

    public function paketlaundry(){
        return $this->hasMany(PaketLaundries::class);
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
