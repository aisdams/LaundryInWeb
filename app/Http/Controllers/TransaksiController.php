<?php

namespace App\Http\Controllers;

use PDF;
use Validator;
use App\Models\User;
use App\Models\Outlet;
use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\PaketLaundries;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        foreach ($transaksi as $t) {
            $berat = $t->berat;
            $harga = $t->paketlaundry->harga;
            $biaya_tambahan = $t->biaya_tambahan;
            $total = ($berat * $harga) + $biaya_tambahan;
    
            // Hitung diskon
            $minimal_pembelian1 = 50000;
            $minimal_pembelian2 = 100000;
            $diskon1 = 0.1; // diskon 10% untuk pembelian minimal 50000
            $diskon2 = 0.3; // diskon 30% untuk pembelian minimal 100000
    
            if ($total >= $minimal_pembelian2) {
                $diskon_value = $diskon2 * $total;
                $t->diskon = $diskon2 * 100; // simpan nilai diskon dalam bentuk persen (misal 30)
            } else {
                if ($total >= $minimal_pembelian1) {
                    $diskon_value = $diskon1 * $total;
                    $t->diskon = $diskon1 * 100; // simpan nilai diskon dalam bentuk persen (misal 10)
                } else {
                    $diskon_value = 0;
                    $t->diskon = 0;
                }
            }

            $t->diskon_value = $diskon_value;
            $t->total = $total - $diskon_value;
        }
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
        $transaksi = Transaksi::with('customer','outlet','paketlaundry','user')->get()->find($id);
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

    // Laporan 
    public function LaporanSemua (){
        $outlet = Outlet::all();
        $customer = Customer::all();
        $paketlaundry = PaketLaundries::all();
        $user = User::all();
        $transaksi = Transaksi::with('outlet','customer','paketlaundry','user')->get();
        return view('transaksi.laporansemua', compact('transaksi','customer','outlet','paketlaundry','user'));
    }

        public function laporan(Request $request)
    {
        $tanggal = $request->input('tgl_bayar');
        $laporan = DB::table('transaksis')
                ->whereDate('tgl_bayar', $tanggal)
                ->join('outlets', 'transaksis.outlet_id', '=', 'outlets.id')
                ->join('customers', 'transaksis.customer_id', '=', 'customers.id')
                ->join('paket_laundries', 'transaksis.paketlaundry_id', '=', 'paket_laundries.id')
                ->join('users', 'transaksis.user_id', '=', 'users.id')
                ->select('transaksis.*', 'outlets.nama as nama_outlet', 'customers.nama as nama_customer', 'paket_laundries.jenis','paket_laundries.harga', 'users.nama')
                ->get();
        return view('transaksi.laporantanggal', ['laporan' => $laporan]);
    }
    // End Laporan
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $paketlaundryIds = $request->input('paketlaundry_id');

        $paketlaundries = PaketLaundries::whereIn('id', $paketlaundryIds)->get();

        if ($paketlaundries->isEmpty()) {
            // Handle the error case here
            return redirect()->back()->withInput()->withErrors(['Paket laundry tidak valid']);
        }

        $totalHarga = $paketlaundries->sum('harga');

        // Hitung total
        $berat = $request->input('berat');
        $biaya_tambahan = $request->input('biaya_tambahan');
        $total = ($berat * $totalHarga) + $biaya_tambahan;

        // Hitung diskon
        $minimal_pembelian1 = 50000;
        $minimal_pembelian2 = 100000;
        $diskon1 = 0.1; // diskon 10% untuk pembelian minimal 50000
        $diskon2 = 0.3; // diskon 30% untuk pembelian minimal 100000

        if ($total >= $minimal_pembelian2) {
            $diskon_value = $diskon2 * $total;
            $total -= $diskon_value;
        } else {
            if ($total >= $minimal_pembelian1) {
                $diskon_value = $diskon1 * $total;
                $total -= $diskon_value;
            } else {
                $diskon_value = 0;
            }
        }

        $paketlaundry_ids = $request->input('paketlaundry_id');
        $paketlaundry_ids_str = implode(',', $paketlaundry_ids);
        // Simpan data laundry ke dalam database
        $transaksi = new Transaksi;
        $transaksi->outlet_id = $request->input('outlet_id');
        $transaksi->customer_id = $request->input('customer_id');
        $transaksi->paketlaundry_id = $paketlaundry_ids_str;
        $transaksi->user_id = Auth::user()->id;
        $transaksi->berat = $request->input('berat');
        $transaksi->tgl_bayar = $request->input('tgl_bayar');
        $transaksi->biaya_tambahan = $request->input('biaya_tambahan');
        $diskon = $request->input('diskon', 0); // set default value to 0 if diskon is empty
        $transaksi->diskon = $diskon;
        $transaksi->status = $request->input('status');
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
        $outlet = Outlet::all();
        $customer = Customer::all();
        $paketlaundry = PaketLaundries::all();
        $user = User::all();
        $transaksi = Transaksi::findorfail($id);
        return view('transaksi.edit', compact('outlet','customer','paketlaundry', 'user','transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = transaksi::findorfail($id);
        $transaksi->update($request->all());
        return redirect('transaksi')->with('success','Transaksi Berhasil Di Edit');
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