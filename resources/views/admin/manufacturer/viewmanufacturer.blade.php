@extends('admin.adminmaster')
@section('myContent')

<div id="page-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_text">
                        <i class="fa fa-th"></i> Manage Manufacturer
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('admin/manufacturer/add')}}" class="btn btn-dark btn-sm card_button"><i class="fa fa-plus-circle"></i> Add Manufacturer</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="uk-table uk-table-hover uk-table-striped" id="example3">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Manufacturer Name</th>
                                <th>Manufacturer  Description</th>
                                <th>Publication Status</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;?>
                          @foreach($manu_all as $data)
                          <tr>

                              <td>{{$i}}  </td>
                              <td>{{$data->manu_name}}</td>
                              <td>{{str_limit($data->manu_des, 30)}}</td>
                              <td>{{$data->pub_status == 1 ? 'Published' :'Unpublished'}}</td>
                              <td>
                                <a href="{{url('admin/manufacturer/singleview/'.$data->manu_id)}}"><i class="fa fa-plus-square"></i></a>
                                <a href="{{url('admin/manufacturer/edit/'.$data->manu_id)}}"><i class="fa fa-pencil-square"></i></a>
                                <a href="{{url('admin/manufacturer/delete/'.$data->manu_id)}}"><i class="fa fa-trash"></i></a>
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
    $('#example3').DataTable( {
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
