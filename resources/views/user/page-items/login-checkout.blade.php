<!-- login-form  -->

<div class="login-form-container">

    <form action="{{ url('checkLogin') }}" method="post">
        {{ @csrf_field() }}
        <h3>login form</h3>
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:red;">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
        <input type="text" name="email" placeholder="enter your email" id="" class="box">
        <input type="password" name="pwd" placeholder="enter your password" id="" class="box">
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">remember me</label>
        </div>
        <input type="submit" value="login now" class="btn">
        <p style="padding-top: 0px; padding-bottom:1rem">or</p>
        <div class="login-google">
            <a href="{{ route('login.google') }}">
                <img src="	https://accounts.fullstack.edu.vn/assets/images/signin/google-18px.svg"
                    alt="Đăng nhập với google"><span>Đăng nhập với google</span>
            </a>
        </div>


        <p>forget password? <a href="#">click here</a></p>


        <p>don't have an account? <a href="{{ URL::to('sign') }}">create one</a></p>
    </form>

</div>
<link rel="stylesheet" href="{{ asset('user/css/login.css') }}">
<script src="{{ asset('user/js/login.js') }}"></script>
