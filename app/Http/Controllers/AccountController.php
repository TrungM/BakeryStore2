<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //

    public function home()
    {
        return view("user.page-items.home");
    }
    // public function product()
    // {
    //     $ds = DB::table('products')->get();
    //     return view("user.page-items.product", ["product" => $ds]);
    // }
    // public function viewproduct()
    // {
    //     return view("user.page-items.view-product");
    // }
    // public function viewfavourite()
    // {
    //     return view("user.page-items.view-favourite");
    // }
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

    // public function addCutomer(Request $request)
    // {

    //     $email = $request->customer_email;
    //     $pwd = $request->customer_password;
    //     $name = $request->customer_name;
    //     $role = $request->role;
    //     $active = $request->active;
    //     $address= $request->customer_address;
    //     $phone = $request->customer_phone;
    //     DB::table('tb_user')->insert([
    //         'email' => $email,
    //         'password' => $pwd,
    //         'name' => $name,
    //         'role' => intval($role),
    //         'active' => intval($active),
    //         'address'=> $address,
    //         'phone'=> $phone
    //     ]);
    //     return redirect('home');
    // }

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
