@extends('user.layout.index')
@section('content')
    <div id="wrapper">
        <div id="header">
            <span class="user-item-txt">Thông
                tin tài
                khoản</span>
        </div>
        <div id="main">
            <div id="sidebar">
                <div class="user-info-left">
                    <div class="user-info-card"
                        style="background: linear-gradient(rgb(255, 149, 34) 0%, rgb(218, 84, 9) 50%); min-height: 50px;border-radius: .7rem;
                    border: .1rem solid rgba(0, 0, 0, .2);">
                        @foreach ($cus_detail as $a)
                            <div class=""><canvas class="barcode" width="244" height="10"></canvas>
                                <p style="padding:2rem 2rem; text-align: center;">Mã số khách hàng</p>
                                <p class="code-number">{{$a->customer_id}}</p>
                            </div>

                    </div>
                    <div class="user-information-menu">
                        <ul class="user-information-list">
                            <li class="user-information-item1 color-li-sidebar"><i class="fa-solid fa-user"
                                    style="color: #be9c79;
                            ; margin-left: 1rem;"></i> <span
                                    class="user-item-txt">Thông
                                    tin tài
                                    khoản</span>
                            </li>
                            <li class="user-information-item2"><i class="fa-solid fa-user-shield"
                                    style="color: #be9c79;
                            ; margin-left: 1rem"></i><span
                                    class="user-item-txt">Quyền lợi thành viên</span>

                            </li>
                            <li class="user-information-item3">

                                <i class="fa-solid fa-user-clock"
                                    style="color: #be9c79;
                            ; margin-left: 1rem"></i> <span
                                    class="user-item-txt">Tình trạng đơn hàng</span>

                            </li>

                            <li class="user-information-item4">
                                <a href="{{ URL::to('history_order/'.$a->customer_id) }}" >
                                    <i class="fa-solid fa-clock-rotate-left"
                                    style="color: #be9c79;
                            ;margin-left: -2rem;"></i> <span  style="color:black",
                                    class="user-item-txt">Lịch sử mua
                                    hàng</span>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

            <div id="content">
                <div class="user-info-right ">
                    <!-- Thong tin khach hang -->
                    <?php
                    // $order_status = Session::get('order_status');
                    ?>
                    <div class="user-information-form ">

                        @foreach ($cus_detail as $a)
                            <div class="user-header">
                                <h4>Thông tin tài khoản khách hàng</h4>
                            </div>
                            <form action="{{ URL::to('update_customer/' . $a->customer_id) }}" method="POST"
                                class="user-form-group">
                                @csrf
                                <div>
                                    <label for="">Tên khách hàng</label><br>
                                    <input type="text" name="customer_name" id="username"
                                        value="{{ $a->customer_name }}" class="user-form-items" required>
                                </div>
                                <div>
                                    <label for="">Email</label><br>
                                    <input type="email" name="customer_email" id="email" class="user-form-items"
                                        style="background: #ededed;" value="{{ $a->customer_email }}" readonly>
                                </div>
                                <div>
                                    <label for="">Mật khẩu </label><br>
                                    <input type="password" name="customer_password" style="background: #ededed;"
                                        id="password" value="{{ $a->customer_password }}" class="user-form-items" readonly>
                                </div>
                                <div>
                                    <label for="">Số điện thoại</label><br>
                                    <input type="text" name="customer_phone" id="number-sdt"
                                        value="{{ $a->customer_phone }}" class="user-form-items" required>
                                </div>
                                <div>
                                    <label for="">Địa chỉ </label><br>
                                    <input type="text" name="customer_address" id="address"
                                        value="{{ $a->customer_address }}" class="user-form-items" required>
                                </div>

                                <div>

                                    <button class="btn user-button">Cập nhật </button>


                                </div>
                            </form>
                        @endforeach

                    </div>
                    <!-- Tinh tang don hang  -->
                    <div class="order active-user-information">

                        <div class="status-order ">
                            @foreach ($status as $p)
                                <div>
                                    <div style="margin-top: 1rem">
                                        <div class="code-order"
                                            style="background: linear-gradient(rgb(255, 149, 34) 0%, rgb(218, 84, 9) 50%); min-height: 50px;border-radius: .7rem;
                                 border: .1rem solid rgba(0, 0, 0, .2); ">
                                            Mã số đơn hàng :{{ $p->order_code }}</div>

                                        <div class="order-information">
                                            <div class="order-header">
                                                <div class="header-text-order">
                                                    <?php
                                                    if ( $p->order_status=="Hoàn thành" )
                                                    {
                                                 ?>
                                                    <h4 style="color: green">{{ $p->order_status }} </h4>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <h4>{{ $p->order_status }} </h4>

                                                    <?php
                                                    }
                                                    ?>
                                                </div>

                                                <div class="delete-oreder detail_button"
                                                    data-order_detail_shipping="{{ $p->shipping_id }}"
                                                    data-order_detail_code="{{ $p->order_code }}">
                                                    <a href="">
                                                        <p style="color:#fd7e14"><i class="fa-solid fa-folder"></i>Chi tiết
                                                            đơn hàng </p>
                                                    </a>
                                                </div>
                                                <?php
                                                   if ( $p->order_status=="Đang xử lý" )
                                                    {
                                                ?>
                                                <div class="delete-oreder"     onclick="return confirm('Bạn chắc chứ ')">
                                                    <a href="{{ URL::to('delete_order/' . $p->order_code) }}">
                                                        <p><i class="fa-solid fa-trash-can"></i>Hủy đơn </p>
                                                    </a>
                                                </div>
                                                <?php
                                                         }
                                              elseif( $p->order_status=="Đang giao")
                                                    {
                                                    ?>
                                                <div class="delete-oreder" style="display:none">
                                                    <a href="{{ URL::to('delete_order/' . $p->order_code) }}"
                                                    >
                                                        <p><i class="fa-solid fa-trash-can"></i>Hủy đơn </p>
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                            elseif( $p->order_status=="Hoàn thành")
                                            {
                                                   ?>
                                                <div class="delete-oreder" style="display:none">
                                                    <a href="{{ URL::to('delete_order/' . $p->order_code) }}">
                                                        <p><i class="fa-solid fa-trash-can"></i>Hủy đơn </p>
                                                    </a>
                                                </div>
                                                <div class="delete-oreder btn_fb">
                                                    <a href="{{ URL::to('feedback_order/' . $p->order_code) }}">
                                                        <p style="color:#be9c79">
                                                            <i class="fa-solid fa-comment-dots"
                                                                style="padding:1 rem 1rem ; "></i>Viết đáng giá
                                                        </p>
                                                    </a>
                                                </div>
                                                <?php
                                                             }


                                                    ?>


                                            </div>
                                        </div>

                                        <div class="show_detail "></div>

                                        <div class="total"
                                            style="background: linear-gradient(rgb(255, 149, 34) 0%, rgb(218, 84, 9) 50%); min-height: 50px;
                                          border: .1rem solid rgba(0, 0, 0, .2); ">
                                            <div class="header-text">
                                                <h3 style="padding-left:1rem ;">Tổng cộng </h3>
                                            </div>
                                            <hr>
                                            <div class="footer-header">
                                                <div class="price-delivery">
                                                    <h5>Phí vận chuyển</h5>
                                                    <p>30.000 VNĐ</p>

                                                </div>
                                                <div class="price-footer">
                                                    <h5>Thành tiền </h5>
                                                    <p>{{ $p->order_total }}</p>

                                                </div>

                                                <div class="total-price">
                                                    <h5>Tổng </h5>
                                                    <p>{{ $p->order_total }}</p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <?php
                                    $order_code_product = DB::table('tb_order_detail')
                                        ->join('products', 'products.product_id', '=', 'tb_order_detail.product_id')
                                        ->where('order_code', $p->order_code)
                                        ->get();

                                    ?>

                                    <div class="bg-hover">
                                        <div class="container-star">
                                            <div class="post-btn">
                                                <div class="text-confirm">Thanks for rating us!</div>
                                                <div class="edit-btn">EDIT</div>
                                            </div>
                                            <div class="detail_product_feedback">

                                                <div>
                                                    <i class="fas fa-times"
                                                        style="font-size: 2.5rem; color:#fd7e14;     cursor: pointer;
                "></i>

                                                </div>
                                                <div class="header-feedback">
                                                    <p> Đánh giá sản phẩm </p>
                                                </div>
                                                <div>
                                                    @if (session('message'))
                                                        <h6 style="color: red;font-size:1.5rem;">
                                                            Lỗi:{{ session('message') }}
                                                        </h6>
                                                    @else
                                                    @endif
                                                    @if (session('message1'))
                                                        <h6 style="color: #fd7e14;font-size:1.5rem;">
                                                            {{ session('message1') }}
                                                        </h6>
                                                    @endif
                                                </div>
                                                <div class="load_rating "></div>
                                                @foreach ($order_code_product as $a)
                                                    <div class="detail_product_s">
                                                        <div class="product_user">
                                                            <img src={{ url('user/images/' . $a->product_images) }}
                                                                alt="">


                                                            <div class="detail_product_content">
                                                                <div class="detail_product_content_name">
                                                                    <h3 style="margin: 0px; ">{{ $a->product_name }}</h3>
                                                                </div>


                                                                <div class="rating_product"
                                                                    data-order_product="{{ $a->product_id }}">
                                                                    <p> Đánh giá
                                                                    </p>
                                                                </div>


                                                            </div>


                                                        </div>

                                                        <form action="{{ URL::to('send_feedback/' . $a->product_id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div id="error_textarea"
                                                                style="padding:1rem 1rem ; font-size:1.4rem; font-weight:bold; margin-left:1rem">
                                                            </div>
                                                            <input type="hidden" name="order_code"
                                                                class="order_code_product" value="{{ $a->order_code }}">

                                                            @foreach ($cus_detail as $a)
                                                                <input type="hidden" name="customer_id"
                                                                    class="order_code_product"
                                                                    value="{{ $a->customer_id }}">
                                                            @endforeach
                                                            <div class="textarea-feedback">
                                                                <textarea cols="30" placeholder="Mô tả đánh giá ." name="content_feedback"></textarea>
                                                            </div>
                                                            <div class="btn-option">
                                                                <div class="btn-img">
                                                                    <input type="file" name="multiple_files[]"
                                                                        id="multiple_files" class="textarea-feedback_text"
                                                                        multiple>
                                                                    <div id="error_img"
                                                                        style=" font-size:1rem; margin-left:1rem; ">
                                                                    </div>
                                                                    <div id="error_null"
                                                                        style=" font-size:1rem; margin-left:1rem; ">
                                                                    </div>
                                                                </div>
                                                                <div class="btn-post-feedback">
                                                                    <input type="submit" value="POST">
                                                                </div>
                                                            </div>


                                                        </form>



                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                            @endforeach


                        </div>


                    </div>

                </div>
                <div class="paginate order-active">
                    {{ $status->links() }}

                </div>




            </div>

               <!-- Lich su don hang  -->

        </div>

    </div>


    </div>
    </div>
    </div>

    </div>
    <link rel="stylesheet" href="{{ asset('user/css/information-user.css') }}">
    <script src="{{ asset('user/js/user_details.js') }}"></script>
    <style>
        th {
            padding: 1.4rem;
            text-align: center;

        }

        .order-active {
            display: none;
        }

        .order-active_bg {
            top: 0px;

        }
    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                        "<span style='color:#fff'; font-size:4rem; >Vui lòng chon duoi 1 anh</span>");
                }

                if (files.size > 2000000) {
                    error += 'Vui lòng chon duoi 2000000 ';
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
                    error += 'Vui lòng nhập nội dung';
                    error_text.html(
                        "<span style='color:red'; font-size:4rem; >" + error + "</span>");

                }

                if (fb_img.length == " ") {
                    event.preventDefault();
                    error_img.html(
                        "<span style='color:#fff'; font-size:10rem; >Vui lòng chon  anh</span>");
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

        $(".fa-times").click(function(e) {
            e.preventDefault();
            $(".bg-hover").removeClass("order-active_bg ");

        })
        $(".btn_fb").click(function(e) {
            e.preventDefault();
            $(".bg-hover").addClass("order-active_bg");

        })




        function remove_background(product_id) {
            for (var i = 1; i <= 5; i++) {
                $('#' + product_id + '-' + i).css("color", "black");
            }
        }
        // hover chuột đánh giá sao
        $(document).on("mouseenter", '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data("product_id");
            // alert(index);
            // alert(product_id);
            remove_background(product_id);
            for (var i = 1; i <= index; i++) {
                $('#' + product_id + '-' + i).css("color", "#be9c79");
            }
        });

        // hover chuột khong  đánh giá sao
        $(document).on("mouseleave", '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data("product_id");
            // var rating = $(this).data("rating");
            remove_background(product_id);
            // alert(rating);
            for (var i = 1; i <= index; i++) {
                $('#' + product_id + '-' + i).css("color", "#be9c79");

            }
        });
        // // click đánh giá sao
        $(document).on("click", ".rating", function() {

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

                    if (data == 'done')
                        alert("Bạn đã đánh giá " + index + " trên 5");

                    else if (data == 'done2') {
                        alert("Lỗi đánh giá");
                    }
                }


            })
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
