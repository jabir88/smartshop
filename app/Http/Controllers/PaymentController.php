<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Cart;
use App\Order;
use App\Payment;
use App\Orderdetail;
use Carbon\Carbon;

class PaymentController extends Controller
{
  public function payment_page()
  {
    return view('frontEnd.payment.paymentContent');
  }
  public function payment_method_save(Request $req)
  {
    $payment_type = $req->payment_type;
    $customer_id = Session::get('customer_id');
    $shipping_id = Session::get('shipping_id');
    $order_total = Cart::total();
    $order_total= str_replace(',','',$order_total);

    $order_id = Order::insertGetId([
      'customer_id'=>$customer_id,
      'shipping_id'=>$shipping_id,
      'order_total'=>$order_total,
      'created_at'=>Carbon::now(),
    ]);

    $payment_id =Payment::insertGetId([
      'order_id'=>$order_id,
      'payment_type'=>$payment_type,
      'created_at'=>Carbon::now(),
    ]);

    $cart = Cart::content();


    foreach ($cart as $cart) {
    Orderdetail::insert([
    'order_id'=>$order_id,
    'product_id'=> $cart->id,
    'product_name'=>$cart->name,
    'product_price'=>$cart->price,
    'product_sales_quantity'=>$cart->qty,
    'created_at'=>Carbon::now(),
      ]);
    }

  if ($payment_type == 'cash') {
    Cart::destroy();
    return redirect()->back()->with('success','Payment success');
  }elseif ($payment_type == 'bkash') {
    return redirect('/addmoney/stripe');
    // return "Bkash is Not available";
    // code...
  }else {
    return redirect('/paypal');
  }


  }


  public function invoice($order_id)
  {

    $Customer_details = DB::table('orders')
          ->where('order_id',$order_id)
          ->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
          ->join('shippings', 'orders.shipping_id', '=', 'shippings.shipping_id')


          ->select('orders.*', 'customers.*', 'shippings.*')
          ->first();



    $order_details =DB::table('orderdetails')

          ->join('orders', 'orderdetails.order_id', '=', 'orders.order_id')
          ->select('orderdetails.*', 'orders.*')
          ->get()->where('order_id',$order_id);

          // echo "<pre>";
          // print_r($order_details);
          // echo "</pre>";
          // return view('admin.order.orderview',);

    return view('admin.invoice.invoiceContent',compact('order_details','Customer_details'));
  }
}
