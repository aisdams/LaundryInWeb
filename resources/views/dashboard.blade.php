@extends('layout')
@section('content')

<div class="row">
  <h3 class="mb-3">{{Auth::user()->nama}}</h3>
</div>
<div class="container card py-3">
  
<div class="total-user">
  <div class="card-body">
      <p class="card-title">Total User</p>
      <div class="row">
          @foreach($userLevels as $level => $count)
              <div class="col-6 col-md-4">
                  <div class="card mb-3">
                      <div class="card-body">
                          <h6 class="card-title">
                            <i class="fa-solid fa-user mr-2"></i>{{ $level }}</h6>
                          <p class="card-text">{{ $count }}</p>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between">
          <h4 class="card-title mb-3">Transaksi Terbaru</h4>
        </div>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              @foreach($transaksi as $index => $t)
              <tr>
                <td>
                  <div class="d-flex">
                    <div class="mr-5">{{ $index + 1 }}</div>
                    <div>
                      <div>Customer</div>
                      <div class="font-weight-bold mt-1">{{$t ->customer->nama}}</div>
                    </div>
                  </div>
                </td>
                <td>
                  Harga
                  <div class="font-weight-bold  mt-1">Rp. {{number_format($t->total)}}</div>
                </td>
                <td>
                  Status
                  <div class="font-weight-bold text-success  mt-1">{{$t -> status}} </div>
                </td>
                <td>
                  Tanggal
                  <div class="font-weight-bold  mt-1">{{ $t->created_at->format('d M Y H:i') }}</div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Outlet</h5>
        <div class="card p-4">
          <p>Jumlah Outlet : {{ $outlet }}</p>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
  
  {{-- Required JS Tags --}}
  @include('sweetalert::alert')
@endsection

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xU+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script>

  <script>
    @if (Session::has('success'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
    toastr.success("{{ Session::get('success') }}")
    @endif
  </script>