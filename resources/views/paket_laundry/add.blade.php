@extends('layout')
@section('content')
@push('style')
<link rel="stylesheet" href={{ asset('css/customer.css') }}>
@endpush

<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body d-flex flex-column gap-4">
    <div class="d-flex justify-content-between">
      <h2>Add New Paket Laundry</h2>
      <a href="{{ url('paket-laundry')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
    </div>
    <form class="forms-sample mt-3" action="{{ url('paket-laundry')}}" method="POST">
      @csrf
      <div class="form-group">
        <h6>Nama Outlet<span class="text-danger">*</span></h6>
        <select type="text" list="browsers" class="form-control @error('outlet_id') is-invalid @enderror" id="exampleInputUsername1" name="outlet_id"> 
          <datalist id="browsers">
            <option disabled selected>Pilih Outlet</option>
            @foreach ($outlet as $idx)
              <option value="{{$idx-> id}}">{{$idx-> nama}}</option>
            @endforeach
          </datalist>
        </select>
        @error('outlet_id')<div class="invalid-feedback">{{$message}}</div>@enderror
      </div>
      <div class="form-group">
        <h6>jenis <span class="text-danger">*</span></h6>
        <select class="form-control form-select @error('jenis') is-invalid @enderror" name="jenis">
          <option selected disabled>Pilih Paket Laundry</option>
          <option value="Kiloan">Kiloan</option>
          <option value="Dry Cleaning">Dry Cleaning</option>
          <option value="Gorden">Gorden</option>
          <option value="Jaket Kulit">Jaket Kulit'</option>
          <option value="Karpet">Karpet</option>
          <option value="Sepatu">Sepatu'</option>
          <option value="Koper-Tas">Koper-Tas</option>
          <option value="Boneka">Boneka'</option>
          <option value="Helm">Helm'</option>
          <option value="SpringBed">SpringBed'</option>
          <option value="Lainnya">Lainnya'</option>
      </select>
        @error('jenis')<div class="invalid-feedback">{{$message}}</div>@enderror
      </div>
      <div class="form-group">
          <h6>Nama Paket <span class="text-danger">*</span></h6>
          <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nama Paket ..." name="nama_paket">
          @error('nama_paket')<div class="invalid-feedback">{{$message}}</div>@enderror
      </div>
      <div class="form-group">
        <h6>Harga <span class="text-danger">*</span></h6>
        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Harga..." name="harga">
        @error('harga')<div class="invalid-feedback">{{$message}}</div>@enderror
      </div>
      <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
      <a href="{{url ('/paket-laundry')}}" class="btn btn-light">Cancel</a>
    </form>
  </div>
</div>
</div>
@endsection