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
        <a href="{{ url('data-karyawan')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
      </div>
      <form class="forms-sample" action="{{ url('data-karyawan')}}" method="POST">
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
          @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
          <h6>Nama Karyawan <span class="text-danger">*</span></h6>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nama Karyawan..." name="nama">
          @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6>Email <span class="text-danger">*</span></h6>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Email Karyawan..." name="email">
            @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
          <input type="hidden" value="karyawan" class="form-control form-control-lg border-left-0" style="color: white" id="level" placeholder="level" name="level" autofocus>
          @if($errors->has('level'))
          <span class="error">{{ $errors->first('level') }}</span>
          @endif
        </div>
        <div class="form-group">
          <h6>Nomor Telepon <span class="text-danger">*</span></h6>
          <input type="number" class="form-control @error('notelp') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nomor Telepon..." name="notelp">
          @error('notelp')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
          <h6>Password <span class="text-danger">*</span></h6>
          <div class="input-group-append">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password Karyawan..." name="password">
            <span class="input-group-text"  style="background-color: blueviolet" onclick="password_show_hide();">
              <i class="fas fa-eye" id="show_eye"></i>
              <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
            </span>
          </div>
          @error('password')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
        <a href="{{url ('/data-outlet')}}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function password_show_hide() {
     var x = document.getElementById("password");
     var show_eye = document.getElementById("show_eye");
     var hide_eye = document.getElementById("hide_eye");
     hide_eye.classList.remove("d-none");
     if (x.type === "password") {
         x.type = "text";
         show_eye.style.display = "none";
         hide_eye.style.display = "block";
     } else {
         x.type = "password";
         show_eye.style.display = "block";
         hide_eye.style.display = "none";
     }
     }
 </script>
@endpush