@extends('admin.layout.layout')

@section('content')
    <section class="content-header" style="text-decoration-line: underline 1px black">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile Admin</h1>
                    <h3 style="color: green; font-size:1rem ">
                        @if (session('success_edit'))
                            {{ session('success_edit') }}
                        @endif

                    </h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile Admin</li>
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
                            <h3 class="card-title">Profile Admin </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ url('admin/profile/edit/' . $profile->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="adminname">Admin Name </label>
                                    <input type="text" class="form-control" id="adminname" value="{{ $profile->name }}"
                                        name="admin_name">

                                    @error('admin_name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="adminemail">Admin Email</label>
                                    <input type="text" class="form-control" id="adminemail" value="{{ $profile->email }}"
                                        readonly>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Admin Password</label>
                                    <div style="display:flex; ">
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password" value={{ $profile->password }} name="admin_password"
                                            readonly>
                                        <a href="{{ URL::to('admin/change_password/' . $profile->id) }}"><button
                                                type="button" class="btn btn-success">Change </button></a>
                                    </div>

                                    @error('admin_password')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" class="form-control" id="role" value="{{ $role->role_name }}"
                                        readonly>
                                </div> --}}
                                <div class="form-group">
                                    <label for="">Profile Image</label>
                                    <div class="input-group">
                                        <img src="{{ asset('admin/img/' . $profile->image) }}" alt=""
                                            width="20%">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="admin_image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose Image</label>

                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>


                                    </div>
                                    @error('admin_image')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    @if (session('error_upload'))
                                        <small class="form-text text-danger"> {{ session('error_upload') }}</small>
                                    @endif
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success update_profile_admin">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->



                </div>
                <!--/.col (left) -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    @endsection

    @section('script-section')
    <script>
        $(".update_profile_admin").click(function(e) {
                $choose = confirm("Are you sure update profile");
                if ($choose == true) {
                    window.load();
                } else {
                    e.preventDefault();

                }
            });


    </script>

@stop

