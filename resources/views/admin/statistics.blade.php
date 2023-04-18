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
                                <p>Bounce Rate</p>
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
                                <h3>44</h3>
                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>
                                <p>Unique Visitors</p>
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
                            <div class="card-header" style=" display:flex; justify-content: space-between  ">

                                <button class="btn btn-secondary" aria-controls="example1" type="button"><a
                                        href="{{ URL::to('admin/productinsert') }}"><span
                                            style="font-size: 1rem; color:#fff">Add
                                            New Product</span></a>
                                </button>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="datepicker" name="datefrom "
                                            placeholder="Enter date from ">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="datepicker2" name="dateto"
                                            placeholder="Enter date to ">
                                    </div>
                                    <div class="form-group">
                                    <select  class="form-control"  id="filterselection">
                                        <option value="">Select option </option>

                                        <option value="aweek">a week </option>
                                        <option value="apremonth">a prev month (31 date)</option>
                                        <option value="acurrentmonth">a current month (31 date)</option>
                                        <option value="ayear">a year</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary" name="btn-filter-statistic" id="btn-filter-statistic">Filter</button>
                                    </div>
                                </form>

                            </div>

                            <div id="myfirstchart" style="height: 250px;"></div>

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
