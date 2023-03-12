<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <a href="{{ URL::previous() }}" class="btn btn-outline-danger m-3">Go Back</a>
    <div class="textnya mt-5 text-center mb-3">
        <h1>Laporan Transaksi Harian LaundryInWeb</h1>
        <p >Jalan 145 Anam-ro, Seongbuk-gu, Seoul, Korea Selatan</p>
    </div>
    @if(count($laporan) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="fw-bold text-center">No</th>
                <th scope="col" class="fw-bold text-center">Outlet</th>
                <th scope="col" class="fw-bold text-center">Customer</th>
                <th scope="col" class="fw-bold text-center">Paket Laundry</th>
                <th scope="col" class="fw-bold text-center">Berat</th>
                <th scope="col" class="fw-bold text-center">Harga</th>
                <th scope="col" class="fw-bold text-center">Status</th>
                <th scope="col" class="fw-bold text-center">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach($laporan as $idx)
                <tr scope="row">
                    <td class="fw-semibold text-center fs-6">{{$no++}}</td>
                    <td class="text-center fs-6">{{$idx->nama_outlet}}</td>
                    <td class="text-center fs-6">{{$idx->nama_customer}}</td>
                    <td class="text-center fs-6">{{$idx->jenis}}</td>
                    <td class="text-center fs-6">{{$idx->berat}}</td>
                    <td class="text-center fs-6">Rp. {{number_format($idx->harga)}}</td>
                    <td class="text-center fs-6">{{$idx -> status}}</td>
                    <td class="text-center fs-6">Rp. {{number_format($idx->total)}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-center text-danger">Tidak ada data untuk tanggal yang dipilih.</p>
@endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>