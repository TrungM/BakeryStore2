@extends('admin.layout.layout')
@section('title', 'product')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail order </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail order</li>
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
                        <h3 class="card-title">Account order</h3>
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
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->email }}</td>
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
                        <h3 class="card-title">Detail recevicer</h3>
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

                <div class="card" style="margin-bottom: 2rem">
                    <div class="card-header">
                        <h3 class="card-title">Detail product of order</h3>
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
                                    <th> product_size </th>
                                    <th> delivery </th>
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
                                        $subtotal = $p->product_price * $p->product_quantity + $p->product_size_price;
                                    @endphp
                                    <tr>
                                        <td>{{ $p->order_code }}</td>
                                        <td>{{ $p->product_name }}</td>
                                        <td>${{ number_format($p->product_price, 2, ',', '.') }}</td>
                                        <td>{{ $p->product_quantity }}</td>
                                        <td>{{ $p->product_size }}</td>
                                        <td>$20.00</td>
                                        <td>${{ number_format($subtotal, 2, ',', '.') }}</td>

                                    </tr>
                                    <tr>

                                    </tr>
                                @endforeach


                            </tbody>

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

@endsection
