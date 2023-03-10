<?php

namespace App\Http\Controllers;

use Validator;
use PDF;
use App\Models\User;
use App\Models\Outlet;
use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\PaketLaundries;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlet = Outlet::all();
        $customer = Customer::all();
        $paketlaundry = PaketLaundries::all();
        $user = User::all();
        $transaksi = Transaksi::with('outlet','customer','paketlaundry','user')->get();
        return view('transaksi.index', compact('transaksi','customer','outlet','paketlaundry','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlet = Outlet::all();
        $customer = Customer::all();
        $paketlaundry = PaketLaundries::all();
        $user = User::all();
        $transaksi = Transaksi::with('customer','outlet','paketlaundry','user')->get();
        return view('transaksi.add', compact('transaksi','customer','outlet','paketlaundry','user'));
    }

    
    public function detail($id)
    {
        $outlet = Outlet::find($id);
        $customer = Customer::find($id);
        $paketlaundry = PaketLaundries::find($id);
        $user = User::find($id);
        $transaksi = Transaksi::with('customer','outlet','paketlaundry','user')->find($id);
        return view('transaksi.detail', compact('transaksi','customer','outlet','paketlaundry','user'));
    }

        public function cetakLaporanPDF($id)
    {
        $outlet = Outlet::find($id);
        $customer = Customer::find($id);
        $paketlaundry = PaketLaundries::find($id);
        $user = User::find($id);
        $transaksi = Transaksi::with('customer','outlet','paketlaundry','user')->find($id);

        $pdf = PDF::loadView('myinvoicepdf', compact('transaksi','customer','outlet','paketlaundry','user'));
        return $pdf->download('myinvoicepdf' . $transaksi->id . '.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'outlet_id'=>'required',
        //     'customer_id'=>'required|string',
        //     'paketlaundry_id'=>'required|string',
        //     'user_id'=>'required|string',
        //     'kode_invoice'=>'required|string',
        //     'tgl'=>'required',
        //     'berat'=>'required|numeric',
        //     'tgl_bayar'=>'required',
        //     'biaya_tambahan'=>'required|numeric',
        //     'status'=>'required',
        //     'dibayar'=>'required',
        //     'keterangan' => 'required'
        // ]);
    
        // if($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        // }

        $paketlaundry = PaketLaundries::findOrFail($request->input('paketlaundry_id'));
        $harga = $paketlaundry->harga;

        // Hitung total
        $berat = $request->input('berat');
        $biaya_tambahan = $request->input('biaya_tambahan');
        $total = ($berat * $harga) + $biaya_tambahan;

        // Hitung diskon
        $diskon = $request->input('diskon');
        if ($diskon) {
            $diskon_value = ($diskon / 100) * $total;
            $total = $total - $diskon_value;
        }

        // Simpan data laundry ke dalam database
        $transaksi = new Transaksi;
        $transaksi->outlet_id = $request->input('outlet_id');
        $transaksi->customer_id = $request->input('customer_id');
        $transaksi->paketlaundry_id = $request->input('paketlaundry_id');
        $transaksi->user_id = $request->input('user_id');
        $transaksi->kode_invoice = $request->input('kode_invoice');
        $transaksi->tgl = $request->input('tgl');
        $transaksi->berat = $request->input('berat');
        $transaksi->tgl_bayar = $request->input('tgl_bayar');
        $transaksi->biaya_tambahan = $request->input('biaya_tambahan');
        $transaksi->diskon = $request->input('diskon');
        $transaksi->status = $request->input('status');
        $transaksi->dibayar = $request->input('dibayar');
        $transaksi->keterangan = $request->input('keterangan');
        $transaksi->total = $total; // Simpan nilai total
        $transaksi->save($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil ditambahkan');
    }

    // public function checkout() {
    //     $transaksi = Transaksi::where('user_id', auth()->id())->get();
    //     foreach ($transaksi as $transaksiProduct) {
    //         $paketlaundry = PaketLaundries::find($transaksiProduct->paketlaundry_id);
    //     }
    // }

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Transaksi::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Transaksi Berhasil Di Delete");
    }
}
