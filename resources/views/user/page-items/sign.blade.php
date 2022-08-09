
<div class="login-form-container">


    <form action="{{ URL('addCustomer') }}" method="POST">
        {{ @csrf_field() }}
        <h3>sign form</h3>
        <input type="username" name="customer_name" placeholder="enter your fullname" id="customer_name" class="box"><span
            class="error-message" style="color: red">*{{ $errors->first('customer_name') }}</span>
        <input type="password" name="customer_password" placeholder="enter your password" required
            id="customer_password" class="box" /><span class="error-message" id="customer_password"
            style="color: red">*{{ $errors->first('customer_password') }}</span>
        <input type="password" name="passwordconfirm" id="passwordconfirm" placeholder="enter your confirm password"
            required class="box" /><span class="error-message" id="passwordconfirm" style="color: red">*{{ $errors->first('passwordconfirm') }}</span>
        <input type="text" name="customer_phone" placeholder="enter your phone" required pattern="[0-9+]{6,}"
            class="box"><span class="error-message" id="phone" style="color: red">*{{ $errors->first('customer_phone') }}</span>
        <input type="email" name="customer_email" placeholder="enter your email" id="customer_email" class="box"
            required pattern="[a-zA-z0-9]{5.}@[a-zA-Z]{2,6}.[a-z]{2,6}"><span class="error-message" id="email"
            style="color: red">*{{ $errors->first('customer_email') }}</span>
        <input type="text" name="customer_address" placeholder="enter your address" required class="box"><span
            class="error-message" id="address" style="color: red">*{{ $errors->first('customer_address') }}</span>


        <input type="submit" value="Sign up" class="btn">

    </form>

</div>
<link rel="stylesheet" href="{{ asset('user/css/sign.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="{{ asset('user/js/sign.js') }}"></script>
<script>
    function kiemtra() {
        let name = $("#customer_name").val().trim();
        if (name.length == 0) {
            $("#customer_name").focus();
            $("#message").html("Username cannot empty! <br>");
            return false;
        }
        let user = $("#customer_email").val().trim();
        if (email.length == 0) {
            $("#customer_email").focus();
            $('#message').html("Email can not leave empty");

            return false;
        }

        //2. kiem tra password
        let pass = $("#customer_password").val().trim();
        if (pass.length == 0) {
            $("#customer_password").focus();
            $('#message').html("Password can not leave empty");
            return false;
        }

        //3. kiem tra password confirm
        let repass = $("#passwordconfirm").val().trim();
        if (pass !== repass) {
            $("#passwordconfirm").focus();
            $('#message').html("Password confirm wrong");
            return false;
        }
                    }
</script>
