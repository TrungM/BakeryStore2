@extends('user.layout.index');
@section('content')
    <div id="wrapper">

        <div id="header">
            <a href=" {{ URL::to('product') }}"title="Trở về trang sản phẩm ">Menu</a>
        </div>
        <div id="main">
            <div id="sidebar">
                <img src="{{ asset('user/images/' . $p->product_images) }}" alt="{{ $p->product_id }}">
            </div>
            <div id="content">
                <div class="view-product-item">
                    <h1 class="name-product" style="font-weight: bold;">{{ $p->product_name }}</h1>
                    <div class="price-product">
                        <span>{{ number_format($p->product_price) }}VNĐ</span>
                    </div>
                    <?php

                    $rating = DB::table('tb_rating')
                        ->where('product_id_star', $p->product_id)
                        ->avg('rating');
                    $rating = round($rating);

                    ?>
                    <div style="cursor: no-drop">
                        @if ($rating == 1)
                            <i class="fas fa-star" style="color:be9c79"></i>
                        @elseif ($rating == 2)
                            <i class="fas fa-star" style="color:be9c79"></i>
                            <i class="fas fa-star" style="color:be9c79"></i>
                        @elseif ($rating == 3)
                            <i class="fas fa-star" style="color:be9c79"></i>
                            <i class="fas fa-star" style="color:be9c79"></i>
                            <i class="fas fa-star" style="color:be9c79"></i>
                        @elseif ($rating == 4)
                            <i class="fas fa-star" style="color:be9c79"></i>
                            <i class="fas fa-star" style="color:be9c79"></i>
                            <i class="fas fa-star" style="color:be9c79"></i>
                            <i class="fas fa-star" style="color:be9c79"></i>
                        @elseif ($rating == 5)
                            <i class="fas fa-star" style="color:be9c79"></i>
                            <i class="fas fa-star" style="color:be9c79"></i>
                            <i class="fas fa-star" style="color:be9c79"></i>
                            <i class="fas fa-star" style="color:be9c79"></i>
                            <i class="fas fa-star" style="color:be9c79"></i>
                        @elseif ($rating == 0)
                            <p style="font-size:1.5rem ; color:#be9c79">Chưa có đánh giá </p>
                        @endif
                    </div>
                    <div class="size-product">
                        <h4>Kích thước</h4>
                        <span class="icon-products">
                            <svg width="12" height="16" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.6511 1.68763H10.3529V0.421907C10.3529 0.194726 10.1582 0 9.93104 0H2.17444C1.94726 0 1.75254 0.194726 1.75254 0.421907V1.65517H0.454361C0.194726 1.68763 0 1.88235 0 2.10953V4.18661C0 4.41379 0.194726 4.60852 0.421907 4.60852H1.33063L1.72008 8.8925L1.78499 9.76876L2.30426 15.6105C2.33671 15.8377 2.49899 16 2.72617 16H9.28195C9.50913 16 9.70385 15.8377 9.70385 15.6105L10.2231 9.76876L10.288 8.8925L10.6775 4.60852H11.5862C11.8134 4.60852 12.0081 4.41379 12.0081 4.18661V2.10953C12.073 1.88235 11.8783 1.68763 11.6511 1.68763ZM2.56389 8.40568H3.50507C3.47262 8.56795 3.47262 8.73022 3.47262 8.8925C3.47262 9.02231 3.47262 9.15213 3.50507 9.28195H2.66126L2.6288 8.92495L2.56389 8.40568ZM9.47667 8.92495L9.44422 9.28195H8.56795C8.60041 9.15213 8.60041 9.02231 8.60041 8.8925C8.60041 8.73022 8.56795 8.56795 8.56795 8.40568H9.50913L9.47667 8.92495ZM7.72414 8.8925C7.72414 9.83367 6.97769 10.5801 6.03651 10.5801C5.09534 10.5801 4.34888 9.83367 4.34888 8.8925C4.34888 7.95132 5.09534 7.20487 6.03651 7.20487C6.97769 7.20487 7.72414 7.95132 7.72414 8.8925ZM8.92495 15.1562H3.18053L2.72617 10.1582H3.82961C4.28398 10.9371 5.09534 11.4564 6.03651 11.4564C6.97769 11.4564 7.8215 10.9371 8.24341 10.1582H9.34686L8.92495 15.1562ZM9.60649 7.52941H8.21095C7.75659 6.81542 6.94523 6.3286 6.03651 6.3286C5.12779 6.3286 4.31643 6.81542 3.86207 7.52941H2.49899L2.23935 4.60852H9.86613L9.60649 7.52941ZM11.1968 3.73225H10.3205H1.75254H0.876268V2.56389H2.17444H2.2069H2.23935H8.27586C8.50304 2.56389 8.69777 2.36917 8.69777 2.14199C8.69777 1.91481 8.50304 1.72008 8.27586 1.72008H2.6288V0.876268H9.47667V2.10953C9.47667 2.33671 9.6714 2.53144 9.89858 2.53144H11.1968V3.73225Z"
                                    fill="white"></path>
                            </svg>
                            <strong>Nhỏ</strong>
                        </span>
                        <span class="icon-products">
                            <svg width="15" height="20" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.6511 1.68763H10.3529V0.421907C10.3529 0.194726 10.1582 0 9.93104 0H2.17444C1.94726 0 1.75254 0.194726 1.75254 0.421907V1.65517H0.454361C0.194726 1.68763 0 1.88235 0 2.10953V4.18661C0 4.41379 0.194726 4.60852 0.421907 4.60852H1.33063L1.72008 8.8925L1.78499 9.76876L2.30426 15.6105C2.33671 15.8377 2.49899 16 2.72617 16H9.28195C9.50913 16 9.70385 15.8377 9.70385 15.6105L10.2231 9.76876L10.288 8.8925L10.6775 4.60852H11.5862C11.8134 4.60852 12.0081 4.41379 12.0081 4.18661V2.10953C12.073 1.88235 11.8783 1.68763 11.6511 1.68763ZM2.56389 8.40568H3.50507C3.47262 8.56795 3.47262 8.73022 3.47262 8.8925C3.47262 9.02231 3.47262 9.15213 3.50507 9.28195H2.66126L2.6288 8.92495L2.56389 8.40568ZM9.47667 8.92495L9.44422 9.28195H8.56795C8.60041 9.15213 8.60041 9.02231 8.60041 8.8925C8.60041 8.73022 8.56795 8.56795 8.56795 8.40568H9.50913L9.47667 8.92495ZM7.72414 8.8925C7.72414 9.83367 6.97769 10.5801 6.03651 10.5801C5.09534 10.5801 4.34888 9.83367 4.34888 8.8925C4.34888 7.95132 5.09534 7.20487 6.03651 7.20487C6.97769 7.20487 7.72414 7.95132 7.72414 8.8925ZM8.92495 15.1562H3.18053L2.72617 10.1582H3.82961C4.28398 10.9371 5.09534 11.4564 6.03651 11.4564C6.97769 11.4564 7.8215 10.9371 8.24341 10.1582H9.34686L8.92495 15.1562ZM9.60649 7.52941H8.21095C7.75659 6.81542 6.94523 6.3286 6.03651 6.3286C5.12779 6.3286 4.31643 6.81542 3.86207 7.52941H2.49899L2.23935 4.60852H9.86613L9.60649 7.52941ZM11.1968 3.73225H10.3205H1.75254H0.876268V2.56389H2.17444H2.2069H2.23935H8.27586C8.50304 2.56389 8.69777 2.36917 8.69777 2.14199C8.69777 1.91481 8.50304 1.72008 8.27586 1.72008H2.6288V0.876268H9.47667V2.10953C9.47667 2.33671 9.6714 2.53144 9.89858 2.53144H11.1968V3.73225Z"
                                    fill="white"></path>
                            </svg>
                            <strong>Vừa + 6.000đ</strong>
                        </span>
                        <span class="icon-products">
                            <svg width="19" height="20" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.6511 1.68763H10.3529V0.421907C10.3529 0.194726 10.1582 0 9.93104 0H2.17444C1.94726 0 1.75254 0.194726 1.75254 0.421907V1.65517H0.454361C0.194726 1.68763 0 1.88235 0 2.10953V4.18661C0 4.41379 0.194726 4.60852 0.421907 4.60852H1.33063L1.72008 8.8925L1.78499 9.76876L2.30426 15.6105C2.33671 15.8377 2.49899 16 2.72617 16H9.28195C9.50913 16 9.70385 15.8377 9.70385 15.6105L10.2231 9.76876L10.288 8.8925L10.6775 4.60852H11.5862C11.8134 4.60852 12.0081 4.41379 12.0081 4.18661V2.10953C12.073 1.88235 11.8783 1.68763 11.6511 1.68763ZM2.56389 8.40568H3.50507C3.47262 8.56795 3.47262 8.73022 3.47262 8.8925C3.47262 9.02231 3.47262 9.15213 3.50507 9.28195H2.66126L2.6288 8.92495L2.56389 8.40568ZM9.47667 8.92495L9.44422 9.28195H8.56795C8.60041 9.15213 8.60041 9.02231 8.60041 8.8925C8.60041 8.73022 8.56795 8.56795 8.56795 8.40568H9.50913L9.47667 8.92495ZM7.72414 8.8925C7.72414 9.83367 6.97769 10.5801 6.03651 10.5801C5.09534 10.5801 4.34888 9.83367 4.34888 8.8925C4.34888 7.95132 5.09534 7.20487 6.03651 7.20487C6.97769 7.20487 7.72414 7.95132 7.72414 8.8925ZM8.92495 15.1562H3.18053L2.72617 10.1582H3.82961C4.28398 10.9371 5.09534 11.4564 6.03651 11.4564C6.97769 11.4564 7.8215 10.9371 8.24341 10.1582H9.34686L8.92495 15.1562ZM9.60649 7.52941H8.21095C7.75659 6.81542 6.94523 6.3286 6.03651 6.3286C5.12779 6.3286 4.31643 6.81542 3.86207 7.52941H2.49899L2.23935 4.60852H9.86613L9.60649 7.52941ZM11.1968 3.73225H10.3205H1.75254H0.876268V2.56389H2.17444H2.2069H2.23935H8.27586C8.50304 2.56389 8.69777 2.36917 8.69777 2.14199C8.69777 1.91481 8.50304 1.72008 8.27586 1.72008H2.6288V0.876268H9.47667V2.10953C9.47667 2.33671 9.6714 2.53144 9.89858 2.53144H11.1968V3.73225Z"
                                    fill="white"></path>
                            </svg>
                            <strong>Lớn + 10.000đ</strong>
                        </span>
                    </div>
                    <div class="description-product">
                        <h4>Mô tả sản phẩm</h4>
                        <p>{{ $p->product_description }}</p>
                    </div>
                    <form action="{{ URL::to('save_cart') }}" method="POST" class="form_viewproduct">
                        @csrf
                        <div class="quantity">
                            <h4 style="font-size: 1.9rem">Số lượng</h4>
                            <input type="number" name="qty" id="qty"
                                value="{{ $p->product_id - $p->product_id + 1 }}" min="1" style="width: 8%">

                            <input type="hidden" name="product_hidden" id="qt" value="{{ $p->product_id }}">


                        </div>
                        <ul class="order_methods">
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

                    </form>
                    </li>
                    <div class="space">

                    </div>
                    <li class="order_store">
                        <a target="_blank" href="">
                            <svg width="23" height="20" viewBox="0 0 23 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 11.242V18H21V20H1V18H2V11.242C1.38437 10.8311 0.879713 10.2745 0.53082 9.62176C0.181927 8.96899 -0.000407734 8.24017 6.84612e-07 7.5C6.84612e-07 6.673 0.224001 5.876 0.633001 5.197L3.345 0.5C3.43277 0.347985 3.559 0.221749 3.71101 0.133981C3.86303 0.0462129 4.03547 4.45922e-06 4.211 0H17.79C17.9655 4.45922e-06 18.138 0.0462129 18.29 0.133981C18.442 0.221749 18.5682 0.347985 18.656 0.5L21.358 5.182C21.9546 6.17287 22.1463 7.35553 21.8934 8.48414C21.6405 9.61275 20.9624 10.6005 20 11.242ZM18 11.972C17.3124 12.0491 16.6163 11.9665 15.9659 11.7307C15.3155 11.4948 14.7283 11.1119 14.25 10.612C13.8302 11.0511 13.3258 11.4005 12.7672 11.6393C12.2086 11.878 11.6075 12.001 11 12.001C10.3927 12.0013 9.7916 11.8786 9.23303 11.6402C8.67445 11.4018 8.16996 11.0527 7.75 10.614C7.27163 11.1138 6.68437 11.4964 6.03395 11.7321C5.38353 11.9678 4.68749 12.0503 4 11.973V18H18V11.973V11.972ZM4.789 2L2.356 6.213C2.11958 6.79714 2.11248 7.44903 2.33613 8.03818C2.55978 8.62733 2.99768 9.11029 3.56218 9.39039C4.12668 9.6705 4.77614 9.72708 5.38058 9.54882C5.98502 9.37055 6.49984 8.9706 6.822 8.429C7.157 7.592 8.342 7.592 8.678 8.429C8.8633 8.89342 9.1836 9.2916 9.59753 9.5721C10.0115 9.85261 10.5 10.0025 11 10.0025C11.5 10.0025 11.9885 9.85261 12.4025 9.5721C12.8164 9.2916 13.1367 8.89342 13.322 8.429C13.657 7.592 14.842 7.592 15.178 8.429C15.3078 8.74845 15.5022 9.0376 15.7491 9.27828C15.996 9.51895 16.2901 9.70595 16.6127 9.82752C16.9354 9.94909 17.2797 10.0026 17.6241 9.98468C17.9684 9.96677 18.3053 9.87782 18.6136 9.72343C18.9219 9.56903 19.1949 9.35253 19.4155 9.08753C19.6361 8.82253 19.7995 8.51477 19.8955 8.18357C19.9914 7.85238 20.0178 7.50493 19.973 7.16305C19.9281 6.82118 19.8131 6.49227 19.635 6.197L17.21 2H4.79H4.789Z"
                                    fill="black" fill-opacity="0.6"></path>
                            </svg>
                            <span>Mua tại cửa hàng</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="next-products">
            <section class="dishes" id="dishes">

                <div class="heading">
                    <h4> Sản phẩm liên quan</h4>
                </div>
                <div class="box-container">
                    @foreach ($c as $a)
                        <div class="box">
                            <div class="box-heart">
                                <a class="fas fa-heart heart" id="{{ $a->product_id }}"
                                    onclick="add_wishlist(this.id)"></a>
                            </div>
                            <a href="{{ URL::to('view-product/' . $a->product_id) }}" class="fas fa-eye"></a>

                            <img src={{ url('user/images/' . $a->product_images) }} alt="">


                            <h3>{{ $a->product_name }}</h3>
                            <div class="stars">
                                @if ($a->product_star == 1)
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                @elseif ($a->product_star == 2)
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                @elseif ($a->product_star == 3)
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                @elseif ($a->product_star == 4)
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                @elseif ($a->product_star == 5)
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                    <i class="fas fa-star" style="color:be9c79"></i>
                                @elseif ($a->product_star == 0)
                                    <p style="font-size:1.5rem ; color:#be9c79">Chưa có đánh giá </p>
                                @endif

                            </div>
                            <span>{{ number_format($a->product_price) }}VNĐ</span>


                            <input type="hidden" id="wishlist_productname{{ $p->product_id }}"
                                value="{{ $p->product_name }}">
                            <input type="hidden" id="wishlist_productprice{{ $p->product_id }}"
                                value=" {{ number_format($p->product_price) }}">
                            <input type="hidden" id="wishlist_productimage{{ $p->product_id }}"
                                src="{{ asset('user/images/' . $p->product_images) }}">
                            <input type="hidden" id="wishlist_producturl{{ $p->product_id }}"
                                value="{{ $p->product_id }}" href="{{ URL::to('view-product/' . $p->product_id) }}">

                        </div>
                    @endforeach











                </div>

            </section>
        </div>

        <div id="comment">
            <div class="comment_header">
                <h4>Bình luận</h4>

            </div>

            <form action="" class="form_comment">
                @csrf
                <?php

                $customer_id = Session::get('id');
                $customer_name = DB::table('tb_customer')->where("customer_id", $customer_id)->value('customer_name');


                ?>
                @if ($customer_id != null)
                    <div style="display:inline">
                        <label for="" style="
                    font-size:1.7rem;"> tên bình luận </label><br>
                        <input type="text" class="comment_name" value="{{ $customer_name }}"
                            style="border: none;
                    border: 2px solid #dadada; width:40%; height:40px ; margin-bottom:2rem; margin-top:1rem">
                    </div>
                @else
                    <div style="display:inline">
                        <label for="" style="
                        font-size:1.7rem;"> tên bình luận
                        </label><br>
                        <input type="text" class="comment_name" value=" "
                            style="border: none;
                        border: 2px solid #dadada; width:40%; height:40px ; margin-bottom:2rem; margin-top:1rem">
                    </div>
                @endif

                <textarea name="" id="" cols="60" rows="8" class="comment_content"
                    placeholder="Nội dung bình luận.....">

                  </textarea>
                <div class="comment_image">

                    <a href="">
                        <button type="button" class="btn-comment send_comment"
                            style="   cursor: pointer;
                        ">Gui binh luan</button>

                    </a>

                </div>
                <div class="notify_comment" style="font-size: 1.5rem; margin-top:1rem;color: red;"></div>
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
                </span>Bình Luận</p>
            <p style="font-weight:bold" class="feedback_click"><span style="padding: 0.4rem">{{ $feedback_count }}
                </span>Đánh giá</p>
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
                            "<span>Thêm bình luận thành công,Bình luận đang chờ duyệt </span> "
                        );
                        $(".notify_comment").fadeOut(5000);
                        $(".comment_content").val("");
                        $(".comment_name").val("");


                    }
                });

            })
        });
    </script>
@endsection
