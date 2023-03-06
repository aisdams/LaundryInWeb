<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        $data = user::paginate(10);
        return view('user.index', compact('data'));
    }

    public function create(){
        return view('user.add');
    }

    public function store(Request $request)
    {
        user::create($request->all());
        return redirect("/data-user")->with('success','Data User berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $data = user::find($id);
        return view('user.edit', compact('data'));
    }
}
