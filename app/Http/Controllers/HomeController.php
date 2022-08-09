<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Rating;
class HomeController extends Controller
{

    public function home()
    {
        $ds = DB::table('products')->where('product_star', '>',3)->paginate(6);

        return view("user.page-items.home",["product_home" => $ds]);
    }

    public function service(){
        return view("user.page-items.service");
    }

}
