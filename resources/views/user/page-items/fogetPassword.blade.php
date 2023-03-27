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
            <form method="POST" action="{{url("active_forgetPassword")}}">
                @csrf
                <h3> Forget Password  Bakery.vn</h3>
                <div>
                    <input type="text" name="email" placeholder="Enter your email" id="" class="box" >
                    @error("email")
                        <small style="color:red; font-size:1rem" >{{$message}}</small>
                    @enderror
                </div>

                <input type="submit" value="Send code " class="btn" name="btn_login ">

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



