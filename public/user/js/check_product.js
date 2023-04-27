const modalContentAddress = document.querySelector(".modal-content-address");
const addressClose2 = document.querySelector("#close2");
const checkOutAddressSetting = document.querySelector(".checkout-address-setting");
const checkOutAddressSettinga = document.querySelector(".checkout-address-setting a");
const checkoutAddressText = document.querySelector(".checkout-address-text p");
const modalContentTimes = document.querySelector(".modal-content-times");
const timeClose3 = document.querySelector("#close3");

const checkOutAddressSetting1 = document.querySelector(".checkout-address-setting1");
const checkOutAddressSetting1a = document.querySelector(".checkout-address-setting1 a");

const btnAddress=document.querySelector(".btn-address");
const modalBodyTimesInput = document.querySelector("#form-group-day");
const modalBodyTimes = document.querySelector("#form-group-times");
const checkoutAddressText1 = document.querySelector(" .checkout-time .checkout-address-text h5 span");
const checkoutAddressTextTimes = document.querySelector(" .checkout-time .checkout-address-text p span");

const district_Btn = document.querySelectorAll("#shipping_district option")
const district_Btn_val = document.querySelector("#shipping_district")
const districthidden=document.querySelector("#district_hidden");


const province_Btn = document.querySelectorAll("#shipping_province option ")
const province_Btn_val = document.querySelector("#shipping_province")

const wards_Btn = document.querySelector("#shipping_wards");
const wardshidden=document.querySelector("#wards_hidden");

const shippingaddress=document.querySelector("#shipping_address");

const bgopacity =document.querySelector(".bg-opacity");

const buttonTimes=document.querySelector(" .btn-times");
const errorAddress=document.querySelector("#error_address");
const errorDay=document.querySelector("#error_day");
const shippingaddressmain =document.querySelector("#shipping_address_main");

btnAddress.addEventListener("click", function(e){
    let province="";
    [...province_Btn].forEach((item) => {
        if(item.getAttribute("value")==province_Btn_val.value){
            province= (item.getAttribute("data-namecity"))
        }
        });

    if(province=="" | shippingaddress.value== "" | wardshidden.value=="" | districthidden.value==""){
        alert("Error");
    }else{
        modalContentAddress.classList.add("active-address")
        bgopacity.removeAttribute ("style","position: fixed;top: 0;background-color:rgba(30,41,51,.45);height: 100%;width: 100%;z-index:1004 ;padding: 0 1rem ");
        checkoutAddressText.textContent = `${shippingaddress.value},${wardshidden.value},${districthidden.value},${province} `
     shippingaddressmain.setAttribute("value",`${shippingaddress.value},${wardshidden.value},${districthidden.value},${province}` );
        checkOutAddressSettinga.textContent=`Change`
    }

    })


modalBodyTimes.addEventListener("click", function(e){
   checkoutAddressTextTimes.textContent = `${modalBodyTimes.value}`

})

buttonTimes.addEventListener("click", function(e){




   if(modalBodyTimes.value=="" | modalBodyTimesInput.value==""){
    alert("Error");
}else{
    checkoutAddressTextTimes.textContent = `${modalBodyTimes.value}`
    checkoutAddressText1.textContent = `${modalBodyTimesInput.value}`


    modalContentTimes.classList.add("active-times")
    bgopacity.removeAttribute ("style","position: fixed;top: 0;background-color:rgba(30,41,51,.45);height: 100%;width: 100%;z-index:1004 ;padding: 0 1rem ");
    checkOutAddressSetting1a.textContent=`Change`
}
})



checkOutAddressSetting.addEventListener("click", function (e) {
   e.preventDefault();
   modalContentAddress.classList.remove("active-address")
   bgopacity.setAttribute("style","position: fixed;top: 0;background-color:rgba(30,41,51,.45);height: 100%;width: 100%;z-index:1004 ;padding: 0 1rem ");
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
   modalContentTimes.classList.remove("active-times")
   bgopacity.setAttribute ("style","position: fixed;top: 0;background-color:rgba(30,41,51,.45);height: 100%;width: 100%;z-index:1004 ;padding: 0 1rem ");
})

timeClose3.addEventListener("click", function (e) {
   modalContentTimes.classList.add("active-times")

   bgopacity.removeAttribute ("style","position: fixed;top: 0;background-color:rgba(30,41,51,.45);height: 100%;width: 100%;z-index:1004 ;padding: 0 1rem ");
})

addressClose2.addEventListener("click", function (e) {
   modalContentAddress.classList.add("active-address")

   bgopacity.removeAttribute ("style","position: fixed;top: 0;background-color:rgba(30,41,51,.45);height: 100%;width: 100%;z-index:1004 ;padding: 0 1rem ");

})


// lỗi






