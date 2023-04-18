@extends('admin.layout.layout')

@section('content')
    <section class="content-header" style="text-decoration-line: underline 1px black">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password</h1>
                    <h3 style="color: green; font-size:1rem ">
                        @if (session('success_edit'))
                            {{ session('success_edit') }}
                        @endif

                    </h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row" style="display: flex; justify-content: center ;">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Change Password </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form method="POST" action="{{ url('admin/change_password/update/' . $admin_id->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="newpassword">New Password </label>
                                    <input type="password" class="form-control" id="newpassword" value=""
                                        name="password">
                                    @error('password')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="confirmpassword">Confirm Password </label>
                                    <input type="password" class="form-control" id="confirmpassword" value=""
                                        name="password_confirmation">

                                    @error('password_confirmation')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success update_change_password">Save</button>
                            </div>
                        </form>


                        <!-- /.card -->



                    </div>
                    <!--/.col (left) -->

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
    </section>
@endsection
@section('script-section')
<script>
    $(".update_change_password").click(function(e) {
            $choose = confirm("Are you sure update password");
            if ($choose == true) {
                window.load();
            } else {
                e.preventDefault();

            }
        });


</script>

@stop

