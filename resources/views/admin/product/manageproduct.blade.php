@extends('admin.adminmaster')
@section('myContent')
<hr/>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                              Manage Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Category Name</th>
                                            <th>Manufacturer Name</th>
                                            <th>Product Price</th>
                                            <th>Product Quantity</th>
                                            <th>Publish Status</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = 1; ?>
                                        @foreach($pro as $products)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{ $products->product_name}}</td>
                                            <td>{{ $products->category_name}}</td>
                                            <td>{{ $products->manu_name}}</td>
                                            <td>{{ $products->product_price}}</td>
                                            <td>{{ $products->product_quantity}}</td>
                                            <td>{{ $products->pub_status == 1 ? 'Published' :'Unpublished' }}</td>
                                            <td>
                                              <a href="{{url('admin/product/view/'.$products->pro_id)}}" style=" padding:5px ; color: #fff ; text-align: center; background: #30AD23; margin-left : 10px;">
                                                <i class="fa fa-eye  fa-fw " > </i>
                                              </a>
                                              <a href="{{url('admin/product/edit/'.$products->pro_id)}}" style=" padding:5px ; color: #fff ; text-align: center; background: #58CCED; margin-left : 10px;">
                                                <i class="fa fa-edit fa-fw " > </i>
                                              </a>
                                              <a href="{{url('admin/product/delete/'.$products->pro_id)}}" style=" padding:5px ; color: #fff; text-align: center; background: #FF1109; margin-left : 10px;">
                                                <i class="glyphicon glyphicon-remove" > </i>
                                              </a>
                                            </td>

                                        </tr>
                                          <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                </div>
                </div>
@endsection
