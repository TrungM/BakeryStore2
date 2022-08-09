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

    public function addCustomer(Request $request)
    {

        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email|unique:tb_customer,customer_email',
            'customer_password' => 'required|same:passwordconfirm',
            'customer_phone' => 'required|alpha_num|unique:tb_customer,customer_phone',
              'customer_address' => 'required'
        ]);
        $email = $request->customer_email;
        $pwd = $request->customer_password;
        $name = $request->customer_name;
        $address = $request->customer_address;
        $phone = $request->customer_phone;
        $check = DB::table('tb_customer')->where('customer_email', $email)->first();

        DB::table('tb_customer')->insert([
            'customer_email' => $email,
            'customer_password' => $pwd,
            'customer_name' => $name,
            'customer_address' => $address,
            'customer_phone' => $phone,
            'role' => 0

        ]);
        return redirect('login_checkout');
    }

    public function login()
    {
        return view("user.page-items.login");
    }


    public function userinformation()
    {
        return view("user.page-items.user-information");
    }
    public function checkoutLogin()
    {
        return view("user.page-items.login-checkout");
    }

    public function successOrder()
    {
        return view("user.page-items.success_order");
    }

    // login Google

    // public function redirectToGoogle()
    //     {
    //         return Socialite::driver('google')->redirect();
    //     }
    // public function handleGoogleCallback()
    // {
    //     $gguser = Socialite::driver('google')->user();

    //     $user = DB::table('tb_user')->insert([
    //         'email' => $gguser->email,
    //         'name' => $gguser->name,
    //         'address'=> $gguser->address,
    //         'phone'=> $gguser->phone,
    //         'provider'=> 'google',
    //         'provider_id'=>$gguser->id
    //     ]);
    //     Auth::login($user);

    //     // Return home after login
    //     return redirect()->route('home.index');
    // }

}
