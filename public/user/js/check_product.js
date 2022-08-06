const modalContentAddress = document.querySelector(".modal-content-address");
const addressClose2 = document.querySelector("#close2");
const checkOutAddressSetting = document.querySelector(".checkout-address-setting");
const checkoutAddressText = document.querySelector(".checkout-address-text p");
const formGroupAddress = document.querySelector(".form-group-address");
const modalContentTimes = document.querySelector(".modal-content-times");
const addressClose3 = document.querySelector("#close3");
const checkOutAddressSetting1 = document.querySelector(".checkout-address-setting1");
const modalBodyAddressInput = document.querySelector(".modal-body-address input");
const btnAddress=document.querySelector(".btn-address");
const modalBodyTimesInput = document.querySelector(".modal-body-times input");
const modalBodyTimes = document.querySelector(".modal-body-times select");
const checkoutAddressText1 = document.querySelector(" .checkout-time .checkout-address-text h5 span");
const checkoutAddressTextTimes = document.querySelector(" .checkout-time .checkout-address-text p span");
const buttonTimes=document.querySelector(" .btn-times");
const errorAddress=document.querySelector("#error_address");
const errorDay=document.querySelector("#error_day");
modalBodyTimesInput.addEventListener("click", function(e){
console.log(modalBodyTimesInput.value);


      checkoutAddressText1.textContent = `${modalBodyTimesInput.value}`


})
modalBodyTimes.addEventListener("click", function(e){
   checkoutAddressTextTimes.textContent = `${modalBodyTimes.value}`

})

buttonTimes.addEventListener("click", function(e){

    if(modalBodyTimesInput.value != ""){
        errorDay.setAttribute("style","display:none")

    }
   modalContentTimes.classList.remove("active-times")
   checkoutAddressTextTimes.textContent = `${modalBodyTimes.value}`
   checkoutAddressText1.textContent = `${modalBodyTimesInput.value}`




})
btnAddress.addEventListener("click", function(e){
    if(modalBodyAddressInput.value != ""){
        errorAddress.setAttribute("style","display:none")
    }
   modalContentAddress.classList.remove("active-address")
   checkoutAddressText.textContent = `${modalBodyAddressInput.value}`

})
formGroupAddress.addEventListener("click", function (e) {
console.log(modalBodyAddressInput.value);
   checkoutAddressText.textContent = `${modalBodyAddressInput.value}`

})

checkOutAddressSetting.addEventListener("click", function (e) {
   e.preventDefault();
   modalContentAddress.classList.add("active-address")

   // arraykey=arrayNull=[];
   // checkoutAddressText.textContent=`${""}`;



})
// de lam vd
// let arraykey = [""];
// formGroupAddress.addEventListener("keypress", function (e) {

//    arraykey.push(e.key);

// console.log(arraykey);
//    console.log(arraykey.slice(0, -1).join("").toString());
//    if (e.key === "Enter") {
//       modalContentAddress.classList.remove("active-address")
//    }

//    checkoutAddressText.textContent = `${arraykey.slice(0, -1).join("").toString()}`

// });


checkOutAddressSetting1.addEventListener("click", function (e) {
   e.preventDefault();
   modalContentTimes.classList.add("active-times")
   console.log(e.target);
})
addressClose3.addEventListener("click", function (e) {
   modalContentTimes.classList.remove("active-times")


})

addressClose2.addEventListener("click", function (e) {
   modalContentAddress.classList.remove("active-address")


})
// menu.addEventListener("click", function () {
//    navbar.classList.toggle("active");
//    menu.classList.toggle('fa-times');

// })
// document.addEventListener("click", function (event) {
//    if (!menu.contains(event.target) && !event.target.matches(".navbar")) {
//       navbar.classList.remove('active');
//       menu.classList.remove("fa-times");
//       menu.classList.add("fa-bars");
//    }


// })
// window.onscroll = () => {
//    menu.classList.remove('fa-times');
//    navbar.classList.remove('active');
// }

// search.addEventListener("click", function () {
//    searchForm.classList.toggle("active");
//    search.classList.toggle('fa-times');
// })
// searchClose.addEventListener("click", function () {
//    searchForm.classList.remove("active");
//    search.classList.toggle('fa-times');


// })
// shoppingCart.addEventListener("click", function () {
//    shoppingCartContainer.classList.toggle("active-shopping-cart");
// })
