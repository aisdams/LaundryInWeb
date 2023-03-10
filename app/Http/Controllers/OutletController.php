<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Outlet;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = outlet::paginate(10);
        return view('outlet.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('outlet.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        outlet::create($request->all());
        return redirect("/data-outlet")->with('success','Data Outlet berhasil ditambahkan.');
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
        $data = outlet::find($id);
        return view('outlet.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = outlet::find($id);
        $data->update($request->all());
        return redirect("/data-outlet")->with('success','Data Outlet berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = outlet::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data Outlet Berhasil Dihapus");
    }
}
