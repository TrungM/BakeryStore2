@extends('admin.layout.layout');
@section('title','product');
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>STAFF</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" style="color: red">Staff List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <h5><a href="{{ url('admin/displayAddUser') }}">Add Staff </a></h5>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Full name</th>

                    <th>Active</th>
                    <th>Actions</th>
                    <th>Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ds as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->name }}</td>

                    <td>{{ $u->is_active == 1 ? 'Active' : 'Disable' }}</td>
                    <td><a href="{{url("admin/resetPassword/{$u->id}")}}">Reset Password</a> |
                        <a href="{{url("user/details/{$u->id}")}}">View Profile</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@stop
@section('script-section')
    <script>
        $(function () {
            $('#product').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
        function xacnhan(){
            return confirm('are u sure ?');
        }
    </script>
@endsection
