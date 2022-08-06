@extends('user.layout.index')
@section('content')
    <div class="swiper home-slider">

        <div class="swiper-wrapper wrapper">
            <div class="swiper-slide slide">
                <div class="home-bg">

                    <section class="home" id="home">

                        <div class="content">
                            <h3>mooncakes </h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut officia, accusantium
                                mollitia laudantium dolorum dolore.</p>
                            <a href="#about" class="btn">about us</a>
                        </div>

                    </section>

                </div>
            </div>
            <div class="swiper-slide slide">
                <div class="home-bg">

                    <section class="home" id="home">

                        <div class="content">
                            <h3>Breakfast</h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut officia, accusantium
                                mollitia laudantium dolorum dolore.</p>
                            <a href="#about" class="btn">about us</a>
                        </div>

                    </section>

                </div>
            </div>
            <div class="swiper-slide slide">
                <div class="home-bg">

                    <section class="home" id="home">

                        <div class="content">
                            <h3>Cake</h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut officia, accusantium
                                mollitia laudantium dolorum dolore.</p>
                            <a href="#about" class="btn">about us</a>
                        </div>

                    </section>

                </div>
            </div>
            <div class="swiper-slide slide">
                <div class="home-bg">

                    <section class="home" id="home">

                        <div class="content">
                            <h3>Combo </h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut officia, accusantium
                                mollitia laudantium dolorum dolore.</p>
                            <a href="#about" class="btn">about us</a>
                        </div>

                    </section>

                </div>
            </div>
        </div>
        <div class="swiper-button-next color-El"></div>
        <div class="swiper-button-prev color-El"></div>
        <div class="swiper-pagination"></div>
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
