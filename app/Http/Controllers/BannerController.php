<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Image;

class BannerController extends Controller
{
    public function addbanner()
    {
        return view('admin.banner.createbanner');
        // return "Amr Matha";
    }
    public function subbanner(Request $request)
    {
        $this->validate($request, [
          'img_name'=> 'required|image|mimes:jpeg,png,jpg|max:1524',
          'selected_img'=> 'required',
        ]);
        // return $request->all();

        $insert=  Banner::insertGetId([
          'img_name'=>$request->img_name ,
          'selected_img'=>$request->selected_img ,

        ]);
        if ($request->hasFile('img_name')) {
            $img = $request->file('img_name');
            $img_name = 'banner -' .$insert.time().".".$img->getClientOriginalExtension();
            Image::make($img)->save(base_path('storage/app/public/banner/'.$img_name));
            // Image::make($img)->resize(150, 195)->save(base_path('public/banner/' . $img_name));
            Banner::where('id', $insert)->update([
              'img_name'=>$img_name,
            ]);
            return back()->with('msg', 'Image Uploaded Successfully!');
        } else {
            return back()->with('msg_error', 'Image Uploaded Failed!');
            // return "nai";
        }
        // return "Amr Matha";
    }
    // public function storeCategory(Request $req)
    // {
    //     // return $req->all();
    //     //hoise
    //     // $category = new Category();
    //     // $category->category_name =$req->category_name;
    //     // $category->category_des =$req->category_des;
    //     // $category->pub_status =$req->Publication;
    //     // $category->save();
    //     // return " success";
    //
    //
    //     // 2nd method
    //     // $insert = Category::insert([
    //     //   'category_name'=>$_POST['category_name'],
    //     //   'category_des'=>$_POST['category_des'],
    //     //   'pub_status'=>$_POST['Publication'],
    //     // ]);
    //     // if ($insert) {
    //     // return  redirect('/category/add')->with('msg','Successfully done!');
    //     // }else {
    //     //   return  redirect('/category/add')->with('msg','failed');
    //     // }
    //     $insert=  Banner::insert([
    //   'category_name'=>$_POST['category_name'] ,
    //   'category_des'=>$_POST['category_des'] ,
    //   'pub_status'=>$_POST['Publication'] ,
    // ]);
    //     if ($insert) {
    //         return  redirect('admin/category/add')->with('msg', 'Successfully done!');
    //     } else {
    //         return  redirect('admin/category/add')->with('msg', 'failed');
    //     }
    // }

    // public function manage()
    // {
    //     $all_categories=   Category::all();
    //     return  view('admin.category.managecategory', compact('all_categories'));
    // }
}
