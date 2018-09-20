@extends('admin.adminmaster')
@section('myContent')
      <div id="page-wrapper">
<div class="row">
  <div class="col-lg-10">
    <div class="panel-body">

                            <div class="table-responsive">
                                <h4> Total Users = {{$alluser->total()}}</h4>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>First Name</th>
                                            <th>E-mail</th>
                                            <th>Address</th>
                                            <th>Role</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1 ?>
                                        @foreach($alluser as $data)

                                        <tr>
                                            <td> {{$i}}</td>
                                            <td>{{$data['name']}}</td>
                                            <td>{{$data['email']}}</td>
                                            <td>{{$data['address']}}</td>
                                            <td>{{$data-> RoleName->role_name }}</td>
                                            <!-- <td>{{$data['created_at']}}</td> -->
                                            <?php $m = $data['created_at']; ?>
                                            <!-- <td>{{$m}}</td> -->
                                            <td>{{\Carbon\Carbon::parse($m)->diffForHumans()}}</td>
                                            <!-- <td>{{\Carbon\Carbon::now()->diffForHumans($m)}}</td> -->



                                            <?php $i++;?>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        {{$alluser->links()}}
  </div>
</div>
</div>
@endsection
