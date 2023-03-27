const menu = document.querySelector('#menu-btn');
const navbar = document.querySelector('.header .flex .navbar');
const search = document.querySelector("#search-icon");
const searchForm = document.querySelector("#search-form")
const searchClose = document.querySelector("#close");
const shoppingCart = document.querySelector(".fa-shopping-cart");
const shoppingCartContainer = document.querySelector(".shopping-cart-container");
const heart = document.querySelector(".heart");
const linkHeart = document.querySelectorAll("#content .dishes .box-container .box .box-heart a");
const boxHeart = document.querySelectorAll(".box-heart");
const user = document.querySelector(".fa-user");
const hoverLog = document.querySelector(".option-customer");
// const btnCheckout2 = document.querySelector(".btn-checkout2");
[...boxHeart].forEach((item) => item.addEventListener("click", function (e) {
    e.preventDefault();
    console.log(e.target);
    e.target.setAttribute("id", "active-heart")

}))
menu.addEventListener("click", function () {
    navbar.classList.toggle("active");
    menu.classList.toggle('fa-times');

})
document.addEventListener("click", function (event) {
    if (!menu.contains(event.target) && !event.target.matches(".navbar")) {
        navbar.classList.remove('active');
        menu.classList.remove("fa-times");
        menu.classList.add("fa-bars");
    }


})
window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

search.addEventListener("click", function () {
    searchForm.classList.toggle("active");
    search.classList.toggle('fa-times');
})
searchClose.addEventListener("click", function () {
    searchForm.classList.remove("active");
    search.classList.toggle('fa-times');

})
shoppingCart.addEventListener("click", function () {
    shoppingCartContainer.classList.toggle("active-shopping-cart");
})
user.addEventListener("click", function (e) {
    hoverLog.classList.toggle("active-hover");


})


// btnCheckout2.addEventListener("click", function (e) {
//     e.preventDefault();
//     const swalWithBootstrapButtons = Swal.mixin({
//         customClass: {
//             confirmButton: ' btn-success',
//             cancelButton: 'btn-cancel'
//         },
//         buttonsStyling: true

//     })

//     swalWithBootstrapButtons.fire({
//         title: 'Bạn vui lòng đăng nhập ',
//         text: "Để thực hiện việc thanh toán !!!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Đăng nhập ',
//         cancelButtonText: 'Thoát',
//         reverseButtons: true
//     }).then((result) => {

//         if (result.isConfirmed) {
//         } else if (
//             result.dismiss === Swal.DismissReason.cancel
//         ) {
//             swalWithBootstrapButtons.fire(
//                 'Thoát',
//                 'Bạn không thể thanh toán :)',
//                 'error'

//             )
//         }
//     })

// })
