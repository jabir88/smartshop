<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Carbon\Carbon;
use DB;
use Session;

class CheckoutController extends Controller
{
    public function __constract()
    {
    }
    public function sign_up()
    {
        return view('frontEnd.register.registerContent');
    }
    public function customer_register(Request $req)
    {
        $this->validate($req, [
          'customer_firstname' => 'required|min:3|max:25',
          'customer_lastname' => 'required|min:3',
          'customer_email' => 'required|email|unique:customers',
          'customer_phone' => 'required|unique:customers',
          'customer_password' => 'required|min:6',
          'customer_confirm' => 'required|same:customer_password',
          'customer_address' => 'required|min:8',
        ]);
        // return $req->all();
        $customer_id = DB::table('customers')->insertGetId([
        'customer_firstname'  => $req->customer_firstname,
        'customer_lastname'  => $req->customer_lastname,
        'customer_email'  => $req->customer_email,
        'customer_phone'  => $req->customer_phone,
        'customer_password'  => md5($req->customer_password),
        'customer_address'  => $req->customer_address,
        'created_at'=>Carbon::now(),

        ]);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $req->customer_firstname);
        return redirect('/checkout/shipping');
    }
    public function customer_logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function customer_login(Request $req)
    {
        // return $req->all();
        $log_email =$req->customer_email;
        $log_pw =md5($req->customer_password);
        $result = DB::table('customers')->where('customer_email', $log_email)
                                 ->where('customer_password', $log_pw)
                                 ->first();
        // $customer_details = Customer::where('customer_email', $log_email)->where('customer_password',$log_pw)->first();
        if ($result) {
            $customer_id = $result->customer_id;
            $customer_name = $result->customer_firstname;

            Session::put('customer_id', $customer_id);
            Session::put('customer_name', $customer_name);
            return redirect('/checkout/shipping');
        } else {
            return redirect()->back()->with('status', 'Email or Password is Wrong!');
        }
    }
    public function customer_shipping()
    {
        $countries_name = DB::table('countries')->get();
        $customer_id=  Session::get('customer_id');
        $ship = Customer::where('customer_id', $customer_id)->first();

        return view('frontEnd.shipping.shippingContent', compact('ship', 'countries_name'));
    }
    public function customer_cities(Request $request)
    {
        // return    $request->id;
        // $data = DB::table('states')->select('id', 'name')->where('country_id', 2)->get();
        $data = DB::table('states')->select('id', 'name')->where('country_id', $request->id)->get();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        // return $data;
        return response()->json($data);
    }
    public function customer_shipping_save(Request $req)
    {
        $shipping_id = DB::table('shippings')->insertGetId([
      'shipping_fullname'  => $req->shipping_fullname,
      'shipping_email'  => $req->shipping_email,
      'shipping_phone'  => $req->shipping_phone,
      'shipping_address'  => $req->shipping_address,
      'shipping_city'  => $req->shipping_city,
      'shipping_country'  => $req->shipping_country,
      'created_at'=>Carbon::now(),
      ]);
        Session::put('shipping_id', $shipping_id);
        return redirect('/checkout/payment');
    }
}
