
const userInformationListLi = document.querySelectorAll(".user-information-list li")
const userInformationForm = document.querySelector(".user-information-form");
const userInformationItem1 = document.querySelector(".user-information-item1");
const order = document.querySelector(".order");
const userInformationItem3 = document.querySelector(".user-information-item3");
const userInformationItem3Text = document.querySelector(".user-information-item3 span");

const userInformationItem4 = document.querySelector(".user-information-item4");
const historyOrder = document.querySelector(".history-order");
const userHeader = document.querySelector("#header span");
const userItem = document.querySelectorAll(".user-item-txt");
const paginate=document.querySelector(".paginate");
// const paginateItem=document.querySelector(".page-item");

// [...paginateItem].forEach((item)=>item.addEventListener("click", function(e){

//     e.preventDefault();

// }))
userInformationItem4.addEventListener("click", function (e) {
    e.preventDefault();
    historyOrder.setAttribute("style", "transform:all 0.6s")
    historyOrder.classList.remove("active-user-information")
    userInformationForm.classList.add("active-user-information")
    order.classList.add("active-user-information")
    userInformationItem4.classList.add("color-li-sidebar");
    userInformationItem3.classList.remove("color-li-sidebar");
    userInformationItem1.classList.remove("color-li-sidebar");
    paginate.classList.add("order-active");

    userHeader.textContent = `Lịch sử mua
    hàng`;

})
userInformationItem3.addEventListener("click", function (e) {
    e.preventDefault();
    order.setAttribute("style", "transform:all 0.6s")
    order.classList.remove("active-user-information")
    userInformationForm.classList.add("active-user-information")
    historyOrder.classList.add("active-user-information");
    userInformationItem3.classList.add("color-li-sidebar");
    userInformationItem4.classList.remove("color-li-sidebar");
    userInformationItem1.classList.remove("color-li-sidebar");
    paginate.classList.remove("order-active");
    userHeader.textContent = `Tình trạng đơn hàng`;
})
userInformationItem1.addEventListener("click", function (e) {
    e.preventDefault();
    userInformationForm.classList.remove("active-user-information")
    order.classList.add("active-user-information")
    historyOrder.classList.add("active-user-information")
    userInformationItem3.classList.remove("color-li-sidebar");
    userInformationItem4.classList.remove("color-li-sidebar");
    userInformationItem1.classList.add("color-li-sidebar");
    userHeader.textContent = `Thông
   tin tài
   khoản`;
   paginate.classList.add("order-active");

})



