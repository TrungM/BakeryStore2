
<div class="login-form-container">

    <form action="{{URL::to('add_customer')}}" method="POST">
        {{@csrf_field()}}
        <h3>sign form</h3>
        <input type="username" name="customer_name" placeholder="enter your username" id="" class="box"><span class="error-message" id="fullname" style="color: red">*</span>
        <input type="password" name="customer_password" placeholder="enter your password" required id="" class="box" /><span class="error-message" id="password" style="color: red">*</span>
        <input type="password" name="passwordconfirm" placeholder="enter your confirm password" required class="box"/><span class="error-message" id="password" style="color: red">*</span>
        <input type="text" name="customer_phone" placeholder="enter your phone" required pattern="[0-9+]{6,}" class="box"><span class="error-message" id="phone" style="color: red">*</span>
        <input type="email" name="customer_email" placeholder="enter your email" id="" class="box" required pattern="[a-zA-z0-9]{5.}@[a-zA-Z]{2,6}.[a-z]{2,6}"><span class="error-message" id="email" style="color: red">*</span>
        <input type="text" name="customer_address" placeholder="enter your address" required class="box"><span class="error-message" id="address" style="color: red">*</span>
        <input type="hidden" name="role" placeholder="enter your address" required class="box" value="0"><span class="error-message" id="address" style="color: red">*</span>

        <input type="submit" value="Sign up" class="btn">

    </form>

</div>
<link rel="stylesheet" href="{{ asset('user/css/sign.css') }}">
<script src="{{ asset('user/js/sign.js') }}"></script>
<script>
    function kiemtra() {
                        //1 kiem tra user
                        let user = $("#email").val().trim();
                        if (email.length == 0) {
                            $("#email").focus();
                            $('#email').html("Email can not leave empty");
                            console.log($('#email').html("email can not leave empty"))
                            return false;
                        }

                        //2. kiem tra password
                        let pass = $("#password").val().trim();
                        if (pass.length == 0) {
                            $("#password").focus();
                            $('#password').html("Password can not leave empty");
                            return false;
                        }

                        //3. kiem tra password confirm
                        let repass = $("#passwordconfirm").val().trim();
                        if (pass !== repass) {
                            $("#passwordconfirm").focus();
                            $('#password').html("Password confirm wrong");
                            return false;
                        }
                    }
</script>
