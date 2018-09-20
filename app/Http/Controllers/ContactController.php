<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;


class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('editor');
    }

    public function insertme(Request $req){
      $this->validate($req,[
        'Name' =>'required|min:3|max:50',
        'Email' =>'required|min:6|max:40',
        'Message' =>'required',
      ],[
        'Name.required' => 'Please Enter Your Name',
        'Name.min' => 'Please Enter minimum 3 Char ',
      ]);
      $ins = Contact::insert([
        'conus_name'=>$_POST['Name'],
        'conus_email'=>$_POST['Email'],
        'conus_mess'=>$_POST['Message'],
        'created_at'=>Carbon::now(),
      ]);
      if ($ins) {
        return redirect('contact')->with('hoise', 'Information Inserted Successfully !');
      }else {
        return redirect('contact');
      }

    }
    public function contactmess()
    {
      $all_mess = Contact::where('conus_status',1)->paginate(5);
      return view('admin.contact.contactmessage2',compact('all_mess'));
    }
    public function contactmark($conus_id)
    {
      Contact::findOrFail($conus_id)->update([
        'conus_status' => 2,
      ]);
      return back();
    // return back();

    }

}
