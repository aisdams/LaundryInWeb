@extends('layout')
@section('content')
@push('style')
<link rel="stylesheet" href={{ asset('css/customer.css') }}>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

@endpush

<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body d-flex flex-column gap-4">
    <div class="d-flex justify-content-between">
      <h2>Add New Transaksi</h2>
      <a href="{{ url('transaksi')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
    </div>
    <form class="forms-sample mt-3" action="{{ url('transaksi')}}" method="POST">
      @csrf
      <div class="form-group">
        <h6>Nama Outlet<span class="text-danger">*</span></h6>
        <select class="form-control " name="outlet_id"> 
          <option disabled selected>Pilih Outlet</option>
          @foreach ($outlet as $idx)
            <option value="{{$idx->id}}">{{$idx->nama}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <h6>Nama Customer<span class="text-danger">*</span></h6>
        <select class="form-control" name="customer_id"> 
          <option disabled selected>Pilih Customer</option>
          @foreach ($customer as $idx)
            <option value="{{$idx->id}}">{{$idx->nama}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <h6>Jenis <span class="text-danger">*</span></h6>
        <select id="choices-multiple-remove-button" class="form-control form-select @error('paketlaundry_id') is-invalid @enderror" name="paketlaundry_id[]" multiple required placeholder="Select Jenis upto 1 tags" multiple="multiple">
          @foreach ($paketlaundry as $idx)
                <option value="{{ $idx->id }}">{{ $idx->jenis }}-{{ $idx->harga }}</option>
            @endforeach
      </select>
      </div>

      {{-- <div class="form-group">
        <h6>Nama Karyawan<span class="text-danger">*</span></h6>
        <select class="form-control" name="user_id"> 
          <option disabled selected>Pilih Karyawan Yang input</option>
          @foreach ($user as $idx)
            <option value="{{$idx->id}}">{{$idx->nama}}</option>
          @endforeach
        </select>
      </div> --}}
      {{--  --}}
      {{-- <div class="form-group">
        <h6>Tanggal<span class="text-danger">*</span></h6>
        <input type="datetime-local" class="form-control" placeholder="Masukkan Tanggal ..." name="tgl">
      </div> --}}
      {{--  --}}
      <div class="form-group">
        <h6>Berat/kg<span class="text-danger">*</span></h6>
        <input type="number" class="form-control" placeholder="Masukkan Berat ..." name="berat">
      </div>
       {{--  --}}
       <div class="form-group">
        <h6>Tgl Bayar<span class="text-danger">*</span></h6>
        <input type="datetime-local" class="form-control" placeholder="Masukkan Tgl Bayar ..." name="tgl_bayar">
      </div>
      {{--  --}}
      <div class="form-group">
        <h6>Biaya Tambahan<span class="text-danger">*</span></h6>
        <input type="number" class="form-control" placeholder="Masukkan Biaya Tambahan ..." name="biaya_tambahan">
      </div>
      {{--  --}}
      {{-- <div class="form-group">
        <h6>Diskon<span class="text-danger">*</span></h6>
        <input type="number" class="form-control " placeholder="Masukkan Diskon ..." name="diskon">
      </div> --}}
      {{--  --}}
      <div class="form-group">
        <h6>Status<span class="text-danger">*</span></h6>
        <select class="form-control form-select" name="status">
          <option selected value="proses">proses</option>
        </select>
      </div>
      {{--  --}}
      <div class="form-group">
        <h6>Keterangan<span class="text-danger">*</span></h6>
        <textarea class="form-control" placeholder="Masukkan Keterangan ..." name="keterangan"></textarea>
      </div>
      <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
      <a href="{{url ('/transaksi')}}" class="btn btn-light">Cancel</a>
    </form>
  </div>
</div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script>
  $(document).ready(function(){
  
  var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
     removeItemButton: true,
     maxItemCount:1,
     searchResultLimit:1,
     renderChoiceLimit:1
   }); 
  
  
});
</script>
@endpush