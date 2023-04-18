

const commentCick=document.querySelector(".comment_click");
const feedbackClick=document.querySelector(".feedback_click");
const commentShow=document.querySelector(".comment_show");
const feedbackShow=document.querySelector(".feedback_show");
const heartItem = document.querySelectorAll(".box-heart");

[...heartItem].forEach((item) => item.addEventListener("click", function (e) {
   e.preventDefault();
//    console.log(e.target);
//    e.target.setAttribute("id", "active-heart")
   e.target.setAttribute("style", "background-color:#be9c79; color:#fff")

}));


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


