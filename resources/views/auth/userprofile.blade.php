@extends('layout')
@section('content')
<section style="background-color: #eee;">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{url('dashboad')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('auth/profile') }}">User Profile</a></li>
            </ol>
          </nav>
        </div>
      </div>
  
      <div class="row px-2">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ Auth::user()->username }}</h5>
              <p class="text-muted mb-1">{{ Auth::user()->level }}</p>
              <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
              <div class="d-flex justify-content-center mb-2">
                <a href="{{ route('changeprofile') }}" class="text-white"><button type="button" class="btn btn-primary">Edit</button></a>
                <a href="{{ URL::previous() }}" class="btn btn-outline-danger ms-1">Go Back</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ Auth::user()->nama }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Username</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ Auth::user()->username }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ Auth::user()->notelp }}</p>
                </div>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
  </section>
@endsection