const menu = document.querySelector('#menu-btn');
const navbar = document.querySelector('.header .flex .navbar');
const search=document.querySelector("#search-icon");
const searchForm=document.querySelector("#search-form")
const searchClose=document.querySelector("#close");
const shoppingCart=document.querySelector(".fa-shopping-cart");
const shoppingCartContainer=document.querySelector(".shopping-cart-container");

var swiper = new Swiper(".home-slider", {
    cssMode: true,
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
    },
    mousewheel: true,
    keyboard: true,
    loop: true,
});
menu.addEventListener("click", function(){
   navbar.classList.toggle("active");
   menu.classList.toggle('fa-times');

})
document.addEventListener("click", function(event){
       if(!menu.contains(event.target) && !event.target.matches(".navbar")){
         navbar.classList.remove('active');
         menu.classList.remove("fa-times");
         menu.classList.add("fa-bars");
       }


   })
window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
}

search.addEventListener("click", function(){
   searchForm.classList.toggle("active");
   search.classList.toggle('fa-times');
})
searchClose.addEventListener("click", function(){
   searchForm.classList.remove("active");
   search.classList.toggle('fa-times');

})
shoppingCart.addEventListener("click", function(){
   shoppingCartContainer.classList.toggle("active-shopping-cart");
})
