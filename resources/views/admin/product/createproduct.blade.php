@extends('admin.adminmaster')

@section('myContent')

<div id="page-wrapper">
    <div class="row">
      <div class="col-12">
         {!! Form::open(['url' =>'admin/product/save', 'method' => 'post', 'class'=> 'form-group' , 'enctype' => 'multipart/form-data'])!!}
         @csrf
         @if (session('status'))
   <div class="alert alert-success">
       {{ session('status') }}
   </div>
@endif
          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_name">Product Name</label>
            <input type="text" name="product_name"  class="form-control" id="product_name" value="{{old('product_name')}}"  placeholder="Product Name">
        </div>

        @if ($errors->has('product_name'))
        <span class="invalid-feedback" role="alert">
          <strong style="color:red;">{{ $errors->first('product_name') }}</strong>
        </span>
        @endif
        <div class="form-group">
          <label  style="display: block; color:#3895D3; font-weight:700;" >Category Name</label>
          <select class="form-control" value="{{old('cate_name')}}" name="cate_name">
            <option selected>Select Category</option>
            @foreach($categories as $category )


            <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
          </select>
        </div>
        @if ($errors->has('cate_name'))
        <span class="invalid-feedback" role="alert">
          <strong style="color:red;">{{ $errors->first('cate_name') }}</strong>
        </span>
        @endif
        <div class="form-group">
          <label  style="display: block; color:#3895D3; font-weight:700;" >Manufacturer Name</label>
          <select class="form-control" value="{{old('manu_name')}}" name="manu_name">
            <option selected>Select Manufacturer</option>
            @foreach($manufacturers as $manufacturer )


            <option value="{{$manufacturer->manu_id}}">{{$manufacturer->manu_name}}</option>
            @endforeach

          </select>
        </div>
        @if ($errors->has('manu_name'))
        <span class="invalid-feedback" role="alert">
          <strong style="color:red;">{{ $errors->first('manu_name') }}</strong>
        </span>
        @endif
          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_price">Product Price</label>
            <input type="number" name="product_price"  class="form-control" id="product_price" value="{{old('product_price')}}"  placeholder="Product Price">

        </div>
        @if ($errors->has('product_price'))
        <span class="invalid-feedback" role="alert">
          <strong style="color:red;">{{ $errors->first('product_price') }}</strong>
        </span>
        @endif
          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_quantity">Product Quantity</label>
            <input type="number" name="product_quantity"  class="form-control" id="product_quantity" value="{{old('product_quantity')}}"  placeholder="Product Quantity">

        </div>
        @if ($errors->has('product_quantity'))
        <span class="invalid-feedback" role="alert">
          <strong style="color:red;">{{ $errors->first('product_quantity') }}</strong>
        </span>
        @endif
          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_short_des">Product Short Description</label>
            <textarea name="product_short_des" id="product_short_des" placeholder="Product Short Description...."  rows="3" cols="128"> {{old('product_short_des')}}</textarea>
          </div>
          @if ($errors->has('product_short_des'))
          <span class="invalid-feedback" role="alert">
            <strong style="color:red;">{{ $errors->first('product_short_des') }}</strong>
          </span>
          @endif
          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_long_des">Product Long Description</label>
            <textarea name="product_long_des" id="product_long_des" placeholder="Product Long Description...."  rows="5" cols="128"> {{old('product_long_des')}}</textarea>
          </div>
          @if ($errors->has('product_long_des'))
          <span class="invalid-feedback" role="alert">
            <strong style="color:red;">{{ $errors->first('product_long_des') }}</strong>
          </span>
          @endif
          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_img">Product Image</label>
            <input type="file" name="product_img"   id="product_img" value="{{old('product_img')}}"  placeholder="Product Image">

        </div>
        @if ($errors->has('product_img'))
        <span class="invalid-feedback" role="alert">
          <strong style="color:red;">{{ $errors->first('product_img') }}</strong>
        </span>
        @endif
          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" >Publication Status</label>
            <select class="form-control" value="{{old('pub_status')}}" name="pub_status">
              <option selected>Select Publication</option>
              <option value="1">Published</option>
              <option value="0">Unpublished</option>
            </select>
          </div>
          @if ($errors->has('pub_status'))
          <span class="invalid-feedback" role="alert">
            <strong style="color:red;">{{ $errors->first('pub_status') }}</strong>
          </span>
          @endif
          <button type="submit" style="background:#3895D3;border:#3895D3;" class="btn btn-primary">Submit</button>
           {!! Form::close()!!}
      </div>
    </div>
  </div>
@endsection
