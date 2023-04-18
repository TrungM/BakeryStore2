<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('user/css/nav.css') }}">

    <link rel="stylesheet" href="{{ asset('user/css/shopping-cart.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    @include('user.layout.nav')

    @yield('content')

    @include('user.layout.footer')

    <!-- custom js file link  -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
<script>
    $(document).ready(function() {

        $(".cart_quantity_class").click(function(e) {


            var rowId_cart = $(this).next().val();
            var _token = $('input[name="_token"]').val();
            var cart_quantity = $(this).val();
            var product_id = $(this).next().next().val();
            var size_id = $(this).next().next().next().val();

            $.ajax({
                url: '{{ url('update_quantity_user') }}',
                method: "POST",
                data: {
                    rowId_cart: rowId_cart,
                    cart_quantity:cart_quantity,
                    _token: _token,
                    product_id:product_id,
                    size_id:size_id,

                },
                success: function(data) {
                    // location.reload();
                    $(".total-cart-span").html(data.total);


                }
            });
        });








        let id_array = [];

        function load_feedback() {
            var product_id = $(".feedback_product_id").val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('load_feedback') }}',
                method: "post",
                data: {
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
                    $(".feedback_show").html(data);
                }
            });
        };
        load_feedback();

        $(".heart").click(function(e) {

            var id = $(this).attr("id");
            add_wishlist(id);
        })






        function add_wishlist(clicked_id) {
            var id = clicked_id;
            // const name = document.getElementById('wishlist_productname' + id).value;
            // const price = document.getElementById('wishlist_productprice' + id).value;
            // const image = document.getElementById('wishlist_productimage' + id).src;
            // const url = document.getElementById('wishlist_producturl' + id).href;
            var name = $("#wishlist_productname" + id).val();
            var price = $("#wishlist_productprice" + id).val();
            var star = $("#wishlist_productstar" + id).val();
            var image = $("#wishlist_productimage" + id).attr("src");
            var url = $("#wishlist_producturl" + id).attr("href");

            // alert(id);
            // alert(name);
            // alert(price);
            // alert(image);
            // alert(url);

            newItem = {
                id: id,
                star: star,
                name: name,
                price: price,
                image: image,
                url: url
            }

            if (localStorage.getItem('data') == null) {
                // tao rong truoc
                (localStorage.setItem('data', '[ ]'));
            }

            var old_data = JSON.parse(localStorage.getItem('data'));
            // data dc day  vao newItem
            // convert giá trị sang dưới dạng JSON string

            // kiem tra san trung
            //grep giong fillter trong js

            var matches = $.grep(old_data, function(obj) {
                return obj.id === id;
            });
            if (matches.length) {
                alert("Product has existed");
            } else {
                old_data.push(newItem);
            }
            localStorage.setItem('data', JSON.stringify(old_data));
        }



        if (localStorage.getItem('data') != null) {
            // co du lieu khong rong
            var data = JSON.parse(localStorage.getItem('data'));
            // dao nguoc len trang dau
            for (var i = 0; i < data.length; i++) {
                var id = data[i].id;
                id_array.push(id);

                if (id_array.includes(id) == true) {
                    id_array.forEach(i => {
                        $('#' + i).css("background-color", "#be9c79").css("color", "#fff");
                    });
                }
            }
            // console.log(id_array);



        }



        if (localStorage.getItem('data') != null) {
            // co du lieu khong rong
            var data = JSON.parse(localStorage.getItem('data'));
            // dao nguoc len trang dau

            data.reverse();
            for (var i = 0; i < data.length; i++) {
                var name = data[i].name;
                var id = data[i].id;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;
                var star = data[i].star;


                $("#box-container").append(
                    '<div class="box"><a  id=' + id +
                    '    class="fas fa-times deleteItemF"  style="font-size: 3rem;"></a> <span title=' + i +
                    ' ></span><a href="' + url + '" class="fas fa-eye"></a>   <img src="' + image +
                    '"alt=""> <h3>' + name +
                    '</h3> <div class="stars ">' + load_star_f(star) + '</div> <span>' + price +
                    '</span> </div>')
            }



        }


        function load_star_f(star) {

            if (star == 1) {
                return ' <i class="fas fa-star" style="color:#be9c79"></i>';
            } else if (star == 2) {
                return ' <i class="fas fa-star" style="color:#be9c79"></i><i class="fas fa-star" style="color:#be9c79"></i>';
            } else if (star == 3) {
                return ' <i class="fas fa-star" style="color:#be9c79"></i> <i class="fas fa-star" style="color:#be9c79"></i> <i class="fas fa-star" style="color:#be9c79"></i>';
            } else if (star == 4) {
                return ' <i class="fas fa-star" style="color:#be9c79"></i> <i class="fas fa-star" style="color:#be9c79"></i> <i class="fas fa-star" style="color:#be9c79"></i> <i class="fas fa-star" style="color:#be9c79"></i>';

            } else if (star == 5) {
                return ' <i class="fas fa-star" style="color:#be9c79"></i><i class="fas fa-star" style="color:#be9c79"></i><i class="fas fa-star" style="color:#be9c79"></i><i class="fas fa-star" style="color:#be9c79"></i><i class="fas fa-star" style="color:#be9c79"></i>';

            } else {
                return ' <p style="font-size:1.5rem ; color:#be9c79">Unassessed </p>';
            }



        }



        $(".deleteItemF").click(function(e) {
            var id = $(this).next().attr("title");
            // alert(id);
            deleteItem(id)
        })

        function deleteItem(index) {

            if (localStorage.getItem('data') != null) {
                var old_data = JSON.parse(localStorage.getItem('data'));
                old_data.reverse();
                old_data.splice(index, 1);
                old_data.reverse();
                location.reload();
                localStorage.setItem('data', JSON.stringify(old_data));

            }

        }







    })
</script>

</html>
