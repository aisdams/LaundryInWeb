<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KaryawanController extends Controller
{
    public function index(){
        $data = user::paginate(10);
        return view('karyawan.index', compact('data'));
    }

    public function create(){
        return view('karyawan.add');
    }

    public function store(Request $request)
    {
        user::create($request->all());
        return redirect("/data-karyawan")->with('success','Data Karyawan berhasil ditambahkan.');
    }
}
