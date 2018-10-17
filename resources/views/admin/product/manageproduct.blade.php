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
                                <table class="uk-table uk-table-hover uk-table-striped" id="example">
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
                                              <a href="{{url('admin/product/view/'.$products->pro_id)}}" style=" padding:3px ; color: #fff ; text-align: center; background: #30AD23; margin-left : 2px;">
                                                <i class="fa fa-eye  fa-fw " > </i>
                                              </a>
                                              <a href="{{url('admin/product/edit/'.$products->pro_id)}}" style=" padding:3px ; color: #fff ; text-align: center; background: #58CCED; margin-left : 2px;">
                                                <i class="fa fa-edit fa-fw " > </i>
                                              </a>
                                              <a href="{{url('admin/product/delete/'.$products->pro_id)}}" style=" padding:3px ; color: #fff; text-align: center; background: #FF1109; margin-left : 2px; ">
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
    $('#example').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            'colvis'
        ]
    } );
  });
</script>
@endsection
