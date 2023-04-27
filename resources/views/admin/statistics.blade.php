@extends('admin.layout.layout')
@section('title', 'statistics')
@section('content')
    <div style="min-height: 135.667px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 "><span style="color:#be9c79"> BakeryStore.Vn </span> Statistics</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Statistics </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$order_qty}}</h3>
                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>
                                <p>Turnover Rate/1month</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$user}}</h3>
                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ URL::to('admin/customer') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$ip_count}}</h3>
                                <p> Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="product" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Order Code</th>
                                            <th>Order Total</th>
                                            <th>Order Status</th>
                                            <th>Create_at</th>
                                            <th>Detail_order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                    @endphp
                                        @foreach ($order_today as $p)
                                            <tr>
                                            <td>

                                                {{$i++}}
                                                </td>
                                                <td>{{ $p->order_code }}</td>
                                                <td>${{ $p->order_total }}</td>
                                                <td>{{$p->order_status}}
                                                    <a class="btn btn-info btn-sm"
                                                    href="{{ URL::to('admin/update/' . $p->order_code) }}">
                                                    Edit
                                                </a>
                                                </td>
                                                <td>{{ $p->created_at }}</td>

                                                <td >
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

                            <div class="row paging">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                    </div>
                                </div>
                                {{ $order_today->links() }}
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>

    </div>
@endsection
