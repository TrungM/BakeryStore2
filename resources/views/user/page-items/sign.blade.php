<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section id="sign">
        <div class="sign-form-container">
            <form method="POST" action="{{url("active_sign")}}"  enctype="multipart/form-data">
                @csrf
                <h3> Sign in Bakery.vn</h3>
                <div>
                    <input type="text" name="sign_name" placeholder="Enter your name" id="" class="box" >
                    @error("sign_name")
                        <small style="color:red; font-size:1rem" >{{$message}}</small>
                    @enderror
                </div>
                <div>
                    <input type="text" name="email" placeholder="Enter your email" id="" class="box" >
                    @error("email")
                        <small style="color:red; font-size:1rem" >{{$message}}</small>
                    @enderror
                </div>
                <div>
                    <input type="password" name="sign_pass" placeholder="Enter your password" id="" class="box">
                    @error("sign_pass")
                    <small style="color:red; font-size:1rem" >{{$message}}</small>
                @enderror
                </div>
                <div>
                    <input type="text" name="phone" placeholder="Enter your phone" id="" class="box">
                    @error("phone")
                    <small style="color:red; font-size:1rem" >{{$message}}</small>
                @enderror
                </div>
                <div>
                    <div class="container_file">
                        <div class="button-wrap">
                          <label class="button_file" for="upload">Upload Image</label>
                          <input id="upload" type="file" name="sign_image">

                        </div>
                        <small style="color:red; font-size:1rem; font-style:italic; font-weight:200;opacity:0.9"  >Just upload ["jqg","png","jpeg","gif"]</small>
                      </div>
                </div>
                <input type="submit" value="Sign up now " class="btn" name="btn_sign">
                <div class="text-sign">
                    <p>--Another option--</p>
                </div>

                <div class="option-sign">
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

                <p style="text-align:center"> <a href="{{url("login")}}">Back sign in </a></p>
                <div style="padding: 0.5rem 0.5rem ">

                    <small style="color:red; font-size:1rem" >  @if(session('login_fail') )
                        {{session('login_fail')}}
                        @endif</small>


                </div>
            </form>




        </div>
    </section>
</body>
<link rel="stylesheet" href="{{ asset("user/css/sign.css")}}">

</html>



