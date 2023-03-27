@extends('user.layout.index')
@section('content')
    <form action="{{ URL::to('save_customer_shipping') }}" method="POST">
        {{-- action="{{ URL::to('save_customer_shipping') }}" --}}
        {{ @csrf_field() }}
        <div class="bg-opacity"></div>
        <div class="modal-content-address active-address ">
            <div class="bg-address">
                <div class="modal-header-address">
                    <i class="fa fa-times" id="close2"></i>
                    </span>
                    <h5 class="modal-title-address">
                        <p>Delivery</p>
                    </h5>
                </div>
                <div class="modal-body-address">
                    <div>
                        <select name="shipping_province" id="shipping_province" class="form-group-address">
                            <option value="" data-namecity="">Enter your city/province</option>
                            @foreach ($province as $c)
                                <option value="{{ $c->matp }}" data-namecity="{{ $c->name }}">{{ $c->name }}
                                </option>
                            @endforeach
                        </select>
                        <select name="shipping_district" id="shipping_district" class="form-group-address">
                            <option value="" data-district="">Enter your district</option>
                            <input type="hidden" name="" id="district_hidden">
                        </select>
                        <select name="shipping_wards" id="shipping_wards" class="form-group-address">
                            <option value="" data-wards="">Enter your wards</option>
                            <input type="hidden" name="" id="wards_hidden">

                        </select>

                        <input type="text" class="form-group-address" placeholder="Enter your home address"
                            name="shipping_address" id="shipping_address">
                        <input type="hidden" class="form-group-address" placeholder="Enter your home address"
                            name="shipping_address_main" id="shipping_address_main">
                    </div>
                    <div style="padding:2rem 2rem ">
                        <div class="btn-address"
                            style="background:#fd7e14;
                            border-radius: 1rem;
                            border: .1rem solid rgba(0, 0, 0, .2);
                            box-shadow: var(--box-shadow);
                            padding: 1.5rem 2rem ;
                            cursor: pointer;
                            width: 98%;
                            min-height: 5rem;
                         margin-top: 1.4rem;
                            font-size: 1.5rem;;
                            margin-left: 0.4rem;
                            text-align: center;
                            justify-content: space-between;">
                            Confirm </div>
                    </div>
                </div>

            </div>


        </div>

        <!-- Thay doi thoi gian giao san pham -->
        <div class="modal-content-times active-times">
            <div class="bg-times">
                <div class="modal-header-times">
                    <i class="fa fa-times" id="close3"></i>
                    </span>
                    <h5 class="modal-title-times">
                        <p>Times Receive</p>
                    </h5>
                </div>
                <div class="modal-body-times">

                    <div>
                        <input type="date" class="form-group-times" name="shipping_time_day" id="form-group-day">

                    </div>
                    <select class="form-group-times" name="shipping_time_hour" id="form-group-times">
                        <option value="">---Choose times---</option>
                        <option value="NOW">As soon as possible</option>
                        <option value="10:30">10:30</option>
                        <option value="11:00">11:00</option>
                        <option value="11:30">11:30</option>
                        <option value="12:00">12:00</option>
                        <option value="12:30">12:30</option>
                        <option value="13:00">13:00</option>
                        <option value="13:30">13:30</option>
                        <option value="14:00">14:00</option>
                        <option value="14:30">14:30</option>
                        <option value="15:00">15:00</option>
                        <option value="15:30">15:30</option>
                        <option value="16:00">16:00</option>
                        <option value="16:30">16:30</option>
                        <option value="17:00">17:00</option>
                        <option value="17:30">17:30</option>
                        <option value="18:00">18:00</option>
                        <option value="18:30">18:30</option>
                        <option value="19:00">19:00</option>
                        <option value="19:30">19:30</option>
                        <option value="20:00">20:00</option>
                        <option value="20:30">20:30</option>
                    </select>

                    <div style="padding:2rem 2rem ">
                        <div class="btn-times"
                            style="    background:#fd7e14;
                        border-radius: 1rem;
                        border: .1rem solid rgba(0, 0, 0, .2);
                        box-shadow: var(--box-shadow);
                        padding: 1.5rem 2rem ;
                        cursor: pointer;
                        width: 98%;
                        min-height: 5rem;

                        font-size: 1.5rem;;
                        margin-left: 0.4rem;
                        text-align: center;
                        justify-content: space-between;">
                            Xác nhận</div>
                    </div>

                </div>

            </div>
        </div>

        </div>
        <!-- end -->
        <div id="wrapper">
            <div id="header">

                <p> <i class="fa fa-file" style="margin-right: 1rem;"></i>Order confirmation </p>
            </div>
            <div id="main">
                <div id="content">
                    <div class="checkout-delivery">
                        <div class="text-heading">
                            <h4>Delivery</h4>
                            <hr>
                        </div>
                        <hr>
                        <div class="checkout-address">
                            <img src="https://minio.thecoffeehouse.com/images/tch-web-order/Delivery2.png" alt="">
                            <div class="checkout-items">
                                <div class="checkout-address-text">
                                    <h5>Enter your delivery address</h5>
                                    <p>
                                    <div id="error_address" style=" font-size:1.4rem; font-weight:bold"></div>

                                    </p>
                                </div>

                                <div class="checkout-address-setting">
                                    <a href="">Add</a>
                                </div>
                            </div>
                            <i class="fa-solid fa-calendar-check" style="float: left;"></i>

                            <div class="checkout-time">
                                <div class="checkout-address-text">
                                    <h5>Time receive your order <span></span> </h5>
                                    <p>At: <span></span></p>
                                    <div id="error_day" style=" font-size:1.4rem; font-weight:bold"></div>
                                </div>

                                <div class="checkout-address-setting1">
                                    <a href="">Add</a>
                                </div>
                            </div>
                        </div>



                        <div class="checkout-information">

                            <div class="form-group">
                                <div id="error_name" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_name_regex" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_name_regex2" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_name_length" style=" font-size:1.4rem; font-weight:bold"></div>
                                <input type="text" id="name" placeholder="Enter your receiver [ only letter ]"
                                    name="shipping_name">
                            </div>
                            <div class="form-group">
                                <div id="error_phone" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_phone_regex" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_phone_regex2" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_phone_length" style=" font-size:1.4rem; font-weight:bold"></div>
                                <input type="text" id="phone" placeholder="Enter your phone [ max:[10-12] ]"
                                    name="shipping_phone">
                            </div>
                            <div class="form-group">
                                <input type="text" id="note"
                                    placeholder="Add a note to BakeryStore [you can empty]"
                                    class="form-control tch-delivery__input" name="shipping_note">
                            </div>
                            <input type="hidden" name="customer_email_order" value="{{ $detail->email }}">
                        </div>
                        <div class="payment">
                            <div class="text-heading">
                                <h4>How you'll pay </h4>
                            </div>
                            <div class="payment-method">
                                <ul class="list-payment">
                                    <li class="payment-method-item">
                                        <div class="payment-COD">
                                            <!-- <input type="radio" name="payment-method" id="COD" class="customer-radio"> -->
                                            <div class="radio-container">
                                                <input type="radio" id="COD" name="shipping_payment"
                                                    value="COD" checked>
                                                <label for="COD">
                                                    <img src="https://minio.thecoffeehouse.com/image/tchmobileapp/1000_photo_2021-04-06_11-17-08.jpg"
                                                        width="30px">
                                                    <span class="text">Cash</span></label>
                                            </div>

                                        </div>
                                    </li>


                                    <li class="payment-method-item">
                                        <div class="payment-BANK">
                                            <!-- <input type="radio" name="payment-method" id="BANK"> -->
                                            <div class="radio-container">

                                                <input type="radio" id="BANK" name="shipping_payment"
                                                    value="BANK">
                                                <label for="BANK"><span>
                                                        <img src="https://minio.thecoffeehouse.com/image/tchmobileapp/385_ic_atm@3x.png"
                                                            width="30px" alt=""></span>
                                                    <span class="text">Bank</span></label>

                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="bill">
                    <div class="bill-information">
                        <div class="bill-header">
                            <div class="header-text">
                                <h4>{{ Cart::count() }} item in your cart </h4>
                            </div>
                            <div class="plus-dishes">
                                <a href="{{ URL::to('product') }}">
                                    <p>Add new items</p>
                                </a>
                            </div>
                        </div>
                        <div class="bill-list">

                            <?php
                            $content = Cart::content();
                            // echo'<pre>';
                            // print_r($content);
                            // echo '</pre>';
                            ?>
                            @if (Cart::count() == 0)
                                <p style="font-weight:300;text-align:center; padding:2rem 2rem ">Your Cart is empty</p>
                                <div class="image" style="display: flex; justify-content: center ; margin-top:2rem;">
                                    <img src={{ asset('user/images/Shopping_cart_Monochromatic.png') }} alt=""
                                        style="width:70%">
                                </div>
                            @else
                                <table style="padding-top: 1.2rem ; padding:1rem">
                                    <thead>
                                        <th>
                                            <h5>Product</h5>
                                        </th>
                                        <th>
                                            <h5>Price</h5>
                                        </th>
                                        <th>
                                            <h5>Size</h5>
                                        </th>
                                        <th>
                                            <h5>Total</h5>
                                        </th>
                                        <th>
                                            <h5>Remove</h5>
                                        </th>

                                    </thead>
                                    <tbody style="height: 1rem"></tbody>

                                    <tbody>
                                        @foreach ($content as $p)
                                            <tr
                                                style=" background: #fff;
                                        border-radius: .5rem;
                                        border: .1rem solid rgba(0, 0, 0, .2);
                                        box-shadow: var(--box-shadow);
                                        min-height: 5rem;
                                        padding: 1rem;
                                        ">
                                                <td>
                                                    <p style="font-size: 1.6rem; padding:1rem 3rem 1.4rem 1rem ">
                                                        <span class="name-product">{{ $p->name }}</span><i>x</i>
                                                        <input type="text" name="quantity" id=""
                                                            value="{{ $p->qty }}" class="amount-product"
                                                            style="width: 2rem" readonly>
                                                        +<small>{{ $p->options->size }}</small>
                                                    </p>
                                                </td>
                                                <td style="font-size: 1.6rem;">
                                                    ${{ number_format($p->price, 2, '.', ',') }}
                                                </td>
                                                <td>
                                                    <p style="font-size: 1.6rem;"> <span
                                                            class="size-product-bills">${{ $p->options->p_size }}</p>
                                                </td>
                                                <td style="font-size: 1.6rem;"> $<?php
                                                $subtotal = $p->price * $p->qty + $p->options->p_size;
                                                echo number_format($subtotal, 2, '.', ',');
                                                ?>
                                                </td>


                                                <td>
                                                    <p style="padding:3rem 2rem ;"
                                                        onclick="return confirm('Do you delete this items ')">
                                                        <a href="{{ URL::to('delete-to-cart/' . $p->rowId) }}"
                                                            style="color: #fd7e14"><i
                                                                class="fa-solid fa-trash-can"></i></a>

                                                    </p>
                                                </td>

                                            </tr>
                                            <tr style="padding-top: 5rem; padding-bottom:5rem; height:1.5rem"></tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            @endif

                        </div>
                        <div class="total">
                            @if (Cart::count() == 0)
                            @else
                                <div class="header-text">
                                    <h3 style="padding-left: 2rem;">Total bill </h3>

                                </div>
                                <hr>
                                <div class="footer-header ">
                                    <div class="price-footer">
                                        <h3 style="padding-left: 2rem;">Subtotal </h3>
                                        <p> ${{ number_format(Cart::total(), 2, '.', ',') }}</p>

                                    </div>
                                    <div class="price-delivery">
                                        <h3 style="padding-left: 2rem;">Delivery<br></h3>
                                        <p>$20.00</p>

                                    </div>
                                </div>
                                <div class="h-footer-bill">
                                    <div class="footer-bill">
                                        <div class="heading-text">
                                            <h4 style="margin-left:2rem;">Total bill </h4>
                                            <div class="price-bill">
                                                <p style="margin-left:2rem;">
                                                    ${{ number_format(Cart::total() + 20.0, 2, '.', ',') }}
                                                </p>
                                            </div>
                                        </div>

                                        <button class="button-bills" onclick="return confirm('Do you order this cart  ')">
                                            <p>order</p>
                                        </button>
                                    </div>
                                </div>



                            @endif

                            <div>


                            </div>
                            <div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </form>
    <link rel="stylesheet" href="{{ asset('user/css/checkout.css') }}">
    {{-- <script src="{{ asset('user/js/checkout.js') }}"></script> --}}
    <style>
        th {
            padding-right: 2.5rem;
            text-align: center;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".button-bills").click(function(e) {
                validationCheck(e);
            })
            $('#shipping_province').change(function() {
                var shipping_province = $(this).val();
                var _token = $('input[name="_token"]').val();


                $.ajax({
                    url: "{{ URL::to('district') }}",
                    method: 'post',
                    data: {
                        shipping_province: shipping_province,
                        _token: _token
                    },
                    success: function(data) {
                        $("#shipping_district").html(data);



                    }
                });


            });


            $('#shipping_district').change(function() {
                var shipping_district = $(this).val();

                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ URL::to('wards') }}",
                    method: 'post',
                    data: {
                        shipping_district: shipping_district,
                        _token: _token
                    },
                    success: function(data) {
                        $("#shipping_wards").html(data);
                        $("#shipping_district option").each(function() {
                            if ($(this).attr("value") == shipping_district)
                                $("#district_hidden").attr("value", $(this).attr(
                                    "data-district"));

                        })
                    }
                });


            });
            $('#shipping_wards').change(function() {
                var shipping_wards = $(this).val();

                var _token = $('input[name="_token"]').val();

                $.ajax({
                    success: function(data) {
                        $("#shipping_wards option").each(function() {
                            if ($(this).attr("value") == shipping_wards)
                                $("#wards_hidden").attr("value", $(this).attr(
                                    "data-wards"));

                        })
                    }
                });


            });


            function validationCheck(e) {
                var day = $("#form-group-day").val();
                var times = $("#form-group-times").val();
                var name = $("#name").val();
                var phone = $("#phone").val();
                var address = $(".form-group-address").val();



                if (address.length == " ") {
                    e.preventDefault();
                    $("#error_address").html(
                        "<span style='color:red;'>* You can not empty * </span>");
                } else {
                    $("#error_address").remove();

                }

                if (day.length == " " || times.length == " ") {
                    e.preventDefault();
                    $("#error_day").html(
                        "<span style='color:red';>* You can not empty * </span>");
                }
                if (name.length == "") {
                    e.preventDefault();
                    $("#error_name").html(
                        "<span style='color:red';>* Please your  shipping name * </span>");
                } else {

                    $("#error_name").remove();
                    // $("#name").attr("readonly", true);
                }
                if (name.length < 5 || name.length > 20) {
                    e.preventDefault();
                    $("#error_name_length").html(
                        "<span style='color:red';>* Please enter  invalidate  [5-20] characters * </span>");
                } else {

                    $("#error_name_length").remove();

                }
                // truong hop toan bo la so
                if (/[a-zA-Z0-9]/.test(name) == true &&
                    /[a-zA-Z]/.test(name) == false && /[0-9]/.test(name) == true) {
                    e.preventDefault();
                    $("#error_name_regex").html(
                        "<span style='color:red';>* Please enter only letter * </span>");
                }
                // truong hop so va chu
                if (/[a-zA-Z0-9]/.test(name) == true &&
                    /[a-zA-Z]/.test(name) == true && /[0-9]/.test(name) == true) {
                    e.preventDefault();
                    $("#error_name_regex2").html(
                        "<span style='color:red';>* Please enter only letter * </span>");
                }
                if (/[a-zA-Z0-9]/.test(name) == true &&
                    /[a-zA-Z]/.test(name) == true && /[0-9]/.test(name) == false) {
                    $("#error_name_regex").remove();
                    $("#error_name_regex2").remove();

                }

                if (/[a-zA-Z0-9]/.test(name) == true &&
                    /[a-zA-Z]/.test(name) == true && /[0-9]/.test(name) == false && name.length != "" && name
                    .length >= 5 &&
                    name.length <= 20) {
                    $("#name").attr("readonly", true);


                }
                //  alert(/[a-zA-Z]/.test(name))
                // alert(/[a-zA-Z0-9]/.test(name))
                // alert(/[0-9]/.test(name))




                if (phone.length == "") {
                    e.preventDefault();
                    $("#error_phone").html(
                        "<span style='color:red';>* Please enter your number phone * </span>");
                } else {
                    $("#error_phone").remove();

                }

                if (phone.length < 10 || phone.length > 12) {
                    e.preventDefault();
                    $("#error_phone_length").html(
                        "<span style='color:red';>* Please enter  invalidate   [10-12] characters* </span>");

                } else {
                    $("#error_phone_length").remove();

                }
                if (/[0-9]/.test(phone) == false && /[a-zA-Z0-9]/.test(phone) == true && /[a-zA-Z0-9]/.test(
                        phone) == true) {
                    e.preventDefault();
                    $("#error_phone_regex").html(
                        "<span style='color:red';>* Please enter only number phone [0-9] * </span>");
                }

                if (/[0-9]/.test(phone) == true && /[a-zA-Z0-9]/.test(phone) == true && /[a-zA-Z]/.test(phone) ==
                    true) {
                    e.preventDefault();
                    $("#error_phone_regex2").html(
                        "<span style='color:red';>* Please enter only number phone [0-9] * </span>");
                }

                if (/[0-9]/.test(phone) == true && /[a-zA-Z0-9]/.test(phone) == true && /[a-zA-Z]/.test(phone) ==
                    false) {
                    $("#error_phone_regex").remove();
                    $("#error_phone_regex2").remove();


                }
                if (/[0-9]/.test(phone) == true && /[a-zA-Z0-9]/.test(phone) == true && /[a-zA-Z]/.test(phone) ==
                    false &&
                    phone.length != "" && phone.length >= 10 &&
                    phone.length <= 12) {
                    $("#phone").attr("readonly", true);


                }

            }

        })
    </script>
    <script src="{{ asset('user/js/check_product.js') }}"></script>

@endsection
