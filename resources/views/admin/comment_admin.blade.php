@extends('admin.layout.layout')
@section('title', 'comment')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List comment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Comment</li>
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
                        <h3 class="card-title"> </h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="shipping" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Comment</th>
                                    <th>Comment_name</th>
                                    <th>Comment_date</th>
                                    <th>Product_id</th>
                                    <th>Action</th>
                                    <th>Reply</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comment as $a)
                                    <tr>
                                        <td>{{ $a->comment }}
                                            @foreach ($comment_rep as $p)
                                                @if ($p->comment_reply == $a->comment_id)
                                                    <li style="color: red">{{ $p->comment }}</li>
                                                @endif
                                            @endforeach


                                        </td>
                                        <td>{{ $a->comment_name }}</td>
                                        <td>{{ $a->comment_date }}</td>
                                        <td><a
                                                href="{{ url('view-product/' . $a->product->product_id) }}">{{ $a->product->product_name }}</a>
                                        </td>

                                        <td>
                                            @if ($a->comment_status == 1)
                                                <button class="btn-info comment_btn"
                                                    style="padding: 0.1em; height:2rem; width:7rem" data-comment-status="0"
                                                    data-comment-id="{{ $a->comment_id }}" id="{{ $a->product_id }}">
                                                    Accept
                                                </button>
                                            @else
                                                <button class="btn-danger btn-sm comment_btn" data-comment-status="1"
                                                    data-comment-id="{{ $a->comment_id }}" id="{{ $a->product_id }}">
                                                    UnAccept
                                                </button>
                                            @endif


                                        </td>
                                        @if ($a->comment_status == 1)
                                            <td style="width: 7rem">
                                                <div style="padding: 1rem 1rem ;">
                                                    <textarea name="" id="" cols="20" rows="8" placeholder="Trả lời bình luận"
                                                        class="reply_comment_{{ $a->comment_id }}"></textarea><br>

                                                    <button class=" btn-success btn-sm btn-rely-comment"
                                                        style="margin-top:1.2rem " data-product_id="{{ $a->product_id }}"
                                                        data-comment-id="{{ $a->comment_id }}"
                                                        onclick="return alert('Duyet tra loi')"> <i
                                                            class="fas fa-pencil-alt"></i> Reply </button>


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
@section('script-section')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // $(function() {
        //     $('#product').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": false,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //     });
        // });




        $(".comment_btn").click(function() {
            var comment_status = $(this).data('comment-status');
            var comment_id = $(this).data('comment-id');
            var product_id = $(this).attr('id');
            if (comment_status == 0) {
                alert("Success ");
            } else {
                alert("Unaccept");
            }


            // alert(comment_status);
            // alert(comment_id);
            // alert(product_id);
            $.ajax({

                url: '{{ url('allow_comment') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment_status: comment_status,
                    comment_id: comment_id,
                    product_id: product_id
                },

                success: function(data) {
                    location.reload();
                }


            });
        });


        $(".btn-rely-comment").click(function() {
            var comment_id = $(this).data('comment-id');
            var comment = $(".reply_comment_" + comment_id).val();
            var product_id = $(this).data('product_id');

            $.ajax({

                url: '{{ url('reply_comment') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment: comment,
                    comment_id: comment_id,
                    product_id: product_id,

                },

                success: function(data) {
                    location.reload();


                }


            });

        })
    </script>
@stop

@endsection
