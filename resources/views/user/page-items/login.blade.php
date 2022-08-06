<!-- login-form  -->

<div class="login-form-container">

    <form action="{{URL:: to('admin-dashboard')}}" method="POST">
        {{@csrf_field()}}
        <h3>login form</h3>
        <?php
        $message= Session::get('message');
        if($message){
echo '<span style="color:red;">'.$message.'</span>';
Session::put('message', null);
        }
        ?>
        <input type="text" name="admin_name" placeholder="enter your username" id="" class="box">
        <input type="password" name="password" placeholder="enter your password" id="" class="box">
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">remember me</label>
        </div>
        <input type="submit" value="login now" class="btn">
        <p style="padding-top: 0px; padding-bottom:1rem">or</p>        <div class="login-google">
            <a href="">
                <img
                src="	https://accounts.fullstack.edu.vn/assets/images/signin/google-18px.svg" alt="Đăng nhập với google"><span>Đăng nhập với google</span>
            </a>
        </div>


        <p>forget password? <a href="#">click here</a></p>


        <p>don't have an account? <a href="sign">create one</a></p>
    </form>

</div>
<link rel="stylesheet" href="{{ asset('user/css/login.css') }}">
<script src="{{ asset('user/js/login.js') }}"></script>
