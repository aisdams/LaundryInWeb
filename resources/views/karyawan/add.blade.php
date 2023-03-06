@extends('layout')

@section('content')
  @push('style')
  <link rel="stylesheet" href={{ asset('css/customer.css') }}>
  @endpush

<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body d-flex flex-column gap-4">
      <div class="d-flex justify-content-between">
        <h2>Add New Karyawan</h2>
        {{-- <a href="{{route ('data-customer')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a> --}}
      </div>
      <form class="forms-sample" action="{{url ('/data-karyawan')}}" method="POST">
        @csrf
        <div class="form-group">
          <h6>Id Outlet<span class="text-danger">*</span></h6>
          <select type="text" class="form-control" id="browsers" placeholder="Pilih Jenis Kelamin" name="outlet_id">
            <datalist id="browsers">
              <option selected disabled>Pilih Outlet</option>
              <option value="karyawan">Karyawan</option>
              <option value="owner">Owner</option>
              <option value="admin">Admin</option>
            </datalist>
          </select>
        </div>

        <div class="form-group">
          <h6>Nama Lengkap <span class="text-danger">*</span></h6>
          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama Lengkap..." name="nama">
        </div>

        <div class="form-group">
          <h6>E-mail <span class="text-danger">*</span></h6>
          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="example@gmail.com" name="email">
        </div>

        <div class="form-group">
          <h6>User Level<span class="text-danger">*</span></h6>
          <select type="text" class="form-control" id="exampleInputUsername1" placeholder="Pilih Jenis Kelamin" name="jenis_kelamin">
            <option selected disabled>Pilih Level User</option>
            <option value="karyawan">Karyawan</option>
            <option value="owner">Owner</option>
            <option value="admin">Admin</option>
          </select>
        </div>

        <div class="form-group">
          <h6>Nomor Telepon <span class="text-danger">*</span></h6>
          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nomor Telepon..." name="notelp">
        </div>
        <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
        <a href="{{url ('/data-karyawan')}}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection