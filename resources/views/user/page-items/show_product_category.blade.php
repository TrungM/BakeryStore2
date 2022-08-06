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
                        @foreach ($category_show as $a)
                            <li>
                                <a class="" href="{{ URL::to('submenu/' . $a->category_id) }}">
                                    {{ $a->category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="arrange-header">
                        Oder by
                    </div>
                    <div class="arrange-div">

                        <p style="cursor: pointer;
                      ">Sắp xếp sản phẩm</p>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>

                    <div class="arrange-items arrange-items-active">

                        @foreach ($category_by_id as $p)
                            <form action="" class="show_product">
                                @csrf
                                <a href="{{ URL::to('submenu/' . $p->category_id) }}" class="value1">
                                    <option value="All">All</option>
                                </a>
                                <a href="{{ URL::to('ascproducts_category/' . $p->category_id) }}" class="value2">
                                    <option value="Price-Low to high">Price-Low to high</option>
                                </a>


                                <a href="{{ URL::to('desproducts_category/' . $p->category_id) }}" class="value3">
                                    <option value="">Price-High to low</option>
                                </a>

                                {{-- <option value="">Newest</option> --}}
                            </form>
                        @endforeach

                    </div>

                </aside>


            </div>

            <div id="content">
                <section class="dishes" id="dishes">
                    <img alt="Hi-tea Healthy"
                        src="//file.hstatic.net/1000075078/file/cover_8dca94a796324989af57bf9c1e5d80e8_master.jpg">
                    <div class="heading">
                        <img src="images/heading-img.png" alt="">
                        @foreach ($category_by_name as $c)
                        <h3>{{ $c->category_name }}</h3>
                        @endforeach
                    </div>


                    <div class="box-container">



                        @foreach ($category_by_id as $p)
                            <div class="box">
                                <div class="box-heart">
                                    <a class="fas fa-heart heart" id="{{ $p->product_id }}"
                                        onclick="add_wishlist(this.id)"></a>
                                </div>
                                <a href="{{ URL::to('view-product/' . $p->product_id) }}" class="fas fa-eye"></a>

                                <img src={{ url('user/images/' . $p->product_images) }} alt="">


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
                                <span>{{ number_format($p->product_price) }}VNĐ</span>


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

    <script src="{{ url('user/js/product-js.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        const arrangeLink = document.querySelectorAll("arrange-items a option");
        [...arrangeLink].forEach((item) => item.addEventListener("click", function(e) {
            e.preventDefault();
            console.log(e.target.parentNode);

        }));
        const showProduct = document.querySelectorAll(".show_product");
        const showProductFirst = document.querySelector(".show_product");

        // if(showProduct=2){
        //     showProduct.setAttribute("style","display:none");

        // }

        angleDownArrange.addEventListener("click", function(e) {

            [...showProduct].forEach((item) => item.setAttribute("style", "display:none"));
            showProductFirst.setAttribute("style", "display:block");
        })
    </script>
@endsection
