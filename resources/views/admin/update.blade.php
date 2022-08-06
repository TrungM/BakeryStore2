@extends('admin.layout.layout');
@section('title', 'product');
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật trình trạng đơn hàng </h1>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        @foreach ($order as $p)
                            @if ($p->order_status = 'Đang xử lý')
                                <form action=""class="order_status">
                                    @csrf
                                    <select style="width:50rem">
                                        <option value="">---Chon---</option>
                                        <option id={{ $p->order_id }} value="Đang xử lý">Đang xử lý</option>
                                        <option id={{ $p->order_id }} value="Đang giao">Đang giao </option>
                                        <option id={{ $p->order_id }} value="Hoàn thành">Hoàn thành </option>
                                    </select>
                                    <a class="btn btn-success btn-sm"  onclick="return alert('Cap nhat thanh cong')">
                                        Cập nhật
                                    </a>
                                </form>
                            @elseif ($p->order_status = 'Đang giao')
                                <form action="" class=" order_status">
                                    @csrf
                                    <select style="width:50rem">
                                        <option value="">---Chon---</option>
                                        <option id={{ $p->order_id }} value="Đang xử lý">Đang xử lý</option>
                                        <option id={{ $p->order_id }} selected value="Đang giao">Đang giao </option>
                                        <option id={{ $p->order_id }} value="Hoàn thành">Hoàn thành </option>
                                    </select>
                                    <a class="btn btn-success btn-sm"   onclick="return alert('Cap nhat thanh cong')">
                                        Cập nhật
                                    </a>
                                </form>
                            @elseif ($p->order_status = 'Hoàn thành')
                                <form action="" class="order_status">
                                    @csrf
                                    <select style="width:50rem">
                                        <option value="">---Chon---</option>
                                        <option id={{ $p->order_id }} value="Đang xử lý">Đang xử lý</option>
                                        <option id={{ $p->order_id }} value="Đang giao">Đang giao </option>
                                        <option id={{ $p->order_id }} selected value="Hoàn thành">Hoàn thành </option>
                                    </select>
                                    <a class="btn btn-success btn-sm"  onclick="return alert('Cap nhat thanh cong')">
                                        Cập nhật
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
                console.log(order_status);
                var order_id = $(this).children(":selected").attr("id");
                var _token = $('input[name="_token"]').val();


                $.ajax({

                    url: '{{ url('update_status') }}',
                    method: 'POST',
                    data: {
                        _token: _token,
                        order_status: order_status,
                        order_id: order_id
                    },

                    success: function(data) {

                    }


                });
            });


        });



        // const order=document.querySelector(".order_status");
        // const orderSelect=document.querySelector(".order_status select");

        // order.addEventListener("change", function(){
        // console.log(orderSelect.value);
        // })
    </script>

@endsection
