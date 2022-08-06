@extends('admin.layout.layout');
@section('title', 'product');
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liet ke chi tiet don hang </h1>
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
                {{-- customer-tb --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin tài khoản mua hàng </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="shipping" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $customer->customer_name }}</td>
                                    <td>{{ $customer->customer_phone }}</td>
                                    <td>{{ $customer->customer_email }}</td>
                                </tr>



                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{-- shipping-tb --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin người nhận hàng </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="shipping" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Shipping Name</th>
                                    <th>Shipping Address</th>
                                    <th>Shipping Phone</th>
                                    <th>Shipping Note</th>
                                    <th>Shipping Day</th>
                                    <th>Shipping Times</th>
                                    <th>Shipping Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $shipping->shipping_name }}</td>
                                    <td>{{ $shipping->shipping_address }}</td>
                                    <td>{{ $shipping->shipping_phone }}</td>
                                    <td>{{ $shipping->shipping_note }}</td>
                                    <td>{{ $shipping->shipping_time_day }}</td>
                                    <td>{{ $shipping->shipping_time_hour }}</td>
                                    <td>{{ $shipping->shipping_payment }}</td>

                                </tr>



                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{-- order-detail-tb --}}

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin chi sản phẩm trong đơn hàng </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="shipping" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    {{-- <th> order_detail_id </th> --}}
                                    <th> order_code </th>
                                    <th> product_name </th>
                                    <th> product_price</th>
                                    <th> product_quantity </th>
                                    <th> product_total</th>

                                    {{-- <th> product_size </th>
                                    <th> product_size_am</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($order_details as $p)
                                @php

                            $subtotal=$p->product_price * $p->product_quantity
                            // $total+=$subtotal
                                @endphp
                                    <tr>
                                        <td>{{ $p->order_code }}</td>
                                        <td>{{ $p->product_name }}</td>
                                        <td>{{ number_format($p->product_price, 0, ',', '.') }}</td>
                                        <td>{{ $p->product_quantity }}</td>
                                        <td>{{ number_format( $subtotal, 0, ',', '.') }}</td>

                                    </tr>
                                    <tr>

                                    </tr>
                                    {{-- <td>{{$order_by_id->shipping_time_hour}}</td>
                                   <td>{{$order_by_id->shipping_payment}}</td> --}}
                                @endforeach


                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
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
        $(function() {
            $('#product').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });

        function confirm() {
            return confirm(are u sure);
        }
    </script>
@endsection
