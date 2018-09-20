<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
  public  function __construct(){
    $this->middleware('auth');
    $this->middleware('editor');
  }


  public function addProduct()
  {
    $categories = Category::where('pub_status','1')->get();
    $manufacturers = Manufacturer::where('pub_status','1')->get();
    return view('admin.product.createproduct',compact('categories','manufacturers'));
  }


  public function insertProduct(Request $req)
  {
    $productimg = $req->file('product_img');

    $imgname=  rand(11111, 99999) .time(). '-' . $productimg->getClientOriginalName();
    $uploadPath = 'product_images/';
    $productimg->move($uploadPath,$imgname);
    $imgUrl = $uploadPath.$imgname;
 // echo "<pre>";
 // print_r($imgUrl);
 // echo "</pre>";




    $this->validate($req,[
      'product_name'=> 'required|min:2|max:80',

      'product_short_des'=> 'required|min:5',
      'product_long_des'=> 'required|min:15',

      'product_price'=> 'required',
      'product_quantity'=> 'required',
      'pub_status'=> 'required',
    ],[
      'product_name.required'=> 'Please Enter Your Name',
      'pub_status.required'=> 'Please Select A Publication Status',

    ]);

      $insert=  Product::insert([
        'product_name'=>$_POST['product_name'],
        'cate_id'=>$_POST['cate_name'],
        'manu_id'=>$_POST['manu_name'],
        'product_price'=>$_POST['product_price'],
        'product_quantity'=>$_POST['product_quantity'],
        'product_short_des'=>$_POST['product_short_des'],
        'product_long_des'=>$_POST['product_long_des'],
        'product_img'=> $imgUrl,
        'pub_status'=>$_POST['pub_status'],
        'created_at'=>Carbon::now(),

        ]);
      if ($insert) {
        return back()->with('status','Product Add Successfully!');
      }else {
        return back()->with('status','Sorry Please Try Again!');
      }

  }


  public function manageProduct()
    {

      $pro = DB::table('products')
              ->join('categories', 'products.cate_id', '=', 'categories.id')
              ->join('manufacturers', 'products.manu_id', '=', 'manufacturers.manu_id')
              ->select('products.*', 'categories.category_name', 'manufacturers.manu_name')
              ->get();
              return view('admin.product.manageproduct', compact('pro'));

    }


  public function viewProduct($id)
    {
      $product= Product::findOrFail($id);
      return view('admin.product.singleviewproduct', compact('product'));
    }
  public function editProduct($id)
    {
      $categories = Category::where('pub_status','1')->get();
      $manufacturers = Manufacturer::where('pub_status','1')->get();
      $product= Product::where('pro_id',$id)->first();
      return view('admin.product.editproduct', compact('product','categories','manufacturers'));
    }
    public function updateProduct(Request $req)
    {
      $s=   $this->imageUploadFun($req);
      $updatepro = Product::findOrFail($_POST['pro_id'])->update([
        'product_name'=> $_POST['product_name'],
        'cate_id'=> $_POST['cate_name'],
        'manu_id'=> $_POST['manu_name'],
        'product_price'=> $_POST['product_price'],
        'product_quantity'=> $_POST['product_quantity'],
        'product_short_des'=> $_POST['product_short_des'],
        'product_long_des'=> $_POST['product_long_des'],
        'product_img'=> $s,
        'pub_status'=> $_POST['pub_status'],
      ]);

      if ($updatepro) {
        return back()->with('status','Product Updated Successfully!');
      }else {
        return back()->with('status','Sorry Please Try Again!');
      }

    }
    private function imageUploadFun($req)
    {
      $productimg =$req->file('product_img');
      if ($productimg) {

      $imgname=  rand(11111, 99999) .time(). '-' .$productimg->getClientOriginalName();
      $uploadPath = 'product_images/';
      $productimg->move($uploadPath,$imgname);
      $imgUrl= $uploadPath.$imgname;
      }else {
      $productname =  Product::where('pro_id',$req->pro_id)->first();
        $imgUrl = $productname->product_img;
      }
      return $imgUrl;
    }

}
