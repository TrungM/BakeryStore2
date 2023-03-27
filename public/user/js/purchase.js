window.addEventListener("load", function () {
    const angledown = document.querySelectorAll(".angle-js-down");
    const angleup = document.querySelectorAll(".angle-js-up");

    const shiping = document.querySelectorAll(".order-detail-items-content-shipping");
    const product = document.querySelectorAll(".order-detail-items-content-product ");
    // const  angledown=document.querySelectorAll(".fa-angle-down ");
    // const  angleup=document.querySelectorAll(".fa-angle-up");

    [...angledown].forEach((a) => a.addEventListener("click", function (e) {
        a.setAttribute("style", "display:none;");

        [...shiping].forEach((item) => {
            if (a.dataset.items == item.dataset.itemshipping)
                item.setAttribute("style", "display:block;");


        });

        [...product].forEach((item) => {
            if (a.dataset.items == item.dataset.itemproduct)
                item.setAttribute("style", "display:block;");
        });
        [...angleup].forEach((item) => {
            if (a.dataset.items == item.dataset.itemsup)
                item.setAttribute("style", "");
        });
    }));


    [...angleup].forEach((a) => a.addEventListener("click", function (e) {
        // alert(item.dataset.itemsup)
        a.setAttribute("style", "display:none;");

        [...shiping].forEach((item) => {
            if (a.dataset.itemsup == item.dataset.itemshipping)
                item.setAttribute("style", "display:none;");


        });

        [...product].forEach((item) => {
            if (a.dataset.itemsup == item.dataset.itemproduct)
                item.setAttribute("style", "display:none;");
        });
        [...angledown].forEach((item) => {
            if (a.dataset.itemsup == item.dataset.items)
                item.setAttribute("style", "");
        });
    }))
})
