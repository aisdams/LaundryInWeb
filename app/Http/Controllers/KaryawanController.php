<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KaryawanController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function create(){
    }

    public function store(Request $request)
    {
        user::create($request->all());
        return redirect("/data-karyawan")->with('success','Data Karyawan berhasil ditambahkan.');
    }
}
