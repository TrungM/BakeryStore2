<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\OrderDetails;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

public function showorderstatus(){
    return view("user.page-items.show_order_status");

}

    public function updateStatus(Request $request){
$data= $request->all();
$order=Order::find($data["order_id"]);
$order->order_status=$data["order_status"];
$order->save();

    }
    public function Update($order_code){
        $order = Order::where('order_code',$order_code)->get();
        return view('admin.update',compact('order'));
    }
    public function viewOrder($order_code){
		$order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
		$order = Order::where('order_code',$order_code)->get();
		foreach($order as $p){
			$customer_id = $p->customer_id;
			$shipping_id = $p->shipping_id;
			$order_status = $p->order_status;
		}
		$customer = Customer::where('customer_id',$customer_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();
// 'product' ham trong Models OrderDetail
		$order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();

		// foreach($order_details_product as $key => $order_d){

		// 	$product_coupon = $order_d->product_coupon;
		// }
		// if($product_coupon != 'no'){
		// 	$coupon = Coupon::where('coupon_code',$product_coupon)->first();
		// 	$coupon_condition = $coupon->coupon_condition;
		// 	$coupon_number = $coupon->coupon_number;
		// }else{
		// 	$coupon_condition = 2;
		// 	$coupon_number = 0;
		// }

		return view('admin.view_order',compact('order_details','customer','shipping','order_details'));

	}

    public function managerOder(){
        $order=Order::orderBy("created_at","DESC")->get();
        return view('admin.manager_order',["order"=>$order]);
    }


}
