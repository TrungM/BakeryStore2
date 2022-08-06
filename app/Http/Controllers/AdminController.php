<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

// use App\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function addUser(Request $request)
    {

        $email = $request->email;
        $pwd = $request->password;
        $name = $request->name;
        $role = $request->role;
        $active = $request->active;
        DB::table('tb_user')->insert([
            'email' => $email,
            'password' => $pwd,
            'name' => $name,
            'role' => intval($role),
            'active' => intval($active)
        ]);
        return redirect('admin/users');
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
        $users = DB::table('tb_user')->where('role', 0)->get();
        return view('admin.customer')->with(['ds' => $users]);
    }

    public function staff()
    {
        $users = DB::table('tb_user')->where('role', 1)->get();
        return view('admin.staff')->with(['ds' => $users]);
    }

    public function displayAddUser()
    {
        return view('admin.addUser');
    }
    public function details($id)
    {
        $user = DB::table('tb_user')->where('id', $id)->first();
        return view('user/details')->with(['user' => $user]);
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


}
