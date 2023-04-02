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
                        <h3>Result Search</h3>
                    </div>

                    <div class="box-container">
                        {{-- du lieu search xong xe do ve day --}}
                        @foreach ($search_product as $p)
                            <div class="box">
                                <div class="box-heart">
                                    <a class="fas fa-heart heart" id="{{ $p->product_id }}"
                                        onclick="add_wishlist(this.id)"></a>
                                </div>
                                <a href="{{ url('view-product/' . $p->product_id) }}" class="fas fa-eye"></a>

                                <img src={{ url('user/images/' . $p->product_images) }} alt="">


                                <h3>{{ $p->product_name }}</h3>
                                <?php

                                $rating = DB::table('tb_rating')
                                    ->where('product_id_star', $p->product_id)
                                    ->avg('rating');
                                $rating = round($rating);

                                ?>

                                <div class="stars">
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
                                        <p style="font-size:1.5rem ; color:#be9c79">Unassessed</p>
                                    @endif

                                </div>
                                <span>${{ $p->product_price }}</span>

                                <input type="hidden" id="wishlist_productname{{ $p->product_id }}"
                                    value="{{ $p->product_name }}">
                                    <input type="hidden" id="wishlist_productprice{{ $p->product_id }}"
                                    value=" ${{($p->product_price)}}">
                                <input type="hidden" id="wishlist_productimage{{ $p->product_id }}"
                                    src="{{ asset('user/images/' . $p->product_images) }}">
                                <input type="hidden" id="wishlist_producturl{{ $p->product_id }}"
                                    value="{{ $p->product_id }}" href="{{ URL::to('view-product/' . $p->product_id) }}">
                                    <input type="hidden" id="wishlist_productstar{{ $p->product_id }}"
                                    value="{{ $rating  }}">
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
