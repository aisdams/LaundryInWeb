@extends('layoutauth')
@section('judulnya')
@section('formnya')
<form class="pt-3" action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
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
      <label for="exampleInputEmail">Nama</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-account-outline text-white"></i>
          </span>
        </div>
        <input type="text" class="form-control form-control-lg border-left-0" style="color: white" id="nama" placeholder="Nama" name="nama" autofocus>
        @if($errors->has('nama'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-inner--text"><strong>Warning!</strong>{{ $errors->first('nama') }}</span>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">username</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-account-outline text-white"></i>
          </span>
        </div>
        <input type="text" class="form-control form-control-lg border-left-0" style="color: white" id="username" placeholder="username" name="username" autofocus>
        @if($errors->has('username'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-inner--text"><strong>Warning!</strong>{{ $errors->first('username') }}</span>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Email</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-account-outline text-white"></i>
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
      <label for="exampleInputEmail">Choose Image</label>
      <div class="input-group">
        {{-- <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-account-outline text-white"></i>
          </span>
        </div> --}}
        <input type="file" class="form-control" style="width: 100%; color: white" name="avatar">
        @if($errors->has('avatar'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-inner--text"><strong>Warning!</strong>{{ $errors->first('avatar') }}</span>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
        @endif
      </div>
    </div>
    
    <div class="form-group">
      <label for="exampleInputPassword">No Telp</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-lock-outline text-white"></i>
          </span>
        </div>
        <input type="number" class="form-control form-control-lg border-left-0" style="color: white" id="notelp" name="notelp" placeholder="No Telp">
        @if($errors->has('notelp'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-inner--text"><strong>Warning!</strong>{{ $errors->first('notelp') }}</span>
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
        @if($errors->has('password'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-inner--text"><strong>Warning!</strong>{{ $errors->first('password') }}</span>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
        @endif
        <p id="passwordHelpBlock" class="form-text text-muted">
          Your password must be more than 6 characters long, should contain at-least 1 Lowercase, and 1 Numeric.
     </p>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Confirm Password</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-lock-outline text-white"></i>
          </span>
        </div>
        <input type="password" class="form-control form-control-lg border-left-0" style="color: white" id="password_confirmation" name="password_confirmation" placeholder="password_confirmation">
        @if($errors->has('password_confirmation'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-inner--text"><strong>Warning!</strong>{{ $errors->first('password_confirmation') }}</span>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
        @endif
      </div>
    </div>
    <div class="form-group">
      
      <input type="hidden" value="customer" class="form-control form-control-lg border-left-0" style="color: white" id="level" placeholder="level" name="level" autofocus>
      @if($errors->has('level'))
      <span class="error">{{ $errors->first('level') }}</span>
      @endif
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
      <button type="submit" class="btn btn-block btn-lg font-weight-medium auth-form-btn" href="index.html" style="background-color: #E8D5C4">Register</button>
    </div>
    <div class="text-center mt-4 font-weight-light">
      Don't have an account? <a href="register-2.html" class="text-white " style="font-weight: bold">Create</a>
    </div>
  </form>
@endsection
