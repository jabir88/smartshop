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
    {!! Form::open(['url' =>'admin/category/save', 'method' => 'post', 'class'=> 'form-group'])!!}
    <!-- <form class="form-group" action="{{url('category/save')}}" method="post"> -->

@csrf
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="category_name"  placeholder="Category Name">
        </div>
        <div class="form-group">
            <label>Category description</label>
            <textarea type="text" class="form-control"  name="category_des" placeholder="Category Description" rows="8" cols="80"></textarea>
        </div>


        <div class="form-group">
            <label>Select Publication Status</label>
            <select class="form-control" name="Publication">
                <option  selected>Select Publication</option>
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>
        <!-- <input type="submit" value="Submit" class="btn btn-success btn-lg btn-block"> -->
        <button type="submit" class="btn btn-success ">Submit</button>
      <!-- </form> -->
        {!! Form::close()!!}

  </div>
  </div>

</div>
@endsection
