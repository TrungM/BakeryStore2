<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CheckoutController extends Controller
{
    public function checkLogin(Request $request)
    {
        if ($request->session()->has('users')) {
            $request->session()->forget('users');
        }

        $email = $request->email;
        $pwd = $request->pwd;

        $user = DB::table('tb_customer')->where('customer_email', $email)->first();

        if ($user != null && $user->customer_password == $pwd) {

            session(['user' => $user]);


            if ($user->role == 1) {
                Session::put('customer_name', $user->customer_name);

                return redirect('admin/index');
                //return redirect()->route('adminuserlist');
            } else {

                Session::put('email', $user->customer_email);
                Session::put('password', $user->customer_password);
                Session::put('id', $user->customer_id);
                return redirect("home");
            }
        } else {
            return redirect("login_checkout")->with('message', 'Mật khẩu hoặc tài khoản bị sai .');
        }
    }




    public function checkout()
    {
        return view('user.page-items.checkout');
    }
    public function logincheckout()
    {

        return view('user.page-items.login-checkout');
    }

    public function addCustomer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = $request->customer_address;
        $data['role'] = $request->role;


        $customer_id = DB::table("tb_customer")->insertGetId($data);
        // chi lay id

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return redirect('login_checkout');
    }


    // public function customerInformation(Request $request)

    // {
    //     $customer_email = $request->customer_email;
    //     // $customer_id= $request->customer_id;
    //     $customer_password = $request->customer_password;
    //     $result = DB::table("tb_customer")->where("customer_email", $customer_email)->where("customer_password", $customer_password)->first();
    //     if ($result) {
    //         Session::put('customer_email', $result->customer_email);
    //         Session::put('customer_password', $result->customer_password);
    //         Session::put('customer_id', $result->customer_id);
    //         return redirect("home");
    //     } else {
    //         Session::put('message', 'Mat khau hoac ten bi sai');
    //         return redirect("login_checkout");
    //     }
    // }
    public  function  updateCustomer(Request $request, $customer_id)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        // $data['customer_password']=md5($request->customer_password);

        $data['customer_phone'] = $request->customer_phone;
        $data['customer_address'] = $request->customer_address;

        $result = DB::table('tb_customer')->where('customer_id', $customer_id)->update($data);



        return redirect("user-infromation/" . $customer_id);
    }
    // public function logout(){
    //     Session::put ('admin_name' , null);
    //     Session::put ('admin_id' , null);
    //     return redirect('user/page-items/home');

    // }


    public function saveCustomerShipping(Request $request)
    {



        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_time_day'] = $request->shipping_time_day;
        $data['shipping_time_hour'] = $request->shipping_time_hour;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_note'] = $request->shipping_note;
        $data['shipping_payment'] = $request->shipping_payment;


        $shipping_id = DB::table("tb_shipping")->insertGetId($data);
        // chi lay id

        Session::put('shipping_name', $request->shipping_name);
        Session::put('shipping_id', $shipping_id);

        $order_data = array();
        $order_data['customer_id'] = Session::get('id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang xử lý';
        $order_data['order_code'] = substr(md5(microtime()), rand(0, 26), 5);;
        $order_id = DB::table("tb_order")->insertGetId($order_data);

        $content = Cart::content();
        foreach ($content as $p) {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['order_code'] = $order_data['order_code'];
            $order_d_data['product_id'] = $p->id;
            $order_d_data['product_name'] = $p->name;
            $order_d_data['product_price'] = $p->price;
            $order_d_data['product_quantity'] = $p->qty;
            DB::table('tb_order_detail')->insertGetId($order_d_data);
        }
        // sua
        return redirect('user/page-items/success_order');
    }

    public function  logoutcheckout()
    {
        Session::flush();
        return redirect('home');
    }






}
