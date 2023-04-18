@extends('user.layout.index')
@section('content')
    <div id="wrapper">
        <div class="heading">
            <img src="images/heading-img.png" alt="">
            <h3>Purchases</h3>
        </div>
        @foreach ($ds as $item)
            <ul>
                <li class="order-items">
                    <div class="order-detail-items">
                        <div class="order-detail-items-header">
                            <div class="order-code">
                                <span style="text-transform: none">#{{ $item->order_code }}</span>
                            </div>
                            <div class="order-status-header">
                                <span>{{ $item->order_status }}</span>
                            </div>
                        </div>
                        <div style="border: #333 solid 1px;"></div>
                        <div style="border: #333 solid 1px;"></div>
                        <div class="order-detail-items-footer">
                            <div class="order-text-footer">
                                <span style="font-size: medium;"> Fee Delivery </span>

                                <span>Total ( {{ $item->order_items }} items) </span>
                            </div>
                            <div class="order-date">
                                <span style="font-size: medium;">$20.00</span>
                                <span>${{ $item->order_total }}</span>
                            </div>
                        </div>
                    </div>
                </li>
                <div class="angle-js-down" data-items={{ $item->order_id }}>
                    <i class="fa fa-angle-down icon"></i>
                </div>
                <div class="angle-js-up" data-itemsup={{ $item->order_id }} style="display: none">
                    <i class="fa fa-angle-up icon"></i>
                </div>


            </ul>
        @endforeach


    </div>

    <div class="bg-hover">
        <div class="container-star">
            <div class="post-btn">
                <div class="text-confirm">Thanks for rating us!</div>
                <div class="edit-btn">EDIT</div>
            </div>
            <div class="detail_product_feedback">

                <div>
                    <a href="{{ URL::to('purchase/' . Session::get('customer_id')) }}">
                        <i class="fas fa-times"
                            style="font-size: 2.5rem; color:#fd7e14; cursor: pointer;
                        "></i>
                    </a>
                </div>
                <div class="heading">
                    <h3>Feedback</h3>
                </div>


                <div class="load_rating "></div>
                <div class="detail_product_s">
                    <div class="product_user">
                        <img src={{ url('user/images/' . $a->product_images) }} alt="">


                        <div class="detail_product_content">
                            <div class="detail_product_content_name">
                                <h3 style="margin: 0px; ">{{ $a->product_name }}</h3>
                            </div>


                            <div class="rating_product" data-order_product="{{ $a->product_id }}">
                                <p> Feedback
                                </p>
                            </div>


                        </div>


                    </div>

                    <form action="{{ URL::to('send_feedback/' . $a->product_id) }}" method="POST"
                        enctype="multipart/form-data" style="display: none" class="form-f-conent">
                        @csrf
                        <div id="error_textarea"
                            style="padding:1rem 1rem ; font-size:1.4rem; font-weight:bold; margin-left:1rem">
                        </div>
                        <input type="hidden" name="order_code" class="order_code_product" value="{{ $a->order_code }}">


                        <div class="textarea-feedback">
                            <textarea cols="30" placeholder="Description feedback ." name="content_feedback"></textarea>
                        </div>
                        <div class="btn-option">
                            <div class="btn-img">
                                <input type="file" name="multiple_files[]" id="multiple_files"
                                    class="textarea-feedback_text" multiple>
                                <div id="error_img" style=" font-size:1rem; margin-left:1rem; ">
                                </div>
                                <div id="error_null" style=" font-size:1rem; margin-left:1rem; ">
                                </div>
                            </div>
                            <div class="btn-post-feedback">
                                <input type="submit" value="POST">
                            </div>
                        </div>


                    </form>



                </div>

            </div>
        </div>
    </div>



    <link rel="stylesheet" href="{{ asset('user/css/purchase.css') }}">
    {{-- <script src="{{ asset('user/js/purchase.js') }}"></script> --}}

    <script>
        $(document).ready(function() {

            // $("#multiple_files").change(function() {
            //     var files = $('#multiple_files')[0].files;
            //     if (files.length > 1) {
            //         alert(files)
            //         $("#multiple_files").val("");
            //         $("#error_img").html(
            //             "<span style='color:#fff'; font-size:4rem; >Vui lòng chon duoi 1 anh</span>");
            //     }

            //     if (files.size > 2000000) {
            //         error += 'Vui lòng chon duoi 2000000 ';
            //         $("#multiple_files").val("");
            //         $("#error_img").html(
            //             "<span style='color:#fff'; font-size:4rem; >" + error + "</span>");
            //     }

            // })


            $("input[type='file']").change(function() {

                var files = $(this)[0].files;
                var error = $(this).next("#error_img");

                if (files.length > 1) {
                    $(this).val("");
                    error.html(
                        "<span style='color:#fff'; font-size:4rem; >Please enter your less than 1 image </span>"
                        );
                }

                if (files.size > 2000000) {
                    error += 'Please enter your less than  2000000 MB ';
                    $("#multiple_files").val("");
                    $("#error_img").html(
                        "<span style='color:#fff'; font-size:4rem; >" + error + "</span>");
                }


            })
            $("form").on("submit", function(event) {
                var fb = $(this).find("textarea").val();
                var fb_img = $(this).find("input[type='file']")[0].files;
                var error_text = $(this).find("#error_textarea");
                var error_img = $(this).find("#error_null");


                var error = "";
                if (fb.trim().length == 0) {
                    event.preventDefault();
                    error += 'Enter your description';
                    error_text.html(
                        "<span style='color:red'; font-size:4rem; >" + error + "</span>");

                }

                if (fb_img.length == " ") {
                    event.preventDefault();
                    error_img.html(
                        "<span style='color:#fff'; font-size:10rem; >Please upload image </span>");
                }
            });
        })

        $(".rating_product").click(function(e) {
            // $(".bg-hover").addClass("order-active_bg");
            var order_product_id = $(this).data("order_product");
            // alert(order_product_id)
            $.ajax({
                url: '{{ url('load-rating') }}',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    order_product_id: order_product_id
                },
                success: function(data) {
                    $(".load_rating").html(data);

                }
            });
        })





        function remove_background(product_id) {
            for (var i = 1; i <= 5; i++) {
                $('#' + product_id + '-' + i).css("color", "black");
            }
        }

        // hover chuột khong  đánh giá sao
        $(document).on("click", '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data("product_id");
            remove_background(product_id);
            for (var i = 1; i <= index; i++) {
                $('#' + product_id + '-' + i).css("color", "#be9c79");
            }
        });


        // // click đánh giá sao
        $(document).on("click", ".rating", function(e) {

            var index = $(this).data("index");
            var product_id = $(this).data("product_id");
            var order_code = $(".order_code_product").val();
            $.ajax({
                url: '{{ url('insert-rating') }}',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    index: index,
                    product_id: product_id,
                    order_code: order_code
                },
                success: function(data) {

                    if (data == 'done') {
                        // alert("You has sent feedback successfully")
                        $(".form-f-conent").attr("style", "display:block");
                        // history.back()
                    } else if (data == 'done2') {
                        alert("Product has sent feedback !!!")
                    }
                }
            });


        });

        $(".detail_button").click(function(e) {
            e.preventDefault();
            var product_id = $(this).data("product_id");
            var order_detail_code = $(".order_code_product").val();
            var order_detail_shipping = $(this).data("order_detail_shipping")

            $(".show_detail").slideToggle(1000);
            $.ajax({
                url: '{{ url('showDetailorder') }}',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    product_id: product_id,
                    order_detail_code: order_detail_code,
                    order_detail_shipping: order_detail_shipping
                },
                success: function(data) {
                    $(".show_detail").html(data);

                }


            })
        });
    </script>
@endsection
