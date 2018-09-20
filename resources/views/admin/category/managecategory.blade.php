@extends('admin.adminmaster')
@section('myContent')
<hr/>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-10">
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
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>Publish Status</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = 1; ?>
                                        @foreach($all_categories as $cate_data)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$cate_data['category_name']}}</td>
                                            <td>{{str_limit($cate_data['category_des'],30)}}</td>
                                            <td>{{ $cate_data['pub_status'] == 1 ? 'Published' :'Unpublished' }}</td>
                                            <td>
                                              <a href="{{url('admin/category/view/'.$cate_data['id'])}}" style=" padding:5px ; color: #fff ; text-align: center; background: #30AD23; margin-left : 10px;">
                                                <i class="fa fa-eye  fa-fw " > </i>
                                              </a>
                                              <a href="{{url('admin/category/edit/'.$cate_data['id'])}}" style=" padding:5px ; color: #fff ; text-align: center; background: #58CCED; margin-left : 10px;">
                                                <i class="fa fa-edit fa-fw " > </i>
                                              </a>
                                              <a href="{{url('admin/category/delete/'.$cate_data['id'])}}" style=" padding:5px ; color: #fff; text-align: center; background: #FF1109; margin-left : 10px;">
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
