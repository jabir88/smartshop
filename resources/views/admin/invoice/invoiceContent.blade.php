<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admins/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('admins/')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('admins/')}}/dist/css/invoice.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('admins/')}}/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('admins/')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <div id="invoiceholder">

    <div id="headerimage"></div>
    <div id="invoice" class="effect2">

      <div id="invoice-top">
        <div class="logo">
          <img src="{{asset('front/images/logo3.jpg')}}" alt="">
        </div>

        <div class="title">
          <h1>Invoice #1069</h1>
          <p>Issued: May 27, 2015</br>
             Payment Due: June 27, 2015
          </p>
        </div><!--End Title-->
      </div><!--End InvoiceTop-->



      <div id="invoice-mid">

        <div class="clientlogo"></div>
        <div class="info">
          <h2>{{$Customer_details->customer_firstname.$Customer_details->customer_lastname}}</h2>
          <p>{{$Customer_details->customer_email}}</br>
             {{$Customer_details->customer_phone}}</br>
        </div>

        <div id="project">
          <h2>Project Description</h2>
          <p>Proin cursus, dui non tincidunt elementum, tortor ex feugiat enim, at elementum enim quam vel purus. Curabitur semper malesuada urna ut suscipit.</p>
        </div>

      </div><!--End Invoice Mid-->

      <div id="invoice-bot">
        <div id="table">
          <table>
            <tr class="tabletitle">
              <td>No.</td>
              <td>Product Name</td>
              <td>Product Price</td>
              <td>Product Sale's Quantity</td>
              <td>Subtotal</td>
            </tr>
            <?php $i=1;?>
  @foreach($order_details as $order_detail)
            <tr class="service">

                <td>{{$i}}</td>
                <td>{{$order_detail->product_name}}</td>
                <td>{{number_format($order_detail->product_price)}}</td>
                <td>{{$order_detail->product_sales_quantity}}</td>
                <td>{{$order_detail->product_price*$order_detail->product_sales_quantity}}</td>
            </tr>  <?php $i++; ?>
@endforeach
            <tr class="tabletitle">
              <td></td>
              <td></td>
              <td></td>
              <td class="Rate"><h2>Total</h2></td>
              <td class="payment"><h2>{{$order_detail->order_total}} TK</h2></td>
            </tr>

          </table>
        </div><!--End Table-->

      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="QRZ7QTM9XRPJ6">
        <input type="image" src="http://michaeltruong.ca/images/paypal.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
      </form>


        <div id="legalcopy">
          <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.
          </p>
        </div>

      </div><!--End InvoiceBot-->

    </div><!--End Invoice-->
    <div class="">
      <a href="{{url('admin/order/view/'.$Customer_details->order_id)}}">Back </a>
    </div>
  </div><!-- End Invoice Holder-->

</body>
</html>
