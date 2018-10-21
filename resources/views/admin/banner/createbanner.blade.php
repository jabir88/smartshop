@extends('admin.adminmaster')
@section('myContent')
<hr/>

  <div id="page-wrapper">
<div class="row">
  <div class="col-12">
    @if (session('msg'))
      <div class="alert alert-success contact_al alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        {{ session('msg') }}
      </div>
    @endif
    @if (session('msg_error'))
      <div class="alert alert-danger contact_al alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        {{ session('msg_error') }}
      </div>
    @endif
  </div>
  </div>
    {{-- <form class=""  action="index.html" method="post">

    </form> --}}
    <div class="col-lg-6 ">

    {!! Form::open(['route' =>'subbanner', 'method' => 'post', 'class'=> 'form-group', 'enctype' => 'multipart/form-data' ])!!}
      @csrf
        <div class="form-group">
            <label>Banner Name</label>
            <input type="file" multiple  name="img_name"  placeholder="Banner Name">
            @if ($errors->has('img_name'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('img_name') }}</strong>
              </span>
            @endif
        </div>
      <div class="form-group">
            <label>Select Banner Status</label>
            <select class="form-control" name="selected_img">
                <option value="" selected>Select Banner Publication</option>
                <option value="1">Published</option>
                <option value="2">Unpublished</option>
            </select>
            @if ($errors->has('selected_img'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('selected_img') }}</strong>
              </span>
            @endif
        </div>
      <button type="submit" class="btn btn-success ">Submit</button>
          {!! Form::close()!!}
    </div>
  </div>

</div>
@endsection
