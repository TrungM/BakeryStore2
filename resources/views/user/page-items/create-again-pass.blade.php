<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section id="forgetPassword">
        <div class="forgetPassword-form-container">
            <form method="POST" action="{{url("active_new_pass")}}">
                @csrf
                <h3> Create New Password  Bakery.vn</h3>
                <div>
                    <input type="text" name="code_verifile" placeholder="Enter your code " id="" class="box">
                    @error("code_verifile")
                    <small style="color:red; font-size:1rem" >{{$message}}</small>
                @enderror

                <small style="color:red; font-size:1rem;" >  @if(session('error_code_exists') )
                    {{session('error_code_exists')}}
                    @endif</small>
                </div>

                <div>
                    <input type="password" name="new_password" placeholder="Enter your  new password" id="" class="box">
                    @error("new_password")
                    <small style="color:red; font-size:1rem" >{{$message}}</small>
                @enderror
                </div>

                <input type="submit" value="Create new  " class="btn" name="btn_login ">

                <p style="text-align:center"> <a href="{{url("login")}}">Back sign in </a></p>

                <div style="padding: 0.5rem 0.5rem ;text-align:center">


                        <small style="color:red; font-size:1rem;" >  @if(session('error_send_mail') )
                            {{session('error_send_mail')}}
                            @endif</small>

                </div>
            </form>

        </div>
    </section>
</body>
<link rel="stylesheet" href="{{ asset("user/css/login.css")}}">

</html>



