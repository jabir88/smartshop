<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\ContactValid;
use Carbon\Carbon;
use App\Contact;

class MyController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    // $this->middleware('member');
    }
    public function home()
    {
        $allProducts3 =  Product::where('pub_status', 1)->get();
        $allProducts2 =  Product::where('pub_status', 1)->get();
        $allProducts =  Product::where('pub_status', 1)->get();
        return view('frontEnd.home.homeContent', compact('allProducts', 'allProducts2', 'allProducts3'));
        // $allProducts =  Product::where('pub_status',1)->orderBy('pro_id', 'DESC')->whereDate('created_at', Carbon::today())->take(12)->get();
    }
    public function category($id)
    {
        $produt_detail3 = Product::where('cate_id', $id)->orderBy('pro_id', 'DESC')->where('pub_status', 1)->take(3)->get();
        ;
        $produt_details = Product::where('cate_id', $id)->orderBy('pro_id', 'DESC')->where('pub_status', 1)->get();
        return view('frontEnd.category.categoryContent', compact('produt_details', 'produt_detail3'));
        // return print_r($produt_details);
    }
    public function codes()
    {
        return view('frontEnd.codes.codesContent');
    }
    public function contact()
    {
        return view('frontEnd.contact.contactContent');
    }
    public function single($id)
    {
        $singlepro = Product::findOrFail($id);

        return view('frontEnd.single.singleContent', compact('singlepro'));
    }

    public function insertme(ContactValid $req)
    {
        $ins = Contact::insert([
            'conus_name'=>$_POST['Name'],
            'conus_email'=>$_POST['Email'],
            'conus_mess'=>$_POST['Message'],
            'created_at'=>Carbon::now(),
          ]);
        if ($ins) {
            return redirect('contact')->with('hoise', 'Information Inserted Successfully !');
        } else {
            return redirect('contact');
        }
    }
    public function search(Request  $request)
    {
        $term =$request->term;
        $items = Product::where('product_name', 'LIKE', '%'.$term.'%')->get();
        // return   $items;

        if (count($items) == 0) {
            $searchResult[]= "No Product Found!";
        } else {
            foreach ($items as $item) {
                $searchResult[]=$item->product_name;
                // "<a href='{{url('single/'.$searchResult=$item->pro_id)  }}'>".$searchResult[]=$item->product_name."</a>";
            }
        }
        return   $searchResult;
    }
    public function list()
    {
        return view('frontEnd.list.list');
    }
}
