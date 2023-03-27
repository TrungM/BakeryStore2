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

            <div class="card card-primary">
                <form action="">
                    <div class="card-body">
                        <h2>{{ $u->customer_name }}</h2>
                        <table id="shipping" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Order code</th>
                                    <th>Order Total</th>
                                    <th>Order status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ds as $o)
                                <tr>
                                    <td>{{ $o->order_code }}</td>
                                    <td>{{ $o->order_total }}</td>
                                    <td>{{ $o->order_status }}</td>
                                    <td>{{ $o->created_at }}</td>

                                    <td><a href="{{ url("admin/customer_orderdetail/{$o->order_code}") }}">View Detail</a>
                                    </td>
                                </tr>
                            @endforeach




                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
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
