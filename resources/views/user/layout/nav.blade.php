<!-- header section starts  -->

<header class="header">

    <section class="flex">

        <a href="{{ URL::to('home') }}" class="logo"><i class="fa-solid fa-cake-candles"></i>Bareky.vn</a>

        <nav class="navbar">
            <a href=" {{ URL::to('home') }}">home</a>
            <a href=" {{ URL::to('product') }}">product</a>
            <a href="{{ URL::to('post-bai-viet') }}  ">blog</a>
            <a href="#gallery">Service</a>
            <a href="{{ URL::to('store') }}">Store</a>
        </nav>

        <div class="icons">
            <i class="fas fa-search" id="search-icon"></i>
            <a href="{{ URL::to('view-favourite ') }}" class="fas fa-heart"></a>

            <a href="#" class="fas fa-shopping-cart"></a>


            {{-- dang lam viec voi phan checkout chu khong lam viec voi user chua phan quyen --}}
            <?php
            // $customer_id= Session::get('id');
            $customer_id= Session::get('id');

            if ($customer_id != null) {

            ?>
            <i class="fa-solid fa-user" style="background: #be9c79;
              color: #fff;"></i>
            <div class="hover-login-logout active-hover">

                <div class="hover-logout">
                    <a href="{{ URL::to('user-infromation/' . $customer_id) }}" class="fa-solid fa-user"
                        style="font-size:1.6rem;"><span>Thông tin tài
                            khoản</span></a>
                    <a href="{{ URL::to('user-infromation/' . $customer_id) }}"
                        class="fa-solid fa-user-clock status_ord" style="font-size:1.6rem;"><span>Tình trạng đơn
                            hàng</span></a>
                    <a href="{{ URL::to('logout_checkout') }}" class="fa-solid fa-arrow-right-from-bracket"
                        style="font-size:1.6rem; text-align: center;"><span>Đăng xuất</span></a>
                </div>
            </div>


            <?php
        }else{
            ?>
            <i class="fa-solid fa-user"></i>

            {{-- <a href="{{ URL::to('login_checkout') }}"class="fa-solid fa-user"> </a> --}}
            <div class="hover-login-logout active-hover">
                <div class="hover-login">
                    <a href="{{ URL::to('login_checkout') }}" class="fa-solid fa-arrow-right-to-bracket"
                        style="font-size:1.6rem; "><span>Đăng nhập</span></a>

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
    <i class="fas fa-times" id="close"></i>
</form>
<!-- shopping-cart section  -->

<section class="shopping-cart-container">

    <div class="products-container">

        <h3 class="title">your products</h3>

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
                            class="fas fa-times"></i></a>
                    <img src={{ URL::to('user/images/' . $p->options->image) }} alt="">
                    <div class="content">
                        <h3>{{ $p->name }}</h3>
                        <form action="{{ URL::to('update_cart_quantity') }}" method="POST">
                            @csrf
                            <span> quantity : </span>
                            <input type="number" name="cart_quantity" value="{{ $p->qty }}" id=""
                                min="1">
                            <input type="hidden" name="rowId_cart" value="{{ $p->rowId }}" id="">
                            <br>
                            <button class="btn" type="submit" style="font-size: 1.2rem">Cập nhật</button>
                        </form>


                        <br>
                        {{-- <span> size : </span>
                              <span class="size">Vua</span> --}}
                        <br><br>
                        <span> price : </span>
                        <span class="price"> {{ number_format($p->price) }}</span>
                    </div>
                </div>
            @endforeach


        </div>

    </div>

    <div class="cart-total">

        <h3 class="title"> cart total </h3>

        <div class="box">

            <h3 class="subtotal"> subtotal : <span>{{ Cart::subtotal() }}VNĐ</span> </h3>
            <h3 class="total"> total : <span>{{ Cart::subtotal() }}VNĐ</span> </h3>
            <?php
            $customer_id= Session::get('id');

            if ($customer_id != null) {

            ?>
            <a href="{{ URL::to('checkout') }}" class="btn">proceed to checkout</a>
            <?php
        }else{
            ?>
            <a href="{{ URL::to('login_checkout') }}" class="btn">proceed to checkout</a>

            <?php
        }

?>
        </div>

    </div>
    <link rel="stylesheet" href="{{ asset('user/css/nav.css') }}">
    <script src="{{ asset('user/js/nav.js') }}"></script>

</section>
