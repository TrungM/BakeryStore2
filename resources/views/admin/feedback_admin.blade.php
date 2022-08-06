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
                                    <th>Feedback</th>
                                    <th>Feedback_image</th>
                                    <th>Customer_id</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Product</th>
                                    <th>order_code</th>
                                    <th>Action</th>
                                    <th>Reply</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedback as $a)
                                    <tr>
                                        <td>{{ $a->feedback }}
                                            @foreach ($feedback_rep as $p)
                                                @if ($p->feedback_reply == $a->feedback_id)
                                                    <li style="color: red">{{ $p->feedback }}</li>
                                                @endif
                                            @endforeach


                                        </td>
                                        <td>{{ $a->feedback_image }}</td>
                                        <td>{{ $a->customer_id }}</td>
                                        <td>{{ $a->feedback_date }}</td>
                                        <td>{{ $a->feedback_status }}</td>

                                        <td><a
                                                href="{{ url('view-product/' . $a->product->product_id) }}">{{ $a->product->product_name }}</a>
                                        </td>
                                        {{-- <td>{{ $a->rating->order_code }}</a> --}}
                                        </td>
                                        <td>{{ $a->order_code }}</td>

                                        <td>
                                            @if ($a->feedback_status == 1)
                                                <button class="btn-info feedback_btn"
                                                    style="padding: 0.1em; height:2rem; width:7rem" data-feedback-status="0"
                                                    data-feedback-id="{{ $a->feedback_id }}"
                                                    id="{{ $a->product_id }}">
                                                    Chưa duyệt
                                                </button>
                                            @else
                                                <button class="btn-danger btn-sm feedback_btn" data-feedback-status="1"
                                                    data-feedback-id="{{ $a->feedback_id }}"
                                                    id="{{ $a->product_id }}">
                                                    Đã duyệt
                                                </button>
                                            @endif


                                        </td>
                                        @if ($a->feedback_status == 1)
                                            <td style="width: 7rem">
                                                <div style="padding: 1rem 1rem ;">
                                                        <textarea name="" id="" cols="20" rows="8" placeholder="Trả lời bình luận"
                                                        class="reply_feedback_{{ $a->feedback_id }}"  ></textarea><br>

                                                    <button class=" btn-success btn-sm btn-rely-feedback"
                                                        style="margin-top:1.2rem "
                                                        data-product_id="{{ $a->product_id }}"
                                                        data-feedback-id="{{ $a->feedback_id }}"
                                                        onclick="return alert('Duyet tra loi')"> <i
                                                            class="fas fa-pencil-alt"></i> Trả lời </button>



                                                </div>


                                            </td>
                                        @endif
                                    </tr>
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
    {{-- asset de bat link js --}}
    {{-- url bat link route --}}
@stop
@section('script-section')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>



        $(".feedback_btn").click(function() {
            var feedback_status = $(this).data('feedback-status');
            var feedback_id = $(this).data('feedback-id');
            var product_id = $(this).attr('id');
            if (feedback_status == 0) {
                alert("Duyet thanh cong ");
            } else {
                alert("Bo duyet");
            }


            $.ajax({

                url: '{{ url('allow_feedback') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    feedback_status: feedback_status,
                    feedback_id: feedback_id,
                    product_id: product_id
                },

                success: function(data) {
                    location.reload();
                }


            });
        });


        $(".btn-rely-feedback").click(function() {
            var feedback_id = $(this).data('feedback-id');
            var feedback = $(".reply_feedback_" + feedback_id).val();
            var product_id = $(this).data('product_id');

            $.ajax({

                url: '{{ url('reply_feedback') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    feedback: feedback,
                    feedback_id: feedback_id,
                    product_id: product_id,

                },

                success: function(data) {
                    location.reload();


                }


            });

        })
    </script>
@endsection
