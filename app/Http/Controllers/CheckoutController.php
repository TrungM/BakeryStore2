<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use  Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\Province;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\wards;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;
use App\Mail\SendmailOrder;
use App\Models\Feedback;
use App\Models\Product;

class CheckoutController extends Controller
{



    public function select_delivery(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_province = province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>--Chọn quận  huyện --</option>';
                foreach ($select_province as $province) {
                    $output .= '<option value="' . $province->maqh . '">' . $province->name_quanhuyen . '</option>

                    ';
                }
            } else {
                $select_wards = wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>--Chọn phường xã--</option>';
                foreach ($select_wards as $wards) {
                    $output .= '<option value="' . $wards->name_xaphuong . '">' . $wards->name_xaphuong . '</option>';
                }
            }
        }
        echo $output;
    }





    public function checkout(Request $request)
    {
        $province = Province::where("name", 'Thành phố Hồ Chí Minh ')->orwhere("name", 'Thành phố Hà Nội ')->get();
        $detail = DB::table("tb_user")->where("id", $request->session()->get("customer_id"))->first();

        return view('user.page-items.checkout', ["province" => $province, "detail" => $detail]);
    }



    public function saveCustomerShipping(Request $request)
    {

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_time_day'] = $request->shipping_time_day;
        $data['shipping_time_hour'] = $request->shipping_time_hour;
        $data['shipping_address'] = $request->shipping_address_main;
        $data['shipping_note'] = $request->shipping_note;
        $data['shipping_payment'] = $request->shipping_payment;


        $shipping_id = DB::table("tb_shipping")->insertGetId($data);
        // chi lay id

        Session::put('shipping_name', $request->shipping_name);
        Session::put('shipping_id', $shipping_id);

        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Pending';
        $order_data['order_code'] = substr(md5(microtime()), rand(0, 26), 5);;
        $order_data['order_items']   = Cart::countItems();
        $order_id = DB::table("tb_order")->insertGetId($order_data);

        $content = Cart::content();
        foreach ($content as $p) {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['order_code'] = $order_data['order_code'];
            $order_d_data['product_id'] = $p->id;
            $order_d_data['product_name'] = $p->name;
            $order_d_data['product_price'] = $p->price;
            $order_d_data['product_images'] = $p->options->image;
            $order_d_data['product_quantity'] = $p->qty;
            $order_d_data['product_size'] = $p->options->size;
            $order_d_data['product_size_price'] = $p->options->p_size;
            $order_d_data['created_at'] = date("Y/m/d");
            DB::table('tb_order_detail')->insertGetId($order_d_data);

            $old_qty = Product::where("product_id", $p->id)->first();
            $old_size = DB::table('tb_size')->where("product_id", $p->id)->where("size", $p->options->size)->first();

            if ($old_qty->product_qty_sold == null) {
                Product::where("product_id", $p->id)->update([
                    "product_qty_sold" => $p->qty,
                ]);
            } else {
                Product::where("product_id", $p->id)->update([
                    "product_qty_sold" => $old_qty->product_qty_sold + $p->qty,
                ]);
            }

            if ($old_size->Quantity_sold_size == null) {
                DB::table('tb_size')->where("product_id", $p->id)->where("size", $p->options->size)->update([
                    "Quantity_sold_size" => $p->qty,
                ]);
            } else {
                DB::table('tb_size')->where("product_id", $p->id)->where("size", $p->options->size)->update([
                    "Quantity_sold_size" => $old_size->Quantity_sold_size + $p->qty,
                ]);
            }
        }
        //send email

        $username = DB::table("tb_user")->where("email", $request->customer_email_order)->first();

        $data_email = [
            "order_code" => $order_data['order_code'],
            "username" => $username->name,
            "content" => $content,
            "order_total" => $order_data['order_total'],
            "order_s_total" =>  Cart::total(),
            "time_order" => date("Y/m/d"),
            "payment" => $data['shipping_payment'],
            "shipping_name" => $data['shipping_name'],
            "shipping_address" => $data['shipping_address'],
            "shipping_time" => $data['shipping_time_day'] . ' ' . $data['shipping_time_hour'],
            "shipping_phone" => $data['shipping_phone'],
        ];

        Mail::to($request->customer_email_order)->send(new SendmailOrder($data_email));

        // sua
        Cart::destroy();
        return redirect('checkout');
    }

    // public function  logoutcheckout()
    // {
    //     Session::flush();
    //     return redirect('home');
    // }


    public function district(Request $request)
    {

        $exists = Province::where("matp", $request->shipping_province)->exists();
        $output = "";

        if ($exists == true) {
            $value_district = District::where("matp", $request->shipping_province)->get();
            $output .= ' <option value=""  data-district=""> Enter your district </option> ';
            foreach ($value_district as $item) {
                $output .=    '<option value="' .  $item->maqh . '"  data-district="' . $item->name . '"> ' .  $item->name . ' </option>';
            }
            return   $output;
        } else {
            return    $output .= ' <option value=""  data-district=""> Enter your district </option> ';
        }
    }


    public function wards(Request $request)
    {

        $exists = District::where("maqh", $request->shipping_district)->exists();
        $output = "";

        if ($exists == true) {
            $value_wards = wards::where("maqh", $request->shipping_district)->get();
            $output .= ' <option value="" data-wards=""> Enter your wards </option> ';
            foreach ($value_wards as $item) {
                $output .=    '<option value="' . $item['xaid'] . '" data-wards="' . $item['name'] . '"> ' . $item['name'] . ' </option>';
            }
            return   $output;
        } else {
            return    $output .= ' <option value="" data-wards=""> Enter your wards </option> ';
        }
    }

    public function purchase($customer_id)
    {
        $ds =   DB::table('tb_order')
            ->join('tb_shipping', 'tb_shipping.shipping_id', '=', 'tb_order.shipping_id')
            ->select("tb_order.*", "tb_shipping.*")
            ->where("tb_order.customer_id", $customer_id)
            ->orderBy("order_id", "DESC")
            ->get();
        // $order_id_s = array();
        // foreach ($ds as $item) {
        //     $order_id_s[] = $item->order_id;
        // };
        $detail = DB::table('tb_order_detail')->get();
        // $detail= Order::find(1)->details->count();

        return view('user.page-items.purchase', ['ds' => $ds, "detail" => $detail]);
    }


    public function feebackLoadView($order_code, $id)
    {

        $a = OrderDetails::where("order_code", $order_code)->where("product_id", $id)->first();
        $ds =   DB::table('tb_order')->orderBy("order_id", "DESC")->get();


        return view('user.page-items.feedback', ["a" => $a, "ds" => $ds]);
    }
}
