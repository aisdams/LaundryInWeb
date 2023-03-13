@extends('layout')
@section('content')
  @push('style')
  <link rel="stylesheet" href={{ asset('css/customer.css') }}>
  @endpush

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h2>Tabel Data Transaksi</h2>
          <a href="{{url ('transaksi/create')}}" class="tbl-btn button btn-primary p-2 rounded-2">Add New Transaksi</a>
        </div>
        <hr class="border-dark my-4">
        <div class="table-responsive">
          <table class="table table-hover table-striped border rounded-1 table-sm" id="transaksi">
            <thead>
              <tr>
                <th class="fw-bold text-center" style="font-size: 15px">No</th>
                <th class="fw-bold text-center" style="font-size: 15px">Outlet</th>
                <th class="fw-bold text-center" style="font-size: 15px">Customer</th>
                <th class="fw-bold text-center" style="font-size: 15px">Paket Laundry</th>
                <th class="fw-bold text-center" style="font-size: 15px">Nama Penginput</th>
                <th class="fw-bold text-center" style="font-size: 15px">Status</th>
                <th class="fw-bold text-center" style="font-size: 15px">Keterangan</th>
                <th class="fw-bold text-center" style="font-size: 15px">diskon</th>
                <th class="fw-bold text-center" style="font-size: 15px">Total</th>
                <th class="fw-bold text-center" style="font-size: 15px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($transaksi as $t)
                <tr>
                    <td class="fw-semibold text-center fs-6">{{ $loop->iteration }}</td>
                    <td class="text-center fs-6">{{$t ->outlet->nama}}</td>
                    <td class="text-center fs-6">{{$t ->customer->nama}}</td>
                    <td class="text-center fs-6">{{$t ->paketlaundry->jenis}}{{$t ->paketlaundry->harga}}</td>
                    <td class="text-center fs-6">{{$t ->user->nama}}</td>
                    <td>
                      {{$t->status}}
                      <!-- Modal Edit Status -->
                            <div class="modal fade" id="editStatusModal{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="editStatusModalLabel{{$t->id}}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="editStatusModalLabel{{$t->id}}">Edit Status Transaksi</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="{{ route('transaksi.update', $t->id) }}" method="POST">
                                              @csrf
                                              @method('PUT')
                                              <div class="form-group">
                                                  <label for="status">Status</label>
                                                  <select name="status" class="form-control">
                                                      <option value="proses" {{ $t->status == "proses" ? "selected" : "" }}>proses</option>
                                                      <option value="selesai" {{ $t->status == "selesai" ? "selected" : "" }}>selesai</option>
                                                  </select>
                                              </div>
                                              <button type="submit" class="btn btn-primary">Ubah</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                    </td>
                    <td class="text-center fs-6">{{$t -> keterangan}}</td>
                    <td class="text-center fs-6">{{$t -> diskon}}%</td>
                    <td class="text-center fs-6">Rp. {{number_format($t->total)}}</td>
                    <td class="text-center fs-6 dropdown">
                      <button type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" class="btn btn-secondary dropdown-toggle" aria-expanded="false" style="background-color: transparent;border: none;position: relative !important;"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="position: absolute; box-shadow: rgba(66, 12, 214, 0.4) 5px 5px">
                    {{-- Button Action --}}
                      <button type="button"  class="dropdown-item mb-1" style="background: none;border: none;font-size: 14px" data-toggle="modal" data-target="#editStatusModal{{$t->id}}">
                        <i class="mr-2 fa-solid fa-pen-to-square text-warning"></i>
                        Edit
                    </button>
                      <a class="dropdown-item mb-1" href="{{ url('/transaksi/detail/'.$t->id)}}" style="font-size: 14px"><i
                        class="mr-2 fas fa-eye text-success"></i>Detail</a>
                      <form action="{{ url('paket-laundry',$t->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="dropdown-item delete" data-name="{{ $t->nama }}"  style="background-color: transparent;border: none;font-size: 14px"><i class="mr-2 fa-solid fa-trash text-danger"></i>Delete</button>
                    </form>
                    {{-- End Button Action --}}
                    </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  
  {{-- Required JS Tags --}}
  @include('sweetalert::alert')

  @endsection
  
@push('scripts')
<script>
// Ambil elemen HTML yang dibutuhkan
const editBtns = document.querySelectorAll('.edit-btn');
const editOptionsList = document.querySelectorAll('.edit-options');
const updateBtns = document.querySelectorAll('.update-btn');
// Sembunyikan opsi edit saat halaman dimuat
editOptionsList.forEach(editOptions => editOptions.style.display = 'none');
// Tambahkan event listener pada semua tombol edit
editBtns.forEach((editBtn, index) => {
  const editOptions = editOptionsList[index];
  const updateBtn = updateBtns[index];
  const statusText = editBtn.previousElementSibling;
  editBtn.addEventListener('click', function() {
    // Tampilkan opsi edit jika sebelumnya disembunyikan, atau sebaliknya
    if (editOptions.style.display === 'none') {
      editOptions.style.display = 'block';
    } else {
      editOptions.style.display = 'none';
    }
  });
  updateBtn.addEventListener('click', function() {
    // Ambil nilai radio button yang dipilih
    const status = editOptions.querySelector('input[name="status"]:checked').value;
    // Kirim permintaan update status ke server
    const id = statusText.parentNode.dataset.id;
    fetch(`/update-status/${id}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({status: status})
    })
    .then(response => response.json())
    .then(data => {
      // Tampilkan kembali teks status dengan nilai yang baru
      statusText.textContent = data.status;
      // Sembunyikan opsi edit
      editOptions.style.display = 'none';
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
});
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xU+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
            
  $('.delete').click(function(event) {
  var form =  $(this).closest("form");
  var name = $(this).data("name");
  event.preventDefault();
  swal({
      title: `Are you sure you want to delete ${name}?`,
      text: "If you delete this, it will be gone forever.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      form.submit();
      swal("Data berhasil di hapus", {
            icon: "success",
            });
    }else 
    {
      swal("Data tidak jadi dihapus");
    }
  });
});
</script>

<script>
  $(function () {
      $('#transaksi').DataTable().fnDestroy({
          columnDefs: [{
              paging: true,
              scrollX: true,
              lengthChange: true,
              searching: true,
              ordering: true,
              targets: [1, 2, 3, 4],
          }, ],
      });
      $('button').click(function () {
          var data = table.$('input, select', 'button', 'form').serialize();
          return false;
      });
      table.columns().iterator('column', function (ctx, idx) {
          $(table.column(idx).header()).prepend('<span class="sort-icon"/>');
      });
  });
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

<script>
  @if (Session::has('destroy'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
  toastr.success("{{ Session::get('destroy') }}")
  @endif
</script>

@endpush