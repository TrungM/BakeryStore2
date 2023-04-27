@extends('admin.layout.layout')
@section('title', 'chart')
@section('content')
    <div style="min-height: 1345.52px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Order Satistics</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Order Satistics</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>




        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group" style="display: flex">
                                <select class="form-control" style="flex-basis: 20%; margin-right: 1rem "
                                    id="filterselectionorderYear">
                                    <option value="all"> All year </option>
                                    <option value="1"> 1/2023 </option>
                                    <option value="2"> 2/2023 </option>
                                    <option value="3"> 3/2023 </option>
                                    <option value="4"> 4/2023 </option>
                                    <option value="5"> 5/2023 </option>
                                    <option value="6"> 6/2023 </option>
                                    <option value="7"> 7/2023 </option>
                                    <option value="8"> 8/2023 </option>
                                    <option value="9"> 9/2023 </option>
                                    <option value="10"> 10/2023 </option>
                                    <option value="11"> 11/2023 </option>
                                    <option value="12"> 12/2023 </option>

                                </select>
                                <select class="form-control" id="filterselectionorder">
                                    <option value=""> Choose option </option>

                                    <option value="aweek"> This week </option>
                                    <option value="apremonth">a prev month (31 date)</option>
                                    <option value="acurrentmonth">a current month (31 date)</option>
                                </select>
                            </div>

                        </form>
                    </div>

                    <div id="myChartOrder" style="height: 250px;"></div>

                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

    </div>

    <script>
        $(document).ready(function() {
            load30datechart();
            var chart = new Morris.Area({
                element: 'myChartOrder',

                lineColors: ["#007bff", "#dc3545"],
                data: [],
                fillOpacity: 0.6,
                parseTime: false,
                hideHover: "true",
                xkey: 'period',
                ykeys: ['sales', 'order'],

                labels: ['sales', 'order'],
            });

            // var chartNoVal = new Morris.Area({
            //     element: 'myChartNotAvailable',
            //     data: [],
            //     lineColors: ['#ff0000'],
            //     xkey: 'period',
            //     ykeys: ['sales', 'order'],
            //     labels: ['sales', 'order'],
            // });

            function load30datechart() {
                var _token = $('input[name="_token"]').val();

                $.ajax({

                    url: '{{ url('dasboard_filter7date') }}',
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        _token: _token,
                    },

                    success: function(data) {
                        chart.setData(data);
                    }
                });

            }



            // // filter

            $("#filterselectionorder").change(function(e) {

                var value_s = $(this).val();
                var _token = $('input[name="_token"]').val();


                $.ajax({

                    url: '{{ url('dasboard_filter_order') }}',
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        _token: _token,
                        value_s: value_s,
                    },

                    success: function(data) {
                        chart.setData(data);

                    }


                });
            })


            $("#filterselectionorderYear").change(function(e) {

                var value_s = $(this).val();
                var _token = $('input[name="_token"]').val();

                // alert(value_s);

                $.ajax({

                    url: '{{ url('dasboard_filter_order_Year') }}',
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        _token: _token,
                        value_s: value_s,
                    },

                    success: function(data) {
                        if (data.length > 0) {
                            chart.setData(data);
                        } else {
                            $('#myChartOrder').html('No data available.');
                        }
                    }


                });
            })




        })
    </script>
@endsection
