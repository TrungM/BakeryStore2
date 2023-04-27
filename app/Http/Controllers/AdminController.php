<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Vistors;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{

    public function loadOrderStatisticYear(Request $request)
    {
        $data = $request->all();
        $today = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();

        $sub7Days = Carbon::now("Asia/Ho_Chi_Minh")->subDay(7)->toDateString();
        $sub365Days = Carbon::now("Asia/Ho_Chi_Minh")->subDay(365)->toDateString();




        // $now = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();

        $dates = [];

        if ($data["value_s"] == '1') {
            // $now = Carbon::now('Asia/Ho_Chi_Minh');
            $now = Carbon::create(2023, 1, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 31; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
        }     else if ($data["value_s"] == '2') {
            $now = Carbon::create(2023, 2, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 28; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        }   else if ($data["value_s"] == '3') {
            $now = Carbon::create(2023, 3, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 31; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        } else if ($data["value_s"] == '4') {
            $now = Carbon::create(2023, 4, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 30; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        } else if ($data["value_s"] == '5') {
            $now = Carbon::create(2023, 5, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 31; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        }else if ($data["value_s"] == '6') {
            $now = Carbon::create(2023, 6, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 30; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        }else if ($data["value_s"] == "7") {
            $now = Carbon::create(2023, 7, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 31; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        }else if ($data["value_s"] == '8') {
            $now = Carbon::create(2023, 8, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 31; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        }else if ($data["value_s"] == '9') {
            $now = Carbon::create(2023, 9, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 30; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        }else if ($data["value_s"] == '10') {
            $now = Carbon::create(2023, 10, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 31; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        }else if ($data["value_s"] == '11') {
            $now = Carbon::create(2023, 11, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 30; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        }else if ($data["value_s"] == '12') {
            $now = Carbon::create(2023, 12, 1);
            $dates[] = $now->startOfMonth()->toDateString();
            for ($i = 1; $i < 31; $i++) {
                $date = $now->startOfMonth()->addDays($i)->toDateString();
                $dates[] = $date;
            }
            $countday = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->count();
            $get = Statistic::whereIn("order_date", $dates)->orderBy("order_date", 'ASC')->get();
        }



        if ($countday == 0) {
            $chart_data[] = array(
                'period' =>  $now->startOfMonth()->toDateString(),
            );
        } else {
            foreach ($get as $v) {
                $chart_data[] = array(
                    'period' => $v->order_date,
                    'sales' => $v->sales,
                    'order' => $v->quantity,

                );
            }
        }


        $data = json_encode($chart_data);
        echo $data;

    }

    public function loadOrderStatistic(Request $request)
    {

        $data = $request->all();
        $today = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();


        $startofcurrentmonth = Carbon::now("Asia/Ho_Chi_Minh")->startOfMonth()->toDateString(); // đầu tháng hiện tại
        $startofprevmonth = Carbon::now("Asia/Ho_Chi_Minh")->subMonth()->startOfMonth()->toDateString(); // đầu tháng TRƯỚC
        $endofprevmonth = Carbon::now("Asia/Ho_Chi_Minh")->subMonth()->endOfMonth()->toDateString(); // cuối tháng TRƯỚC

        $sub7Days = Carbon::now("Asia/Ho_Chi_Minh")->subDay(7)->toDateString();
        $sub365Days = Carbon::now("Asia/Ho_Chi_Minh")->subDay(365)->toDateString();

        if ($data["value_s"] == 'aweek') {

            $get = Statistic::whereBetween("order_date", [$sub7Days, $today])->orderBy("order_date", 'ASC')->get();
        } else if ($data["value_s"] == 'apremonth') {

            $get = Statistic::whereBetween("order_date", [$startofprevmonth, $endofprevmonth])->orderBy("order_date", 'ASC')->get();
        } else if ($data["value_s"] == 'acurrentmonth') {
            $get = Statistic::whereBetween("order_date", [$startofcurrentmonth, $today])->orderBy("order_date", 'ASC')->get();
        } else if ($data["value_s"] == 'ayear') {
            $get = Statistic::whereBetween("order_date", [$sub365Days, $today])->orderBy("order_date", 'ASC')->get();
        }


        foreach ($get as $v) {
            $chart_data[] = array(
                'period' => $v->order_date,
                'sales' => $v->sales,
                'order' => $v->quantity,

            );
        }
        $data = json_encode($chart_data);
        echo $data;
    }
    public function adminindex()
    {

        return view("admin.layout.layout");
    }
    public function showdashboard()
    {
        return view("admin.dashboard");
    }

    public function loadorderSatistics()
    {
        $year = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();
        return View("admin.statistics_order", ['year' => $year]);
    }

    public  function loadViewProfile($id)
    {
        $profile = User::where("id", $id)->first();
        return View("admin.profile_admin", ["profile" => $profile]);
    }
    public function editDetailProfile(Request $request, $id)
    {

        $request->validate([

            "admin_name" => ["required", "regex:/[A-Z a-z]$/"],
            "admin_password" => ["required", Rules\Password::defaults()],
            'admin_image' => ["image"],

        ]);
        $profile = User::where("id", $id)->first();

        $file_img = "";

        if ($request->hasfile("admin_image")) {
            $file = $request->file("admin_image");
            $file_name = $file->getClientOriginalName(); // tên file
            $extension = $file->getClientOriginalExtension(); // duoi file

            $array_image = User::where("image", $file_name)->exists();
            $username = User::where("email", $request->admin_name)->first();

            if ($array_image == true) {

                return redirect("admin/profile/" . $id)->with('error_upload', 'The product image field  has already been taken .');
            } else {
                $file->move("admin/img/", $file_name);
                // $input["product_image"] = $file_name;
                $file_img = $file_name;
                $request->session()->put("profile_admin_img", $file_name);
            }
        } else {
            $file_img = $profile->image;
        }


        User::where("id", $id)->update([

            "name" => $request->admin_name,
            "image" => $file_img,

        ]);
        $request->session()->put("username_admin", $request->admin_name,);

        return redirect("admin/profile/" . $id)->with('success_edit', 'You have successfully edited');
    }


    public function loadViewChangePassword($id)
    {

        $admin_id = User::where("id", $id)->first();
        return View("admin.change_password", ["admin_id" => $admin_id]);
    }


    public function UpdateChangePassword(Request $request, $id)
    {


        $request->validate([
            // 'password' => ['required', Rules\Password::defaults(), 'confirmed'],
            'password' => ['required', Rules\Password::defaults()],
            'password_confirmation' => ['required', Rules\Password::defaults(), "same:password"],

        ]);

        User::where("id", $id)->update([
            // mã hoá
            'password' => md5($request->password),
        ]);

        return redirect("admin/change_password/" . $id)->with('success_edit', 'You have successfully edited');
    }


    public function customerList()
    {

        $ds = User::where("role", "customer")->paginate(6);
        $count_customer = User::where("role", "customer")->count();
        return View("admin.customer", ["ds" => $ds, "count_customer" => $count_customer]);
    }

    public function accountTest(Request $request)
    {

        $data = $request->all();

        $user = User::find($data['customer_id']);

        $user->active = $data["account_status"];

        $user->save();
    }

    public function loadChart()
    {

        return view("admin.chart");
    }

    public  function loadStatistics(Request $request)
    {
        $order_qty = Order::where("created_at",Carbon::now("Asia/Ho_Chi_Minh")->toDateString())->count();
        $order_today=Order::where("created_at",Carbon::now("Asia/Ho_Chi_Minh")->toDateString())->paginate(5);
        $ip_address = $request->ip();
        $user = User::count();


        $current = Vistors::where("ip_address", $ip_address)->get();
        $ip_count = $current->count();
        if ($ip_count < 1) {
            $vistor = new Vistors;
            $vistor->ip_address = $ip_address;
            $vistor->date_visitor = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();
            $vistor->save();
        }

        return view("admin.statistics", ["order_qty" => $order_qty, "user" => $user, "ip_count" => $ip_count,"order_today"=>$order_today]);
    }


    public function filterdatetatisticAction(Request $request)
    {

        $from_date = $request->from_date;
        $to_date = $request->to_date;

        // DB::table("tb_a")->whereBetween("order_date",)


        $get = Statistic::whereBetween("order_date", [$from_date, $to_date])->orderBy("order_date", 'ASC')->get();
        foreach ($get as $v) {
            $chart_data[] = array(
                'period' => $v->order_date,
                'sales' => $v->sales,
                'profit' => $v->profit,
                'quantity' => $v->quantity,
                'total' => $v->total,
            );
        }
        $data = json_encode($chart_data);
        echo $data;
    }

    public function dasboardfilterAction(Request $request)
    {

        $data = $request->all();
        // use Carbon to handle datetime
        $today = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();
        // return $tomorrow=Carbon::now("Asia/Ho_Chi_Minh")->addDay()-> format('d-m-y H:i:s');
        // return $lastWeek=Carbon::now("Asia/Ho_Chi_Minh")->subWeek()-> format('d-m-y H:i:s');
        // return $sub15Days=Carbon::now("Asia/Ho_Chi_Minh")->subDay(15)-> format('d-m-y H:i:s');
        // return $sub30Days=Carbon::now("Asia/Ho_Chi_Minh")->subDay(30)-> format('d-m-y H:i:s');
        // $startofprev2month=Carbon::now("Asia/Ho_Chi_Minh")->subMonth(2)-> startOfMonth()->toDateString();// đầu 2 tháng TRƯỚC

        //toDateString : là giúp tự format ngày tháng năm\
        // substract : trừ ra ;
        $startofcurrentmonth = Carbon::now("Asia/Ho_Chi_Minh")->startOfMonth()->toDateString(); // đầu tháng hiện tại
        $startofprevmonth = Carbon::now("Asia/Ho_Chi_Minh")->subMonth()->startOfMonth()->toDateString(); // đầu tháng TRƯỚC
        $endofprevmonth = Carbon::now("Asia/Ho_Chi_Minh")->subMonth()->endOfMonth()->toDateString(); // cuối tháng TRƯỚC

        $sub7Days = Carbon::now("Asia/Ho_Chi_Minh")->subDay(7)->toDateString();
        $sub365Days = Carbon::now("Asia/Ho_Chi_Minh")->subDay(365)->toDateString();

        if ($data["value_s"] == 'aweek') {

            $get = Statistic::whereBetween("order_date", [$sub7Days, $today])->orderBy("order_date", 'ASC')->get();
        } else if ($data["value_s"] == 'apremonth') {

            $get = Statistic::whereBetween("order_date", [$startofprevmonth, $endofprevmonth])->orderBy("order_date", 'ASC')->get();
        } else if ($data["value_s"] == 'acurrentmonth') {
            $get = Statistic::whereBetween("order_date", [$startofcurrentmonth, $today])->orderBy("order_date", 'ASC')->get();
        } else if ($data["value_s"] == 'ayear') {
            $get = Statistic::whereBetween("order_date", [$sub365Days, $today])->orderBy("order_date", 'ASC')->get();
        }


        foreach ($get as $v) {
            $chart_data[] = array(
                'period' => $v->order_date,
                'sales' => $v->sales,
                'profit' => $v->profit,
                'quantity' => $v->quantity,
                'total' => $v->total,
            );
        }
        $data = json_encode($chart_data);
        echo $data;
    }


    public function dasboard_filter7dateAction(Request $request)
    {
        $sub7Days = Carbon::now("Asia/Ho_Chi_Minh")->subDay(7)->toDateString();
        $today = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();

        $get = Statistic::whereBetween("order_date", [$sub7Days, $today])->orderBy("order_date", 'ASC')->get();

        foreach ($get as $v) {
            $chart_data[] = array(
                'period' => $v->order_date,
                'sales' => $v->sales,
                'profit' => $v->profit,
                'order' => $v->quantity,
                'total' => $v->total,
            );
        }
        $data = json_encode($chart_data);
        echo $data;
    }
}
