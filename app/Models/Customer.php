<?php

namespace App\Models;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "customers";
    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'notelp'
    ];

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
