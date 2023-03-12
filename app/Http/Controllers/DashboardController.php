<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function userByLevel()
    {
        $userLevels = User::select('level', DB::raw('count(*) as total'))
            ->groupBy('level')
            ->get()
            ->pluck('total', 'level');

        $transaksi = Transaksi::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $outlet = Outlet::count();

        return view('dashboard', compact('userLevels', 'transaksi', 'outlet'));
    }
}
