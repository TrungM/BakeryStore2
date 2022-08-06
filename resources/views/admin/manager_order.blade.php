@extends('admin.layout.layout');
@section('title', 'product');
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dữ liệu đơn hàng </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
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
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="product" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Order_number</th>
                                    <th>Order Code</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Create_at</th>
                                    <th>Detail_order</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                            @endphp
                                @foreach ($order as $p)
                                    <tr>
                                    <td>

                                        {{$i++}}
                                        </td>
                                        <td>{{ $p->order_code }}</td>
                                        <td>{{ $p->order_total }}</td>
                                        <td>{{$p->order_status}}
                                            <a class="btn btn-info btn-sm"
                                            href="{{ URL::to('admin/update/' . $p->order_code) }}">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        </td>
                                        <td>{{ $p->created_at }}</td>

                                        {{-- <td><img width="100px" src="{{ url('images/'.$p->image) }}" /></td> --}}
                                        <td class="text-right">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ URL::to('admin/view_order/' . $p->order_code) }}">
                                                <i class="fas fa-folder"></i> View
                                            </a>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
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
{{-- asset de bat link js --}}
{{-- url bat link route --}}
@section('script-section')
    <script>
        function confirm() {
            return confirm(are u sure);
        }
    </script>
@endsection
