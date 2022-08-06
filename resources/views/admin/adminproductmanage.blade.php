@extends('admin.layout.layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Manager</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ URL('admin/productinsert') }}" class="card-title">Add new product</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-controller" id="search" name="search" placeholder="Enter Product Name">
                        </div>
                        <table id="product" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Category ID</th>
                                    <th>Star</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $p)
                                    <tr>
                                        <td>{{ $p->product_id }}</td>
                                        <td>{{ $p->product_name }}</td>
                                        <td>{{ $p->product_price }}</td>
                                        <td><img width="100px" src="{{ url('user/images/' . $p->product_images) }}" />
                                        </td>

                                        <td>{{ $p->product_description }}</td>
                                        <td>{{ $p->category_id }}</td>
                                        <td>{{ $p->product_star }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ url('admin/productupdate/' . $p->product_id) }}">
                                                <i class="fas fa-pencil-alt"></i> Edit

                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url('admin/delete/' . $p->product_id) }}"
                                                onclick="return xacnhan()">
                                                <i class="fas fa-trash"></i> Delete

                                            </a>
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
@endsection
@section('script-section')
    <script>
        function xacnhan() {
            return confirm("are you sure");
        }


        $(document).ready(function() {
            $('#search').on('keyup', function() {
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: "{{ URL::to('product2') }}",
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        $('tbody').html(data);
                    }
                });
            })
        });
    </script>
@endsection
