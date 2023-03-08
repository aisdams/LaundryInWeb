<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;

class DataOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('level', 'owner')->get();
        return view('owner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlet = Outlet::all();
        return view('owner.add', [
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
        return redirect("data-owner")->with('success', 'Data Owner berhasil di tambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
        $outlet = Outlet::all();
        return view('owner.edit', compact('data', 'outlet'));
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

        $data = User::findorfail($id);
        $outlet_id = $request->outlet_id;
        $data->update($request->all());
        return redirect("data-owner")->with('success', 'Data Owner berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findorfail($id);
        $data->delete();
        return back()->with('destroy', "Data Owner Berhasil Di Delete");
    }
}