<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Services\VonageMessage;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
// use Twilio\Rest\Client;
use App\Notifications\AccountApproved;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;

use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //
    public function login()
    {

        return view('user.page-items.login');
    }


    public function login_profile(Request $request)
    {

        $request->validate([
            'email' => ["required", "string", "max:100", "regex:/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/"],
            "password" => ['required', Rules\Password::defaults()],


        ]);
        $email = $request->email;
        $password = md5($request->password);

        $result = DB::table("tb_user")->where("email", $email)->where("password",  $password)->exists();
        $user = DB::table("tb_user")->where("email", $email)->where("password",  $password)->first();
        if ($result == true) {
            if ($user->role == "admin") {
                $request->session()->put("login", true);
                $request->session()->put("username_admin", $user->name);
                // $request->session()->put("profile_login_img", $username->image);

                // $request->session()->forget("login_fail");

                return   redirect("admin/index");
            } else if ($user->role == "customer") {
                $request->session()->put("login_home", true);
                $request->session()->put("customer_id", $user->id);
                $request->session()->put("username", $user->name);
                $request->session()->put("Newest", "Newest");

                return   redirect("home");
            }
        } else {
            return  redirect("login")->with("login_fail", "Email or Password doesn't exists");
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget("login", true);
        $request->session()->forget("username_admin");

        return  redirect("login");
    }

    public function logout_home(Request $request)
    {
        $request->session()->forget("login_home", true);
        $request->session()->put("customer_id");
        $request->session()->forget("login_google");
        $request->session()->forget("image_upload_profile_user");
        $request->session()->forget("Phtl");
        $request->session()->forget("Plth");
        $request->session()->forget("customer_email");
        return redirect("home");
    }



    // sign up

    public function sign_up()
    {

        return view('user.page-items.sign');
    }

    public function active_sign_up(Request $request)
    {


        $request->validate([
            "sign_name" => ["required", "string", "max:100", "regex:/[A-Z a-z]$/"],

            'email' => ["required", "string", "max:100", "regex:/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/", "unique:tb_user"],

            "sign_pass" => ['required', Rules\Password::defaults()],

            'phone' => ["required", "regex:/[0-9]$/", "max:13", "min:8", "unique:tb_user"],
            'sign_address' => ["required", "max:225"],

        ]);
        if ($request->hasFile('sign_image')) {
            $file = $request->file('sign_image');
            $extension = strtolower($file->getClientOriginalExtension()); //lay ten mo rong cua file
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'gif') {
                return redirect("sign_up")->with('err_msg', 'you just can choice  jpg,png,jpeg,gif');
            }
            if ($file->getSize() > 1000000) {
                redirect("sign_up")->with('err_msg', 'you just can choice <= 1000k');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("user/images", $imageName);
        } else {
            $imageName = "avatar4.png";
        }


        Db::table("tb_user")->insert([
            "name" => $request->sign_name,
            "email" => $request->email,
            "password" => md5($request->sign_pass),
            "phone" => $request->phone,
            "address" => $request->sign_address,
            "role" => "customer",
            "image" => $imageName,


        ]);

        return  redirect("login");
    }

    public function loadViewforgetPassword()
    {

        return view('user.page-items.fogetPassword');
    }
    // ---- Để  sao -------========== Có phi --------------/////////
    // có tính thương mại
    // public function  liveforgetPassword()
    // {
    //     $receiverNumber = "+84912888935";
    //     $message = "All About Laravel";

    //     try {

    //         $account_sid = getenv("TWILIO_SID");
    //         $auth_token = getenv("TWILIO_TOKEN");
    //         $twilio_number = getenv("TWILIO_FROM");

    //         $client = new Client($account_sid, $auth_token);
    //         $client->messages->create($receiverNumber, [
    //             'from' => $twilio_number,
    //             'body' => $message

    //         ]);

    //         dd('SMS Sent Successfully.');

    //     } catch (Exception $e) {
    //         dd("Error: ". $e->getMessage());
    //     }



    // }


    // public function  liveforgetPassword()

    // {

    // //  VonageMessage::sendSMS('8412888935', 'Hello from Vonage!');

    // $user=User::first();
    // $user->notifications (new AccountApproved);

    // return redirect("login ");

    // }
    // ----------------End


    public function  liveforgetPassword(Request $request)
    {


        $request->validate([
            'email' => ["required", "string", "max:100", "regex:/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/"],
        ]);

        $code_verified =  "FG" . substr(md5(microtime()), rand(0, 26), 5);


        $result = DB::table("tb_user")->where("email", $request->email)->exists();
        $username = DB::table("tb_user")->where("email", $request->email)->first();

        if ($result == true) {
            $data = [
                "code" => $code_verified,
                "username" => $username->name,
            ];

            DB::table("tb_user")->where("email", $request->email)->update([
                "email_verified_at" => $code_verified,
            ]);
            $request->session()->put("email_verifile", $request->email);
            Mail::to($request->email)->send(new Sendmail($data));

            return  redirect("create-new-pass");
        } else {


            return  redirect("forgetPassword")->with("error_send_mail", "Email doesn't exists");
        }
    }


    public function loadViewCreateNewPass()
    {
        return view('user.page-items.create-again-pass');
    }

    public function active_new_pass(Request $request)
    {


        $request->validate([

            "code_verifile" => ["required", "string", "max:50"],
            "new_password" => ["required", Rules\Password::defaults()],

        ]);

        $code_exists = DB::table("tb_user")->where("email", $request->session()->get("email_verifile"))->where("email_verified_at", $request->code_verifile)->exists();
        if ($code_exists == true) {
            if ($request->session()->has("email_verifile")) {

                DB::table("tb_user")->where("email", $request->session()->get("email_verifile"))->where("email_verified_at", $request->code_verifile)->update([
                    "password" => md5($request->new_password),
                ]);
                $request->session()->forget("email_verifile");
                return redirect("login")->with("success_change_pass_forget", "Congratulation. You have successfully changed");
            } else {
                return  redirect("create-new-pass");
            }
        } else {
            return  redirect("create-new-pass")->with("error_code_exists", "Code doesn't exists");
        }
    }



    //login google
    // nhớ là nó đi theo thứ tự redirectToGoogle->callback_google(url_redircet sẽ ề thằng  callback_google)
    public function redirectToGoogle()
    {
        $user = Socialite::driver('google')->redirect();
        return $user;
    }

    public function callback_google(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect("login");
        }

        // dd($user);
        $google_id = User::where("google_id", $user->getId())->exists();
        $user_id = User::where("google_id", $user->getId())->first();
        // https://lh3.googleusercontent.com/a/AGNmyxbLxzPplnanPJCTMOT7IqoLdm1dN5BjKZowul41=s96-c
        if ($google_id == true) {
            $request->session()->put("login_google", true);
            $request->session()->put("customer_id", $user_id->id);
            $request->session()->put("image_upload_profile_user",true);

            // $request->session()->put("username", $user->getName());
            // $request->session()->put("username", $user->getName());

            return  redirect("home");
        } else {
            User::create([
                "google_id" => $user->getId(),
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "image" => $user->getAvatar(),
                "password" => "",
                "role" => "customer"

            ]);
            $request->session()->put("login_google", true);
            $google_id_check = User::where("google_id", $user->getId())->first();
            $request->session()->put("customer_id", $google_id_check->id);

            return  redirect("home");
        }
    }





}
