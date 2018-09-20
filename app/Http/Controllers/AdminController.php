<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Contact;
use App\Product;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('member');
    }
    public function  dashme()
    {
      $countme = User::all()->count();

      return view('admin.dashboard.dashboardContent',compact('countme'));
    }

    public function permission()
    {
      return  "You Have No Permission!";
    }
    public function  alluser()
    {
      // $alluser = User::where('status','1')->orderBy('id','DESC')->simplepaginate(5);
      $alluser = User::where('status','1')->orderBy('id','DESC')->paginate(5);
      return view('admin.users.alluser',compact('alluser'));
    }
}
