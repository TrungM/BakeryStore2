const arrangDiv=document.querySelector(".arrange-div");
const arrangDivText=document.querySelector(".arrange-div p");
const angleDownArrange=document.querySelector(".fa-angle-down");
const arrangeItems=document.querySelector(".arrange-items");
const value1=document.querySelector(".value1 input");
const value2=document.querySelector(".value2 input");
const value3=document.querySelector(".value3 input");
const heartItem = document.querySelectorAll(".box-heart");

[...heartItem].forEach((item) => item.addEventListener("click", function (e) {
   e.preventDefault();
//    console.log(e.target);
//    e.target.setAttribute("id", "active-heart")
   e.target.setAttribute("style", "background-color:#be9c79; color:#fff")

}))


angleDownArrange.addEventListener("click", function(e){

    arrangeItems.classList.toggle("arrange-items-active");
 })

 arrangDivText.addEventListener("click", function(e){
    arrangeItems.classList.toggle("arrange-items-active");
 })
//  value1.addEventListener("click", function(e){
//     e.preventDefault();
//     console.log(value1.value);
//     arrangDivText.textContent=`${value1.value}`;
//     arrangeItems.classList.add("arrange-items-active");
//  })
//  value2.addEventListener("click", function(e){
//     e.preventDefault();
//     console.log(value2.value);
//     arrangDivText.textContent=`${value2.value}`;
//     arrangeItems.classList.add("arrange-items-active");
//  })
//  value3.addEventListener("click", function(e){
//     e.preventDefault();
//     arrangeItems.classList.add("arrange-items-active");
//     arrangDivText.textContent=`${value3.value}`;
//  })



