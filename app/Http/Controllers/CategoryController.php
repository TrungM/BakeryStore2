<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Rating;

class CategoryController extends Controller
{




    public function ascproducts_category($category_id)
    {
        $category_product = DB::table('tb_category')->where('category_status', 'active')->get();
        $category_by_id = DB::table('products')->join('tb_category', 'tb_category.category_id', '=', 'products.category_id')
            ->where('products.category_id', $category_id)->orderBy('products.product_price', 'ASC')
            ->get();

        return view('user.page-items.show_product_category')->with('category_show', $category_product)->with('category_by_id', $category_by_id);
    }

    public function desproducts_category($category_id)
    {
        $category_product = DB::table('tb_category')->where('category_status', 'active')->get();
        $category_by_id = DB::table('products')->join('tb_category', 'tb_category.category_id', '=', 'products.category_id')
            ->where('products.category_id', $category_id)->orderBy('products.product_price', 'DESC')
            ->get();

        return view('user.page-items.show_product_category')->with('category_show', $category_product)->with('category_by_id', $category_by_id);
    }

    public function submenu($category_id)
    {

        $category_product = DB::table('tb_category')->where('category_status', 'active')->get();
        $category_by_id = DB::table('products')->join('tb_category', 'tb_category.category_id', '=', 'products.category_id')
            ->where('products.category_id', $category_id)->get();
            $category_by_name= DB::table('products')->join('tb_category', 'tb_category.category_id', '=', 'products.category_id')
            ->where('products.category_id', $category_id)->paginate(1);
        return view('user.page-items.show_product_category')->with('category_show', $category_product)->with('category_by_id', $category_by_id)->with('category_by_name', $category_by_name);
    }
}
