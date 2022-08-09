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
                        <a href="{{ URL('admin/add_size') }}" class="card-title">Add new size</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="product" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Size</th>
                                    <th>Size_Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($size as $p)
                                    <tr>
                                        <td>{{ $p->product_id }}</td>
                                        <td>{{ $p->size }}</td>

                                        <td>{{ $p->size_price }}</td>
                                        <td class="text-left">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ url('admin/update_size/' . $p->size_id) }}">
                                                <i class="fas fa-pencil-alt"></i> Edit

                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url('delete_size/' . $p->size_id) }}"
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


    </script>
@endsection
