<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use App\Models\OrderDetails;

class ProductController extends Controller
{

    public function sizeSelectQuantityAction(Request $request)
    {
        $data = $request->all();

        $get = DB::table("tb_size")->where("size_id", $data["size"])->first();
        $output = '';

        $qty_get= $get->Quantity_size-$get->Quantity_sold_size;
        if($qty_get==0){
            $output .= '<option  data-color="1">Sold out</option>';

        }else{
            for($i=1; $i<=$qty_get;$i++){

                  $output .= '<option value="' . $i . '">' . $i . '</option>';

            }

        }

        echo $output;

    }
    public function productSizeChartAction(Request $request)
    {
        $data = $request->all();
        $get = DB::table("tb_size")->where("product_id", $data["product_id"])->get();
        foreach ($get as $v) {
            $chart_data[] = array(
                'size' => $v->size,
                'quantity' => $v->Quantity_size,
                'sold' => $v->Quantity_sold_size,
                'avaliable' => $v->Quantity_size - $v->Quantity_sold_size,



            );
        }
        $data = json_encode($chart_data);
        echo $data;
    }

    public function filterproductAction(Request $request)
    {
        $data = $request->all();
        $today = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();
        $sub7Days = Carbon::now("Asia/Ho_Chi_Minh")->subDay(7)->toDateString();
        $get = OrderDetails::where("product_id", $data["product_id"])->whereBetween("created_at", [$sub7Days, $today])->orderBy("created_at", 'ASC')->get();

        foreach ($get as $v) {
            $chart_data[] = array(
                'period' => $v->created_at,
                'quantity' => $v->product_quantity,
            );
        }
        $data = json_encode($chart_data);
        echo $data;
    }
    public function filterselectionproductAction(Request $request)
    {
        $data = $request->all();
        $today = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();

        $startofcurrentmonth = Carbon::now("Asia/Ho_Chi_Minh")->startOfMonth()->toDateString(); // đầu tháng hiện tại
        $startofprevmonth = Carbon::now("Asia/Ho_Chi_Minh")->subMonth()->startOfMonth()->toDateString(); // đầu tháng TRƯỚC
        $endofprevmonth = Carbon::now("Asia/Ho_Chi_Minh")->subMonth()->endOfMonth()->toDateString(); // cuối tháng TRƯỚC

        $sub7Days = Carbon::now("Asia/Ho_Chi_Minh")->subDay(7)->toDateString();
        $sub365Days = Carbon::now("Asia/Ho_Chi_Minh")->subDay(365)->toDateString();

        if ($data["product_v"] == 'apremonth') {

            $get = OrderDetails::where("product_id", $data["product_id"])->whereBetween("created_at", [$startofprevmonth, $endofprevmonth])->orderBy("created_at", 'ASC')->get();
        } else if ($data["product_v"] == 'acurrentmonth') {
            $get = OrderDetails::where("product_id", $data["product_id"])->whereBetween("created_at", [$startofcurrentmonth, $today])->orderBy("created_at", 'ASC')->get();
        } else if ($data["product_v"] == 'ayear') {
            $get = OrderDetails::where("product_id", $data["product_id"])->whereBetween("created_at", [$sub365Days, $today])->orderBy("created_at", 'ASC')->get();
        }


        foreach ($get as $v) {
            $chart_data[] = array(
                'period' => $v->created_at,
                'quantity' => $v->product_quantity,
            );
        }
        $data = json_encode($chart_data);
        echo $data;
    }




    public function productStatus($id)
    {
        $product_id = Product::where("product_id", $id)->first();

        return view('admin/productstatus', ["product_id" => $product_id]);
    }


    public function delete_size($id)
    {
        DB::table('tb_size')->where('size_id', $id)->delete();
        return redirect('admin/size');
    }
    public function updateSize(Request $request, $id)
    {
        $size = $request->all();
        $request->validate([
            "product_id" => ["required"],
            "size" => ["required"],
            "size_price" => ["required", "regex:/^[+-]?((\d+(\.\d*)?)|(\.\d+))$/", "max:10"],
            "quantity" => ["required", "integer", "min:1"],


        ]);
        $p = Product::where("product_id",  $size['product_id'])->first();
        $c =   DB::table('tb_size')->where("product_id", $size['product_id'])->whereNot("size_id", $id)->sum("Quantity_size");
        if ($c + $size["quantity"] > $p->product_qty) {
            return redirect('admin/update_size/' . $id)->with("status_error", "The quantity must not be greater than total quantity .");
        } else {

            DB::table('tb_size')->where('size_id', $id)->update([
                'product_id' => $size['product_id'],
                'size' => $size['size'],
                'size_price' => $size['size_price'],
                'Quantity_size' => $size["quantity"],

            ]);
            return redirect('admin/update_size/' . $id)->with("success_edit", "You have successfully edited");
        }
    }

