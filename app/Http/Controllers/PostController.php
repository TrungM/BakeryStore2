<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Post;

class PostController extends Controller
{

    public function add_post()
    {
        $post = DB::table('tb_posts')->get();

        return view('admin.post', ['post' => $post]);
    }

    public function save_post(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'post_title' => ["required", "string", "max:100"],
            'post_desc' => ["required", "max:100000"],
            'post_content' => ["required"],
            'post_images' => ["required","image"],
        ]);
        $post = new Post();
        $post->post_title = $data['post_title'];
        // $post->post_slug = $data['post_slug'];
        $post->post_content = $data['post_content'];
        $post->post_desc = $data['post_desc'];
        $post->user_id = "1";


        $get_image = $request->file('post_images');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lay ten cua hinh anh
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('admin/img/', $new_image);

            $post->post_images = $new_image;

            $post->save();
            return redirect()->back()->with('message', 'Post News successful ');
        } else {
            return redirect()->back()->with('message', 'Please choose your image ');
        }
    }

    public function all_post()
    {
        $all_post = Post::orderBy('post_id')->get();

        return view('admin.list-post')->with(compact('all_post', $all_post));
    }

    public function delete_post($post_id)
    {
        $post = Post::find($post_id);

        $post_image = $post->post_images;
        $path = 'admin/img/' . $post_image;
        if ($path) {
            unlink($path);
        }
        $post->delete();
        return redirect()->back()->with('message', 'Xoa bai viet thanh cong');
    }


    public function update($post_id)
    {
        $post = Post::where('post_id', $post_id)->first();
        return view('admin.update_post')->with(compact('post', $post));
    }

    public function updatePost(Request $request, $post_id)
    {
        $data = $request->all();

        $request->validate([
            'post_title' => ["required", "string", "max:100"],
            'post_desc' => ["required", "max:100000"],
            'post_content' => ["required"],
            'post_images' => ["image"],
        ]);

        $get_image = $request->hasFile('post_images');
        $file_img = "";

      $post_img_old= Post::where("post_id", $post_id)->first();

        if ($get_image) {
            $file = $request->file("post_images");
            $file_name = $file->getClientOriginalName(); // tên file
            $extension = $file->getClientOriginalExtension(); // duoi file
            $file->move('admin/img/', $file_name);
            $file_img = $file_name;
        }else{
            $file_img = $post_img_old->post_images;

        }
        // $get_image = $request->file('post_images');

        //         if ($get_image) {
        //             $get_name_image = $get_image->getClientOriginalName(); //lay ten cua hinh anh
        //             $name_image = current(explode('.', $get_name_image));
        // $new_image = $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
        //             $get_image->move('admin/img/', $new_image);

        //             $post->post_images = $new_image;

        //             $post->save();
        //             Session::put('message','Them bai viet thanh cong');
        //             return redirect()->back();
        //         }else{
        //             Session::put('message','hay them anh');
        //             return redirect()->back();
        //         }

        Post::where('post_id', intval($post_id))->update([
            'post_title' => $data['post_title'],
            'post_desc' => $data['post_desc'],
            'post_content' => $data['post_content'],
            'post_images' => $file_img

        ]);
        return redirect()->back()->with("success_edit","You have successfully edited");
    }

    public function post_bai_viet()
    {

        $all_post = Post::orderBy('post_id')->get();

        return view('user.page-items.post-bai-viet')->with(compact('all_post', $all_post));
    }

    public function bai_viet($post_title)
    {

        $post = Post::where('post_title', $post_title)->first();

        // $post = Post::with('post_id')->where('post_id', $post_id)->get();

        return view('user.page-items.bai-viet')->with(compact('post', $post));
    }
}
