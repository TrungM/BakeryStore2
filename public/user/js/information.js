const menu = document.querySelector('#menu-btn');
const navbar = document.querySelector('.header .flex .navbar');
const search=document.querySelector("#search-icon");
const searchForm=document.querySelector("#search-form")
const searchClose=document.querySelector("#close");
const shoppingCart=document.querySelector(".fa-shopping-cart");
const shoppingCartContainer=document.querySelector(".shopping-cart-container");
const userInformationListLi=document.querySelectorAll(".user-information-list li")
const userInformationForm =document.querySelector(".user-information-form");
const userInformationItem1 =document.querySelector(".user-information-item1");
const order=document.querySelector(".order");
const userInformationItem3 =document.querySelector(".user-information-item3");
const  userInformationItem4 =document.querySelector(".user-information-item4");
const historyOrder=document.querySelector(".history-order");
userInformationItem4.addEventListener("click", function(e){
   historyOrder.setAttribute("style","transform:all 0.6s")
   historyOrder .classList.remove("active-user-information")
   userInformationForm .classList.add("active-user-information")
   order.classList.add("active-user-information")
   userInformationItem4.classList.add("color-li-sidebar");
   userInformationItem3.classList.remove("color-li-sidebar");
   userInformationItem1.classList.remove("color-li-sidebar");


})
userInformationItem3.addEventListener("click", function(e){
   order.setAttribute("style","transform:all 0.6s")
   order .classList.remove("active-user-information")
   userInformationForm .classList.add("active-user-information")
   historyOrder  .classList.add("active-user-information");
   userInformationItem3.classList.add("color-li-sidebar");
   userInformationItem4.classList.remove("color-li-sidebar");
   userInformationItem1.classList.remove("color-li-sidebar");


})
userInformationItem1.addEventListener("click", function(e){
   userInformationForm.classList.remove("active-user-information")
   order.classList.add("active-user-information")
   historyOrder .classList.add("active-user-information")
   userInformationItem3.classList.remove("color-li-sidebar");
   userInformationItem4.classList.remove("color-li-sidebar");
   userInformationItem1.classList.add("color-li-sidebar");
})
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