    public function update_page($id)
    {
        // $size = DB::table('tb_size')->where('size_id', $id)->first();
        $size = DB::table('products')
            ->join('tb_size', 'tb_size.product_id', '=', 'products.product_id')
            ->select('products.*', 'tb_size.*')->where('size_id', $id)->first();
        // $c =   DB::table('tb_size')->where("product_id", $size['product_id'])->sum("Quantity_size");
        $product_list = Product::where("product_name", "!=", "$size->product_name")->get();
        return view('admin/update_size', ["size" => $size, "product_list" => $product_list]);
    }


    public function displayAvaliable(Request $request)
    {

        $value = $request->select_value;

        $p = Product::where("product_id", $value)->first();
        $a =   DB::table('tb_size')->where("product_id", $value)->exists();
        $c =   DB::table('tb_size')->where("product_id", $value)->sum("Quantity_size");

        if ($a == true) {
            if ($c > $p->product_qty) {
                return response([
                    "avaliable" => 0,
                ]);
            } else {
                return response([
                    "avaliable" => $p->product_qty - $c,
                ]);
            }
        } else {
            return response([
                "avaliable" => $p->product_qty,
            ]);
        }
    }
    public function sizeManager()
    {
        $size = DB::table('products')
            ->join('tb_size', 'tb_size.product_id', '=', 'products.product_id')
            ->select('products.*', 'tb_size.*')
            ->paginate(5);
        $count_size = DB::table("tb_size")->count();
        return view("admin.list_size", ["size" => $size, "count_size" => $count_size]);
    }

    public function sizeManager_insert_1()
    {
        $list_product = Product::all("product_id", "product_name");
        return view('admin/add_size', ["list_product" => $list_product]);
    }
    public function sizeManager_insert(Request $request)
    {
        $size = $request->all();

        $request->validate([
            "product_name" => ["required"],
            "size" => ["required"],
            "size_price" => ["required", "regex:/^[+-]?((\d+(\.\d*)?)|(\.\d+))$/", "max:10"],
            "quantity" => ["required", "integer", "min:1"],

        ]);

        $p = Product::where("product_id",  $size['product_name'])->first();
        $c =   DB::table('tb_size')->where("product_id", $size['product_name'])->sum("Quantity_size");
        if ($size["quantity"] > $p->product_qty - $c) {
            return redirect('admin/add_size')->with("status_error", "The quantity must not be greater than product avaliable.");
        } else {
            DB::table('tb_size')->insert([
                'product_id' => $size['product_name'],
                'size' => $size['size'],
                'size_price' => $size['size_price'],
                'Quantity_size' => $size["quantity"],
            ]);

            return redirect('admin/add_size')->with("status", "You have successfully added");
        }
    }
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
                <div class="user_comment" style="margin-bottom:1rem;margin-left:1rem;padding:2rem 2rem; ">
        <div class="header_name">

            <i class="fa-solid fa-user" style="margin-right:1rem;"></i><span>' . $p->comment_name . '</span>
            <span style="font-size:1.2rem">' . $p->comment_date . '</span>
        </div>

        <div class="user_comment_text" style="text-transform:none;">
         ' . $p->comment . '
        </div>

        </div>';

