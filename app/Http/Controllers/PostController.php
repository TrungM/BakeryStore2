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
        $post = new Post();
        $post->post_title = $data['post_title'];
        // $post->post_slug = $data['post_slug'];
        $post->post_content = $data['post_content'];
        $post->post_desc = $data['post_desc'];
        // $post->post_meta_desc = $data['post_meta_desc'];
        // $post->post_meta_keywords = $data['post_meta_keywords'];
        // $post->post_status = $data['post_status'];
        // $post->post_images = $data['post_images'];


        $get_image = $request->file('post_images');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lay ten cua hinh anh
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('admin/img/', $new_image);

            $post->post_images = $new_image;

            $post->save();
            Session::put('message','Them bai viet thanh cong');
            return redirect()->back();
        }else{
            Session::put('message','hay them anh');
            return redirect()->back();
        }
        // return redirect()->back();
    }

    public function all_post(){
        $all_post = Post::orderBy('post_id')->get();

        return view('admin.list-post')->with(compact('all_post', $all_post));
    }

    public function delete_post($post_id){
        $post = Post::find($post_id);

        $post_image=$post->post_images;
        $path = 'admin/img/' . $post_image;
        if($path){
            unlink($path);
        }
        $post ->delete();
        Session::put('message','Xoa bai viet thanh cong');
        return redirect()->back();
    }


    public function update($post_id){
        $post = Post::where('post_id', $post_id)->first();
        return view('user.page-items.update_post')->with(compact('post', $post));
    }

    public function updatePost(Request $request, $post_id){
        $data = $request->all();
        $post = new Post();
        $post->post_title = $data['post_title'];
        // $post->post_slug = $data['post_slug'];
        $post->post_content = $data['post_content'];
        $post->post_desc = $data['post_desc'];
        // $post->post_meta_desc = $data['post_meta_desc'];
        // $post->post_meta_keywords = $data['post_meta_keywords'];
        // $post->post_status = $data['post_status'];
        // $post->post_images = $data['post_images'];


        $get_image = $request->file('post_images');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lay ten cua hinh anh
            $name_image = current(explode('.', $get_name_image));
$new_image = $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('admin/img/', $new_image);

            $post->post_images = $new_image;

            $post->save();
            Session::put('message','Them bai viet thanh cong');
            return redirect()->back();
        }else{
            Session::put('message','hay them anh');
            return redirect()->back();
        }

        Post::where('id', intval($post_id))->update([
            // 'name'=> $product['name'],
            'post_title'=>$post['post_title'],
            'post_slug'=>$post['post_slug'],
            'post_desc'=>$post['post_desc'],
            'post_content'=>$post['post_content'],
            'post_meta_keywords'=>$post['post_meta_keywords'],
            'post_meta_desc'=>$post['post_meta_desc'],
            'post_images'=>$post['post_meta_desc']

        ]);
        // return redirect()
        return redirect()->back();
    }

    public function post_bai_viet(){

        $all_post = Post::orderBy('post_id')->get();

        return view('user.page-items.post-bai-viet')->with(compact('all_post', $all_post));
    }

    public function bai_viet($post_title){

        $post = Post::where('post_title', $post_title)->first();

        // $post = Post::with('post_id')->where('post_id', $post_id)->get();

        return view('user.page-items.bai-viet')->with(compact('post', $post));
    }
}
