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
      margin: 0;
    }

    /* custom css */

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
  <div class="inv_head">
    <h1>বারিশাল</h1>
    <P>banasree, dhaka to barishal(BSL)</P>
    <!--<img src="barcode2.PNG" alt="barcode">-->
    {!! DNS1D::getBarcodeHTML($order->invoice_no, "C128",1.4,22) !!}
    <p class="barcode-bottom">03758926170642</p>
    <h1>03758926170642/1</h1>
  </div>
  <div class="inv-body">
    <h4>ref :-</h4>
    <span class="inv_itely inv_border">item details</span>
    <p class="pad_top">1 ctn cap</p>

    <p>receiver  <span class="mar_left">md mirez</span> </p>
    <span class="inv_itely inv_border">address</span>
    <p class="pad_top">barishal</p>
  </div>
  <div class="footer">
    <p><span>30-nav-2021</span><span class="mar_left">1:24:37</span><span class="mar_left">pm(narayan_bsr_p)</span> </p>
  </div>
</body>

</html>
