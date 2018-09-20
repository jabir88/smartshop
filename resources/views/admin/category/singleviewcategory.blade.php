@extends('admin.adminmaster')
@section('myContent')
<div id="page-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_text">
                        <i class="fa fa-th"></i> View All Categories
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('category/manage')}}" class="btn btn-dark btn-sm card_button"><i class="fa fa-th"></i> All Categories</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 card_view_part">
                      <table class="manufacturer_single table table-striped table-bordered view_data_table">

                          <tr>
                            <td>Manufacturer Name</td>
                            <td>:</td>
                            <td>
                                {{$infomanu->category_name}}
                            </td>
                          </tr>
                          <tr>
                            <td>Manufacturer Description</td>
                            <td>:</td>
                            <td>
                                {{$infomanu->category_des}}
                            </td>
                          </tr>
                          <tr >
                            <td>Publication Status</td>
                            <td>:</td>
                            <td>
                                {{$infomanu->pub_status == 1 ? 'Published' : 'Unpublished'}}
                            </td>
                          </tr>


                      </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="#" class="btn btn-info btn-sm">REGISTRATION</a>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
