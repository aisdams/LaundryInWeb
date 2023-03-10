@extends('layout')

@section('content')
  @push('style')
  <link rel="stylesheet" href={{ asset('css/customer.css') }}>
  @endpush

<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body d-flex flex-column gap-4">
      <div class="d-flex justify-content-between">
        <h2>Add New Outlet</h2>
        <a href="{{ url('data-customer')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
      </div>
      <form class="forms-sample" action="{{ url('data-customer')}}" method="POST">
        @csrf
        <div class="form-group">
          <h6>Nama Customer <span class="text-danger">*</span></h6>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nama Customer..." name="nama">
          @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>

        <div class="form-group">
          <h6>Jenis Kelamin<span class="text-danger">*</span></h6>
          <select type="text" class="form-control @error('outlet_id') is-invalid @enderror" id="exampleInputUsername1" name="jenis_kelamin"> 
              <option disabled selected>Pilih Jenis Kelamin</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </datalist>
          </select>
          @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>

        <div class="form-group">
          <h6>Nomor Telepon <span class="text-danger">*</span></h6>
          <input type="text" class="form-control @error('notelp') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nomor Telepon..." name="notelp">
          @error('notelp')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>

        <div class="form-group">
          <h6>Alamat<span class="text-danger">*</span></h6>
          <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Alamat Lengkap..." name="alamat"></textarea>
          @error('alamat')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
        <a href="{{url ('/data-customer')}}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection