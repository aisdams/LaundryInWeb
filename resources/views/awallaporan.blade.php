@extends('layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Laporan Transaksi</h3>
            <a href="{{ url('/laporan/all-data-laporan')}}" class="text-black" target="_blank">Semua Data</a>
            <form action="/laporan-tanggal" method="get" class="mt-3">
                <label for="tanggal">Pilih Tanggal:</label>
                <input type="date" id="tgl" name="tgl">
                <button type="submit">Cari</button>
            </form>
        </div>
    </div>
@endsection