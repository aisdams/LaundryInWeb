@extends('layout')
@section('content')
@push('style')
  <style>
    i {
      color: white
    }
    input::placeholder {
    font-weight: bold;
    }
  </style> 
@endpush

<div class="row">
    <div class="col">
      <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ URL::previous() }}">User Profile</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('auth/change-profile') }}">Edit Profile</a></li>
        </ol>
      </nav>
    </div>
  </div>

  <form action="{{ route('updateprofile') }}" method="POST" class="p-5" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
    @csrf
    <h3>Edit Profile</h3>
    <hr class="mb-4" style="background: black"/>

    {{-- Hide Value --}}
      @if($errors->has('level'))
      <span class="error">{{ $errors->first('level') }}</span>
      @endif

    <div class="row g-2">
      <div class="col-md">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text bg-primary" id="basic-addon1"><i class="fas fa-user"></i></span>
          </div>
          <input name="nama" type="text" value="" class="input form-control @error('nama') is-invalid @enderror" id="nama" placeholder="nama" aria-label="nama" aria-describedby="basic-addon1" />
          @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
      </div>
    </div>
  <div class="row g-2">
    <div class="col-md">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-primary" id="basic-addon1"><i class="fas fa-user"></i></span>
        </div>
        <input name="email" type="text" value="" class="input form-control @error('email') is-invalid @enderror" id="email" placeholder="email" aria-label="email" aria-describedby="basic-addon1" />
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-md">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-primary" id="basic-addon1"><i class="fas fa-user"></i></span>
        </div>
        <input name="notelp" type="number" value="" class="input form-control @error('notelp') is-invalid @enderror" id="notelp" placeholder="notelp" aria-label="notelp" aria-describedby="basic-addon1" />
        @error('notelp')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
    </div>
  </div>
  <div class="row g-2">
    <div class="col-md">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-primary" id="basic-addon1"><i class="fas fa-lock"></i></span>
        </div>
        <input name="old_password" type="password" value="" class="input form-control" id="old_password" placeholder="Old Password" aria-label="Old password" aria-describedby="basic-addon1" />
        <div class="input-group-append">
          <span class="input-group-text" style="background-color: blueviolet" onclick="old_password_show_hide();">
            <i class="fas fa-eye" id="old_show_eye"></i>
            <i class="fas fa-eye-slash d-none" id="old_hide_eye"></i>
          </span>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-primary" id="basic-addon1"><i class="fas fa-lock"></i></span>
        </div>
        <input name="password" type="password" value="" class="input form-control @error('password') is-invalid @enderror" id="password" placeholder="Password Baru" aria-label="password" aria-describedby="basic-addon1" />
        <div class="input-group-append">
          <span class="input-group-text" style="background-color: blueviolet" onclick="password_show_hide();">
            <i class="fas fa-eye" id="show_eye"></i>
            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
          </span>
        </div>
        
        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
    </div>

    <div class="act">
      <button type="submit" class="btn text-white" style="background-color: cornflowerblue">Save</button>
      <a href="{{ URL::previous() }}" class="btn btn-outline-danger ms-1">Go Back</a>
    </div>
  </div>
  </form>
@endsection

@push('scripts')
    <script>
      function old_password_show_hide() {
        var x = document.getElementById("old_password");
        var show_eye = document.getElementById("old_show_eye");
        var hide_eye = document.getElementById("old_hide_eye");
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