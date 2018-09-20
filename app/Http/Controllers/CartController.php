<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use Cart;
class CartController extends Controller
{
    public function add_to_cart(Request $req)
    {
      $quantity = $req->qty;
      $pro_id = $req->pro_id;
      $product = Product::where('pro_id',$pro_id)->first();
      Cart::add(['id' => $product->pro_id, 'name' => $product->product_name, 'qty' => $quantity, 'price' => $product->product_price, 'options' => ['image' => $product->product_img]]);
      return redirect('/show-cart');
    }
    public function show_cart()
    {
       return view('frontEnd.cart.cartContent');
    }
    public function delete_cart($rowId)
    {
        Cart::update($rowId, 0);
        return back();
    }
    public function update_cart(Request $req)
    {
      $rowId = $req->rowId;
      $qty = $req->qty;
      Cart::update($rowId, $qty);
      return redirect()->back();
      // echo $rowId;
      // echo "<br>";
      // echo $qty;

    }
}
