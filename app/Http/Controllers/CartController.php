<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Section;
use Illuminate\Support\Facades\Session;
use  Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

session_start();
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $product_Id = $request->product_hidden;
        $quantity = $request->qty;
        $size = $request->size;

        $request->validate(
            [
                "size" => "required",
            ],
            [
                "required" => "Please select an option",
            ],

        );

        $product_info = DB::table('products')->where('product_id', $product_Id)->first();


        $product_info_size = DB::table('tb_size')->where('size_id', $size)->first();




        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;

        $data['price'] = $product_info->product_price;

        $data['weight'] = "123";
        $data['options']['image'] = $product_info->product_images;

        $data['options']['p_size'] = $product_info_size->size_price;
        $data['options']['size'] = $product_info_size->size;


        Cart::add($data);

        return redirect()->back();
    }
    public function show_cart(Request $request)
    {
        return view('user.page-items.view-product');
    }

    public function deleteTocart($rowId)
    {
        Cart::update($rowId, 0);
        return redirect()->back();
    }

    public function update_cart_quantity(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);
        return redirect()->back();
    }
}
