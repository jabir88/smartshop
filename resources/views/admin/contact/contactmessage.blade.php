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
                                            <th>Caontact Name</th>
                                            <th>Contact Email</th>
                                            <th style="width:20%;">Message</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = 1; ?>
                                        @foreach($all_mess as $mess_data)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td><?= $mess_data['conus_name']?></td>
                                            <td><?= $mess_data['conus_email']?></td>
                                            <td><?= $mess_data['conus_mess']?></td>

                                            <td>
                                              <a href="{{url('admin/contact-message/mark/'.$mess_data['conus_id'])}}" style=" padding:5px ; color: #fff ; text-align: center; background: #58CCED; ">
                                                <i class="glyphicon glyphicon-ok  " > </i>
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
