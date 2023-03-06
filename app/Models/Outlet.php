<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'notelp',
    ];

    // public function outletowner(){
    //     return $this->belongsTo(Owner::class, '', '');
    // }

    public function outletkaryawan(){
        return $this->hasMany(Karyawan::class);
    }
}
