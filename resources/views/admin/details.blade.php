@extends('admin.layout.layout');
@section('title', 'create-new-product');
@section('content')


    <style>
        .container-fluid {
            margin-left: 100px
        }
    </style>

    <div class="container-fluid">
        <div class="row">

            <div>

                <div class="card card-primary">
                    <h2>Profile</h2>
                    <hr>
                    <div>ID: <input name="id" value="{{ $user->customer_id }}" readonly /></div>
                    <div>Email: <input name="email" value="{{ $user->customer_email }}" readonly /></div>
                    <div>Fullname: <input name="name" value="{{ $user->customer_name }}" readonly /></div>
                    <div>Address: <input name="address" value="{{ $user->customer_address }}" readonly /></div>
                    <div>Phone: <input type="text" name="phone" value="{{ $user->customer_phone }}" readonly /></div>
                    <div>Role: <select name="role" disabled>

                            <option value="1" @if ($user->role == 1) selceted @endif>Admin</option>
                            <option value="2" @if ($user->role == 2) selected @endif>Staff</option>
                        </select>
                    </div>

                </div>
                <a href="{{url('admin/staff')}}">Return</a>

            @endsection
            @section('script-section')
                <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
                <script>
                    $(function() {
                        bsCustomFileInput.init();
                    });


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
            @endsection
