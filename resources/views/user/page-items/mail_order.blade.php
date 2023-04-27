<link rel="stylesheet" href="{{ asset('user/css/css-mail.css') }}">

<body>
    <div id="wrapper">
        <div class="container">
            <div id="header">
                <div class="header_title">
                    <h2>Your Bakery.vn Purchase </h2>

                </div>
                <div>


                    <div class="order_code">
                        <h3 style="color: brown; font-family:'Courier New', Courier, monospace">#{{ $order_code }}</h3>

                    </div>
                </div>


            </div>
            <div id="content">

                <div class="content_title">
                    <p>Hi, <span style="font-weight: 500;">{{ $username }}</span>
                    </p>

                    <p> Your order <span style="font-weight: 500;">#{{ $order_code }}</span> at Barkery.vn has been
                        successfully ordered</p>
                </div>

                <div class="detail_order">

                    <h3>Order Detail </h3>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Product </th>
                                <th>Price </th>
                                <th>Quantity </th>
                                <th>Size </th>
                                <th>Total items </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach ($content as  $value) {
                                  ?>

                        <tbody>
                            <td> {{ $value->name }} </td>
                            <td> ${{ number_format($value->price, 2, '.', ',') }} </td>
                            <td> {{ $value->qty }} </td>
                            <td> {{ $value->options->size }} ${{ $value->options->p_size }} </td>
                            <td> ${{ number_format($value->qty * $value->price + $value->options->p_size, 2, '.', ',') }}
                            </td>
                        </tbody>
                        <?php
                                }

                                ?>
                        </tbody>


                    </table>


                    <div class="detail">
                        <div class="view_detail_price" style="display:flex; justify-content: space-between;">
                            <div>
                                <h5 style="padding: 0.5rem 0px;">Subtotal : </h5>
                                <h5 style="padding: 0.5rem 0px;">Sale : </h5>
                                <h5 style="padding: 0.5rem 0px;">Delivery : </h5>

                            </div>

                            <div style="margin-left: 1rem;;">
                                <h5 style="font-weight: 200; padding: 0.5rem 0px;">
                                    ${{ $order_s_total }}</h5>
                                <h5 style="font-weight: 200; padding: 0.5rem 0px;">300000</h5>
                                <h5 style="font-weight: 200; padding: 0.5rem 0px;">$20.00</h5>
                            </div>

                        </div>

                        <div class="view_total" style="display:flex; justify-content: space-between;">
                            <div>
                                <h3 style="color: red;">Total :</h3>
                            </div>

                            <div style="margin-left: 4rem;">
                                <h3 style="font-weight: 200; color: red;">
                                    ${{ $order_total}}</h3>

                            </div>

                        </div>
                    </div>







                </div>

                <div class="order_info" style="padding:1rem 0px">
                    <h3>Profile order</h3>
                    <div class="detail">
                        <div class="order_info_content" style="display:flex">
                            <div>
                                <h5 style="padding: 0.5rem 0px;">Your order code : </h5>
                                <h5 style="padding: 0.5rem 0px;">Time order : </h5>
                                <h5 style="padding: 0.5rem 0px;">Payment methods :</h5>
                            </div>

                            <div style="margin-left: 1rem;">
                                <h5 style="font-weight: 200; padding: 0.5rem 0px;">#{{ $order_code }}</h5>
                                <h5 style="font-weight: 200; padding: 0.5rem 0px;">{{$time_order}}</h5>
                                <h5 style="font-weight: 200; padding: 0.5rem 0px;">{{$payment}}</h5>
                            </div>

                        </div>


                    </div>

                </div>

                <div class="order_shipping" style="padding:1rem 0px">
                    <h3>Order Shipping </h3>
                    <div class="detail">
                        <div class="order_shipping_content" style="display:flex">
                            <div>
                                <h5 style="padding: 0.5rem 0px;">Shipping name : </h5>
                                <h5 style="padding: 0.5rem 0px;">Shipping Time : </h5>
                                <h5 style="padding: 0.5rem 0px;">Address : </h5>
                                <h5 style="padding: 0.5rem 0px;">Phone number : </h5>

                            </div>

                            <div style="margin-left: 1rem;;">
                                <h5 style="font-weight: 200; padding: 0.5rem 0px;">{{$shipping_name}}</h5>
                                <h5 style="font-weight: 200; padding: 0.5rem 0px;">{{$shipping_time}}</h5>
                                <h5 style="font-weight: 200; padding: 0.5rem 0px;">
                                    {{$shipping_address}}
                                </h5>

                                <h5 style="font-weight: 200;padding: 0.5rem 0px;">{{$shipping_phone}}</h5>
                            </div>

                        </div>


                    </div>

                </div>






            </div>

            <div id="footer">
                <p>
                    For any questions and comments, please customer to contact us via:
                </p>
                <p>
                    Support Email : barkery.vn3726@gmail.com
                </p>
                <p>
                    Hotline: 0966 158 666
                </p>
                <p> Bakery.vn Thank you and very pleased to serve you</p>







                </p>
            </div>
        </div>
    </div>
</body>
