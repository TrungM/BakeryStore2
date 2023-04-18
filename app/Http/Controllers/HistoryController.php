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
    public function replyFeedback(Request $request)
    {
        $data = $request->all();
        $feedback = new Feedback();
        $feedback->feedback = $data['feedback'];
        $feedback->product_id = $data['product_id'];
        // de tra loi cho cai commnent co id la nhieu do
        $feedback->feedback_reply = $data['feedback_id'];
        $feedback->customer_id = 1;
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

        $feedback = Feedback::with("product")->with("customer")->where("feedback_reply", "=", 0)->orderBy("feedback_status", "DESC")->get();

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
            $feedback->customer_id = Session::get("customer_id");
            $feedback->product_id = $product_id;
            $feedback->feedback_status = 0;
            $feedback->feedback_reply = 0;
            $feedback->feedback_code = $code;
            $feedback->order_code = $data['order_code'];
            $feedback->rating_avg = $rating;


            $feedback->save();
            return redirect("purchase/".Session::get("customer_id"));
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


        $order_by_rating  = DB::table('tb_feedback')
            ->join('tb_rating', 'tb_rating.order_code', '=', 'tb_feedback.order_code')
            ->join('tb_user', 'tb_user.id', '=', 'tb_feedback.customer_id')
            ->join('tb_gallery_feedback', 'tb_gallery_feedback.feedback_code', '=', 'tb_feedback.feedback_code')
            ->select('tb_feedback.*', 'tb_rating.*', 'tb_user.*', 'tb_gallery_feedback.*')
            ->where('product_id', $product_id)
            ->where("feedback_status", 0)
            ->where("product_id_star", $product_id)
            ->get();

        $order_by_rep  = DB::table('tb_feedback')
            ->where('product_id', $product_id)
            ->where("feedback_reply", ">", 0)
            ->get();

        $output = "";
        foreach ($order_by_rating as $p) {

            $output .= '

                <div class="user_feedback" style="margin-bottom:1rem;margin-left:1rem;padding:2rem 2rem;text-transform:none ">
        <div class="header_name">
            <img src="" alt="">
            <i class="fa-solid fa-user"></i>               <span>' . $p->name . '</span>
            <span style="font-size:1.2rem">' . $p->feedback_date . '</span>
        </div>';

            if ($p->rating == 1) {
                $output .= '
                    <i class="fas fa-star" style="color:#be9c79"></i>';
            } elseif ($p->rating == 2) {
                $output .= '
                    <i class="fas fa-star" style="color:#be9c79"></i>
                        <i class="fas fa-star" style="color:#be9c79"></i>';
            } elseif ($p->rating == 3) {
                $output .= '
                    <i class="fas fa-star" style="color:#be9c79"></i>
                        <i class="fas fa-star" style="color:#be9c79"></i>
                        <i class="fas fa-star" style="color:#be9c79"></i>';
            } elseif ($p->rating == 4) {
                $output .= '
                    <i class="fas fa-star" style="color:#be9c79"></i>
                        <i class="fas fa-star" style="color:#be9c79"></i>
                        <i class="fas fa-star" style="color:#be9c79"></i>
                        <i class="fas fa-star" style="color:#be9c79"></i>';
            } elseif ($p->rating == 5) {
                $output .= '
                    <i class="fas fa-star" style="color:#be9c79"></i>
                        <i class="fas fa-star" style="color:#be9c79"></i>
                        <i class="fas fa-star" style="color:#be9c79"></i>
                        <i class="fas fa-star" style="color:#be9c79"></i>
                        <i class="fas fa-star" style="color:#be9c79"></i>';
            } elseif ($p->rating == 0) {
                $output .= '
                    <p style="font-size:1.5rem ; color:#be9c79">Chưa có đánh giá </p>';
            }


            $output .= '

  <div class="user_comment_text" style="text-transform: none;">
         ' . $p->feedback . '
        </div>
<div>
<div>
<img style="width:50px" src="' . url("public/user/images-feedback/$p->feedback_image") . '">
</div>
</div>
        </div>';


            foreach ($order_by_rep as $a) {
                if ($a->feedback_reply == $p->feedback_id) {
                    $output .= ' <div class="reply">
                <div class="header_admin">
                <i class="fa-solid fa-user" style="color:#be9c79"></i>                     <span>admin</span>
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



    public function   starFeedback(Request $request)
    {
        $data = $request->all();
        $product = Product::where('product_id', $data['order_product_id'])->get();

        $rating = Rating::where('product_id_star', $data['order_product_id'])->avg('rating');
        $rating = round($rating);
        $output = "";
        $i = 1;
        for ($i; $i <= 5; $i++) {

            foreach ($product as $p) {
                $output .= '
            <span title="star_rating" id=' . $p->product_id . '-' . $i . '
            data-index=' . $i . ' data-product_id=' . $p->product_id . '
            data-rating=' . $rating . ' class="rating"
            style="cursor:pointer;font-size:30px; list-style: none; margin-left:2rem;  text-align:center; "> <i
                class="fas fa-star"></i>
        </span>

  ';
            }
        }

        echo $output;
    }
}
