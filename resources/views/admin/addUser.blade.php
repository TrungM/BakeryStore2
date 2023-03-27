@extends('admin.layout.layout')
@section('title', 'create-new-product')
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
                    <div class="card-header">
                        <h3 class="card-title">Create New Admin</h3>
                    </div>

                    <form method="POST" action="{{ url('admin/addUser') }}" >
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Email: </label>
                                <input type="email" name="email" id="email" />
                                {{-- required pattern="[a-zA-z0-9]{5.}@[a-zA-Z]{2,6}.[a-z]{2,6}"/> --}}
                                <span class="error-message" style="color: red">*{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" name="password" id="password" required/>
                                <span class="error-message" style="color: red">*{{ $errors->first('password') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password:</label>
                                <input type="password" name="confirm" id="confirm" required/>
                                <span class="error-message" id="confirm" style="color: red">*{{ $errors->first('confirm') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Fullname:</label>
                                <input type="text" name="fullname" required/>
                                <span class="error-message" id="fullname" style="color: red">*{{ $errors->first('fullname') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="">Phone:</label>
                                <input type="number" name="phone" required />
                                <span class="error-message" style="color: red">*{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Address:</label>
                                <input type="text" name="address" required/>
                                <span class="error-message" style="color: red">*{{ $errors->first('address') }}</span>
                            </div>

                            <div>
                                <label for="">Role:</label>
                                <select name="role">
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" onclick="return kiemtra()">Submit</button>
                        </div>

                    </form>
                </div>


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
