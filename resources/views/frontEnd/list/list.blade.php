@extends('frontEnd.master')
@section('myContent')
<div id="panel" class="">
    <div class="container ">
      <div class="row justify-content-center" style="margin-top:20px;">
        <div class="col-md-8 col-12 ">
          <div class="panel panel-primary">
            <div class="panel-heading">Item List <a href="#" data-toggle="modal" data-target="#modal" class="pull-right">

                <i class="fas fa-plus"></i>


              </a></div>
          <div class="panel-body">
            <ul class="list-group">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Morbi leo risus</li>
              <li class="list-group-item">Porta ac consectetur ac</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Button trigger modal -->

<!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="/">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <input type="text" class="form-control" id="name" name="name">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
          </div>
        </div>
      </form>
      </div>
    </div>

  </div>
</div>
@endsection
