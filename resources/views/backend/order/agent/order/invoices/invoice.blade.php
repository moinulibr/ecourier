<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Parcel Invoice</title>
	<!--favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="img/LOGO%20Asset%2013ldpi.png">
	<style>
		/* page */

		html {
			font: 14px/1 'Open Sans', sans-serif;
			overflow: auto;
			margin: 10px 0 0 0;
			background: #999;
			cursor: default;
		} 

		body {
			box-sizing: border-box;
			margin: 0 auto;
			overflow: hidden;
			padding: 0.5in;
			width: 8.5in;
			background: #FFF;
			border-radius: 1px;
			box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
		}

		.row {
			display: flex;

		}

		/* header */
		.full-table table {
			width: 100%;
			border-collapse: collapse;
		}

		.full-table table,
		td {
			border: 1px solid #000;
		}

		/*		row 1*/
		.row1-left {
			width: 20%;
			float: left;
		}

		.row2-right {
			width: 80%;
			float: left;
		}

		/*		row 2*/
		.row2-left {
			width: 20%;
		}

		.row2-midle {
			width: 66%;
		}

		.row2-right {
			width: 14%;
		}

		/*		row 3*/
		.row3-right-left {
			width: 50%;
			float: left;
		}

		.row-right-right {
			width: 50%;
			float: left;
		}

		.space {
			content: "";
			height: 25px;
		}

		.center {
			text-align: center;
		}

		.full-table table tr td img {
			padding: 8px 0;
		}

		.full-table table tr td p {
			padding: 0;
			padding-left: 8px;
			line-height: 6px;
		}

	</style>
</head>

<body>

	<div class="full-table">
		<table>
			<tr>
				<td colspan="5">
					<div class="row">
						<div class="row1-left">
							<p><b>MERCHANT</b></p>
						</div>
						<div class="row1-right">
							<p><b>   {{ $order->merchantshop?$order->merchantshop->shop_name: '' }}</b></p>
							<P>   {{ $order->merchantshop?$order->merchantshop->pickup_address: '' }} , {{ $order->area?$order->area->area_name: '' }}  </P>
							<P><b>  {{ $order->merchantshop?$order->merchantshop->pickup_phone: '' }} </b></P>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="5">
					<div class="row">
						<div class="row2-left">
							<p><b>CUSTOMER:</b></p>
						</div>
						<div class="row2-midle">
  							<p><b>{{ $order->customer?$order->customer->customer_name: '' }}</b></p>
							<p> {{ $order->customer?$order->customer->address: '' }}  </p>
							<p><b>{{ $order->customer?$order->customer->customer_phone: '' }}</b></p>
						</div>
						<div class="row2-right">
							<p><b>TK. {{ $order->collect_amount }}</b></p>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p><b>INVOICE#:</b> {{ $order->invoice_no }}</p>
				</td>
				<td colspan="3">
					<div class="row3-right-left">
						<p><b>AREA:</b>  {{ $order->customer->area?$order->customer->area->area_name: '' }}</p>
						<p> {{ $order->customer->district?$order->customer->district->name: '' }}</p>
					</div>
					<div class="row3-right-right">
						<p><b>HUB:</b> {{ $order->destinationBranchs->company_name }}</p>
					</div>
				</td>
			</tr>
			<tr>
				<td class="space" colspan="5"></td>
			</tr>
			<tr>
				<td rowspan="2" class="center">
					 
					 <img src="{{ asset("public/qrcodes/qr_".$order->invoice_no.".svg") }}" alt="">
				</td>
				<td colspan="4" class="center">
					    <span style="padding-left: 10px"> {!! DNS1D::getBarcodeHTML($order->invoice_no, "C128",4.4,22) !!}  </span>
						<p class="pid">{{$order->invoice_no}}</p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p><b>PARCEL ID:</b> {{ $order->invoice_no }}</p>
				</td>
				<td colspan="2">
					<p><b>PARCEL CREATED:</b> {{ $order->created_at->format('Y-m-d H:i') }}</p>
				</td>
			</tr>
		</table>
	</div>

</body>

</html>
