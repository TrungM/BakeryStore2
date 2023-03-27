@extends('admin.layout.layout')
@section('title', 'product')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Order Status </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> List order </li>
                        <li class="breadcrumb-item active"> Order Status </li>

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
                    <!-- /.card-header -->
                    <div class="card-body">
                        @foreach ($order as $p)
                            @if ($p->order_status = 'Pending')
                                <form action=""class="order_status">
                                    @csrf
                                    <select style="width:50rem">
                                        <option value="">---Choose---</option>
                                        <option id={{ $p->order_id }} value="Pending">Pending</option>
                                        <option id={{ $p->order_id }} value="Delivery">Delivery </option>
                                        <option id={{ $p->order_id }} value="Success">Success</option>
                                    </select>
                                    </a>
                                </form>
                            @elseif ($p->order_status = 'Delivery')
                                <form action="" class=" order_status">
                                    @csrf
                                    <select style="width:50rem">
                                        <option value="">---Choose---</option>
                                        <option id={{ $p->order_id }} value="Pending">Pending</option>
                                        <option id={{ $p->order_id }} selected value="Delivery">Delivery </option>
                                        <option id={{ $p->order_id }} value="Success">Success</option>
                                    </select>

                                    </a>
                                </form>
                            @elseif ($p->order_status = 'Success')
                                <form action="" class="order_status">
                                    @csrf
                                    <select style="width:50rem">
                                        <option value="">---Choose---</option>
                                        <option id={{ $p->order_id }} value="Pending">Pending</option>
                                        <option id={{ $p->order_id }} value="Delivery">Delivery </option>
                                        <option id={{ $p->order_id }} selected value="Success">Success</option>
                                    </select>

                                    </a>
                                </form>
                            @endif
                        @endforeach



                    </div>
                    <!-- /.card-body -->
                </div>


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('script-section')
    <script>
        $(document).ready(function() {
            $('.order_status select').change(function() {
                var order_status = $(this).val();
                var order_id = $(this).children(":selected").attr("id");
                var _token = $('input[name="_token"]').val();

                $choose = confirm("Are you sure edit status ");
                if ($choose == true) {
                    $.ajax({

                        url: '{{ url('update_status') }}',
                        method: 'POST',
                        data: {
                            _token: _token,
                            order_status: order_status,
                            order_id: order_id
                        },

                        success: function(data) {
                            window.location.href =
                                "http://localhost/BakeryStore/public/admin/manager_order";
                        }


                    });
                } else {
                    window.location.href =
                                "http://localhost/BakeryStore/public/admin/manager_order";
                }


            });


        });



        // const order=document.querySelector(".order_status");
        // const orderSelect=document.querySelector(".order_status select");

        // order.addEventListener("change", function(){
        // console.log(orderSelect.value);
        // })
    </script>

@endsection
