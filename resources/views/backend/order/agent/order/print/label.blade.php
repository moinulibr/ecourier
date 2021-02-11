<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice | Clubsbasic</title>
  <!--favicon-->
  <link rel="shortcut icon" type="image/x-icon" href="img/LOGO%20Asset%2013ldpi.png">
  <style>
    /* page */
    html {
      font: 18px/1 'Open Sans', sans-serif;
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

    @media print {

      * {
        -webkit-print-color-adjust: exact;
      }

      html {
        background: none;
        padding: 0;
      }

      body {
        box-shadow: none;
        margin: 0;
      }

    }

    @page {
      margin: 0 auto;
    }

    /* custom css */
    .printlabel{
      width: 6in;
      margin: 0 auto;
    }
    .inv_head{
      text-align: center;
      text-transform: capitalize;
    }
    .inv_head h1{
      font-size: 50px;
      margin: 0;
    }
    .inv_head img{
      height: 100px;
    }
    .inv_head .barcode-bottom{
      margin: 0;
      letter-spacing: 3px;
    }
    .inv_itely{
      font-style: italic;
    }
    .inv-body{
      text-transform: capitalize;
    }
    .inv_border{
      border-bottom: 1px solid #000;
    }
    .mar_left{
      margin-left: 40px;
    }
    .pad_top{
      margin-top: 5px;
    }
    .footer{
      text-align: center;
      margin-top: 80px;
      letter-spacing: 1px;
      font-size: 16px;
    }
    /* custom css end */

    /* header */
  </style>
</head>

<body>
  <div class="printlabel">
  <div class="inv_head">
    <img src="{{ asset($setting->logo) }}" alt=""  style="width: 40px;height: 40px;">
    <h4>{{ $setting->company_name }}</h4>
    <h1>{{ $order->customer->district->bn_name }}</h1>
    <P>{{ $order->creatingAreas->area_name }} to  {{ $order->destinationAreas->area_name }} </P>
    <!--<img src="barcode2.PNG" alt="barcode">-->
   <center> {!! DNS1D::getBarcodeHTML($order->invoice_no, "C128",1.4,22) !!} </center>
    <p class="barcode-bottom"></p>
    <h3>{{ $order->invoice_no }}</h3>
  </div>
  <div class="inv-body">
    <h4>Ref :-</h4>
    <span class="inv_itely inv_border">item details</span>
    <p class="pad_top">{{ $order->orderDescriptions?$order->orderDescriptions->parcel_description:'' }}</p>

    <p>Receiver  <span class="mar_left">{{ $order->customer?$order->customer->customer_name:'' }}</span> </p>
    <span class="inv_itely inv_border">Contact :  </span> {{ $order->customer?$order->customer->customer_phone:'' }} <br>
    <span class="inv_itely inv_border">address: </span> {{ $order->customer?$order->customer->address:'' }}
    <p class="pad_top">{{ $order->destinationAreas->area_name }}</p>
  </div>
  <div class="footer">
    <p><span>{{ $order->created_at->format('D-m-Y') }}</span> <span class="mar_left">{{ Auth::guard('web')->user()->name }}</span> </p>
  </div>
  </div>
</body>

</html>
