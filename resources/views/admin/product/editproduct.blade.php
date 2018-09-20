@extends('admin.adminmaster')

@section('myContent')

<div id="page-wrapper">
    <div class="row">
      <div class="col-12">
         {!! Form::open(['url' =>'admin/product/update', 'method' => 'post', 'class'=> 'form-group' , 'enctype' => 'multipart/form-data'])!!}
         @csrf
         @if (session('status'))
         <div class="alert alert-success">
             {{ session('status') }}
         </div>
         @endif

          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_name">Product Name</label>
            <input type="hidden" name="pro_id"  class="form-control"  value="{{$product->pro_id}}"  >
            <input type="text" name="product_name"  class="form-control" id="product_name" value="{{$product->product_name}}"  placeholder="Product Name">
        </div>

        <div class="form-group">
          <label  style="display: block; color:#3895D3; font-weight:700;" >Category Name</label>
          <select class="form-control"  name="cate_name">
            @foreach($categories as $category )
            <!-- <option value="{{$product->cate_id}}" selected>{{$category->category_name}}</option> -->


            <option value="{{$category->id}}"
              <?php if ($category->id == $product->cate_id){
                echo "selected";
              } ?>

              > {{$category->category_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label  style="display: block; color:#3895D3; font-weight:700;" >Manufacturer Name</label>
          <select class="form-control"  name="manu_name">
            <option selected>Select Manufacturer</option>
            @foreach($manufacturers as $manufacturer )
            <!-- <option value="{{$product->manu_id}}" selected>{{$manufacturer->manu_name}}</option> -->


            <option value="{{$manufacturer->manu_id}}"
              <?php if ($manufacturer->manu_id == $product->manu_id){
                echo "selected";
              } ?> > {{$manufacturer->manu_name}}</option>
            @endforeach

          </select>
        </div>

          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_price">Product Price</label>
            <input type="number" name="product_price"  class="form-control" id="product_price" value="{{$product->product_price}}"  placeholder="Product Price">

        </div>

          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_quantity">Product Quantity</label>
            <input type="number" name="product_quantity"  class="form-control" id="product_quantity" value="{{$product->product_quantity}}"  placeholder="Product Quantity">

        </div>

          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_short_des">Product Short Description</label>
            <textarea name="product_short_des" id="product_short_des" placeholder="Product Short Description...."  rows="3" cols="128"> {{$product->product_short_des}}</textarea>
          </div>

          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_long_des">Product Long Description</label>
            <textarea name="product_long_des" id="product_long_des" placeholder="Product Long Description...."  rows="5" cols="128"> {{$product->product_long_des}}</textarea>
          </div>

          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" for="product_img">Product Image</label>
            <img height="400" src="{{asset('/').$product->product_img}}" alt="">
            <input type="file" name="product_img"   id="product_img" value="{{old('product_img')}}"  placeholder="Product Image">

        </div>

          <div class="form-group">
            <label  style="display: block; color:#3895D3; font-weight:700;" >Publication Status</label>
            <select class="form-control" name="pub_status">
              <option value="{{$product->pub_status}}"  selected>{{$product->pub_status ==1 ? 'Published' : 'Unpublished'}} </option>
              <option value="1">Published</option>
              <option value="0">Unpublished</option>
            </select>
          </div>

          <button type="submit" style="background:#3895D3;border:#3895D3;" class="btn btn-primary">Submit</button>
           {!! Form::close()!!}
      </div>
    </div>
  </div>
@endsection
