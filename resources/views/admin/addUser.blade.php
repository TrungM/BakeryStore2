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
                    <div class="card-header">
                        <h3 class="card-title">Create New Admin</h3>
                    </div>


                    <form enctype="multipart/form-data" method="POST" action="{{ url('admin/addUser') }}" onsubmit="return kiemtra()">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Email: </label>
                                <input type="email" name="email" required pattern="[a-zA-z0-9]{5.}@[a-zA-Z]{2,6}.[a-z]{2,6}"/>
                                <span class="error-message" id="email" style="color: red">*</span>
                            </div>
                            <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" name="password" required/>
                                <span class="error-message" id="password" style="color: red">*</span>
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password:</label>
                                <input type="password" name="confirm" required/>
                                <span class="error-message" id="confirm" style="color: red">*</span>
                            </div>
                            <div class="form-group">
                                <label for="">Fullname:</label>
                                <input type="text" name="fullname" required/>
                                <span class="error-message" id="fullname" style="color: red">*</span>
                            </div>
                            <div class="form-group">
                                <label for="">Birthday:</label>
                                <input type="date" name="birthday" />

                            </div>
                            <div class="form-group">
                                <label for="">Phone:</label>
                                <input type="number" name="phone" required pattern="[0-9+]{"/>
                                <span class="error-message" id="phone" style="color: red">*</span>
                            </div>
                            <div class="form-group">
                                <label for="">Address:</label>
                                <input name="address" required/>
                                <span class="error-message" id="address" style="color: red">*</span>
                            </div>
                            <div class="form-group">
                                <label for="">Profile_pic</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="profile_pic" name="profile_pic">
                                        <label class="custom-file-label" for="">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="">Role:</label>
                                <select name="is_staff">
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div>
                            @if (session('err_msg'))
                                <h6 style="color: red">
                                    Errors: {{ session('err_msg') }}
                                </h6>
                            @endif
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
