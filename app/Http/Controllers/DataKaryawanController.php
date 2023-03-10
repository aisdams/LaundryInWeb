<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = User::where('level', 'karyawan')->get();
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlet = Outlet::all();
        return view('karyawan.add', [
            'outlet' => $outlet
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'outlet_id'=>'required',
            'nama'=>'required|string',
            'email'=>'required|string',
            'level'=>'required|string',
            'notelp'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|string|min:6'
        ]);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }

        $outlet_id = $request->outlet_id;
        $nama = $request->nama;
        $email = $request->email;
        $level = $request->level;
        $notelp = $request->notelp;
        $password = bcrypt($request->password);
        
        User::create([
            'outlet_id' => $request->outlet_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'level' => $request->level,
            'notelp' => $request->notelp,
            'password' => bcrypt($request->password),
        ]);
        return redirect("data-karyawan")->with('success', 'Data Karyawan berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karyawan = User::find($id);
        $outlet = Outlet::all();
        return view('karyawan.edit', compact('karyawan', 'outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'outlet_id' => 'required',
            'nama'=>'required|string',
            'email'=>'required|string',
            'level'=>'required|string',
            'notelp'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }

        $karyawan = User::findorfail($id);
        $outlet_id = $request->outlet_id;
        $karyawan->update($request->all());
        return redirect("data-karyawan")->with('success', 'Data Karyawan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data Karyawan Berhasil Di Delete");
    }
}
