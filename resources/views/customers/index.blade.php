@extends('layout')

@section('content')
  @push('style')
  <link rel="stylesheet" href={{ asset('css/customer.css') }}>
  @endpush

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h2>Tabel Data Customer</h2>
          <a href="{{route ('addcustomer')}}" class="tbl-btn button btn-primary p-2 rounded-2">Add New Customer</a>
        </div>
        <hr class="border-dark my-4">
        <div class="table-responsive">
          <table class="table table-hover table-striped border rounded-1">
            <thead>
              <tr>
                <th class="fw-bold">No</th>
                <th class="fw-bold">Nama</th>
                <th class="fw-bold">Alamat</th>
                <th class="fw-bold">Jenis Kelamin</th>
                <th class="fw-bold">No. Telepon</th>
                <th class="fw-bold">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach ($data as $idx)
                <tr>
                  <td class="fw-semibold">{{$no++}}</td>
                  <td>{{$idx -> nama}}</td>
                  <td>{{$idx -> alamat}}</td>
                  <td>{{$idx -> jenis_kelamin}}</td>
                  <td>{{$idx -> notelp}}</td>
                  {{-- <td class="text-danger">{{$idx ->}}<i class="mdi mdi-arrow-down"></i></td> --}}
                  <td><label class="badge badge-danger">Pending</label></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection