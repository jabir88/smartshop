<?php

namespace App\Http\Controllers;

use App\Notifications\VerifyNotification;
use App\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('member');
    }

    public function dashme()
    {
        $countme = User::all()->count();

        return view('admin.dashboard.dashboardContent', compact('countme'));
    }

    public function permission()
    {
        return "You Have No Permission!";
    }

    public function alluser()
    {
        // $alluser = User::where('status','1')->orderBy('id','DESC')->simplepaginate(5);
        $alluser = User::where('status', '1')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.users.alluser', compact('alluser'));
    }

    public function changepassword()
    {
        return view('admin.password.passwordchange');
    }

    public function verify()
    {

        return redirect('/admin');
    }

    public function token($token)
    {
        if (empty($token)) {
            return redirect('/login');
        }

        $user = User::where('email_verification_token', $token)->first();
        if ($user == null) {
            return redirect('/login');
        } else {
            $user->update([
                'email_verified' => 1,
                'email_verified_at' => Carbon::now(),
                'email_verification_token' => '',
            ]);
        }
        return redirect('/admin')->with('status', 'Email Verified Succcessfully !');
    }

    public function setpassword()
    {
        return view('admin.password.passwordset');
    }

    public function setpasswordsubmite(Request $request)
    {
        $request->validate([
            'new_pass' => 'required|string|min:6',
            'retype_pass' => 'required|same:new_pass',

        ], [
            'new_pass.required' => "Please Enter Your New Password!",
            'new_pass.string' => "Invalid New Password!",
            'new_pass.min' => "New Password should be minimum 6 characters!",
            'retype_pass.required' => "Please Enter Your Re-type Password!",
            'retype_pass.same' => "Password Doesn't Match!",
        ]);

        $new_pass = bcrypt($request->new_pass);

        User::where('id', Auth::user()->id)->update([
            'password' => $new_pass
        ]);
        return back()->with('status', "Password Set Successfully");
    }

    public function changepasswordsubmite(Request $request)
    {
        $request->validate([
            'old_pass' => 'required',
            'new_pass' => 'required|string|min:6',
            'retype_pass' => 'required|same:new_pass',

        ], [
            'old_pass.required' => "Please Enter Your Old Password!",
            'new_pass.required' => "Please Enter Your New Password!",
            'new_pass.string' => "Invalid New Password!",
            'new_pass.min' => "New Password should be minimum 6 characters!",
            'retype_pass.required' => "Please Enter Your Re-type Password!",
            'retype_pass.same' => "Password Doesn't Match!",
        ]);

        if (Hash::check($request->old_pass, Auth::user()->password)) {
            $new_pass = bcrypt($request->new_pass);
            if (Hash::check($request->old_pass, $new_pass)) {
                return back()->with('error', "Old Password and New Password Should be different");
            } else {
                User::where('id', Auth::user()->id)->update([
                    'password' => $new_pass
                ]);
                return back()->with('status', "Password Change Successfully");
            }
        } else {
            return back()->with('error', "Old Password Does't Macth ");
        }
    }
}
