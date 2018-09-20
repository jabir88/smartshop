<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
class OrderController extends Controller
{
    public function manageOrder()
    {
      $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            ->select('orders.*', 'customers.customer_firstname')
            ->get();

       return view('admin.order.ordermanage',compact('orders'));
      // echo "<pre>";
      // print_r($orders);
      // echo "</pre>";
    }
    public function viewOrder($order_id)
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
            return view('admin.order.orderview',compact('order_details','Customer_details'));
    }
    public function doneOrder($order_id)
    {
       Order::where('order_id',$order_id)->update(['order_status'=> 'Success']);
       return back();
    }

    public function deleteOrder($order_id)
    {
       Order::where('order_id',$order_id)->delete();
       return back();
    }

}
