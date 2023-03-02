@extends('layout')
@section('content')
    <section style="background-color: #fff">
        <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="{{url('dashboad')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('identitas-profile') }}">Identitas Profile</a></li>
                </ol>
              </nav>
            </div>
        </div>

        <div class="card mx-4">
          <div class="card-header">
            Identitas Aplikasi
          </div>
          <div class="row p-5 ">
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nama Aplikasi</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="staticEmail" value="LaundryInWeb">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Lengkap</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="staticEmail" value="Jalan Haji Hasyim">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="staticEmail" value="laundryinweb@gmail.com">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Telphone</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="staticEmail" value="081234567891">
              </div>
            </div>
            <div class="row col-2 mt-5">
              <a href="{{ URL::previous() }}" class="btn btn-outline-danger ms-1"><i class="fa-solid fa-circle-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;Go Back</a>

            </div>
          </div>

        </div>
    </section>
@endsection