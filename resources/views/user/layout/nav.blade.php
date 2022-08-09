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

        <h3 class="title">Sản phẩm của bạn </h3>

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
                            <span> Số lượng : </span>
                            <input type="number" name="cart_quantity" value="{{ $p->qty }}" id=""
                            min="1" max="10">
                            <input type="hidden" name="rowId_cart" value="{{ $p->rowId }}" id="">
                            <br>
                            <button class="btn" type="submit" style="font-size: 1.2rem">Cập nhật</button>
                            <br>
                            <br>
                            <span>Size : </span>
                                  <span class="size"> {{ $p->options->size }} </span>
                                  <input type="hidden" name="cart_size"  value="{{ $p->options->size }}" id=""  >
                            <br><br>
                        </form>
                        <span> giá : </span>
                        <span class="price"> {{ number_format($p->price) }}</span>
                    </div>
                </div>
            @endforeach


        </div>

    </div>

    <div class="cart-total">

        <h3 class="title"> Tổng tiền giỏ hàng </h3>

        <div class="box">

            <h3 class="subtotal"> tổng phụ : <span>{{ Cart::subtotal() }}VNĐ</span> </h3>
            <h3 class="total"> tổng tiền  : <span>{{ Cart::subtotal()}}VNĐ</span> </h3>
            <?php
            $customer_id= Session::get('id');

            if ($customer_id != null) {

            ?>
            @if (Cart::count()==0)
            <a href="{{ URL::to('product') }}" class="btn"  onclick="return alert('Giỏ hàng của bạn trống !!!! ')">Thanh toán giỏ hàng </a>

            @else
            <a href="{{ URL::to('checkout') }}" class="btn">Thanh toán giỏ hàng</a>
            @endif
            <?php
        }else{
            ?>
            <a href="{{ URL::to('login_checkout') }}" class="btn"
            onclick="return confirm('Vui lòng đăng nhập để thanh toán ')">Thanh toán giỏ hàng</a>

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
