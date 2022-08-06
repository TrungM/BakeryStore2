@extends('user.layout.index')
@section('content')
    <form action="{{ URL::to('save_customer_shipping') }}" method="POST">
        {{ @csrf_field() }}

        <div class="modal-content-address">
            <div class="bg-address" style="    height: 22rem;">
                <div class="modal-header-address">
                    <i class="fa fa-times" id="close2"></i>
                    </span>
                    <h5 class="modal-title-address">
                        <p>Giao hàng</p>
                    </h5>
                </div>
                <div class="modal-body-address">

                    <div>
                        <input type="text" class="form-group-address" placeholder="Vui lòng nhập địa chỉ"
                            name="shipping_address">
                    </div>
                    <div class="btn-address"
                        style="    background:#fd7e14;
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
                        Xác nhận </div>

                </div>
            </div>

        </div>
        <!-- end -->

        <!-- Thay doi thoi gian giao san pham -->
        <div class="modal-content-times">
            <div class="bg-times">
                <div class="modal-header-times">
                    <i class="fa fa-times" id="close3"></i>
                    </span>
                    <h5 class="modal-title-times">
                        <p>Thời gian giao hàng</p>
                    </h5>
                </div>
                <div class="modal-body-times">

                    <div>
                        <input type="date" class="form-group-times" name="shipping_time_day" id="form-group-day">

                    </div>
                    <select class="form-group-times" name="shipping_time_hour" id="form-group-times">
                        <option value="">---Chọn thời gian---</option>
                        <option value="NOW">Càng sớm càng tốt</option>
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

                    <div>
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

                <p> <i class="fa fa-file"></i>Xác nhận đơn hàng </p>
            </div>
            <div id="main">
                <div id="content">
                    <div class="checkout-delivery">
                        <div class="text-heading">
                            <h4>Giao hàng</h4>
                            <hr>
                        </div>
                        <hr>
                        <div class="checkout-address">
                            <img src="https://minio.thecoffeehouse.com/images/tch-web-order/Delivery2.png" alt="">
                            <div class="checkout-items">
                                <div class="checkout-address-text">
                                    <h5>Địa chỉ giao hàng</h5>
                                    <p>
                                    <div id="error_address" style=" font-size:1.4rem; font-weight:bold"></div>

                                    </p>
                                </div>

                                <div class="checkout-address-setting">
                                    <a href="">Nhập</a>
                                </div>
                            </div>
                            <i class="fa-solid fa-calendar-check" style="float: left;"></i>

                            <div class="checkout-time">
                                <div class="checkout-address-text">
                                    <h5>Nhận hàng trong ngày <span></span> </h5>
                                    <p>Vào lúc: <span></span></p>
                                    <div id="error_day" style=" font-size:1.4rem; font-weight:bold"></div>
                                </div>

                                <div class="checkout-address-setting1">
                                    <a href="">Nhập</a>
                                </div>
                            </div>
                        </div>



                        <div class="checkout-information">

                            <div class="form-group">

                                <div id="error_name" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_name_regex" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_name_regex2" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_name_length" style=" font-size:1.4rem; font-weight:bold"></div>

                                <input type="text" id="name" placeholder="Tên người nhận [ chỉ nhập các ký tự chữ ]"
                                    name="shipping_name">

                            </div>
                            <div class="form-group">
                                <div id="error_phone" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_phone_regex" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_phone_regex2" style=" font-size:1.4rem; font-weight:bold"></div>
                                <div id="error_phone_length" style=" font-size:1.4rem; font-weight:bold"></div>
                                <input type="text" id="phone" placeholder="Số điện thoại [tối đa 10-12 ký tự]"
                                    name="shipping_phone">

                            </div>
                            <div class="form-group">
                                <input type="text" id="note"
                                    placeholder="Thêm hướng dẫn giao hàng [có thể bỏ trống]"
                                    class="form-control tch-delivery__input" name="shipping_note">
                            </div>

                        </div>

                        <div class="payment">
                            <div class="text-heading">
                                <h4>Phương thức thanh toán </h4>
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
                                                    <span class="text">Tiền
                                                        mặt</span></label>


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
                                                    <span class="text">Thẻ ngân
                                                        hàng</span></label>

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
                                <h4>Các món đã chọn </h4>
                            </div>
                            <div class="plus-dishes">
                                <a href="{{ URL::to('product') }}">
                                    <p>Thêm món</p>
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

                            <table style="padding-top: 1.2rem ; padding:1rem">
                                <thead>
                                    <th>
                                        <h5>Sản phẩm</h5>
                                    </th>
                                    <th>
                                        <h5>Giá</h5>
                                    </th>
                                    <th>
                                        <h5 style="padding-left: 1.5rem">Size</h5>
                                    </th>
                                    <th>
                                        <h5>Tiền</h5>
                                    </th>
                                    <th>
                                        <h5>Xóa</h5>
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
                                                <p style="font-size: 1.6rem; padding:1rem 1.4rem ">
                                                    <span class="name-product">{{ $p->name }}</span><i>x</i>
                                                    <input type="text" name="quantity" id=""
                                                        value="{{ $p->qty }}" class="amount-product"
                                                        style="width: 1rem" readonly>
                                                </p>
                                            </td>
                                            <td style="font-size: 1.6rem;">{{ number_format($p->price) }}</td>
                                            <td>
                                                <p style="font-size: 1.6rem ;padding-left:1.5rem"> <span
                                                        class="size-product-bills">Vua</span><i>x</i><span
                                                        class="amount-size-bills" style="font-size: 1.5rem;">1</span></p>
                                            </td>
                                            <td style="font-size: 1.6rem;">
                                                <p style="padding:1rem 2rem ;"> <span>
                                                        <?php
                                                        $subtotal = $p->price * $p->qty;
                                                        echo number_format($subtotal);
                                                        ?>
                        </div>

                        </span></p>
                        </td>
                        <td>
                            <p style="padding:3rem 2rem ;"> <a href="{{ URL::to('delete-to-cart/' . $p->rowId) }}"
                                    style="color: #fd7e14"><i class="fa-solid fa-trash-can"></i></a>
                            </p>
                        </td>

                        </tr>
                        <tr style="padding-top: 5rem; padding-bottom:5rem; height:1.5rem"></tr>
                        @endforeach

                        </tbody>
                        </table>

                    </div>
                    <div class="total">
                        <div class="header-text">
                            <h3 style="padding-left: 2rem;">Tổng cộng </h3>
                        </div>
                        <hr>
                        <div class="footer-header">
                            <div class="price-footer">
                                <h5>Thành tiền </h5>
                                <p>{{ Cart::subtotal() . '' . 'đ' }}</p>

                            </div>
                            <div class="price-delivery">
                                <h5>Phí vận chuyển<br> (miễn phí ship cho đơn trên 300.000đ)</h5>
                                <p>30.000đ</p>

                            </div>
                        </div>
                        <div class="footer-bill" style="margin-top:23rem; width:100%">
                            <div class="heading-text">
                                <h4 style="margin-left:2rem;">Thành tiền </h4>
                                <div class="price-bill">
                                    <p style="margin-left:2rem;">{{ Cart::subtotal() . '' . 'đ' }}</p>
                                </div>
                            </div>

                            <button class="button-bills">
                                <p>Đặt hàng</p>
                            </button>

                        </div>

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
    <script src="{{ asset('user/js/check_product.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".button-bills").click(function(e) {
                validationCheck(e);
            })

        })


        function validationCheck(e) {
            var day = $("#form-group-day").val();
            var times = $("#form-group-times").val();
            var name = $("#name").val();
            var phone = $("#phone").val();
            var address = $(".form-group-address").val();



            if (address.length == " ") {
                e.preventDefault();
                $("#error_address").html(
                    "<span style='color:red;'>*Vui lòng nhập địa chỉ * </span>");
            } else {
                $("#error_address").remove();

            }

            if (day.length == " " || times.length == " ") {
                e.preventDefault();
                $("#error_day").html(
                    "<span style='color:red';>*Vui lòng nhập thời gian* </span>");
            }
            if (name.length == "") {
                e.preventDefault();
                $("#error_name").html(
                    "<span style='color:red';>*Vui lòng nhập tên* </span>");
            } else {

                $("#error_name").remove();
                // $("#name").attr("readonly", true);
            }
            if (name.length < 5 || name.length > 20) {
                e.preventDefault();
                $("#error_name_length").html(
                    "<span style='color:red';>*Vui lòng nhập  trên [5-20] ký tự* </span>");
            } else {

                $("#error_name_length").remove();

            }
            // truong hop toan bo la so
            if (/[a-zA-Z0-9]/.test(name) == true &&
                /[a-zA-Z]/.test(name) == false && /[0-9]/.test(name) == true) {
                e.preventDefault();
                $("#error_name_regex").html(
                    "<span style='color:red';>*Vui lòng nhập chỉ nhập chữ * </span>");
            }
            // truong hop so va chu
            if (/[a-zA-Z0-9]/.test(name) == true &&
                /[a-zA-Z]/.test(name) == true && /[0-9]/.test(name) == true) {
                e.preventDefault();
                $("#error_name_regex2").html(
                    "<span style='color:red';>*Vui lòng nhập chỉ nhập chữ * </span>");
            }
            if (/[a-zA-Z0-9]/.test(name) == true &&
                /[a-zA-Z]/.test(name) == true && /[0-9]/.test(name) == false) {
                $("#error_name_regex").remove();
                $("#error_name_regex2").remove();

            }

            if (/[a-zA-Z0-9]/.test(name) == true &&
                /[a-zA-Z]/.test(name) == true && /[0-9]/.test(name) == false && name.length != "" && name.length >= 5 &&
                name.length <= 20) {
                $("#name").attr("readonly", true);


            }
            //  alert(/[a-zA-Z]/.test(name))
            // alert(/[a-zA-Z0-9]/.test(name))
            // alert(/[0-9]/.test(name))




            if (phone.length == "") {
                e.preventDefault();
                $("#error_phone").html(
                    "<span style='color:red';>*Vui lòng nhập số điện thoại* </span>");
            } else {
                $("#error_phone").remove();

            }

            if (phone.length < 10 || phone.length > 12) {
                e.preventDefault();
                $("#error_phone_length").html(
                    "<span style='color:red';>*Vui lòng  nhập [10-12] ký tự* </span>");

            } else {
                $("#error_phone_length").remove();

            }
            if (/[0-9]/.test(phone) == false && /[a-zA-Z0-9]/.test(phone) == true && /[a-zA-Z0-9]/.test(phone) == true) {
                e.preventDefault();
                $("#error_phone_regex").html(
                    "<span style='color:red';>*Vui lòng chỉ nhập số [0-9]* </span>");
            }

            if (/[0-9]/.test(phone) == true && /[a-zA-Z0-9]/.test(phone) == true && /[a-zA-Z]/.test(phone) == true) {
                e.preventDefault();
                $("#error_phone_regex2").html(
                    "<span style='color:red';>*Vui lòng chỉ nhập số [0-9]* </span>");
            }

            if (/[0-9]/.test(phone) == true && /[a-zA-Z0-9]/.test(phone) == true && /[a-zA-Z]/.test(phone) == false) {
                $("#error_phone_regex").remove();
                $("#error_phone_regex2").remove();


            }
            if (/[0-9]/.test(phone) == true && /[a-zA-Z0-9]/.test(phone) == true && /[a-zA-Z]/.test(phone) == false
            && phone.length != "" && phone.length  >= 10 &&
            phone.length <=12) {
                $("#phone").attr("readonly", true);


            }

        }
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.css">
    <script>
    //     const buttonBill=document.querySelector(".button-bills");
    // const swalWithBootstrapButtons = Swal.mixin({
    //    customClass: {
    //      confirmButton: ' btn-success',
    //      cancelButton: 'btn-cancel'
    //    },
    //    buttonsStyling: true
    //  })

    //  swalWithBootstrapButtons.fire({
    //    title: 'Are you sure?',
    //    text: "You won't be able to revert this!",
    //    icon: 'warning',
    //    showCancelButton: true,
    //    confirmButtonText: 'Yes, delete it!',
    //    cancelButtonText: 'No, cancel!',
    //    reverseButtons: true
    //  }).then((result) => {
    //    if (result.isConfirmed) {
    //      swalWithBootstrapButtons.fire(
    //        'Deleted!',
    //        'Your file has been deleted.',
    //        'success'
    //      )
    //    } else if (
    //      /* Read more about handling dismissals below */
    //      result.dismiss === Swal.DismissReason.cancel
    //    ) {
    //      swalWithBootstrapButtons.fire(
    //        'Cancelled',
    //        'Your imaginary file is safe :)',
    //        'error'
    //      )
    //    }
    //  })
    // buttonBill.addEventListener("click", function(){
    //    swalWithBootstrapButtons.mixin({
    //       customClass: {
    //         confirmButton: 'btn-success',
    //         cancelButton: ' btn-danger'
    //       },
    //       buttonsStyling: false
    //     })

    //     swalWithBootstrapButtons.fire({
    //       title: 'Are you sure?',
    //       text: "You won't be able to revert this!",
    //       icon: 'warning',
    //       showCancelButton: true,
    //       confirmButtonText: 'Yes, delete it!',
    //       cancelButtonText: 'No, cancel!',
    //       reverseButtons: true
    //     }).then((result) => {
    //       if (result.isConfirmed) {
    //         swalWithBootstrapButtons.fire(
    //           'Deleted!',
    //           'Your file has been deleted.',
    //           'success'
    //         )
    //       } else if (
    //         /* Read more about handling dismissals below */
    //         result.dismiss === Swal.DismissReason.cancel
    //       ) {
    //         swalWithBootstrapButtons.fire(
    //           'Cancelled',
    //           'Your imaginary file is safe :)',
    //           'error'
    //         )
    //       }
    // })
    // })
    </script> --}}
@endsection
