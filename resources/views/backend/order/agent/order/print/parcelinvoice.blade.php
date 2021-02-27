<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Print Invoice</title>
	<!--favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="img/LOGO%20Asset%2013ldpi.png">
	<style>
		/* page */
		
		* {
			box-sizing: border-box;
		}

		html {
			font: 14px/1 'Open Sans', sans-serif;
			overflow: auto;
			padding: 0.5in;
			background: #999;
			cursor: default;
		}

		body {
			box-sizing: border-box;
			height: 11in;
			margin: 0 auto;
			overflow: hidden;
			padding: 0.5in;
			width: 8.5in;
			background: #FFF;
			border-radius: 1px;
			box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
		}

		.header {
			display: flex;
			border-bottom: 2px solid red;
		}

		.header_left {
			width: 10%;
			float: left;
		}

		.header_left img {
			width: 85%;
		}

		.header_middle {
			width: 80%;
			float: left;
			text-align: center;
		}

		.header_middle p {
			line-height: 2px;
		}

		.header_right {
			width: 10%;
			float: left;
		}

		.barcodeaddress {
			display: flex;
			padding-top: 8px;
		}

		.barcodeleft {
			width: 50%;
			float: left;
		}

		.barcoderight {
			width: 50%;
			float: left;
		}

		.address_left {
			float: left;
			width: 50%;
		}

		.address_left table tr th {
			text-align: left;
			color: red;
			padding: 5px 0px;
		}

		.address_left table tr td {
			text-transform: uppercase;
		}

		.address_right {
			float: left;
			width: 50%;
		}

		.address_right table tr th {
			text-align: left;
			color: red;
			padding: 5px 0px;
		}

		.address_right table tr td {
			text-transform: uppercase;
		}

		.product table tr th {
			color: red;
			font-size: 14px;
			padding: 4px;
		}

		.product table {
			width: 100%;
			border-collapse: collapse;
		}

		.product table th,
		.product td {
			border: 1px solid red;
		}

		.product table tr td {
			text-align: center;
			padding: 5px;
		}

		.parceladdress {
			margin-bottom: 10px;
			overflow: hidden;
		}

		.author {}

		.author_name {
			float: left;
			width: 20%;
		}

		.order_date {
			width: 22%;
			float: right;
			text-align: center;
		}

		.order_date p {}

		.order_date h5 {
		}

		.before::before {
			content: "";
			height: 2px;
			width: 100px;
			display: block;
			background: red;
			margin-bottom: 8px !important;
			margin: 0 auto;
		}

		.before2::before {
			content: "";
			height: 2px;
			width: 100px;
			display: block;
			background: red;
			margin-bottom: 8px !important;
			margin: 0 auto;
		}

		.center {
			text-align: left;
			text-align: center;
		}

		.margin {
			margin: 3px;
		}

		.color {
			color: red;
		}

		.colorg {
			color:#3ab0d4;
		}
		
		@media print {

            * {
                -webkit-print-color-adjust: exact;
            }

            html {
                background: none;
                padding: 0;
            }

            body {
            	padding-top: 20px;
                box-shadow: none;
                margin: 0 auto;

            }

        }

        @page {
            margin: 0 auto;
        }

	</style>
</head>

