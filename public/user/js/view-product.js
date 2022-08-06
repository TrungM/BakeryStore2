
// const heart = document.querySelector(".heart");
// const linkHeart = document.querySelectorAll("#next-products .dishes .box-container .box .box-heart a");
// const boxHeart = document.querySelectorAll(".box-heart");
const commentCick=document.querySelector(".comment_click");
const feedbackClick=document.querySelector(".feedback_click");
const commentShow=document.querySelector(".comment_show");
const feedbackShow=document.querySelector(".feedback_show");
// [...boxHeart].forEach((item) => item.addEventListener("click", function (e) {
//    e.preventDefault();
//    console.log(e.target);
//    e.target.setAttribute("id", "active-heart")

// }))



commentCick.addEventListener("click", function(){
    commentCick.classList.add("active-click");
    feedbackClick.classList.remove("active-click");
    commentShow.classList.remove("show_active");
    feedbackShow.classList.add("show_active");

})
feedbackClick.addEventListener("click", function(){
    feedbackClick.classList.add("active-click");
    commentCick.classList.remove("active-click");
    feedbackShow.classList.remove("show_active");
    commentShow.classList.add("show_active");

})
