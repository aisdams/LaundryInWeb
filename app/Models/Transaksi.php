<?php

namespace App\Models;

use App\Models\User;
use App\Models\Outlet;
use App\Models\Customer;
use App\Models\PaketLaundries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "transaksis";
    protected $fillable = [
        'outlet_id',
        'customer_id',
        'paketlaundry_id',
        'user_id',
        'tgl',
        'berat',
        'tgl_bayar',
        'biaya_tambahan',
        'total',
        'diskon',
        'status',
        'dibayar',
        'keterangan',
    ];

    protected $dates = [
        'tgl',
        'tgl_bayar',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function paketlaundry()
    {
        return $this->belongsTo(PaketLaundries::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
