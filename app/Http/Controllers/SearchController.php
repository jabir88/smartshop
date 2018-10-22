<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    // public function index()
    // {
    //     return view('search.search');
    // }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output=" ";

            $products=DB::table('products')
            ->where('product_name', 'LIKE', '%'.$request->search."%")->get();
            // echo "string";
            // print_r($products);
            if ($products) {
                foreach ($products as $product) {
                    $output.='<li><a href="http://localhost:8000/single/'.$product->pro_id .'">'.
                    // '<img src="{{ asset('/') }}'.$product->product_img.'" alt="">'

                    $product->product_name
                    .'</a></li>';
                }
                // return Response($output);
            }
            if (empty($products)) {
                $output.='<li>No Item Found!</li>';
            }
            return Response($output);
            // if ($products) {
            //     foreach ($products as $product) {
            //         $output.='<a href="http://localhost:8000/single/'.$product->pro_id. '"><tr>'.
            //           '<td>'.$product->product_name.'</td>'.
            //           '<td>'.$product->product_price.'</td>'.
            //           '<td>'.$product->product_quantity.'</td>'.
            //           '</tr> </a>';
            //     }
            //     return Response($output);
            // }
        }
    }
}
