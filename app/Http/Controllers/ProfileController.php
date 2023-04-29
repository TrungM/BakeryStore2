<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    //

    public function loadViewProfile($customer_id){

        $profile= Db::table("tb_user")->where("id", $customer_id)->where("role","customer")->first();
        return view('user.page-items.detail-profile',['profile'=>$profile]);

    }


    public function editDetailProfile(Request $request,$id){



        $request->validate([
            "name"=>["required","string","max:100"],
            'phone'=>[ "required","regex:/[0-9]$/","max:13","min:8"],

        ]);

        Db::table("tb_user")->where("id",$id)->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
        ]);


        return redirect("detail-profile/".$id)->with('success_update_profile', 'You have successfully edited');


    }



    public function ChangePassword(Request $request, $id)
    {


        $request->validate([
            'current_password' => ['required', Rules\Password::defaults()],
            'password' => ['required', Rules\Password::defaults()],
            'password_confirmation' => ['required', Rules\Password::defaults(), "same:password"],

        ]);

        DB::table("tb_user") ->where("id",$id)->update([
            // mã hoá
            'password' => md5($request->password),
        ]);


        return redirect("detail-profile/".$id)->with('success_change_password_c', 'You have successfully changed');
    }


    public function uploadImageProfile(Request $request, $id){


        $request->validate([
            'image' => ['required', 'image'],

        ]);
        if ($request->hasFile('image')) {
            //lay doi tuong file
            $file = $request->file('image');
            $extension = strtolower($file->getClientOriginalExtension()); //lay ten mo rong cua file
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'gif') {
                return redirect("detail-profile/".$id)->with('err_msg', 'you just can choice  jpg,png,jpeg,gif');
            }
            if ($file->getSize() > 1000000) {
                redirect("detail-profile/".$id)->with('err_msg', 'you just can choice <= 1000k');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("user/images", $imageName);
            $request->session()->put("image_upload_profile_user",true);

        } else {
            $imageName = DB::table('tb_user')->where('id', intval($id))->first()->image;
            $request->session()->put("image_upload_profile_user",true);

        }
        DB::table('tb_user')->where('id', intval($id))->update([

                     "image"=>$imageName,
                    "number_upload_img"=>1,

        ]);

        return redirect("detail-profile/".$id)->with('success_update_profile', 'You have successfully edited');

    }

}
