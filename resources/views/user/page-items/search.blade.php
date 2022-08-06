@extends('user.layout.index')
@section('content')
    <section class="products">

        <div id="wrapper">



            <div id="sideBar">
                <aside class="sidebar_menu">

                    <ul class="list-product">
                        <li>
                            <a class="" href="{{ URL::to('product') }}">
                                Main menu
                            </a>
                        </li>
                        @foreach ($categories as $a)
                            <li>
                                <a class="" href="{{ URL::to('submenu/' . $a->category_id) }}">
                                    {{ $a->category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </aside>

            </div>

            <div id="content">
                <section class="dishes" id="dishes">
                    <div class="heading">
                        <h3>Kết Quả Tìm Kiếm</h3>
                    </div>

                    <div class="box-container">
                        {{-- du lieu search xong xe do ve day--}}
                        @foreach ($search_product as $p)
                            <div class="box">
                                <div class="box-heart">
                                    <a class="fas fa-heart heart" id="{{ $p->product_id }}"
                                        onclick="add_wishlist(this.id)"  ></a>
                                </div>
                                <a href="{{ url('view-product/' . $p->product_id) }}"
                                    class="fas fa-eye"></a>

                                <img width="210px" height="410px" src={{ asset('user/images/' . $p->product_images) }}
                                    alt="">

                                <h3>{{ $p->product_name }}</h3>
                                <div class="stars">
                                    @if ($p->product_star == 1)
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                    @elseif ($p->product_star == 2)
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                    @elseif ($p->product_star == 3)
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                    @elseif ($p->product_star == 4)
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                    @elseif ($p->product_star == 5)
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                        <i class="fas fa-star" style="color:be9c79"></i>
                                    @elseif ($p->product_star == 0)
                                        <p style="font-size:1.5rem ; color:#be9c79">Chưa có đánh giá </p>
                                    @endif

                                </div>
                                <span>{{number_format($p->product_price)}}VNĐ</span>

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



        </div>


    </section>
<link rel="stylesheet" href="{{ asset('user/css/product.css') }}">
    <script src="{{ asset('user/js/product.js') }}"></script>
@endsection
