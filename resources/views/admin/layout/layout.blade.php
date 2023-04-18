<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <!-- datatlabe -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.layout.nav-bar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layout.main-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('admin.layout.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/js/demo.js') }}"></script>
    <!-- datatable -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    {{-- <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
    </script> --}}

    <!-- page script -->
    @yield('script-section')

    <script>
        // $(function() {


        //     $("#datepicker").datepicker({
        //         // prevText:"Tháng trước",
        //         // nextText:"Tháng sau",
        //         dateFormat: "yy-mm-dd",
        //         // // dayNameMin:,
        //         // duration:"slow",

        //     });
        //     $("#datepicker2").datepicker({
        //         // prevText:"Tháng trước",
        //         // nextText:"Tháng sau",
        //         dateFormat: "yy-mm-dd",
        //         // // dayNameMin:,
        //         // duration:"slow",

        //     });


        // });

        // $(document).ready(function() {
        //     load30datechart();
        //     var chart = new Morris.Bar({
        //         // ID of the element in which to draw the chart.
        //         element: 'myfirstchart',
        //         // Chart data records -- each entry in this array corresponds to a point on
        //         // the chart.
        //         barColors: ["#6610f2", '  #007bff', ' #dc3545', '#ffc107'],
        //         fillOpacity: 0.6,
        //         parseTime: false,
        //         hideHover: "true",
        //         //             #007bff;
        //         // --indigo: #6610f2;
        //         // --purple: #6f42c1;
        //         // --pink: #e83e8c;
        //         // --red: #dc3545;
        //         // --orange: #fd7e14;
        //         // --yellow: #ffc107;
        //         // --green: #28a745;
        //         // --teal: #20c997;
        //         // --cyan: #17a2b8;
        //         // --white: #fff;


        //         // The name of the data record attribute that contains x-values.
        //         xkey: 'period',
        //         // A list of names of data record attributes that contain y-values.
        //         ykeys: ['total', 'sales', 'profit', 'quantity'],
        //         // Labels for the ykeys -- will be displayed when you hover over the
        //         // chart.
        //         labels: ['total', 'sales', 'profit', 'quantity'],
        //     });

        //     function load30datechart() {
        //         var _token = $('input[name="_token"]').val();

        //         $.ajax({

        //             url: '{{ url('dasboard_filter30date') }}',
        //             method: 'POST',
        //             dataType: "JSON",
        //             data: {
        //                 _token: _token,
        //             },

        //             success: function(data) {
        //                 chart.setData(data);
        //             }
        //         });

        //     }



        //     // filter

        //     $("#filterselection").change(function(e) {

        //         var value_s = $(this).val();
        //         var _token = $('input[name="_token"]').val();

        //         // alert(value_s);

        //         $.ajax({

        //             url: '{{ url('dasboard_filter') }}',
        //             method: 'POST',
        //             dataType: "JSON",
        //             data: {
        //                 _token: _token,
        //                 value_s: value_s,
        //             },

        //             success: function(data) {
        //                 chart.setData(data);

        //             }


        //         });
        //     })

        //     $("#btn-filter-statistic").click(function(e) {

        //         var from_date = $("#datepicker").val();
        //         var to_date = $("#datepicker2").val();
        //         var _token = $('input[name="_token"]').val();

        //         $.ajax({

        //             url: '{{ url('filter_date_statistic') }}',
        //             method: 'POST',
        //             dataType: "JSON",
        //             data: {
        //                 _token: _token,
        //                 from_date: from_date,
        //                 to_date: to_date
        //             },

        //             success: function(data) {
        //                 chart.setData(data);

        //             }


        //         });
        //     })


        // })
    </script>

</body>

</html>
