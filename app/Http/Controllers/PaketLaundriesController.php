<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Outlet;
use App\Models\PaketLaundries;
use Illuminate\Http\Request;

class PaketLaundriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketlaundry = PaketLaundries::with('outlet')->get();
        return view('paket_laundry.index', compact('paketlaundry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlet = Outlet::all();
        return view('paket_laundry.add', compact('outlet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'outlet_id'=>'required',
            'jenis'=>'required|string',
            'nama_paket'=>'required|string|min:4',
            'harga'=>'required|string',
        ]);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }

        PaketLaundries::create($request->all());
        return redirect("/paket-laundry")->with('success','Paket Laundry berhasil ditambahkan.');
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
        $paketlaundry = PaketLaundries::find($id);
        $outlet = Outlet::all();
        return view('paket_laundry.edit', compact('paketlaundry', 'outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'outlet_id'=>'required',
            'jenis'=>'required|string',
            'nama_paket'=>'required|string|min:4',
            'harga'=>'required|string',
        ]);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }

        $paketlaundry = PaketLaundries::findorfail($id);
        $outlet_id = $request->outlet_id;
        $paketlaundry->update($request->all());
        return redirect("paket-laundry")->with('success', 'Paket Laundry berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = PaketLaundries::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Paket Laundry Berhasil Di Delete");
    }
}
