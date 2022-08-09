<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Section;
use Illuminate\Support\Facades\Session;
use Cart;
use Illuminate\Support\Facades\Storage;

session_start();
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $product_Id = $request->product_hidden;
        $quantity = $request->qty;
        $size = $request->size;

        $product_info = DB::table('products')->where('product_id', $product_Id)->first();
        $product_info_size = DB::table('tb_size')->where('product_id', $product_Id)->first();


        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        // if(  $size=='17x5cm'){
        //     $data['price'] = $product_info->product_price+10000;

        // }else{
        //     $data['price'] = $product_info->product_price;
        // }
        $data['price'] = $product_info->product_price;

        $data['weight'] = "123";
        $data['options']['image'] = $product_info->product_images;
        $data['options']['size'] = $size;

        Cart::add($data);
        // // Cart::destroy();
        // return Redirect::to('/show_cart');
        // return view('user.page-items.view-product');

        //  Cart::destroy();
        return redirect()->back();
    }
    public function show_cart(Request $request)
    {
        return view('user.page-items.view-product');
        // //seo
        // $meta_desc = "Giỏ hàng của bạn";
        // $meta_keywords = "Giỏ hàng";
        // $meta_title = "Giỏ hàng";
        // $url_canonical = $request->url();
        // //--seo
        // $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        // $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        // return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
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
