@extends('layout')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body d-flex flex-column gap-4">
        <div class="d-flex justify-content-between">
          <h2>Edit Transaksi</h2>
          <a href="{{ url('transaksi')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
        </div>
        <form class="forms-sample mt-2" action="{{ url('transaksi',$transaksi->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
                <h6>Status<span class="text-danger">*</span></h6>
                <select class="form-control form-select" name="status">
                  <option selected disabled>{{$transaksi-> status}}</option>
                  <option value="selesai">selesai</option>
                  <option value="diambil">diambil</option>
                </select>
          </div>
  
          <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
          <a  href="{{url ('/transaksi')}}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection