@extends('user.layout.index')
@section('content')
    <div class="swiper home-slider">

        <div class="swiper-wrapper wrapper">
            <div class="swiper-slide slide">
                <div class="home-bg">

                    <section class="home" id="home">



                    </section>

                </div>
            </div>

        </div>

    </div>

    <!-- home section ends -->


    <div class="heading">
        <img src={{asset('user/images/heading-img.png')}} alt="">
        <h3>my wishlist</h3>
    </div>

    <section class="products">
        <div id="wrapper">
            <div id="content">
                <section class="dishes" id="dishes">

                    <div id="box-container">
                    </div>

                </section>
            </div>
        </div>
        </div>








    </section>
    <link rel="stylesheet" href="{{ asset('user/css/favourite_products.css') }}">
    <script src="{{ asset('user/js/favourite.js') }}"></script>
    @endsection
