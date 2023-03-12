<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <style>
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title d-flex justify-content-between">
    			<h2>Invoice LaundryInWeb</h2><h3 class="pull-right">Order # {{$transaksi ->id}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
                    {{$transaksi ->customer->nama}}<br>
                    {{$transaksi ->customer->alamat}}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
                    {{$transaksi ->user->nama}}<br>
    					1234 Main<br>
    					Apt. 4B<br>
    					Springfield, ST 54321
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Tunai<br>
    					{{$transaksi ->user->notelp}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{$transaksi ->created_at}}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Outlet</strong></td>
        							<td class="text-center"><strong>Customer</strong></td>
        							<td class="text-center"><strong>Jenis Paket Laundry</strong></td>
        							<td class="text-right"><strong>Berat</strong></td>
        							<td class="text-right"><strong>Biaya Tambahan</strong></td>
        							<td class="text-right"><strong>Diskon</strong></td>
        							<td class="text-right"><strong>Status</strong></td>
        							<td class="text-right"><strong>Dibayar</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td>{{$transaksi ->outlet->nama}}</td>
    								<td class="text-center">{{$transaksi ->customer->nama}}</td>
    								<td class="text-center">{{$transaksi ->paketlaundry->jenis}}</td>
    								<td class="text-right">{{$transaksi ->berat}}</td>
                                    <td class="text-right">Rp. {{number_format($transaksi ->biaya_tambahan)}}</td>
                                    <td class="text-right">{{$transaksi ->diskon}}%</td>
                                    <td class="text-right">{{$transaksi ->status}}</td>
                                    <td class="text-right">{{$transaksi ->dibayar}}</td>
                                    <td class="text-right">Rp. {{number_format($transaksi ->total)}}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>