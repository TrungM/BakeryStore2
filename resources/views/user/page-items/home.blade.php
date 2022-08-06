   @extends('user.layout.index');
   @section('content')
   <!-- home section starts  -->
    <div class="swiper home-slider">

        <div class="swiper-wrapper wrapper">
            <div class="swiper-slide slide">
                <div class="home-bg">

                    <section class="home" id="home">

                        <div class="content">
                            <h3>slice cake</h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut officia, accusantium
                                mollitia laudantium dolorum dolore.</p>
                                <a href="{{URL::to('submenu/2')}}" class="btn">our menu</a>
                            </div>

                    </section>

                </div>
            </div>
            <div class="swiper-slide slide">
                <div class="home-bg1">

                    <section class="home" id="home">

                        <div class="content">
                            <h3>whole cake</h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut officia, accusantium
                                mollitia laudantium dolorum dolore.</p>
                                <a href="{{URL::to('submenu/1')}}" class="btn">our menu</a>
                            </div>

                    </section>

                </div>
            </div>
            <div class="swiper-slide slide">
                <div class="home-bg2">

                    <section class="home" id="home">

                        <div class="content">
                            <h3>pastry</h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut officia, accusantium
                                mollitia laudantium dolorum dolore.</p>
                                <a href="{{URL::to('submenu/3')}}" class="btn">our menu</a>
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

    <!-- about section starts  -->

    <section class="about" id="about">

        <div class="image">
            <img src= {{asset('user/images/calum-lewis-8Nc_oQsc2qQ-unsplash.jpg')}} alt="" >
        </div>

        <div class="content">
            <h3>Good morning. <br>I could help you have a good breakfast</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam suscipit sunt repellendus, dolorum
                recusandae placeat quae. Iste eaque aspernatur, animi deleniti voluptas, sunt molestias eveniet sint
                consectetur facere a ex.</p>
            <a href="{{URL::to('submenu/5')}}" class="btn">our menu</a>
        </div>

    </section>

    <!-- about section ends -->

    {{-- <!-- facility section starts  -->

    <section class="facility">

        <div class="heading">
            <img src={{asset('user/images/heading-img.png')}} alt="">
            <h3>our facility</h3>
        </div>

        <div class="box-container">

            <div class="box">
                <img src={{asset('user/images/icon-1.png')}} alt="">
                <h3>pastry</h3>
            </div>

            <div class="box">
                <img src={{ asset('user/images/icon-2.png')}} alt="">
                <h3>whole cake</h3>
            </div>

            <div class="box">
                <img src={{asset('user/images/icon-3.png')}} alt="">
                <h3>slices cake</h3>
            </div>


            <div class="box">
                <img src={{asset('user/images/icon-4.png')}} alt="">
                <h3>Seasonal</h3>
            </div>
            <div class="box">
                <img src={{asset('user/images/icon-4.png')}} alt="">
                <h3>Breakfast</h3>
            </div>
            <div class="box">
                <img src={{asset('user/images/icon-4.png')}} alt="">
                <h3>other</h3>
            </div>
        </div>

    </section>

    <!-- facility section ends --> --}}

    <!-- menu section starts  -->

    <section class="menu" id="menu">
        <div class="heading">
            <h3> our menu popular</h3>

        </div>


        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src={{asset('user/images/menu-1.jpg')}} alt="">
                    <div class="box-heart">
                        <a href="#" class="fas fa-heart heart"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src={{asset('user/images/menu-1.jpg')}} alt="">
                    <div class="box-heart">
                        <a href="#" class="fas fa-heart heart"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src={{asset('user/images/menu-1.jpg')}} alt="">
                    <div class="box-heart">
                        <a href="#" class="fas fa-heart heart"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src={{asset('user/images/menu-1.jpg')}} alt="">
                    <div class="box-heart">
                        <a href="#" class="fas fa-heart heart"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src={{asset('user/images/menu-1.jpg')}} alt="">
                    <div class="box-heart">
                        <a href="#" class="fas fa-heart heart"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src={{asset('user/images/menu-1.jpg')}} alt="">
                    <div class="box-heart">
                        <a href="#" class="fas fa-heart heart"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src={{asset('user/images/menu-1.jpg')}} alt="">

                    <div class="box-heart">
                        <a href="#" class="fas fa-heart heart"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src={{asset('user/images/menu-1.jpg')}} alt="">
                    <div class="box-heart">
                        <a href="#" class="fas fa-heart heart"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src={{asset('user/images/menu-1.jpg')}} alt="">
                    <div class="box-heart">
                        <a href="#" class="fas fa-heart heart"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>




        </div>

    </section>

    <!-- menu section ends -->

    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">

        <div class="heading">
            <img src={{asset('user/images/heading-img.png')}} alt="">
            <h3>our gallery</h3>
        </div>

        <div class="box-container">
            <img src={{asset('user/images/bakery1.jpg')}} alt="">
            <img src={{asset('user/images/gallery-2.webp')}} alt="">
            <img src={{asset('user/images/gallery-3.webp')}} alt="">
            <img src={{asset('user/images/bakery4.jpg')}} alt="">
            <img src={{asset('user/images/bakery5.jpg')}} alt="">
            <img src={{asset('user/images/barkery6.jpg')}} alt="">
        </div>

    </section>

    <!-- gallery section ends -->

    <!-- about section starts  -->

    <section class="delivery" id="delivery">
        <div class="heading">
            <img src={{asset('user/images/heading-img.png')}} alt="">
            <h3> about us </h3>
        </div>


        <div class="row">

            <div class="image">
                <img src={{asset('user/images/our-team-5.jpg')}} alt="">
            </div>

            <div class="content">
                <h3> why choose us? </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, sequi corrupti corporis quaerat
                    voluptatem ipsam neque labore modi autem, saepe numquam quod reprehenderit rem? Tempora aut soluta
                    odio corporis nihil!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, nemo. Sit porro illo eos cumque
                    deleniti iste alias, eum natus.</p>
                <div class="icons-container">
                    <a href="">
                        <div class="icons">
                            <i class="fas fa-shipping-fast"></i>
                            <span>free delivery</span>
                        </div>
                    </a>
                    <a href="">
                        <div class="icons">
                            <i class="fas fa-dollar-sign"></i>
                            <span>easy payments</span>
                        </div>
                    </a>
                    <a href="">
                        <div class="icons">
                            <i class="fas fa-headset"></i>
                            <span>24/7 service</span>
                        </div>
                </div>
                </a>

                <a href="#" class="btn">learn more</a>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <div class="heading">
            <img src={{asset('user/images/heading-img.png')}} alt="">
            <h3>contact us</h3>
        </div>

        <div class="row">

            <div class="image">
                <img src={{asset('user/images/contact-img.svg')}} alt="">
            </div>

            <form action="" method="post" class="formEmail">
                <h3>Sign in by email</h3>
                <input type="email" name="email" required class="box" maxlength="20" placeholder="Insert your email">
                <button class="btn">
                    <p>Sign in</p>
                </button>
            </form>

        </div>

    </section>
<script>
    var swiper = new Swiper(".home-slider", {
    cssMode: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
    },
    mousewheel: true,
    keyboard: true,
    loop: true,
});

</script>
    <!-- contact section ends -->
@endsection
