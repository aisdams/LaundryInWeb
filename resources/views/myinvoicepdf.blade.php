<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        
    <style>
        #fasilitashotel {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
    
        #fasilitashotel td, #fasilitashotel th {
            border: 1px solid #ddd;
            padding: 8px;
        }
    
        #fasilitashotel tr:nth-child(even){background-color: #f2f2f2;}
    
        #fasilitashotel tr:hover {background-color: #ddd;}
    
        #fasilitashotel th {
            text-align: center;
            background-color: #65e08ae5;
            color: white;
        }
        *{
            font-size: 12px;
        }
    </style>
</head>
<body>
    <center>
    <h2>Rekap Data Pemesanan</h2>
    </center>
    <table id="fasilitashotel" class="table table-sm" width="100%" style="position:relative;right: 2.8rem;">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Hotel</th>
            <th>Jumlah Orang</th>
            <th>Jumlah Room Use</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Room Type</th>
            <th>Spesial Request</th>
            <th>Tanggal CheckIn</th>
            <th>Tanggal CheckOut</th>
        </tr>
        </thead>
        @php
          $no=1;
      @endphp
            <tbody>
            <tr>
                <td>{{ $no++}}</td>
                <td>{{$transaksi ->outlet->nama}}</td> 
                <td>{{$transaksi ->customer->nama}}</td>
                <td>{{$transaksi ->paketlaundry->jenis}}</td>
                <td>{{$transaksi ->user->nama}}</td>
                <td>{{ $transaksi->kode_invoice }}</td>
                <td>{{ $transaksi->berat }}</td>
                <td>{{ $transaksi->tgl_bayar }}</td>
                <td>{{ $transaksi->biaya_tambahan }}</td>
                <td>{{ $transaksi->status }}</td>
                <td>{{ $transaksi->dibayar }}</td>
                <td>{{ $transaksi->diskon }}</td>
                <td>{{ $transaksi->total }}</td>
            </tr>
            </tbody>
    
    </table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>