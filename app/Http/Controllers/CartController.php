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
use App\Models\Product;

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
                "qty"=>"required",

            ],
            [
                "required" => "Please select an option",

            ],

        );
        $product_info = DB::table('products')->where('product_id', $product_Id)->first();

        $product_info_size = DB::table('tb_size')->where('size_id', $size)->first();

        // $old_qty_1 = ($product_info->product_qty - $product_info->product_qty_sold);
        $old_qty_1=$product_info_size->Quantity_size-$product_info_size->Quantity_sold_size;

        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['qty'] = $quantity;

        $data['price'] = $product_info->product_price;
        $data['options']['old_qty'] = $old_qty_1;
        $data['weight'] = "123";
        $data['options']['image'] = $product_info->product_images;

        $data['options']['p_size'] = $product_info_size->size_price;
        $data['options']['size'] = $product_info_size->size;
        $data['options']['size_id'] = $product_info_size->size_id;



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


        $size= $request->size_id;

        $product_Id = $request->product_id;

        $old_qty = Product::where("product_id", $product_Id)->first();
        $old_qty_1 = ($old_qty->product_qty - $old_qty->product_qty_sold);
        $product_info_size = DB::table('tb_size')->where('size_id', $size)->first();
        $old_size=$product_info_size->Quantity_size-$product_info_size->Quantity_sold_size;
        if ($qty > $old_qty_1  || $qty > $old_size  ) {
            return response([
                "total" =>  Cart::subtotal(),
            ]);
        } else {
            Cart::update($rowId, $qty);
            return response([
                "total" =>  Cart::subtotal(),
            ]);
        }
    }
}
