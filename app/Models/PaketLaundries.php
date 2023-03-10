<?php

namespace App\Models;

use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketLaundries extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "paket_laundries";
    protected $fillable = [
        'outlet_id',
        'jenis',
        'nama_paket',
        'harga',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
