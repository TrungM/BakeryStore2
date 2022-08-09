<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Feedback;
use Illuminate\Support\Arr;
use App\Models\GalleryFeedback;
use phpDocumentor\Reflection\PseudoTypes\False_;

class HistoryController extends Controller
{


    public function history_order($customer_id)
    {
        $ds = DB::table('tb_order')->where("customer_id", $customer_id)->orderBy("order_id", "DESC")->get();

        return view("user.page-items.history",["history"=>$ds]);
    }
    public  function userinformation($customer_id)
    {
        $ds = DB::table('tb_order')->where("customer_id", $customer_id)->orderBy("order_id", "DESC")->paginate(1);
        $customer_detail = DB::table('tb_customer')->where("customer_id", $customer_id)->get();

        return view(
            "user.page-items.user-information",
            ['cus_detail' => $customer_detail],
            ["status" => $ds],
        );
    }

    public  function  DeleteOrder(Request $request, $order_code)
    {
        $customer_id = Session::get("id");
        DB::table('tb_order')
            ->join('tb_order_detail', 'tb_order_detail.order_code', '=', 'tb_order.order_code')
            ->where('tb_order.order_code', $order_code)->delete();
        // dd($menuOrder_code);
        return redirect("user-infromation/" . $customer_id);
    }
    public function replyFeedback(Request $request)
    {
        $data = $request->all();
        $feedback = new Feedback();
        $feedback->feedback = $data['feedback'];
        $feedback->product_id = $data['product_id'];
        // de tra loi cho cai commnent co id la nhieu do
        $feedback->feedback_reply = $data['feedback_id'];
        $feedback->customer_id = "admin";
        $feedback->feedback_status = 1;
        $feedback->feedback_code = 1;
        $feedback->order_code = 1;

        $feedback->save();
    }
    public function allowFeedback(Request $request)
    {
        $data = $request->all();
        //$data['feedback_id']: dc gui bang ajax;
        $feedback = Feedback::find($data['feedback_id']);
        $feedback->feedback_status = $data['feedback_status'];
        $feedback->save();
    }
    public function admin_feedback_save()
    {
        // product trong model feedback

        $feedback = Feedback::with("product")->where("feedback_reply", "=", 0)->orderBy("feedback_status", "DESC")->get();

        $feedback_rep = Feedback::with("product")->where("feedback_reply", ">", 0)->get();

        return view('admin.feedback_admin', ['feedback' => $feedback], ['feedback_rep' => $feedback_rep]);
    }
    public function sendFeedback(Request $request, $product_id)
    {
        $product_id = $request->product_id;

        $data = $request->all();

        $code = substr(md5(microtime()), rand(0, 26), 5);

        $feedback = new Feedback();
        $fb = DB::table('tb_feedback')->where("product_id", $product_id)->where("order_code", $data['order_code'])->exists();
        $products = DB::table('products')->where("product_id", $product_id)->value('product_name');

        $get_image = $request->file('multiple_files');



        $rating = Rating::where('product_id_star', $product_id)->avg('rating');
        $rating = round($rating);
        DB::table('products')->where("product_id", $product_id)->update(['product_star' => $rating]);

        if ($fb == true) {
            return redirect()->back()->with("message", "Bạn đã đáng giá " . $products);
        } else if ($fb == False) {

            if ($get_image) {
                foreach ($get_image as $image) {
                    // ten cua anh
                    $get_name_image = $image->getClientOriginalName();
                    $name_image = current(explode('.', $get_name_image));
                    // duoi mo rong
                    $new_image = $name_image . rand(0, 99) . '.' . $image->getClientOriginalExtension();
                    $image->move('public/user/images-feedback', $new_image);
                    $image->getClientOriginalName();

                    $GalleryFeedback = new GalleryFeedback();
                    $GalleryFeedback->feedback_code = $code;
                    $GalleryFeedback->gallery_image = $new_image;
                    $GalleryFeedback->save();

                    if ($get_image) {
                        $feedback->feedback_image = $new_image;
                    } else {
                        $feedback->feedback_image = null;
                    }
                }
            }
            $feedback->feedback = $data['content_feedback'];
            $feedback->customer_id = $data['customer_id'];
            $feedback->product_id = $product_id;
            $feedback->feedback_status = 0;
            $feedback->feedback_reply = 0;
            $feedback->feedback_code = $code;
            $feedback->order_code = $data['order_code'];
            $feedback->rating_avg = $rating;


            $feedback->save();
            return redirect()->back()->with("message1", "Bạn đã thêm đáng giá thành công " . $products);
        }
    }

    // ajaxxxxxxxxxxxxxxxxx

    // public function sendFeedback(Request $request,$product_id)
    // {
    //     $product_id = $request->product_id;

    //     $data = $request->all();

    //     $code = substr(md5(microtime()), rand(0, 26), 5);


    //     // $get_image = $request->file($data['img_feedback']);

