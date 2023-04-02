<!-- header section starts  -->

<header class="header">

    <section class="flex">

        <a href="{{ URL::to('home') }}" class="logo"><i class="fa-solid fa-cake-candles"></i>Bareky.vn</a>

        <nav class="navbar">
            <a href=" {{ URL::to('home') }}">home</a>
            <a href=" {{ URL::to('product') }}">product</a>
            <a href="{{ URL::to('post-bai-viet') }}  ">blog</a>
            <a href="{{ URL::to('service') }}">Service</a>
            <a href="{{ URL::to('store') }}">Store</a>
        </nav>

        <div class="icons">
            <i class="fas fa-search" id="search-icon"></i>
            <a href="{{ URL::to('view-favourite ') }}" class="fas fa-heart"></a>

            <a href="#" class="fas fa-shopping-cart"></a>


            <?php
            $login= Session::has('login_home');
            $login_google= Session::has("login_google");
            $customer_id=Session::get("customer_id");

            if ($login | $login_google ) {

            ?>
            <i class="fa-solid fa-user" style="background: #be9c79;
              color: #fff;"></i>
            <div class="option-customer active-hover">
                <div class="option">
                    <div class="infor-customer">
                        <a href="{{ URL::to('detail-profile/' . $customer_id) }}" class="fa-solid fa-user"
                        style="font-size:1.6rem;"><span style="margin-left: 0.2rem " class="text-option">Profile</span></a>
                    </div>
                    <div class="Purchase">
                        <a href="{{ URL::to('purchase/'.$customer_id) }}" class="fa-solid fa-user-clock status_ord"
                        style="font-size:1.6rem;"><span style="margin-left: 0.2rem " class="text-option">Purchase</span></a>
                    </div>

                    <div class="logout-customer">
                        <a href="{{ URL::to('logout_home') }}" class="fa-solid fa-arrow-right-from-bracket"
                        style="font-size:1.6rem; text-align: center;"><span style="margin-left: 0.2rem " class="text-option">Logout</span></a>
                    </div>
                </div>

            </div>


            <?php
        }else{
            ?>

            <i class="fa-solid fa-user"></i>
           <div class="option-customer active-hover">
                <div class="option">
                    <div class="sign-up">
                        <a href="{{ URL::to('login') }}" class="fa-solid fa-arrow-right-to-bracket"
                        style="font-size:1.6rem; "><span  style="margin-left: 0.2rem " class="text-option">Sigin in </span></a>
                    </div>
                    <div class="sign-in">
                        <a href="{{ URL::to('sign') }}" class="fa-solid fa-user-plus"
                        style="font-size:1.6rem; "><span style="margin-left: 0.2rem " class="text-option">Sigin up </span></a>
                    </div>
                </div>

            </div>
        <?php
        }

?>


        <i class="fas fa-bars" id="menu-btn"></i>

        </div>
    </section>

</header>

<!-- header section ends -->

<!-- search form  -->

<form action="{{ URL::to('/tim-kiem') }}" id="search-form" method="POST">
    {{ csrf_field() }}
    <input type="search" name="keywords_submit" id="search-box" placeholder="Enter Product Name">
    <label for="search-box" name="search-items" class="fas fa-search"></label>
    <i class="fas fa-times" id="close" ></i>
</form>
<!-- shopping-cart section  -->

<section class="shopping-cart-container">

    <div class="products-container">

        <h3 class="title">Your cart </h3>

        <div class="box-container">
            <?php
            $content = Cart::content();
            // echo'<pre>';
            // print_r($content);
            // echo '</pre>';
            ?>
            @foreach ($content as $p)
                <div class="box">
                    <a href=" {{ URL::to('delete-to-cart/' . $p->rowId) }}" style="color: #130f40"><i
                            class="fas fa-times" onclick=" return confirm('Do you delete this items')"></i></a>
                    <img src={{ URL::to('user/images/' . $p->options->image) }} alt="">
                    <div class="content">
                        <h3>{{ $p->name }}</h3>
                        <form action="{{ URL::to('update_cart_quantity') }}" method="POST">
                            @csrf
                            <span> Quantity : </span>
                            <input type="number" name="cart_quantity" value="{{ $p->qty }}" id=""
                                min="1" max="10">
                            <input type="hidden" name="rowId_cart" value="{{ $p->rowId }}" id="">
                            <br>
                            <button class="btn" type="submit" style="font-size: 1.2rem">Change</button>
                            <br>
                            <br>
                            <span>Size : </span>
                            <span class="size"> {{ $p->options->size }}  </span>
                            <span class="size"> ${{ $p->options->p_size }}  </span>

                            {{-- <input type="hidden" name="cart_size" value="{{ $p->options->size }}" id=""> --}}
                            <br><br>
                        </form>
                        <span> Price : </span>
                        <span class="price">  ${{number_format( $p->price,2,'.',',')}}</span>
                    </div>
                </div>
            @endforeach


        </div>

    </div>

    <div class="cart-total">

        <h3 class="title"> Total </h3>

        <div class="box">
            <h3 class="total"> Quantity Items : <span>{{ Cart::countItems() }}</span> </h3>
            <h3 class="total"> Total : <span>${{ Cart::total()}}</span> </h3>

            <?php
            $customer_id= Session::get('customer_id');

            if ($customer_id != null) {

            ?>
                <a href="{{ URL::to('checkout') }}" class="btn">Checkout</a>
            <?php
        }else{
            ?>
            <a href="{{ URL::to('login') }}" class="btn"  nclick="alert('Please login to add  new items')">Checkout</a>

            <?php
        }
                   ?>
        </div>

    </div>
    <link rel="stylesheet" href="{{ asset('user/css/nav.css') }}">
    <script src="{{ asset('user/js/nav.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</section>
