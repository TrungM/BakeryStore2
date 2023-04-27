@extends('admin.layout.layout')
@section('title', ' product status')

@section('content')

    <section class="content-header" style="text-decoration-line: underline 1px black">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sales Statistics of <span style="color:#007bff">{{ $product_id->product_name }} </span> </h1>
                    <h3 class="card-title " style="color: green">
                        @if (session('status'))
                            {{ session('status') }}
                        @endif
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sales Statistics </li>
                    </ol>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card-body">
                <table id="product" class="table table-bordered table-hover" style=" margin-bottom: 2rem;">
                    <thead>
                        <tr>
                            <th>Quantity </th>
                            <th>Sold </th>

                            <th>Available </th>

                        </tr>
                    </thead>
                    <tbody>
                        <td>{{ $product_id->product_qty }}</td>

                        @if ($product_id->product_qty_sold == null)
                            <td style="color:red">Don't Sell </td>
                        @else
                            <td>{{ $product_id->product_qty_sold }}</td>
                        @endif

                        @if ($product_id->product_qty - $product_id->product_qty_sold <= 0)
                            <td style="color:red">Sold out</td>
                        @else
                            <td style="font-weight:bold">{{ $product_id->product_qty - $product_id->product_qty_sold }}</td>
                        @endif

                    </tbody>
                </table>

                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="" id="product_id" value="{{ $product_id->product_id }}">
                        <select class="form-control" id="filterselectionproduct">
                            <option value=""> numbers of sales </option>
                            <option value="apremonth">a prev month (31 date)</option>
                            <option value="acurrentmonth">a current month (31 date)</option>
                            <option value="ayear">a year</option>
                        </select>
                    </div>
                </form>

            </div>

            <div id="productchart" style="height: 250px;"></div>


            <section class="content-header" style="text-decoration-line: underline 1px black">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Size Statistics of <span style="color:#007bff">{{ $product_id->product_name }} </span> </h1>
                            <h3 class="card-title " style="color: green">
                                @if (session('status'))
                                    {{ session('status') }}
                                @endif
                            </h3>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div id="productchartDonut" style="height: 250px;"></div>

        </div><!-- /.container-fluid -->
    </section>


@stop
@section('script-section')
    <script>
        $(document).ready(function() {

            var chartproduct2 =   new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'productchartDonut',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                barColors: ["#007bff", ' #dc3545','#ffc107'],
                fillOpacity: 0.6,
                parseTime: false,
                hideHover: "true",
                // The name of the data record attribute that contains x-values.
                xkey: 'size',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['quantity','sold','avaliable'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['quantity','sold','avaliable'],
            });




            loadProductChart();
            loadProductChart2();


            var chartproduct = new Morris.Area ({
                // ID of the element in which to draw the chart.
                element: 'productchart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                lineColors: ["#007bff", ' #dc3545'],
                fillOpacity: 0.6,
                parseTime: false,
                hideHover: "true",
                // The name of the data record attribute that contains x-values.
                xkey: 'period',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['quantity'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['sold'],
            });


            // filter

            function loadProductChart() {
                var product_id = $("#product_id").val();
                var _token = $('input[name="_token"]').val();

                // alert(value_s);

                $.ajax({

                    url: '{{ url('filterproduct') }}',
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        _token: _token,
                        product_id: product_id,
                    },

                    success: function(data) {
                        chartproduct.setData(data);

                    }


                });
            }

            function loadProductChart2() {
                var product_id = $("#product_id").val();
                var _token = $('input[name="_token"]').val();

                $.ajax({

                    url: '{{ url('productSizeChart') }}',
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        _token: _token,
                        product_id: product_id,
                    },

                    success: function(data) {
                        chartproduct2.setData(data);
                    }


                });
            }

            $("#filterselectionproduct").change(function(e) {

                var product_v = $(this).val();
                var product_id = $("#product_id").val();
                var _token = $('input[name="_token"]').val();

                // alert(value_s);

                $.ajax({

                    url: '{{ url('filterselectionproduct') }}',
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        _token: _token,
                        product_id: product_id,
                        product_v: product_v,
                    },

                    success: function(data) {
                        chartproduct.setData(data);
                    }


                });
            })



        });
    </script>
@endsection
