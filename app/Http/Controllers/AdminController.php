<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function addUser(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:tb_customer,customer_email',
            'password' => 'required|same:confirm',
            'phone'=>'required',
            'address'=>'required'
        ]);

        $email = $request->email;
        $pwd = $request->password;
        $name = $request->fullname;
        $phone = $request->phone;
        $address= $request->address;
        $role = $request->role;
        $temp = DB::table('tb_customer')->where('customer_email', $email)->get();


            DB::table('tb_customer')->insert([
                'customer_email' => $email,
                'customer_password' => $pwd,
                'customer_name' => $name,
                'customer_phone' => $phone,
                'customer_address' => $address,
                'role' => intval($role),

            ]);
            return redirect('admin/staff');


    }

    public function resetPassword($id)
    {
        DB::table('tb_user')
            ->where('id', $id)
            ->update(['password' => '123']);
        return redirect('admin/users'); //->action([AccountController::class, 'users']);
    }

    public function users()
    {
        $users = DB::table('tb_customer')->where('role', 0)->get();
        return view('admin.customer')->with(['ds' => $users]);
    }

    public function staff()
    {
        $users = DB::table('tb_customer')->where('role', 1)->get();
        return view('admin.staff')->with(['ds' => $users]);
    }

    public function displayAddUser()
    {
        return view('admin.addUser');
    }
    public function details($id) {
        $user = DB::table('tb_customer')->where('customer_id', $id)->first();
        return view('admin/details')->with(['user'=>$user]);
        }

    public function adminindex()
    {
        return view("admin.index");
    }
    public function showdashboard()
    {
        return view("admin.dashboard");
    }
    public function dashboard(Request $request)
    {
        $admin_name = $request->admin_name;
        $admin_id = $request->admin_id;
        $password = md5($request->password);
        $result = DB::table("tb_admin")->where("admin_name", $admin_name)->where("password", $password)->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('password', md5($result->password));
            Session::put('admin_id', $result->admin_id);
            return redirect("admin/index");
        } else {
            Session::put('message', 'Mat khau hoac ten bi sai');
            return redirect('user/page-items/login');
        }
    }
// logout
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return redirect('home');
    }





    public function updateInfo($id)
    {

        $user = DB::table('tb_customer')->where('customer_id', $id)->first();
        return view('admin.updateInfo', ['u' => $user]);
    }
    public function updateInfoPost(Request $request, $id)
    {
        $user = $request->all();

        //kiem tra trong so cac phan tu du lieu dc up len , co pt kieu 'file' te len 'fileImage'?
        // xử lý upload hình vào thư mục

        DB::table('tb_customer')->where('customer_id', $id)->update([
            'customer_name' => $user['name'],
            'customer_email'=> $user['email'],
            'customer_phone' => $user['phone'],
            'customer_address' => $user['address'],
        ]);
        return redirect('admin/staff');
    }


    public function customerOrder($id){
        $order = DB::table('tb_order')->where('customer_id', $id)->get();
        $user = DB::table('tb_customer')->where('customer_id', $id)->first();
        return view('admin.customer_order', ['u' => $user], ['ds'=>$order]);
    }

    public function customerOrderdetail($code){
        $detail = DB::table('tb_order_detail')->where('order_code', $code)->get();

        return view('admin.customer_orderdetail', ['ds' => $detail]);
    }
}
