@extends('user.layout.index');
@section('content')

<div id="wrapper">
    <div id="header">
        <p>Hệ thống cửa hàng</p>

    </div>
    <div id="main">
        <div id="content">
            <div class="store">
                <ul class="list-store">
                    <li>
                        <div class="image-store">
                            <img src="https://file.hstatic.net/1000075078/file/hcm-hoa-hong2_6adf54c60c3d409e914a2d54ce025dbf.jpg"
                                alt="">
                        </div>
                        <div class="store-infor">
                            <div class="name-store">
                                HCM Hoa Hồng
                            </div>
                            <div class="map-store">
                                <a href="">
                                     <span>Xem ban do</span>
                                </a>
                            </div>
                            <div class="address-store">
                                43 Hoa Hồng, Phường 7, Phú Nhuận, Hồ Chí Minh
                            </div>
                            <div class="time-store">
                                07:00 - 21:30
                            </div>
                            <div class="option-store">
                                <div class="option-online">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14 0C14.5523 0 15 0.447715 15 1V1.999L20 2V8L17.98 7.999L20.7467 15.5953C20.9105 16.032 21 16.5051 21 16.999C21 19.2082 19.2091 20.999 17 20.999C15.1368 20.999 13.5711 19.7251 13.1265 18.0008L8.87379 18.0008C8.42948 19.7256 6.86357 21 5 21C3.05513 21 1.43445 19.612 1.07453 17.7725C0.435576 17.439 0 16.7704 0 16V3C0 2.44772 0.447715 2 1 2H8C8.55228 2 9 2.44772 9 3V11C9 11.5128 9.38604 11.9355 9.88338 11.9933L10 12H12C12.5128 12 12.9355 11.614 12.9933 11.1166L13 11V2H10V0H14ZM5 15C3.89543 15 3 15.8954 3 17C3 18.1046 3.89543 19 5 19C6.10457 19 7 18.1046 7 17C7 15.8954 6.10457 15 5 15ZM17 14.999C15.8954 14.999 15 15.8944 15 16.999C15 18.1036 15.8954 18.999 17 18.999C18.1046 18.999 19 18.1036 19 16.999C19 15.8944 18.1046 14.999 17 14.999ZM15.852 7.999H15V11C15 12.6569 13.6569 14 12 14H10C8.69412 14 7.58312 13.1656 7.17102 12.0009L1.99994 12V14.3542C2.73289 13.5238 3.80528 13 5 13C6.86393 13 8.43009 14.2749 8.87405 16.0003H13.1257C13.5693 14.2744 15.1357 12.999 17 12.999C17.2373 12.999 17.4697 13.0197 17.6957 13.0593L15.852 7.999ZM7 7H2V10H7V7ZM18 4H15V6H18V4ZM7 4H2V5H7V4Z"
                                            fill="black" fill-opacity="0.6"></path>
                                    </svg>
                                    <span style="color: black;">Mua online</span>

                                    <a    href="{{ URL::to('product') }}" class="here">Tại đây</a>
                                </div>

                                <div class="option-offline">
                                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 11.242V18H21V20H1V18H2V11.242C1.38437 10.8311 0.879713 10.2745 0.53082 9.62176C0.181927 8.96899 -0.000407734 8.24017 6.84612e-07 7.5C6.84612e-07 6.673 0.224001 5.876 0.633001 5.197L3.345 0.5C3.43277 0.347985 3.559 0.221749 3.71101 0.133981C3.86303 0.0462129 4.03547 4.45922e-06 4.211 0H17.79C17.9655 4.45922e-06 18.138 0.0462129 18.29 0.133981C18.442 0.221749 18.5682 0.347985 18.656 0.5L21.358 5.182C21.9546 6.17287 22.1463 7.35553 21.8934 8.48414C21.6405 9.61275 20.9624 10.6005 20 11.242ZM18 11.972C17.3124 12.0491 16.6163 11.9665 15.9659 11.7307C15.3155 11.4948 14.7283 11.1119 14.25 10.612C13.8302 11.0511 13.3258 11.4005 12.7672 11.6393C12.2086 11.878 11.6075 12.001 11 12.001C10.3927 12.0013 9.7916 11.8786 9.23303 11.6402C8.67445 11.4018 8.16996 11.0527 7.75 10.614C7.27163 11.1138 6.68437 11.4964 6.03395 11.7321C5.38353 11.9678 4.68749 12.0503 4 11.973V18H18V11.973V11.972ZM4.789 2L2.356 6.213C2.11958 6.79714 2.11248 7.44903 2.33613 8.03818C2.55978 8.62733 2.99768 9.11029 3.56218 9.39039C4.12668 9.6705 4.77614 9.72708 5.38058 9.54882C5.98502 9.37055 6.49984 8.9706 6.822 8.429C7.157 7.592 8.342 7.592 8.678 8.429C8.8633 8.89342 9.1836 9.2916 9.59753 9.5721C10.0115 9.85261 10.5 10.0025 11 10.0025C11.5 10.0025 11.9885 9.85261 12.4025 9.5721C12.8164 9.2916 13.1367 8.89342 13.322 8.429C13.657 7.592 14.842 7.592 15.178 8.429C15.3078 8.74845 15.5022 9.0376 15.7491 9.27828C15.996 9.51895 16.2901 9.70595 16.6127 9.82752C16.9354 9.94909 17.2797 10.0026 17.6241 9.98468C17.9684 9.96677 18.3053 9.87782 18.6136 9.72343C18.9219 9.56903 19.1949 9.35253 19.4155 9.08753C19.6361 8.82253 19.7995 8.51477 19.8955 8.18357C19.9914 7.85238 20.0178 7.50493 19.973 7.16305C19.9281 6.82118 19.8131 6.49227 19.635 6.197L17.21 2H4.79H4.789Z"
                                            fill="black" fill-opacity="0.6"></path>
                                    </svg>
                                    <span>Mua tại cửa hàng</span>
                                </div>

                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="image-store">
                            <img src="https://file.hstatic.net/1000075078/file/hcm-hoa-hong2_6adf54c60c3d409e914a2d54ce025dbf.jpg"
                                alt="">
                        </div>
                        <div class="store-infor">
                            <div class="name-store">
                                HCM Hoa Hồng
                            </div>
                            <div class="map-store">
                                <a href="">
                                     <span>Xem ban do</span>
                                </a>
                            </div>
                            <div class="address-store">
                                43 Hoa Hồng, Phường 7, Phú Nhuận, Hồ Chí Minh
                            </div>
                            <div class="time-store">
                                07:00 - 21:30
                            </div>
                            <div class="option-store">
                                <div class="option-online">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14 0C14.5523 0 15 0.447715 15 1V1.999L20 2V8L17.98 7.999L20.7467 15.5953C20.9105 16.032 21 16.5051 21 16.999C21 19.2082 19.2091 20.999 17 20.999C15.1368 20.999 13.5711 19.7251 13.1265 18.0008L8.87379 18.0008C8.42948 19.7256 6.86357 21 5 21C3.05513 21 1.43445 19.612 1.07453 17.7725C0.435576 17.439 0 16.7704 0 16V3C0 2.44772 0.447715 2 1 2H8C8.55228 2 9 2.44772 9 3V11C9 11.5128 9.38604 11.9355 9.88338 11.9933L10 12H12C12.5128 12 12.9355 11.614 12.9933 11.1166L13 11V2H10V0H14ZM5 15C3.89543 15 3 15.8954 3 17C3 18.1046 3.89543 19 5 19C6.10457 19 7 18.1046 7 17C7 15.8954 6.10457 15 5 15ZM17 14.999C15.8954 14.999 15 15.8944 15 16.999C15 18.1036 15.8954 18.999 17 18.999C18.1046 18.999 19 18.1036 19 16.999C19 15.8944 18.1046 14.999 17 14.999ZM15.852 7.999H15V11C15 12.6569 13.6569 14 12 14H10C8.69412 14 7.58312 13.1656 7.17102 12.0009L1.99994 12V14.3542C2.73289 13.5238 3.80528 13 5 13C6.86393 13 8.43009 14.2749 8.87405 16.0003H13.1257C13.5693 14.2744 15.1357 12.999 17 12.999C17.2373 12.999 17.4697 13.0197 17.6957 13.0593L15.852 7.999ZM7 7H2V10H7V7ZM18 4H15V6H18V4ZM7 4H2V5H7V4Z"
                                            fill="black" fill-opacity="0.6"></path>
                                    </svg>
                                    <span style="color: black;">Mua online</span>

                                    <a    href="{{ URL::to('product') }}" class="here">Tại đây</a>
                                </div>

                                <div class="option-offline">
                                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 11.242V18H21V20H1V18H2V11.242C1.38437 10.8311 0.879713 10.2745 0.53082 9.62176C0.181927 8.96899 -0.000407734 8.24017 6.84612e-07 7.5C6.84612e-07 6.673 0.224001 5.876 0.633001 5.197L3.345 0.5C3.43277 0.347985 3.559 0.221749 3.71101 0.133981C3.86303 0.0462129 4.03547 4.45922e-06 4.211 0H17.79C17.9655 4.45922e-06 18.138 0.0462129 18.29 0.133981C18.442 0.221749 18.5682 0.347985 18.656 0.5L21.358 5.182C21.9546 6.17287 22.1463 7.35553 21.8934 8.48414C21.6405 9.61275 20.9624 10.6005 20 11.242ZM18 11.972C17.3124 12.0491 16.6163 11.9665 15.9659 11.7307C15.3155 11.4948 14.7283 11.1119 14.25 10.612C13.8302 11.0511 13.3258 11.4005 12.7672 11.6393C12.2086 11.878 11.6075 12.001 11 12.001C10.3927 12.0013 9.7916 11.8786 9.23303 11.6402C8.67445 11.4018 8.16996 11.0527 7.75 10.614C7.27163 11.1138 6.68437 11.4964 6.03395 11.7321C5.38353 11.9678 4.68749 12.0503 4 11.973V18H18V11.973V11.972ZM4.789 2L2.356 6.213C2.11958 6.79714 2.11248 7.44903 2.33613 8.03818C2.55978 8.62733 2.99768 9.11029 3.56218 9.39039C4.12668 9.6705 4.77614 9.72708 5.38058 9.54882C5.98502 9.37055 6.49984 8.9706 6.822 8.429C7.157 7.592 8.342 7.592 8.678 8.429C8.8633 8.89342 9.1836 9.2916 9.59753 9.5721C10.0115 9.85261 10.5 10.0025 11 10.0025C11.5 10.0025 11.9885 9.85261 12.4025 9.5721C12.8164 9.2916 13.1367 8.89342 13.322 8.429C13.657 7.592 14.842 7.592 15.178 8.429C15.3078 8.74845 15.5022 9.0376 15.7491 9.27828C15.996 9.51895 16.2901 9.70595 16.6127 9.82752C16.9354 9.94909 17.2797 10.0026 17.6241 9.98468C17.9684 9.96677 18.3053 9.87782 18.6136 9.72343C18.9219 9.56903 19.1949 9.35253 19.4155 9.08753C19.6361 8.82253 19.7995 8.51477 19.8955 8.18357C19.9914 7.85238 20.0178 7.50493 19.973 7.16305C19.9281 6.82118 19.8131 6.49227 19.635 6.197L17.21 2H4.79H4.789Z"
                                            fill="black" fill-opacity="0.6"></path>
                                    </svg>
                                    <span>Mua tại cửa hàng</span>
                                </div>

                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="image-store">
                            <img src="https://file.hstatic.net/1000075078/file/hcm-hoa-hong2_6adf54c60c3d409e914a2d54ce025dbf.jpg"
                                alt="">
                        </div>
                        <div class="store-infor">
                            <div class="name-store">
                                HCM Hoa Hồng
                            </div>
                            <div class="map-store">
                                <a href="">
                                     <span>Xem ban do</span>
                                </a>
                            </div>
                            <div class="address-store">
                                43 Hoa Hồng, Phường 7, Phú Nhuận, Hồ Chí Minh
                            </div>
                            <div class="time-store">
                                07:00 - 21:30
                            </div>
                            <div class="option-store">
                                <div class="option-online">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14 0C14.5523 0 15 0.447715 15 1V1.999L20 2V8L17.98 7.999L20.7467 15.5953C20.9105 16.032 21 16.5051 21 16.999C21 19.2082 19.2091 20.999 17 20.999C15.1368 20.999 13.5711 19.7251 13.1265 18.0008L8.87379 18.0008C8.42948 19.7256 6.86357 21 5 21C3.05513 21 1.43445 19.612 1.07453 17.7725C0.435576 17.439 0 16.7704 0 16V3C0 2.44772 0.447715 2 1 2H8C8.55228 2 9 2.44772 9 3V11C9 11.5128 9.38604 11.9355 9.88338 11.9933L10 12H12C12.5128 12 12.9355 11.614 12.9933 11.1166L13 11V2H10V0H14ZM5 15C3.89543 15 3 15.8954 3 17C3 18.1046 3.89543 19 5 19C6.10457 19 7 18.1046 7 17C7 15.8954 6.10457 15 5 15ZM17 14.999C15.8954 14.999 15 15.8944 15 16.999C15 18.1036 15.8954 18.999 17 18.999C18.1046 18.999 19 18.1036 19 16.999C19 15.8944 18.1046 14.999 17 14.999ZM15.852 7.999H15V11C15 12.6569 13.6569 14 12 14H10C8.69412 14 7.58312 13.1656 7.17102 12.0009L1.99994 12V14.3542C2.73289 13.5238 3.80528 13 5 13C6.86393 13 8.43009 14.2749 8.87405 16.0003H13.1257C13.5693 14.2744 15.1357 12.999 17 12.999C17.2373 12.999 17.4697 13.0197 17.6957 13.0593L15.852 7.999ZM7 7H2V10H7V7ZM18 4H15V6H18V4ZM7 4H2V5H7V4Z"
                                            fill="black" fill-opacity="0.6"></path>
                                    </svg>
                                    <span style="color: black;">Mua online</span>

                                    <a    href="{{ URL::to('product') }}" class="here">Tại đây</a>
                                </div>

                                <div class="option-offline">
                                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 11.242V18H21V20H1V18H2V11.242C1.38437 10.8311 0.879713 10.2745 0.53082 9.62176C0.181927 8.96899 -0.000407734 8.24017 6.84612e-07 7.5C6.84612e-07 6.673 0.224001 5.876 0.633001 5.197L3.345 0.5C3.43277 0.347985 3.559 0.221749 3.71101 0.133981C3.86303 0.0462129 4.03547 4.45922e-06 4.211 0H17.79C17.9655 4.45922e-06 18.138 0.0462129 18.29 0.133981C18.442 0.221749 18.5682 0.347985 18.656 0.5L21.358 5.182C21.9546 6.17287 22.1463 7.35553 21.8934 8.48414C21.6405 9.61275 20.9624 10.6005 20 11.242ZM18 11.972C17.3124 12.0491 16.6163 11.9665 15.9659 11.7307C15.3155 11.4948 14.7283 11.1119 14.25 10.612C13.8302 11.0511 13.3258 11.4005 12.7672 11.6393C12.2086 11.878 11.6075 12.001 11 12.001C10.3927 12.0013 9.7916 11.8786 9.23303 11.6402C8.67445 11.4018 8.16996 11.0527 7.75 10.614C7.27163 11.1138 6.68437 11.4964 6.03395 11.7321C5.38353 11.9678 4.68749 12.0503 4 11.973V18H18V11.973V11.972ZM4.789 2L2.356 6.213C2.11958 6.79714 2.11248 7.44903 2.33613 8.03818C2.55978 8.62733 2.99768 9.11029 3.56218 9.39039C4.12668 9.6705 4.77614 9.72708 5.38058 9.54882C5.98502 9.37055 6.49984 8.9706 6.822 8.429C7.157 7.592 8.342 7.592 8.678 8.429C8.8633 8.89342 9.1836 9.2916 9.59753 9.5721C10.0115 9.85261 10.5 10.0025 11 10.0025C11.5 10.0025 11.9885 9.85261 12.4025 9.5721C12.8164 9.2916 13.1367 8.89342 13.322 8.429C13.657 7.592 14.842 7.592 15.178 8.429C15.3078 8.74845 15.5022 9.0376 15.7491 9.27828C15.996 9.51895 16.2901 9.70595 16.6127 9.82752C16.9354 9.94909 17.2797 10.0026 17.6241 9.98468C17.9684 9.96677 18.3053 9.87782 18.6136 9.72343C18.9219 9.56903 19.1949 9.35253 19.4155 9.08753C19.6361 8.82253 19.7995 8.51477 19.8955 8.18357C19.9914 7.85238 20.0178 7.50493 19.973 7.16305C19.9281 6.82118 19.8131 6.49227 19.635 6.197L17.21 2H4.79H4.789Z"
                                            fill="black" fill-opacity="0.6"></path>
                                    </svg>
                                    <span>Mua tại cửa hàng</span>
                                </div>

                            </div>
                        </div>

                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>
<link rel="stylesheet" href="{{ asset('user/css/address-store.css') }}">
<script src="{{ asset('user/js/store.js') }}"></script>


@endsection
