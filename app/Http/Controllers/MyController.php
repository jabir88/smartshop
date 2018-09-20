<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Carbon\Carbon;
class MyController extends Controller
{
  public  function __construct(){
    // $this->middleware('auth');
    // $this->middleware('member');
  }
    public function home(){
         $allProducts3 =  Product::where('pub_status',1)->get();
         $allProducts2 =  Product::where('pub_status',1)->get();
         $allProducts =  Product::where('pub_status',1)->get();
       return view('frontEnd.home.homeContent',compact('allProducts','allProducts2','allProducts3'));
       // $allProducts =  Product::where('pub_status',1)->orderBy('pro_id', 'DESC')->whereDate('created_at', Carbon::today())->take(12)->get();
    }
    public function category($id){
      $produt_detail3 = Product::where('cate_id',$id)->orderBy('pro_id', 'DESC')->where('pub_status',1)->take(3)->get();;
      $produt_details = Product::where('cate_id',$id)->orderBy('pro_id', 'DESC')->where('pub_status',1)->get();
       return view('frontEnd.category.categoryContent',compact('produt_details','produt_detail3'));
       // return print_r($produt_details);
    }
    public function codes(){
       return view('frontEnd.codes.codesContent');
    }
    public function contact(){
       return view('frontEnd.contact.contactContent');
    }
    public function single($id){
       $singlepro = Product::findOrFail($id);

        return view('frontEnd.single.singleContent', compact('singlepro'));
    }
}