    //     // if ($get_image) {
    //     //     foreach ($get_image as $image) {
    //     //         // ten cua anh
    //     //         $get_name_image = $image->getClientOriginalName();
    //     //         $name_image = current(explode('.', $get_name_image));
    //     //         // duoi mo rong
    //     //         $new_image = $name_image . rand(0, 99) . '.' . $image->getClientOriginalExtension();
    //     //         $image->move('public/user/images-feedback', $new_image);
    //     //         $image->getClientOriginalName();
    //     //         $code = substr(md5(microtime()), rand(0, 26), 5);

    //     //         $GalleryFeedback = new GalleryFeedback();
    //     //         $GalleryFeedback->feedback_code = $code;
    //     //         $GalleryFeedback->gallery_image = $new_image;
    //     //         $GalleryFeedback->save();
    //     //     }
    //     // }

    //     $feedback = new Feedback();
    //     $feedback->feedback = $data['feedback_content'];
    //     $feedback->customer_id = $data['input_feedback_text'];
    //     $feedback->product_id = $product_id;
    //     $feedback->feedback_status = 0;
    //     $feedback->feedback_reply = 0;
    //     $feedback->feedback_code = $code;
    //     $feedback->order_code = $data['order_code'];

    //     // if ($get_image) {
    //     //     $feedback->feedback_image = $new_image ;
    //     // } else {
    //     //     $feedback->feedback_image = null;
    //     // }
    //     $feedback->rating_avg = 1;

    //     $feedback->save();




    //     // return redirect("view-product/" . $product_id);
    //     return redirect()->back();
    // }
    // duyet bang model
    public function insertRating(Request $request)
    {
        $data = $request->all();

        $rating_s = DB::table('tb_rating')->where("product_id_star",  $data['product_id'])->where("order_code", $data['order_code'])->exists();

        if ($rating_s == true) {
            echo 'done2';
        } else if ($rating_s == False) {
            $rating = new Rating();
            $rating->product_id_star =  $data['product_id'];
            $rating->rating = $data['index'];
            $rating->order_code = $data['order_code'];

            $rating->save();
            echo 'done';
        }
    }
    public function loadFeedback(Request $request)
    {
        $product_id = $request->product_id;
        $data = $request->all();
        // $feedback = Feedback::where('product_id', $product_id)->where("feedback_status", 0)->get();
        // $rating = Rating::where('product_id', $product_id)->get();

        $order_by_rating  = DB::table('tb_feedback')
            ->join('tb_rating', 'tb_rating.order_code', '=', 'tb_feedback.order_code')
            ->join('tb_customer', 'tb_customer.customer_id', '=', 'tb_feedback.customer_id')
            ->join('tb_gallery_feedback', 'tb_gallery_feedback.feedback_code', '=', 'tb_feedback.feedback_code')
            ->select('tb_feedback.*', 'tb_rating.*', 'tb_customer.*', 'tb_gallery_feedback.*')
            ->where('product_id', $product_id)
            ->where("feedback_reply", 0)
            ->where("product_id_star", $product_id)
            ->get();

        $order_by_rep  = DB::table('tb_feedback')
            ->where('product_id', $product_id)
            ->where("feedback_reply", ">", 0)
            ->get();

        $output = "";
        foreach ($order_by_rating as $p) {

            $output .= '

                <div class="user_feedback" style="margin-bottom:1rem;margin-left:1rem;padding:2rem 2rem ">
        <div class="header_name">
            <img src="" alt="">
            <i class="fa-solid fa-user"></i>               <span>' . $p->customer_name . '</span>
            <span style="font-size:1.2rem">' . $p->feedback_date . '</span>
        </div>';

            if ($p->rating == 1) {
                $output .= '
                    <i class="fas fa-star" style="color:be9c79"></i>';
            } elseif ($p->rating == 2) {
                $output .= '
                    <i class="fas fa-star" style="color:be9c79"></i>
                        <i class="fas fa-star" style="color:be9c79"></i>';
            } elseif ($p->rating == 3) {
                $output .= '
                    <i class="fas fa-star" style="color:be9c79"></i>
                        <i class="fas fa-star" style="color:be9c79"></i>
                        <i class="fas fa-star" style="color:be9c79"></i>';
            } elseif ($p->rating == 4) {
                $output .= '
                    <i class="fas fa-star" style="color:be9c79"></i>
                        <i class="fas fa-star" style="color:be9c79"></i>
                        <i class="fas fa-star" style="color:be9c79"></i>
                        <i class="fas fa-star" style="color:be9c79"></i>';
            } elseif ($p->rating == 5) {
                $output .= '
                    <i class="fas fa-star" style="color:be9c79"></i>
                        <i class="fas fa-star" style="color:be9c79"></i>
                        <i class="fas fa-star" style="color:be9c79"></i>
                        <i class="fas fa-star" style="color:be9c79"></i>
                        <i class="fas fa-star" style="color:be9c79"></i>';
            } elseif ($p->rating == 0) {
                $output .= '
                    <p style="font-size:1.5rem ; color:#be9c79">Chưa có đánh giá </p>';
            }


            $output .= '

  <div class="user_comment_text">
         ' . $p->feedback . '
        </div>
<div>
<div>
<img style="width:15%" src="' . url("public/user/images-feedback/$p->feedback_image") . '">
</div>
</div>
        </div>';


            foreach ($order_by_rep as $a) {
                if ($a->feedback_reply == $p->feedback_id) {
                    $output .= ' <div class="reply">
                <div class="header_admin">
                <i class="fa-solid fa-user" style="color:#be9c79"></i>                     <span>' . $a->customer_id . '</span>
                    <span style="font-size:1.7rem"></span>
                    <span style="font-size:1.2rem">' . $a->feedback_date . '</span>

                </div>
                <div class="admin_text">
                ' . $a->feedback . '
                </div>
                <div class="reply_user" style="color: red;    cursor: pointer;
                ">
                </div>
            </div>
            ';
                }
            }
        }
        echo $output;
    }



