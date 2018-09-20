@extends('admin.adminmaster')
@section('myContent')

<div id="page-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_text">
                        <i class="fa fa-th"></i> All Orders
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('admin/manufacturer/add')}}" class="btn btn-dark btn-sm card_button"><i class="fa fa-plus-circle"></i> Add Manufacturer</a>
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
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;?>
                          @foreach($orders as $data)
                          <tr>

                              <td>{{$i}}  </td>
                              <td>{{$data->customer_firstname}}</td>
                              <td>{{number_format($data->order_total)}}</td>
                              <td>
                                @if($data->order_status == 'pending')
                                <button type="button" class="btn btn-warning btn-xs">Pending</button>
                                @else
                                <button type="button" class="btn btn-success btn-xs">Success</button>

                                @endif
                              </td>
                              <td>
                                <a href="{{url('admin/order/done/'.$data->order_id)}}"><i class="fa fa-pencil-square"></i></a>
                                <a href="{{url('admin/order/view/'.$data->order_id)}}"><i class="fa fa-plus-square"></i></a>
                                <a href="{{url('admin/order/delete/'.$data->order_id)}}"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>

                                                            <?php $i++; ?>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-info btn-sm">Print</a>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
