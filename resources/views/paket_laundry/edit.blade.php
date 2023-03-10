@extends('layout')

@section('content')
  @push('style')
  <link rel="stylesheet" href={{ asset('css/customer.css') }}>
  @endpush

<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body d-flex flex-column gap-4">
      <div class="d-flex justify-content-between">
        <h2>Edit Paket Laundry</h2>
        <a href="{{ url('paket-laundry')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
      </div>
      <form class="forms-sample mt-3" action="{{ url('paket-laundry',$paketlaundry->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <h6>Nama Outlet<span class="text-danger">*</span></h6>
          <select type="text" list="browsers" class="form-control @error('outlet_id') is-invalid @enderror" id="exampleInputUsername1" name="outlet_id"> 
            <datalist id="browsers">
                <option selected disabled>Open this select Outlet</option>
              @foreach ($outlet as $idx)
                <option value="{{$idx-> id}}">{{$idx-> nama}}</option>
              @endforeach
            </datalist>
          </select>
          @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6>Jenis Laundry <span class="text-danger">*</span></h6>
            <select class="form-control form-select @error('jenis') is-invalid @enderror" name="jenis">
                <option selected disabled>Pilih Jenis Laundry</option>
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
            @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
          <h6>Nama Paket Laundry <span class="text-danger">*</span></h6>
          <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nama Paket Laundry..." value="{{$paketlaundry-> nama_paket}}" name="nama_paket">
          @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
          <h6>Harga <span class="text-danger">*</span></h6>
          <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Harga..." name="harga" value="{{$paketlaundry-> harga}}">
          @error('harga')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
        <a href="{{url ('/paket-laundry')}}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection
