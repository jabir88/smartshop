@extends('admin.adminmaster')
@section('myContent')
      <div id="page-wrapper">
<div class="row">
  <div class="col-lg-10">
    <div class="panel-body">

                            <div class="table-responsive">
                                <h4> Total Users = {{$alluser->total()}}</h4>
                                <table class="uk-table uk-table-hover uk-table-striped" id="user">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>First Name</th>
                                            <th>E-mail</th>
                                            <th>Role</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1 ?>
                                        @foreach($alluser as $data)

                                        <tr>
                                            <td> {{$i}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
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
@section('script_here')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    $('#user').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                  columns: [ 0, 1, 2, 3]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                }
            },
            'colvis'
        ]
    } );
  });
</script>
@endsection
