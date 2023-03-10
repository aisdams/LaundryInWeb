@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
        <div class="box box-warnin`g">
            <div class="box-header">
                <p>
                    <a href="{{ url('transaksi') }}" class="btn btn-sm btn-flat btn-primary mb-3"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
                </p>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                <table class="table table-stripped text-dark fw-bold">
                    <tbody>
                        <tr>
                            <th>Outlet</th>
                            <td>:</td>
                            <td>{{$transaksi ->outlet->nama}}</td> 
                            <th>Nama Customer</th>
                            <td>:</td>
                            <td>{{$transaksi ->customer->nama}}</td>
                        </tr>
                        <tr>
                            <th>Jenis Paket Laundry</th>
                            <td>:</td>
                            <td>{{$transaksi ->paketlaundry->jenis}}</td>
                            <th>Nama Penginput</th>
                            <td>:</td>
                            <td>{{$transaksi ->user->nama}}</td> 
                        </tr>
                        <tr>
                            <th>Kode Invoice</th>
                            <td>:</td>
                            <td>{{ $transaksi->kode_invoice }}</td>
                            <th>Berat</th>
                            <td>:</td>
                            <td>{{ $transaksi->berat }}</td>
                        </tr>
                        <tr>
                            <th>Tgl Bayar</th>
                            <td>:</td>
                            <td>{{ $transaksi->tgl_bayar }}</td>
                            <th>biaya tambahan</th>
                            <td>:</td>
                            <td>{{ $transaksi->biaya_tambahan }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>{{ $transaksi->status }}</td>
                            <th>Dibayar</th>
                            <td>:</td>
                            <td>{{ $transaksi->dibayar }}</td>
                        </tr>
                        <tr>
                            <th>Diskon</th>
                            <td>:</td>
                            <td>{{ $transaksi->diskon }}</td>
                            <th>total</th>
                            <td>:</td>
                            <td>{{ $transaksi->total }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td>{{ $transaksi->keterangan }}</td>
                        </tr>
                    </tbody>
                </table>
               </div>
               
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection