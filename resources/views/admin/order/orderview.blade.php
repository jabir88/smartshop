@extends('admin.adminmaster')
@section('myContent')

<div id="page-wrapper">
    <div class="row">
      <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Customer Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Customer Name</th>
                                            <th>Mobile Number</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>

                                            <td>{{$Customer_details->customer_firstname." ".$Customer_details->customer_lastname}}</td>
                                            <td>{{$Customer_details->customer_phone}}</td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
      <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Shipping Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Shipping Name</th>
                                            <th>Mobile</th>
                                            <th>Shipping Address</th>
                                            <th>Email</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>{{$Customer_details->shipping_fullname}}</td>
                                            <td>{{$Customer_details->shipping_phone}}</td>
                                            <td>{{$Customer_details->shipping_address}}</td>
                                            <td>{{$Customer_details->shipping_email}}</td>
                                          </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_text">
                        <i class="fa fa-th"></i> Order Details
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="allTable" class="table table-bordered table-striped table-hover customize_table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Sale's Quantity</th>
                                <th>Subtotal</th>

                            </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;?>
                          @foreach($order_details as $order_detail)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$order_detail->product_name}}</td>
                        <td>{{number_format($order_detail->product_price)}}</td>
                        <td>{{$order_detail->product_sales_quantity}}</td>
                        <td>{{$order_detail->product_price*$order_detail->product_sales_quantity}}</td>
                      </tr>
                        <?php $i++; ?>
                      @endforeach
                        <tr>
                          <td colspan="4">Total :</td>
                          <td>{{$order_detail->order_total}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{url('admin/order/invoice/'.$Customer_details->order_id)}}" class="btn btn-info btn-sm">Invpice</a>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
