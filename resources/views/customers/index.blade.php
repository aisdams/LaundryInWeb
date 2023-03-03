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
                <th class="fw-bold text-center">No</th>
                <th class="fw-bold text-center">Nama</th>
                <th class="fw-bold text-center">Alamat</th>
                <th class="fw-bold text-center">Jenis Kelamin</th>
                <th class="fw-bold text-center">No. Telepon</th>
                <th class="fw-bold text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach ($data as $idx)
                <tr>
                  <td class="fw-semibold text-center fs-6">{{$no++}}</td>
                  <td class="text-center fs-6">{{$idx -> nama}}</td>
                  <td class="text-center fs-6">{{$idx -> alamat}}</td>
                  <td class="text-center fs-6">{{$idx -> jenis_kelamin}}</td>
                  <td class="text-center fs-6">{{$idx -> notelp}}</td>
                  {{-- <td class="text-danger">{{$idx ->}}<i class="mdi mdi-arrow-down"></i></td> --}}
                  <td class=" d-flex gap-2 justify-content-center text-center">
                    <a href="{{ url('/data-customer/edit-customer/'.$idx->id)}}" class="btn btn-sm fw-semibold text-dark rounded-2 bg-warning"> <i class="fa-solid fa-pen-to-square"></i>
                      Edit
                    </a>
                    <a href="/delete-customer/{{$idx->id}}" class="btn btn-sm fw-semibold text-white rounded-2 bg-danger">
                      <i class="fa-solid fa-trash"></i>
                      Delete
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection