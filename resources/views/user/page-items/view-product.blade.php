@extends('user.layout.index')
@section('content')
    <div id="wrapper">

        <div id="header">
            <a href=" {{ URL::to('product') }}"title="Trở về trang sản phẩm ">Menu</a>
        </div>
        <div id="main">
            <div id="sidebar">
                <div class="box-heart">
                    <a class="fas fa-heart heart" id="{{ $p->product_id }}"></a>
                </div>
                <img src="{{ asset('user/images/' . $p->product_images) }}" alt="{{ $p->product_id }}">

            </div>
            <div id="content">
                <div class="view-product-item">
                    <h1 class="name-product" style="font-weight: bold;">{{ $p->product_name }}</h1>
                    <span style="font-size: 1.7rem;font-weight: bold;">
                        @if ($p->product_qty - $p->product_qty_sold <= 0)
                            <div style="color:red">Sold out</div>
                        @else
                            <div style="font-weight:bold">available: {{ $p->product_qty - $p->product_qty_sold }} <span
                                    style="text-transform: none">pieces</span> </div>
                        @endif
                    </span>

                    <div class="price-product">
                        <span>${{ $p->product_price }}</span>
                    </div>
                    <?php

                    $rating = DB::table('tb_rating')
                        ->where('product_id_star', $p->product_id)
                        ->avg('rating');
                    $rating = round($rating);
                    $product_size = DB::table('tb_size')
                        ->where('product_id', $p->product_id)
                        ->get();

                    ?>

                    <div style="cursor: no-drop">
                        @if ($rating == 1)
                            <i class="fas fa-star" style="color:#be9c79"></i>
                        @elseif ($rating == 2)
                            <i class="fas fa-star" style="color:#be9c79"></i>
                            <i class="fas fa-star" style="color:#be9c79"></i>
                        @elseif ($rating == 3)
                            <i class="fas fa-star" style="color:#be9c79"></i>
                            <i class="fas fa-star" style="color:#be9c79"></i>
                            <i class="fas fa-star" style="color:#be9c79"></i>
                        @elseif ($rating == 4)
                            <i class="fas fa-star" style="color:#be9c79"></i>
                            <i class="fas fa-star" style="color:#be9c79"></i>
                            <i class="fas fa-star" style="color:#be9c79"></i>
                            <i class="fas fa-star" style="color:#be9c79"></i>
                        @elseif ($rating == 5)
                            <i class="fas fa-star" style="color:#be9c79"></i>
                            <i class="fas fa-star" style="color:#be9c79"></i>
                            <i class="fas fa-star" style="color:#be9c79"></i>
                            <i class="fas fa-star" style="color:#be9c79"></i>
                            <i class="fas fa-star" style="color:#be9c79"></i>
                        @elseif ($rating == 0)
                            <p style="font-size:1.5rem ; color:#be9c79">Unassessed </p>
                        @endif

                        <input type="hidden" id="wishlist_productname{{ $p->product_id }}" value="{{ $p->product_name }}">
                        <input type="hidden" id="wishlist_productprice{{ $p->product_id }}"
                            value="${{ $p->product_price }}">
                        <input type="hidden" id="wishlist_productimage{{ $p->product_id }}"
                            src="{{ asset('user/images/' . $p->product_images) }}">
                        <input type="hidden" id="wishlist_producturl{{ $p->product_id }}" value="{{ $p->product_id }}"
                            href="{{ URL::to('view-product/' . $p->product_id) }}">
                        <input type="hidden" id="wishlist_productstar{{ $p->product_id }}" value="{{ $rating }}">

                    </div>
                    <form action="{{ URL::to('save_cart') }}" method="POST" class="form_viewproduct">
                        @csrf
                        <div class="size-product">
                            <h4>Size</h4>
                            <select name="size" id="size" class="icon-products">
                                <option value="">Choose size</option>
                                @foreach ($product_size as $value)
                                    <option value="{{ $value->size_id }}">{{ $value->size }}
                                        ${{ $value->size_price }}/({{ $value->Quantity_size - $value->Quantity_sold_size }})
                                    </option>
                                @endforeach

                            </select>
                            @error('size')
                                <p class="size_error">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="quantity">
                            <h4 style="font-size: 1.9rem;margin-right:2rem;">Quantity</h4>
                            {{-- <input type="number" name="qty" id="qty" min="1"
                                max="{{ $p->product_qty - $p->product_qty_sold }}" value="1" style="width: 40px"> --}}
                            <input type="hidden" name="product_hidden" id="qt" value="{{ $p->product_id }}">

                            <select name="qty" id="quantitySelection" class="icon-products">
                                <option value="">Select quantity</option>
                            </select>
                            @error('qty')
                                <p class="size_error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="description-product">
                            <h4>Description</h4>
                            <p>{{ $p->product_description }}</p>
                        </div>


                        <ul class="order_methods">

                            @if ($p->product_qty - $p->product_qty_sold <= 0)
                                <li class="order_delivery">
                                    <span>
                                        <div style="opacity: 0.8" class="nobutton">
                                            <span style="text-transform: none"> See you again customer
                                            </span>
                                        </div>
                                    </span>
                                </li>
                            @else
                                <li class="order_delivery">
                                    <span>
                                        <button type="submit">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14 0C14.5523 0 15 0.447715 15 1V1.999L20 2V8L17.98 7.999L20.7467 15.5953C20.9105 16.032 21 16.5051 21 16.999C21 19.2082 19.2091 20.999 17 20.999C15.1368 20.999 13.5711 19.7251 13.1265 18.0008L8.87379 18.0008C8.42948 19.7256 6.86357 21 5 21C3.05513 21 1.43445 19.612 1.07453 17.7725C0.435576 17.439 0 16.7704 0 16V3C0 2.44772 0.447715 2 1 2H8C8.55228 2 9 2.44772 9 3V11C9 11.5128 9.38604 11.9355 9.88338 11.9933L10 12H12C12.5128 12 12.9355 11.614 12.9933 11.1166L13 11V2H10V0H14ZM5 15C3.89543 15 3 15.8954 3 17C3 18.1046 3.89543 19 5 19C6.10457 19 7 18.1046 7 17C7 15.8954 6.10457 15 5 15ZM17 14.999C15.8954 14.999 15 15.8944 15 16.999C15 18.1036 15.8954 18.999 17 18.999C18.1046 18.999 19 18.1036 19 16.999C19 15.8944 18.1046 14.999 17 14.999ZM15.852 7.999H15V11C15 12.6569 13.6569 14 12 14H10C8.69412 14 7.58312 13.1656 7.17102 12.0009L1.99994 12V14.3542C2.73289 13.5238 3.80528 13 5 13C6.86393 13 8.43009 14.2749 8.87405 16.0003H13.1257C13.5693 14.2744 15.1357 12.999 17 12.999C17.2373 12.999 17.4697 13.0197 17.6957 13.0593L15.852 7.999ZM7 7H2V10H7V7ZM18 4H15V6H18V4ZM7 4H2V5H7V4Z"
                                                    fill="black" fill-opacity="0.6"></path>
                                            </svg>Add to cart
                                        </button></span>
                                </li>
                            @endif

                        </ul>
                    </form>

                </div>
            </div>
        </div>
        <div id="next-products">
            <section class="dishes" id="dishes">

                <div class="heading">
                    <h4> Recomment Products</h4>
                </div>
                <div class="box-container">
                    @foreach ($c as $a)
                        <?php

                        $rating = DB::table('tb_rating')
                            ->where('product_id_star', $a->product_id)
                            ->avg('rating');
                        $rating = round($rating);

                        ?>
                        <div class="box">
                            <div class="box-heart">
                                <a class="fas fa-heart heart" id="{{ $a->product_id }}"></a>
                            </div>
                            <a href="{{ URL::to('view-product/' . $a->product_id) }}" class="fas fa-eye"></a>

                            <img src={{ url('user/images/' . $a->product_images) }} alt="">


                            <h3>{{ $a->product_name }}</h3>
                            <div class="stars">
                                @if ($rating == 1)
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                @elseif ($rating == 2)
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                @elseif ($rating == 3)
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                @elseif ($rating == 4)
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                @elseif ($rating == 5)
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                    <i class="fas fa-star" style="color:#be9c79"></i>
                                @elseif ($rating == 0)
                                    <p style="font-size:1.5rem ; color:#be9c79">Unassessed</p>
                                @endif

                            </div>
                            <span>${{ $a->product_price }}</span>


                            <input type="hidden" id="wishlist_productname{{ $a->product_id }}"
                                value="{{ $a->product_name }}">
                            <input type="hidden" id="wishlist_productprice{{ $a->product_id }}"
                                value=" ${{ $a->product_price }}">
                            <input type="hidden" id="wishlist_productimage{{ $a->product_id }}"
                                src="{{ asset('user/images/' . $a->product_images) }}">
                            <input type="hidden" id="wishlist_producturl{{ $a->product_id }}"
                                value="{{ $a->product_id }}" href="{{ URL::to('view-product/' . $a->product_id) }}">
                            <input type="hidden" id="wishlist_productstar{{ $a->product_id }}"
                                value="{{ $rating }}">
                        </div>
                    @endforeach
                </div>

            </section>
        </div>

        <div id="comment">
            <div class="comment_header">
                <h4>Comment</h4>

            </div>

            <form action="" class="form_comment">
                @csrf
                <?php

                $customer_id = Session::get('customer_id');
                $customer_name = DB::table('tb_user')
                    ->where('id', $customer_id)
                    ->value('name');

                ?>
                @if ($customer_id != null)
                    <div style="display:inline">
                        <label for="" style="
                    font-size:1.7rem;"> Comment name </label><br>
                        <input type="text" class="comment_name" value="{{ $customer_name }}"
                            style="border: none;
                    border: 2px solid #dadada; width:40%; height:40px ; margin-bottom:2rem; margin-top:1rem">
                    </div>
                @else
                    <div style="display:inline">
                        <label for="" style="
                        font-size:1.7rem;"> Comment name
                        </label><br>
                        <input type="text" class="comment_name"
                            style="border: none;
                        border: 2px solid #dadada; width:40%; height:40px ; margin-bottom:2rem; margin-top:1rem">
                    </div>
                @endif

                <textarea name="" id="" cols="60" rows="8" class="comment_content"
                    style="text-transform: none;">
                  </textarea>
                <div style=" margin-top:1rem;">

                    <input type="submit" class="btn-comment send_comment" value="Send" style="cursor: pointer;">

                </div>
                <div class="notify_comment" style="font-size: 1.5rem; margin-top:1rem;color: green;"></div>
                <div id="error_comment" style="font-size: 1.5rem; margin-top:1rem;color: red;"></div>
            </form>







        </div>
        <?php
        $comment_count = DB::table('tb_comment')
            ->where('product_id', $p->product_id)
            ->where('comment_status', 0)
            ->count();

        $feedback_count = DB::table('tb_feedback')
            ->where('product_id', $p->product_id)
            ->where('feedback_status', 0)
            ->count();
        ?>
        <div class="totalcomment" style="display:flex;">
            <p style="margin-right:2rem; font-weight:bold" class="comment_click active-click"><span
                    style="padding: 0.4rem; ">{{ $comment_count }}
                </span>Comment</p>
            <p style="font-weight:bold" class="feedback_click"><span style="padding: 0.4rem">{{ $feedback_count }}
                </span>Feedback</p>
        </div>';
        <form action="">
            @csrf
            <input type="hidden" name="product_id" class="comment_product_id" value="{{ $p->product_id }}">
            <input type="hidden" name="product_id" class="feedback_product_id" value="{{ $p->product_id }}">

            <div class="comment_show"></div>
            <div class="feedback_show show_active"></div>

        </form>

    </div>
    </div>
    <link rel="stylesheet" href="{{ asset('user/css/view-product.css') }}">
    <script src="{{ asset('user/js/view-product.js') }}"></script>
    <style>
        .order_delivery button {
            font-size: 2rem;
            background-color: #EA8025;
            padding: 1rem;
        }

        .show_active {
            display: none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            function load_comment() {
                var product_id = $(".comment_product_id").val();
                // alert(product_id);
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url('load-comment') }}',
                    method: "POST",
                    data: {
                        product_id: product_id,
                        _token: _token
                    },
                    success: function(data) {
                        $(".comment_show").html(data);
                    }
                });
            };
            load_comment();
            $(".send_comment").click(function(e) {
                // them binh luan dua tren id
                e.preventDefault();

                var product_id = $(".comment_product_id").val();
                var comment_content = $(".comment_content").val();
                var comment_name = $(".comment_name").val();
                var _token = $('input[name="_token"]').val();
                // if(comment_name==""){`
                //     alert("hi");
                // }
                if (comment_content.length == 18 || comment_name == "") {
                    e.preventDefault();
                    $("#error_comment").html(
                        "<span style='color:red;'>*Please no empty * </span>");

                }
                $.ajax({
                    url: '{{ url('send-comment') }}',
                    method: "POST",
                    data: {
                        product_id: product_id,
                        _token: _token,
                        comment_content: comment_content,
                        comment_name: comment_name
                    },
                    success: function(data) {
                        load_comment();

                        $(".notify_comment").html(
                            "<span>Send successfully ,Comment waits to accept</span> "
                        );
                        $(".notify_comment").fadeOut(5000);
                        $(".comment_content").val("");
                        $(".comment_name").val("");


                    }
                });




            })


            $("#size").change(function(e) {
                var size = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '{{ url('sizeSelectQuantity') }}',
                    method: "POST",
                    data: {
                        size: size,
                        _token: _token,
                    },
                    success: function(data) {

                        $("#quantitySelection").html(data);


                    }
                });




            })






        });
    </script>
@endsection
