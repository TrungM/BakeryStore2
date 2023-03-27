<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section id="login">
        <div class="login-form-container">
            <form method="POST" action="{{url("active_login")}}">
                @csrf
                <h3> Sign in  Bakery.vn</h3>
                <div>
                    <input type="text" name="email" placeholder="Enter your email" id="" class="box" >
                    @error("email")
                        <small style="color:red; font-size:1rem" >{{$message}}</small>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password" placeholder="Enter your password" id="" class="box">
                    @error("password")
                    <small style="color:red; font-size:1rem" >{{$message}}</small>
                @enderror
                </div>

                <div class="remember">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remember-me">remember me</label>
                </div>
                <input type="submit" value="sign in now" class="btn" name="btn_login ">
                <div class="text-login">
                    <p>--Another option--</p>
                </div>

                <div class="option-login">
                    <a href="{{url("logingoogle")}}">
                        <div class="google">
                            <span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="35" width="50">
                                    <path fill="#4285f4" d="M386 400c45-42 65-112 53-179H260v74h102c-4 24-18 44-38 57z"></path>
                                    <path fill="#34a853" d="M90 341a192 192 0 0 0 296 59l-62-48c-53 35-141 22-171-60z"></path>
                                    <path fill="#fbbc02" d="M153 292c-8-25-8-48 0-73l-63-49c-23 46-30 111 0 171z"></path>
                                    <path fill="#ea4335" d="M153 219c22-69 116-109 179-50l55-54c-78-75-230-72-297 55z"></path>
                                </svg></span>

                            <p class="name-option" style="padding:0.4rem">Continue with Google</p>

                        </div>

                    </a>

                </div>

                <p style="text-align:center">forget password? <a href="{{url("forgetPassword")}}">click here</a></p>


                <p  style="text-align:center">don't have an account? <a href="{{url("sign")}}">create one</a></p>
                <div style="padding: 0.5rem 0.5rem ;text-align:center">

                    <small style="color:red; font-size:1rem;" >  @if(session('login_fail') )
                        {{session('login_fail')}}
                        @endif</small>

                        <small style="color:green; font-size:1rem;" >  @if(session('success_change_pass_forget') )
                            {{session('success_change_pass_forget')}}
                            @endif</small>
                </div>
            </form>




        </div>
    </section>
</body>
<link rel="stylesheet" href="{{ asset("user/css/login.css")}}">

</html>



