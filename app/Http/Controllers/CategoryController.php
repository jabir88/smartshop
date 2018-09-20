<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('admin');
    }
    public function addcate(){
      return view('admin.category.createcategory');
      // return "Amr Matha";
    }
    public function storeCategory(Request $req){
      // return $req->all();
//hoise
      // $category = new Category();
      // $category->category_name =$req->category_name;
      // $category->category_des =$req->category_des;
      // $category->pub_status =$req->Publication;
      // $category->save();
      // return " success";


      // 2nd method
      // $insert = Category::insert([
      //   'category_name'=>$_POST['category_name'],
      //   'category_des'=>$_POST['category_des'],
      //   'pub_status'=>$_POST['Publication'],
      // ]);
      // if ($insert) {
      // return  redirect('/category/add')->with('msg','Successfully done!');
      // }else {
      //   return  redirect('/category/add')->with('msg','failed');
      // }
    $insert=  Category::insert([
        'category_name'=>$_POST['category_name'] ,
        'category_des'=>$_POST['category_des'] ,
        'pub_status'=>$_POST['Publication'] ,
      ]);
        if ($insert) {
         return  redirect('admin/category/add')->with('msg','Successfully done!');
       }else {
         return  redirect('admin/category/add')->with('msg','failed');
       }
     }

    public function manage()
    {
    $all_categories=   Category::all();
      return  view('admin.category.managecategory', compact('all_categories'));
    }

    public function edit($id)
    {
      $edit_cate = Category::where('id',$id)->first();
      return view('admin.category.editcategory',compact('edit_cate'));
    }
    public function updateCategory()
   {
    $update_cate = Category::findOrFail($_POST['cate_id'])->update([
     'category_name'=> $_POST['category_name'] ,
     'category_des'=> $_POST['category_des'] ,
     'pub_status'=> $_POST['Publication'] ,
     ]);
     if ($update_cate) {
       return back()->with('msg', 'Category Update Successfully!');
     }else {
       return back()->with('msg', 'Sorry Please try again!');
     }
   }
    public function view($id)
    {
      $view_cate =Category::where('id',$id)->first();
      // return $view_cate;
      return view('admin.category.editcategory',compact('view_cate'));
    }
    public function delete($id)
    {
      $edit_cate =Category::findOrFail($id);
       $edit_cate->delete();
       return back();
    }

    public function singleviewCategory($id)
    {
      $infomanu = Category::findOrFail($id);
        return view('admin.category.singleviewcategory',compact('infomanu'));

    }
  }
  // public function updateCategory()
  // {
  //    Category::findOrfail($_POST['cate_id'])->update([
  //      'category_name'=>$_POST['category_name'],
  //     'category_des'=>$_POST['category_des'],
  //     'pub_status'=>$_POST['Publication'],
  //
  // ]);
  // return redirect('category/manage');
  //
  // }
