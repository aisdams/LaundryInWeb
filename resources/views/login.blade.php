@extends('layoutauth')
@section('judulnya')
@section('formnya')
<form class="pt-3" action="{{ route('login.post') }}" method="POST">
    @csrf
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
    @endif
    @if (Session::has('msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <span class="alert-inner--text"><strong>Warning!</strong> {!! \Session::get('msg') !!}</span>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
  </div>
  @endif
    
    @error('success')
     <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    </div>
    @enderror
    <div class="form-group">
      <label for="exampleInputEmail">Email</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-warning-outline text-white"></i>
          </span>
        </div>
        <input type="text" class="form-control form-control-lg border-left-0" style="color: white" id="email" placeholder="Email" name="email" autofocus>
        @if($errors->has('email'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-inner--text"><strong>Warning!</strong>{{ $errors->first('email') }}</span>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Password</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-lock-outline text-white"></i>
          </span>
        </div>
        <input type="password" class="form-control form-control-lg border-left-0" style="color: white" id="password" name="password" placeholder="Password">
        <div class="input-group-append">
          <span class="input-group-text"  style="background-color: blueviolet" onclick="password_show_hide();">
            <i class="fas fa-eye" id="show_eye"></i>
            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
          </span>
        </div>
        @if($errors->has('password'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-inner--text"><strong>Warning!</strong>{{ $errors->first('password') }}</span>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
        @endif
      </div>
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
      <div class="form-check">
        <label class="form-check-label text-muted">
          <input type="checkbox" class="form-check-input">
          Keep me signed in
        </label>
      </div>
      <a href="#" class="auth-link text-white">Forgot password?</a>
    </div>
    <div class="my-2">
      <button type="submit" class="btn btn-block btn-lg font-weight-medium auth-form-btn" href="index.html" style="background-color: #E8D5C4">LOGIN</button>
    </div>
    <div class="text-center mb-2">OR</div>
    <div class="mb-2 d-flex">
      <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
        <i class="mdi mdi-google mr-2"></i>Google
      </button>
    </div>
    <div class="text-center mt-4 font-weight-light">
      Don't have an account? <a href="/auth/register" class="text-white " style="font-weight: bold">Create</a>
    </div>
  </form>
@endsection

@push('scriptauth')
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