    public function starFeedback(Request $request)
    {
        $data = $request->all();
        $product = Product::where('product_id', $data['order_product_id'])->get();

        $rating = Rating::where('product_id_star', $data['order_product_id'])->avg('rating');
        $rating = round($rating);
        $output = "";
        $i = 1;

        foreach ($product as $p) {
            $output .= ' <header style="font-size:1.5rem " class="name-rating">' . $p->product_name . ' </header>
            ';
        }
        for ($i; $i <= 5; $i++) {

            foreach ($product as $p) {


                $output .= '
            <span title="star_rating" id=' . $p->product_id . '-' . $i . '
            data-index=' . $i . ' data-product_id=' . $p->product_id . '
            data-rating=' . $rating . ' class="rating"
            style="cursor:pointer;font-size:30px; list-style: none; margin-left:2rem";  text-align:center;> <i
                class="fas fa-star"></i>
        </span>

  ';
            }
        }



        echo $output;
    }
    public function   feedbackOrder($order_code)
    {
        $customer_id = Session::get("id");
        $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
        return redirect("user-infromation/" . $customer_id, compact('order_details', 'order_details'));
    }
    // public  function  OrderDetailUser($order_code)
    // {
    //     $customer_id = Session::get("customer_id");
    //     $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();


    //     return redirect("user-infromation/" . $customer_id, compact('order_details'));
    // }

    public function showDetailorder(Request $request)
    {
        $data = $request->all();
        $OrderDetails = OrderDetails::where("order_code", $data['order_detail_code'])->get();
        $shipping = Shipping::where("shipping_id", $data['order_detail_shipping'])->get();



        $output = "";

        foreach ($shipping as $p) {
            $output .= '

            <div style=" padding:1.5rem 1.5rem; font-size:1.5rem; font-weight:boild;">Thông tin người nhận </div>
            <table >
            <thead>
                <tr style="font-size:15px">
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th> Payment</th>
                    <th>Note</th>

                </tr>
            </thead>
            <tbody>
                <tr  style=" background: #fff;
                border-radius: .5rem;
                border: .1rem solid rgba(0, 0, 0, .2);
                box-shadow: var(--box-shadow);
                min-height: 5rem;
                padding: 1rem;font-size:10px;text-align:center ">
                    <td> ' . $p->shipping_name . '</td>
                    <td> ' . $p->shipping_address . '</td>
                    <td> ' . $p->shipping_phone . '</td>
                    <td> ' . $p->shipping_time_day . '</td>
                    <td> ' . $p->shipping_time_hour . '</td>
                    <td> ' . $p->shipping_payment . '</td>
                    <td> ' . $p->shipping_note . '</td>

                </tr>



            </tbody>
            <tfoot>
            </tfoot>
        </table>

            ';
        }

        $output .= '
        <div style=" padding:1.3rem 1.3rem; font-size:1.5rem; font-weight:boild;">Thông tin sản phẩm </div>



        <table>
<thead class="header_bill "  style="font-size:18px">
    <th>
        <h5>Sản phẩm</h5>
    </th>
    <th>
        <h5>Giá</h5>
    </th>
    <th>
        <h5>Size</h5>
    </th>
    <th>
        <h5>Tiền</h5>
    </th>

</thead>';
        foreach ($OrderDetails as $p) {

            $output .= '<tbody>
    <tr style=" background: #fff;
    border-radius: .5rem;
    border: .1rem solid rgba(0, 0, 0, .2);
    box-shadow: var(--box-shadow);
    min-height: 5rem;
    padding: 1rem; font-size:10px">
        <td style="font-size: 1.4rem; padding: 1rem; ">
        ' . $p->product_name . '<i>x</i>       ' . $p->product_quantity . '
        </td>
        <td style="padding: 1rem; ">
          ' . $p->product_price . '
        </td>
        <td style="padding: 1rem; ">
        ' . $p->product_size . '
        </td>

      <td style="padding: 1rem; ">
      ' . $p->product_price * $p->product_quantity .   '
     </td>


</tr>



</tbody>';
        }

        $output .= '</table>';

        echo $output;
    }




    // public function contentForm($product_id)
    // {
    //     $customer_id = Session::get("customer_id");
    //     $order_details = OrderDetails::with('product')->where('product_id', $product_id)->get();
    //     return redirect("user-infromation/" . $customer_id);
    // }
}
