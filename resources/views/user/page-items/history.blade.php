@extends('user.layout.index')
@section('content')
    <section id="history_page">
        <div class="heading">
            <h3>Lịch sử mua hàng</h3>
        </div>
        <div class="history_table">
            <table>
                <thead>
                    <tr>
                        <th
                        style="padding: 2rem 2rem; margin-right:2rem;">Order Code</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th> Create_at</th>
                        <th> Detail</th>

                    </tr>

                </thead>

                <tbody>
                    @foreach ($history as $a)
                        <tr style="padding: 2rem 2rem;">
                            <td style="padding: 2rem 2rem; font-weight:bold">{{ $a->order_code }}</td>
                            <td>{{ $a->order_total }}</td>
                            <td>{{ $a->order_status }}</td>
                            <td >{{ $a->created_at }}</td>
                            <td>Xem chi tiết đơn hàng</td>

                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </section>
    <link rel="stylesheet" href="{{ asset('user/css/history.css') }}">
    {{-- <script src="{{ asset('user/js/history.js') }}"></script> --}}
@endsection
