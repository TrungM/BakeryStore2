@extends('user.layout.index')
@section('content')
    <div id="wrapper">
        <div class="heading">
            <img src="images/heading-img.png" alt="">
            <h3>Purchases</h3>
        </div>
        @foreach ($ds as $item)
            <ul>
                <li class="order-items">
                    <div class="order-detail-items">
                        <div class="order-detail-items-header">
                            <div class="order-code">
                                <span style="text-transform: none">#{{ $item->order_code }}</span>
                            </div>
                            <div class="order-status-header">
                                <span>{{ $item->order_status }}</span>
                            </div>
                        </div>
                        <div style="border: #333 solid 1px;
                "></div>
                        <div class="order-detail-items-content-shipping" style="display: none"
                            data-itemshipping={{ $item->order_id }}>
                            <div class="order-detail-shipping">
                                <div class="order-detail-shipping-header">
                                    <span>Delivery address</span>
                                    <span style="font-size: 1.5rem;"> Date delivery:<small>
                                            {{ $item->shipping_time_day }}</small> <br> Time delivery: <small>
                                            {{ $item->shipping_time_hour }}</small></span>
                                </div>
                                <div class="order-detail-shipping-content">
                                    <table>
                                        <tr>
                                            <th>Name:</th>
                                            <td>{{ $item->shipping_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>{{ $item->shipping_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <td>{{ $item->shipping_phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment:</th>
                                            <td>{{ $item->shipping_payment }}</td>
                                        </tr>
                                        <tr>
                                            <th>Note:</th>
                                            <td>{{ $item->shipping_note }}</td>

                                        </tr>

                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="order-detail-items-content-product "
                            style="display: none"data-itemproduct={{ $item->order_id }}>
                            <div class="order-detail-product-header">
                                <span>Your Product</span>

                            </div>
                            <div class="order-detail-items-content">
                                @foreach ($detail as $a)
                                    @if ($a->order_code == $item->order_code)
                                        <div class="order-detail-products">
                                            <div class="order-detail-product-image">
                                                <img src={{ url('user/images/' . $a->product_images) }} alt="">
                                            </div>
                                            <div class="order-detail-product-content">
                                                <p style="margin-bottom: 1rem;">{{ $a->product_name }}
                                                </p>

                                                <p style="margin-bottom: 1rem;">Size : {{ $a->product_size }}</p>
                                                <p style="margin-bottom: 1rem;">Quality : {{ $a->product_quantity }}</p>

                                                <div class="order-detail-product-content-action">
                                                    <div class="action-detail">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                        <a href="{{ URL::to('view-product/' . $a->product_id) }}">
                                                            Detail
                                                        </a>
                                                    </div>
                                                    <?php
                                                    $fb_exists = DB::table('tb_feedback')
                                                        ->where('order_code', $a->order_code)
                                                        ->where('customer_id', $item->customer_id)
                                                        ->where("product_id",$a->product_id)
                                                        ->exists();
                                                    ?>

                                                    @if ($item->order_status == 'Complete')

                                                        @if (  $fb_exists== true)
                                                        <div class="action-feedback">
                                                            <a
                                                                href="{{ url('view-product/' . $a->product_id) }}">
                                                              View Feedback
                                                            </a>
                                                        </div>
                                                        @else
                                                        <div class="action-feedback">
                                                            <i class="fa-solid fa-pencil"></i>
                                                            <a
                                                                href="{{ URL::to('feedback/' . $a->order_code . '/' . $a->product_id) }}">
                                                                Feedback
                                                            </a>
                                                        </div>
                                                        @endif

                                                        @endif





                                                </div>

                                            </div>
                                            <div class="order-detail-product-price">
                                                <div class="order-detail-product-price-header">
                                                    <span>
                                                        Item total</span>

                                                </div>

                                                <div
                                                    style="border: rgb(229, 231, 235) solid 1px;
                                                    ">
                                                </div>
                                                <div class="order-detail-product-price-content">
                                                    <div class="order-detail-product-price-title">
                                                        <p>Price item :
                                                            <span>${{ number_format($a->product_price, 2, '.', ',') }}</span>
                                                        </p>

                                                        <p>Size item:<span>+${{ $a->product_size_price }}</span></p>
                                                        <p>Quality items:<span>{{ $a->product_quantity }}</span></p>
                                                        <div
                                                            style="border: rgb(229, 231, 235) solid 1px;
                                                                     ">
                                                        </div>
                                                        <p
                                                            style="font-weight: bold;margin-bottom: 1.5rem;font-size: 1.6rem;">
                                                            Subtotal:
                                                            <span><?php $subtotal = $a->product_price * $a->product_quantity + $a->product_size_price;
                                                            echo number_format($subtotal, 2, '.', ','); ?></span>
                                                        </p>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                @endforeach


                            </div>

                        </div>

                        <div style="border: #333 solid 1px;
                "></div>
                        <div class="order-detail-items-footer">
                            <div class="order-text-footer">
                                <span style="font-size: medium;"> Fee Delivery </span>

                                <span>Total ( {{ $item->order_items }} items) </span>
                            </div>
                            <div class="order-date">
                                <span style="font-size: medium;">$20.00</span>
                                <span>${{ number_format($item->order_total, 2, '.', ',') }}</span>
                            </div>
                        </div>


                    </div>


                </li>
                <div class="angle-js-down" data-items={{ $item->order_id }}>
                    <i class="fa fa-angle-down icon"></i>

                </div>
                <div class="angle-js-up" data-itemsup={{ $item->order_id }} style="display: none">
                    <i class="fa fa-angle-up icon"></i>
                </div>


            </ul>
        @endforeach


    </div>





    <link rel="stylesheet" href="{{ asset('user/css/purchase.css') }}">
    <script src="{{ asset('user/js/purchase.js') }}"></script>
@endsection
