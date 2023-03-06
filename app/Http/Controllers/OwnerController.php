<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Owner::paginate(10);
        return view('owner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Owner::create($request->all());
        return redirect("/data-owner")->with('success','Data Owner berhasil ditambahkan.');
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
        $data = Owner::find($id);
        return view('owner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Owner::find($id);
        $data->update($request->all());
        return redirect("/data-owner")->with('success','Data Owner berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Owner::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data Owner Berhasil Dihapus");
    }
}
