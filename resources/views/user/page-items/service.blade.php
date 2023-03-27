@extends('user.layout.index')
@section('content')
    <section class="about" id="about">

        <section class="delivery" id="delivery">
            <div class="heading">
                <img src={{ asset('user/images/heading-img.png') }} alt=""> <br>
                <h3> Service </h3>
            </div>


            <div class="row">

                <div class="image">
                    <img src={{ asset('user/images/chimney-cake-bakery-team.jpg') }} alt="">
                </div>

                <div class="content">
                    <h3> Baking with the Best in the Business </h3>
                    <p>At Bakery Store, we know you take pride in the artisanal creations you make
                        for your customers and in the family recipes you may have passed down for
                        generations. And we do too. Our expert bakers have worked for decades to
                        perfect the quality of our ingredients and the taste of our recipes. Our
                        goal is to bake innovation and insight into every formula and technique so
                        that from our family to yours, you are getting our best, every day.</p>

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

                </div>
                <div class="content">
                    <h3>Online Ordering Now Available!</h3>
                    <p>Take advantage of the most convenient way to order ingredients for your bakery.
                        Register and start ordering now with 24/7 access to our full product catalog.
                        It's easy to get started with any internet-connected device - even your smartphone.
                        And, as always, your Bakery Store Sales Representative is ready to help if you have any questions.
                    </p>
                    <a href="{{url('product')}}" class="btn">Order Now</a>
                </div>
                <div class="image">
                    <img src={{ asset('user/images/our-team-5.jpg') }} alt="">
                </div>
                <div class="image">
                    <img src={{ asset('user/images/How-to-Manage-Your-Bakery-Staff.jpg') }} alt="">
                </div>
                <div class="content">
                    <h3>Trends & Ideas</h3>
                    <p>All areas of your store rely on consumer insight. Let Dawn Foods bring that expertise to your bakery.
                       From data on seasonal flavors and recipes to new products based on extensive consumer testing, we know
                       what the people shopping in your bakery want.
                    </p>
                </div>
            </div>

        </section>
    </section>

@endsection
