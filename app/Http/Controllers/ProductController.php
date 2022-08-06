<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Rating;

class ProductController extends Controller
{

    public function replyComment(Request $request)
    {
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->product_id = $data['product_id'];
        // de tra loi cho cai commnent co id la nhieu do
        $comment->comment_reply = $data['comment_id'];
        $comment->comment_name = "admin";
        $comment->comment_status = 1;
        $comment->save();
    }
    public function allowComment(Request $request)
    {
        $data = $request->all();
        //$data['comment_id']: dc gui bang ajax;
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function admin_comment_save()
    {
        // product trong model comment

        $comment = Comment::with("product")->where("comment_reply", "=", 0)->orderBy("comment_status", "DESC")->get();

        $comment_rep = Comment::with("product")->where("comment_reply", ">", 0)->get();

        return view('admin.comment_admin', ['comment' => $comment], ['comment_rep' => $comment_rep]);
    }
    public function sendComment(Request $request)
    {
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment_status = $request->comment_content;
        $comment = new Comment();

        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->product_id = $product_id;
        $comment->comment_status = 1;
        $comment->comment_reply = 0;

        $comment->save();
    }
    // duyet bang model

    public function loadComment(Request $request)
    {
        $product_id = $request->product_id;

        $comment = Comment::where('product_id', $product_id)->where("comment_status", 0)->get();
        // dk la 0 moi hien thi
        $comment_rep = Comment::with("product")->where("comment_reply", ">", 0)->get();
        $output = "";
        $comment_rep_count = Comment::where('product_id', $product_id)->where("comment_status", 0)->count();
        foreach ($comment as $p) {
            $output .= '
                <div class="user_comment" style="margin-bottom:1rem;margin-left:1rem;padding:2rem 2rem ">
        <div class="header_name">
            <img src="" alt="">
            <i class="fa-solid fa-camera"></i>
            <span>' . $p->comment_name . '</span>
            <span style="font-size:1.2rem">' . $p->comment_date . '</span>
        </div>

        <div class="user_comment_text">
         ' . $p->comment . '
        </div>

        </div>';

            foreach ($comment_rep as $a) {
                if ($a->comment_reply == $p->comment_id) {
                    $output .= ' <div class="reply">
        <div class="header_admin">
            <i class="fa-solid fa-camera"></i>
            <span>' . $a->comment_name . '</span>
            <span style="font-size:1.7rem"></span>
            <span style="font-size:1.2rem">' . $a->comment_date . '</span>

        </div>
        <div class="admin_text">
        ' . $a->comment . '
        </div>
        <div class="reply_user" style="color: red;    cursor: pointer;
        ">
            tra loi
        </div>
    </div>
    ';
                }
            }
        }
        echo $output;
    }
    public function index()
    {
        return view("admin.index");
    }

    public function pastry(Request $request)
    {
        $data = $request->all();


        $a = DB::table('product_type')->where('product_type_id', [1])->get();
        $sub_array = array();
        foreach ($a as $p) {
            $sub_array[] = $p->product_type_id;
        }
        // dd($sub_array);
        $ds = DB::table('products')->whereIn('product_type_id', $sub_array)->get();

        // $ds = DB::table('products')->find('product_type_id', $id)->first();
        return view("user.page-items.view-product", ["p" => $ds]);
    }
    public function product()
    {
        $ds = DB::table('products')->paginate(6);
        $category = DB::table('tb_category')->get();
        return view("user.page-items.product", ["product" => $ds, "category" => $category]);
    }

    public function ascproducts()
    {
        $ds = DB::table('products')->orderBy('product_price', 'ASC')->paginate(6);
        $category = DB::table('tb_category')->get();

        return view("user.page-items.product", ["product" => $ds, "category" => $category]);
    }
    public function descproducts()
    {
        $ds = DB::table('products')->orderBy('product_price', 'DESC')->paginate(6);
        $category = DB::table('tb_category')->get();

        return view("user.page-items.product", ["product" => $ds, "category" => $category]);
    }

    public function viewproduct($id)
    {
        $rating = Rating::where('product_id_star', $id)->avg('rating');
        $rating = round($rating);
        $product = DB::table('products')->where('product_id', $id)->first();

        $detail_product = DB::table('products')
            ->join('tb_category', 'tb_category.category_id', '=', 'products.category_id')
            ->where('product_id', $id)
            ->select('products.*', 'tb_category.*')
            ->get();

        foreach ($detail_product as $d) {
            $category_id = $d->category_id;
        }

        $related_product = DB::table('products')
            ->join('tb_category', 'tb_category.category_id', '=', 'products.category_id')
            ->where('tb_category.category_id', $category_id)
            ->select('products.*', 'tb_category.*')->whereNotIn('products.product_id',[$id])
            ->paginate(3);


        return view("user.page-items.view-product", ['p' => $product], ['c' => $related_product]);
    }
    public function viewfavourite()
    {
        return view("user.page-items.view-favourite");
    }


    public function adminproductmanage()
    {
        $ds = DB::table('products')->get();
        return view("admin.adminproductmanage", ["products" => $ds]);
    }

    public function insert()
    {
        return view("admin.productinsert");
    }
    public function insertPost(Request $request)
    {
        //nhan tat ca cac du lieu nhap tren form vo bien mang product
        $product = $request->all();
        $imageName = null;


        //kiem tra trong cac phan tu du lieu duoc up len co pt kieu 'file' ten la 'fileImage' ?
        if ($request->hasFile('fileImage')) {
            //lay doi tuong file
            $file = $request->file('fileImage');
            $ext = strtolower($file->getClientOriginalExtension()); //lay ten mo rong cua file
            if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg' && $ext != 'gif') {
                return redirect('admin/productinsert')->with('err_msg', 'chi duoc upload cac file JPEG,PNG,GIF');
            }

            // if ($file->getSize() > 1000000) {
            //     return redirect('admin/productinsert')->with('err_msg', 'chi duoc upload file <= 1000k');
            // }

            $imageName = $file->getClientOriginalName();
            $file->move("user/images", $imageName);
        }

        //luu du lieu vo DB
        DB::table('products')->insert([
            'product_name' => $product['product_name'],
            'product_price' => $product['product_price'],
            'product_images' => $imageName,
            'product_description' => $product['product_description'],
            'category_id' => $product['category_id'],
            // 'product_quantity' => $product['product_quantity'],
            'product_star' => $product['product_star']
        ]);

        return redirect('admin/adminproduct');
    }