<body>

	<div style="height:450px;">
	<section class="header">
		<div class="header_left">
			<img src="{{ asset($setting->logo) }}" alt="">
		</div>
		<div class="header_middle">
			<h1 style="margin: 0" class="color"><b>{{ $setting->company_name }}</b></h1>
			<p class="color"> <b>Head Office :</b> {{ $setting->address }} , <b> Phone :</b> {{ $setting->phone }} </p>
			<p class="color"><b class="colorg">Hotline : {{ $setting->hotlinenumber }} ,</b> {{ $setting->website }} </p>
		</div>
		<div class="header_right">
			<p class="color" style="text-align: center;"><b>Office Copy</b></p>
		</div>
	</section>

	<section class="barcodeaddress">
		<div class="barcodeleft">
			<img src="qr2.JPG" alt="" width="300">
 				 {!! DNS1D::getBarcodeHTML($order->invoice_no, "C128",1.4,22) !!}
 				<p class="pid" style="font-weight: bold;    margin: 4px 0;margin-bottom: 11px;"> {{$order->invoice_no}}</p>
		</div>
		<div class="barcoderight">
			<p style="margin-top: 7px"><b>Destination Area : {{ $order->destinationAreas?$order->destinationAreas->area_name:null }}</b></p>
		</div>
	</section>

	<section class="parceladdress">
		<div class="address_left">
			<table>
				<tr>
					<th>Form</th>
					<td>:</td>
					<td>{{ $order->generalCustomer?$order->generalCustomer->name:null }}</td>
				</tr>
				<tr>
					<th>Address</th>
					<td>:</td>
					<td>{{ $order->generalCustomer?$order->generalCustomer->address:null }}</td>
				</tr>
				<tr>
					<th>Phone</th>
					<td>:</td>
					<td>{{ $order->generalCustomer?$order->generalCustomer->phone:null }}</td>
				</tr>

			</table>
		</div>
		<div class="address_right">
			<table>
				<tr>
					<th>To</th>
					<td>:</td>
					<td>{{ $order->customer?$order->customer->customer_name:null }}</td>
				</tr>
				<tr>
					<th>Address</th>
					<td>:</td>
					<td>{{ $order->customer?$order->customer->address:null }}</td>
				</tr>
				<tr>
					<th>Phone</th>
					<td>:</td>
					<td>{{ $order->customer?$order->customer->customer_phone:null }}</td>
				</tr>

			</table>

		</div>
	</section>
	<section class="product">
		<table>
			<tr style="background: #ff00001f;">
				<th>QTY</th>
				<th width="50%">Description</th>
				<th>Amount</th>
				<th>Total</th>
			</tr>
			<tr>
				<td>01</td>
				<td> </td>
				<td style="font-size: 15px; font-weight: bold;">Cash</td>
				<td>
					{{ $order->service_charge + $order->cod_charge }} <br>
					( {{ $order->service_charge  }} + {{ $order->cod_charge }} )
				</td>
			</tr>
		</table>
		<div>
			<p style="margin-bottom: 0; padding-bottom: 15px;"><b class="color">In Word : </b> ............................</p>
		</div>
	</section>


	<section class="author" style="margin-top: 15px;">
		<div class="author_name center">
			 <p class="margin">{{ Auth::guard('web')->user()->name }}</p>
			<h5 class="before margin color" style="font-size: 15px;">Booking Offier</h5>
		</div>
		<div class="order_date">
			<p class="margin">{{ $order->created_at->format('D-m-Y') }}</p>
			<h5 class="before2 margin color" style="font-size: 15px;">Date</h5>
		</div>
	</section>
	</div>


	 <hr>




	<div style="height:450px;">
	<section class="header">
		<div class="header_left">
			<img src="{{ asset($setting->logo) }}" alt="">
		</div>
		<div class="header_middle">
			<h1 style="margin: 0" class="color"><b>{{ $setting->company_name }}</b></h1>
			<p class="color"> <b>Head Office :</b> {{ $setting->address }} , <b> Phone :</b> {{ $setting->phone }} </p>
			<p class="color"><b class="colorg">Hotline : {{ $setting->hotlinenumber }} ,</b> {{ $setting->website }} </p>
		</div>
		<div class="header_right">
			<p class="color" style="text-align: center;"><b>Customer Copy</b></p>
		</div>
	</section>

	<section class="barcodeaddress">
		<div class="barcodeleft">
			<img src="qr2.JPG" alt="" width="300">
 				 {!! DNS1D::getBarcodeHTML($order->invoice_no, "C128",1.4,22) !!}
 				<p class="pid" style="font-weight: bold;    margin: 4px 0;margin-bottom: 11px;"> {{$order->invoice_no}}</p>
		</div>
		<div class="barcoderight">
			<p style="margin-top: 7px"><b>Destination Area : {{ $order->destinationAreas?$order->destinationAreas->area_name:null }}</b></p>
		</div>
	</section>

	<section class="parceladdress">
		<div class="address_left">
			<table>
				<tr>
					<th>Form</th>
					<td>:</td>
					<td>{{ $order->generalCustomer?$order->generalCustomer->name:null }}</td>
				</tr>
				<tr>
					<th>Address</th>
					<td>:</td>
					<td>{{ $order->generalCustomer?$order->generalCustomer->address:null }}</td>
				</tr>
				<tr>
					<th>Phone</th>
					<td>:</td>
					<td>{{ $order->generalCustomer?$order->generalCustomer->phone:null }}</td>
				</tr>

			</table>
		</div>
		<div class="address_right">
			<table>
				<tr>
					<th>To</th>
					<td>:</td>
					<td>{{ $order->customer?$order->customer->customer_name:null }}</td>
				</tr>
				<tr>
					<th>Address</th>
					<td>:</td>
					<td>{{ $order->customer?$order->customer->address:null }}</td>
				</tr>
				<tr>
					<th>Phone</th>
					<td>:</td>
					<td>{{ $order->customer?$order->customer->customer_phone:null }}</td>
				</tr>

			</table>

		</div>
	</section>
	<section class="product">
		<table>
			<tr style="background: #ff00001f;">
				<th>QTY</th>
				<th width="50%">Description</th>
				<th>Amount</th>
				<th>Total</th>
			</tr>
			<tr>
				<td>01</td>
				<td> </td>
				<td style="font-size: 15px; font-weight: bold;">Cash</td>
				<td>
					{{ $order->service_charge + $order->cod_charge }} <br>
					( {{ $order->service_charge  }} + {{ $order->cod_charge }} )
				</td>
			</tr>
		</table>
		<div>
			<p style="margin-bottom: 0; padding-bottom: 15px;"><b class="color">In Word : </b> ............................</p>
		</div>
	</section>


	<section class="author" style="margin-top: 15px;">
		<div class="author_name center">
			 <p class="margin">{{ Auth::guard('web')->user()->name }}</p>
			<h5 class="before margin color" style="font-size: 15px;">Booking Offier</h5>
		</div>
		<div class="order_date">
			<p class="margin">{{ $order->created_at->format('D-m-Y') }}</p>
			<h5 class="before2 margin color" style="font-size: 15px;">Date</h5>
		</div>
	</section>
	</div>





</body>

</html>
