            foreach ($comment_rep as $a) {
                if ($a->comment_reply == $p->comment_id) {
                    $output .= ' <div class="reply">
        <div class="header_admin">
        <i class="fa-solid fa-user" style="color:#be9c79"></i>            <span>' . $a->comment_name . '</span>
            <span style="font-size:1.7rem"></span>
            <span style="font-size:1.2rem">' . $a->comment_date . '</span>

        </div>
        <div class="admin_text">
        ' . $a->comment . '
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
    public function product(Request $request)
    {
        $ds = DB::table('products')->paginate(6);
        $request->session()->forget("Phtl");
        $request->session()->forget("Plth");
        $request->session()->put("Newest", "Newest");
        $category = DB::table('tb_category')->get();
        return view("user.page-items.product", ["product" => $ds, "category" => $category]);
    }

    public function ascproducts(Request $request)
    {
        $ds = DB::table('products')->orderBy('product_price', 'ASC')->paginate(6);
        $category = DB::table('tb_category')->get();
        $request->session()->put("Plth", "Price low to high");
        $request->session()->forget("Phtl");
        $request->session()->forget("Newest");

        return view("user.page-items.product", ["product" => $ds, "category" => $category]);
    }
    public function descproducts(Request $request)
    {
        $ds = DB::table('products')->orderBy('product_price', 'DESC')->paginate(6);
        $category = DB::table('tb_category')->get();
        $request->session()->forget("Plth");
        $request->session()->put("Phtl", "Price high to low");
        $request->session()->forget("Newest");


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
            ->select('products.*', 'tb_category.*')->whereNotIn('products.product_id', [$id])
            ->paginate(3);


        return view("user.page-items.view-product", ['p' => $product], ['c' => $related_product]);
    }
    public function viewfavourite()
    {
        return view("user.page-items.view-favourite");
    }


    public function adminproductmanage()
    {
        $ds =  DB::table("products")->join("tb_category", "products.category_id", "=", "tb_category.category_id")
            ->select("products.*", "tb_category.category_name")->paginate(8);

        $count_product = DB::table("products")->count();


        return view("admin.adminproductmanage", ["products" => $ds, "count_product" => $count_product]);
    }

    public function insert()
    {
        $category = Category::all();
        return view("admin.productinsert", ["category" => $category]);
    }
    public function insertPost(Request $request)
    {

        $request->validate([
            'product_name' => ["required", "string", "max:100", "unique:products"],
            'product_price' => ["required", "max:100000000"],
            'product_description' => ["required", "max:500"],
            'product_images' => ["required", "image"],
            'select_category' => ["required"],
            'product_quantity' => ["required", "integer", "max:999.99"],

        ]);

        //nhan tat ca cac du lieu nhap tren form vo bien mang product
        $input = $request->all();
        $imageName = null;
        $input["category_id"] = $request->select_category;
        $input["product_star"] = "0";
        $input["product_qty"] = $request->product_quantity;
        if ($request->hasfile("product_images")) {
            $file = $request->file("product_images");
            $file_name = $file->getClientOriginalName(); // tên file
            $extension = $file->getClientOriginalExtension(); // duoi file

            $array_image = Product::where("product_images", $file_name)->exists();

            if ($array_image) {

                return redirect('admin/productinsert')->with('error_upload', 'The product image field  has already been taken .');
            } else {
                $file->move("user/images", $file_name);
                $input["product_images"] = $file_name;
            }
        };

        Product::create($input);

        return redirect('admin/productinsert')->with("status", "You have successfully added");
    }

    public function update($id)
    {

        $product = DB::table('products')->where('product_id', $id)->first();

        $category = Product::find($id)->category;
        $category_list = Category::where("category_name", "!=", "$category->category_name")->get();
        return view('admin.productupdate', ['p' => $product, "category" => $category, "category_list" => $category_list]);
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'product_name' => ["required", "string", "max:100"],
            'product_price' => ["required", "max:6", "regex:/^[+-]?((\d+(\.\d*)?)|(\.\d+))$/"],
            'product_description' => ["required", "max:500"],
            'product_image' => ["image", "max:500"],
            'category_id' => ["required"],
            'product_qty' => ["required", "integer"],
        ]);
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
            'product_qty' => $product['product_qty'],
        ]);
        return redirect('admin/productupdate/' . $id)->with("success_edit", "You have successfully edited");
    }

    public function delete($id)
    {
        DB::table('products')->where('product_id', $id)->delete();
        return redirect('admin/adminproduct')->with('success_delete', 'You have successfully deleted');;
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
            if (!empty($product)) {
                foreach ($product as $p) {
                    $c = Product::find($p->product_id)->category;
                    $f1 = url("admin/productupdate/" . $p->product_id);
                    $f2 = url("admin/delete/" . $p->product_id);
                    $img = asset("user/images/" . $p->product_images);
                    $output .=
                        "<tr>
                    <td> <img width='100px' src='$img'></td>
                    <td> $p->product_name </td>
                    <td> $p->product_price </td>
                    <td> $p->product_description </td>
                    <td> $c->category_name </td>";

                    if ($p->product_qty == 0) {
                        $output .= "<td style='color:red'> Out of stock </td>";
                    } else {
                        $output .= "<td style='font-weight:bold'> $p->product_qty </td>";
                    }
                    $output .=    "  <td> $p->product_star </td>

                    <td><a href='$f1'><button  type='button' class='btn btn-primary'>Edit</button></a></td>
                     <td><a href='$f2'><button type='button'  class='btn btn-danger delete_product'>Detele</button></a></td>
                    </tr>";
                }
            } else {
                $output .= "<td>No result</td>";
            }
            return response($output);
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
