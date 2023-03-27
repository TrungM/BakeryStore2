<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function store()
    {
        return view("user.page-items.store");
    }
    public function checkout()
    {
        return view("user.page-items.checkout");
    }
    public function sign()
    {
        return view("user.page-items.sign");
    }



    public function checkoutLogin()
    {
        return view("user.page-items.login-checkout");
    }

    public function successOrder()
    {
        return view("user.page-items.success_order");
    }


}