    public function update($id)
    {
        $product = DB::table('products')->where('product_id', $id)->first();
        return view('admin.productupdate', ['p' => $product]);
    }

    public function updatePost(Request $request, $id)
    {
        $product = $request->all();

        //kiem tra trong so cac phan tu du lieu dc up len , co pt kieu 'file' te len 'fileImage'?
        // xử lý upload hình vào thư mục
        if ($request->hasFile('fileImage')) {
            //lay doi tuong file
            $file = $request->file('fileImage');
            $extension = strtolower($file->getClientOriginalExtension()); //lay ten mo rong cua file
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'gif') {
                return redirect('admin/productupdate/' . $id)->with('err_msg', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg,gif');
            }
            // if ($file->getSize() > 1000000) {
            //     return redirect('admin/productupdate/'.$id)->with('err_msg', 'Bạn chỉ được chọn file <= 1000k');
            // }
            $imageName = $file->getClientOriginalName();
            $file->move("user/images", $imageName);
        } else {
            $imageName = DB::table('products')->where('product_id', intval($id))->first()->product_images;
        }
        DB::table('products')->where('product_id', intval($id))->update([
            'product_name' => $product['product_name'],
            'product_price' => $product['product_price'],
            'product_images' => $imageName,
            'product_description' => $product['product_description'],
            'category_id' => $product['category_id'],
            // 'product_quantity' => $product['product_quantity'],
            'product_star' => $product['product_star']
        ]);
        return redirect('admin/adminproduct');
    }

    public function delete($id)
    {
        DB::table('products')->where('product_id', $id)->delete();
        return redirect('admin/adminproduct');
    }

    //ham tim kiem bang ajax
    public function search()
    {
        $product = DB::table('products')->get();
        return view('admin.product', compact('product'));
    }

    public function searchPost(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $product = DB::table('products')->where('product_name', 'LIKE', '%' . $request->search . '%')->get();
            if ($product) {
                foreach ($product as $p) {
                    $f1 = url("admin/productupdate/" . $p->product_id);
                    $f2 = url("admin/delete/" . $p->product_id);
                    $img = asset("user/images/" . $p->product_images);
                    $price = number_format($p->product_price, 0, ',', '.');
                    $output .=
                        "<tr>
                    <td> $p->product_id </td>
                    <td> $p->product_name </td>
                    <td> $price VNĐ</td>
                    <td> <img width='100px' src='$img'></td>
                    <td> $p->product_description </td>
                    <td> $p->category_id </td>
                    <td> $p->product_star </td>
                    <td> <a class='btn btn-info btn-sm' href='$f1' onclick='return content('alert', 'Are you sure')'<i class='fas fa-pencil-alt'></i> Edit </a>
                         <a class='btn btn-danger btn-sm' href='$f2' onclick='return xacnhan()'<i class='fas fa-trash'></i> Delete </a> </td> </tr>";
                }
            }
            return Response($output);
        }
    }
    public function search2(Request $request)
    {
        $keywords = $request->keywords_submit;
        $category = DB::table('tb_category')->get();
        $search_product = DB::table('products')->where('product_name', 'LIKE', '%' . $keywords . '%')->get();
        return view('user.page-items.search', ['categories' => $category, 'search_product' => $search_product]);
    }
}
