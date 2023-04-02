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
                        @foreach ($category as $a)
                            <li>
                                <a href="{{ URL::to('submenu/' . $a->category_id) }}">
                                    {{ $a->category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="arrange-header">
                        Sort By
                    </div>
                    <div class="arrange-div">
                        <p style="cursor: pointer;">
                            @if (Session::has('Plth'))
                                {{ session('Plth') }}
                            @elseif (Session::has('Phtl'))
                                {{ session('Phtl') }}
                               @else
                               {{ session('Newest') }}
                               @endif

                        </p>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>

                    <div class="arrange-items arrange-items-active">

                        <a href=" {{ URL::to('product') }}" class="value1">
                            <option value="Newest">Newest </option>
                        </a>


                        <a href="{{ URL::to('product/ASCproduct') }}" class="value2">
                            <option value="Price low to high">Price low to high </option>
                        </a>


                        <a href="{{ URL::to('product/DESproduct') }}" class="value3">
                            <option value="Price high to low">Price high to low</option>
                        </a>

                    </div>

                </aside>


            </div>

            <div id="content">
                <section class="dishes" id="dishes">
                    <img style="width: 100%; height:40rem;" src="{{ asset('user/images/products_bg.jpg') }}">

                    <div class="heading">
                        {{-- <img src="{{ asset('images/heading-img.png')}}" alt=""> --}}
                        <h3>our menu</h3>
                    </div>


                    <div class="box-container">



                        @foreach ($product as $p)
                            {{-- <div class="box-heart">
                            <button class="fas fa-heart heart" id="{{ $p->product_id }}"
                                onclick="add_wishlist(this.id)">
                        </div> --}}
                            <div class="box">
                                <div class="box-heart">
                                    <a class="fas fa-heart heart" id="{{ $p->product_id }}" ></a>
                                </div>
                                <a href="{{ URL::to('view-product/' . $p->product_id) }}" class="fas fa-eye"></a>

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

                                </div>
                                <span>${{ $p->product_price }}</span>
                                {{-- do nam ngoai trang view nen pham co {{$p->product_id}}  sau moi id de co the bat id cua tung san pham --}}

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





                </section>

                <div class="pagination">
                    {{ $product->links() }}
                </div>

            </div>
        </div>









    </section>


    <link rel="stylesheet" href="{{ asset('user/css/product.css') }}">

    <script src="{{ url('user/js/product-js.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .w-5 {
            display: none;
        }
    </style>
@endsection
