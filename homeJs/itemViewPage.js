$("#add-to-bag-item-view-page").click((e) => {
    let value = e.target.value;
    $.ajax({
        type: 'POST',
        data: { "id": value },
        url: 'backend/cartManage.php',
        success: function (data) {
            let item_count = parseInt(document.getElementById("item-count").innerHTML);
            item_count += 1;
            document.getElementById("item-count").innerHTML = item_count;
            $("#add-to-bag-item-view-page").css("display", "none");
            $("#item-view-page-qty").html(1);
            $("#quantity-item-view-page").css("display", "inline-block");
        },
        error: function (data) {
            console.log('Something went wrong.');
        }
    });

});

document.getElementById("go-to-bag-page").addEventListener("click", () => {
    window.location.assign('BagCheckout.php');
});

$("#item-view-page-plus").click((e) => {
    let value = e.target.value;
    $.ajax({
        type: 'POST',
        data: { "plusid": value },
        url: 'backend/plus.php',
        success: function (data) {
            let curr_qty = parseInt(e.target.previousElementSibling.innerHTML);
            curr_qty += 1;
            e.target.previousElementSibling.innerHTML = curr_qty;
        },
        error: function (data) {
            console.log('Something went wrong.');
        }
    });
});

$("#item-view-page-minus").click((e) => {
    let value = e.target.value;
    $.ajax({
        type: 'POST',
        data: { "minusid": value },
        url: 'backend/minus.php',
        success: function (data) {
            if (data == "remove") {
                let curr_qty = parseInt(e.target.nextElementSibling.innerHTML);
                curr_qty -= 1;
                e.target.nextElementSibling.innerHTML = curr_qty;
                let item_count = parseInt(document.getElementById("item-count").innerHTML);
                item_count -= 1;
                document.getElementById("item-count").innerHTML = item_count;
                $("#quantity-item-view-page").css("display", "none");
                $("#add-to-bag-item-view-page").css("display", "inline-block");
            }
            else {
                let curr_qty = parseInt(e.target.nextElementSibling.innerHTML);
                curr_qty -= 1;
                e.target.nextElementSibling.innerHTML = curr_qty;
            }
        },
        error: function (data) {
            console.log('Something went wrong.');
        }
    });
});

document.querySelectorAll(".qty-amount").forEach((e) => {
    if (e.innerHTML > 0) {
        e.parentElement.style.display = "flex";
        e.parentElement.previousElementSibling.style.display = "none";
        e.parentElement.parentElement.parentElement.style.backgroundColor = "#f9eddd";
        e.parentElement.parentElement.parentElement.children[2].style.backgroundColor = "#f9eddd";
    }
});

document.querySelectorAll(".add-to-bag").forEach((e) => {
    e.addEventListener("click", () => {
        let value = e.value;
        // console.log(e);
        $.ajax({
            type: 'POST',
            data: { "id": value },
            url: 'backend/cartManage.php',
            success: function (data) {
                let item_count = parseInt(document.getElementById("item-count").innerHTML);
                item_count += 1;
                document.getElementById("item-count").innerHTML = item_count;
                e.parentElement.parentElement.style.backgroundColor = "#f9eddd";
                e.parentElement.parentElement.children[2].style.backgroundColor = "#f9eddd";
            },
            error: function (data) {
                console.log('Something went wrong.');
            }
        });
        e.style.display = "none";
        // console.log(e.nextElementSibling);
        e.nextElementSibling.style.display = "flex";
        e.nextElementSibling.childNodes[1].innerHTML = "1";
    });
});

document.querySelectorAll(".plus").forEach((e) => {
    e.addEventListener("click", () => {
        let value = e.value;
        // console.log(value);
        $.ajax({
            type: 'POST',
            data: { "plusid": value },
            url: 'backend/plus.php',
            success: function (data) {
                let curr_qty = parseInt(e.previousElementSibling.innerHTML);
                curr_qty += 1;
                e.previousElementSibling.innerHTML = curr_qty;
            },
            error: function (data) {
                console.log('Something went wrong.');
            }
        });
    });
});
document.querySelectorAll(".minus").forEach((e) => {
    e.addEventListener("click", () => {
        let value = e.value;
        // console.log(value);
        $.ajax({
            type: 'POST',
            data: { "minusid": value },
            url: 'backend/minus.php',
            success: function (data) {
                if (data == "remove") {
                    let curr_qty = parseInt(e.nextElementSibling.innerHTML);
                    curr_qty -= 1;
                    e.nextElementSibling.innerHTML = curr_qty;
                    let item_count = parseInt(document.getElementById("item-count").innerHTML);
                    item_count -= 1;
                    document.getElementById("item-count").innerHTML = item_count;
                    e.parentElement.style.display = "none";
                    e.parentElement.previousElementSibling.style.display = "block";
                    e.parentElement.parentElement.parentElement.style.backgroundColor = "white";
                    e.parentElement.parentElement.parentElement.children[2].style.backgroundColor = "white";
                }
                else {
                    let curr_qty = parseInt(e.nextElementSibling.innerHTML);
                    curr_qty -= 1;
                    e.nextElementSibling.innerHTML = curr_qty;


                }
            },
            error: function (data) {
                console.log('Something went wrong.');
            }
        });
    });
});

$("#my-bag").mouseenter(() => {
    $("#my-bag-hover-view").css("display", "block");
    $.ajax({
        type: 'POST',
        data: "",
        url: 'backend/send_cart_hover_data.php',
        success: function (data) {
            $("#bag-item-viewer-box").html(data);
            subTotal();
            if (document.getElementById("bag-item-viewer-box").childElementCount > 0) {
                document.getElementById("bag-item-viewer-box").style.display = "flex";
            } else {
                document.getElementById("bag-item-viewer-box").style.display = "none";
            }
        },
        error: function (data) {
            console.log('Something went wrong.');
        }
    });

});
$("#my-bag").mouseleave(() => {
    $("#my-bag-hover-view").css("display", "none");

});
$("#my-bag-hover-view").mouseenter(() => {
    $("#my-bag-hover-view").css("display", "block");
    document.querySelectorAll(".bag-hover-plus").forEach((e) => {
        e.addEventListener("click", () => {
            let value = e.value;
            $.ajax({
                type: 'POST',
                data: { "plusid": value },
                url: 'backend/plus.php',
                success: function () {
                    change_price_with_qty_increase(e);
                    change_savings_with_qty_increase(e);
                    let curr_qty = parseInt(e.previousElementSibling.innerHTML);
                    curr_qty += 1;
                    e.previousElementSibling.innerHTML = curr_qty;
                    subTotal();

                    let item_page_qty = parseInt(document.getElementById("item-view-page-qty").innerHTML);
                    item_page_qty += 1;
                    document.getElementById("item-view-page-qty").innerHTML = item_page_qty;

                    let target = document.getElementById(value).children[3].children[1].children[1];
                    let home_page_qty = parseInt(target.innerHTML);
                    home_page_qty += 1;
                    target.innerHTML = home_page_qty;
                },
                error: function (data) {
                    console.log('Something went wrong.');
                }
            });
        });
    });

    document.querySelectorAll(".bag-hover-minus").forEach((e) => {
        e.addEventListener("click", () => {
            let value = e.value;
            $.ajax({
                type: 'POST',
                data: { "minusid": value },
                url: 'backend/minus.php',
                success: function (data) {
                    if (data == "remove") {
                        remove_item(e);
                        $("#quantity-item-view-page").css("display", "none");
                        $("#add-to-bag-item-view-page").css("display", "inline-block");

                        let target = document.getElementById(value).children[3];
                        target.children[1].style.display = "none";
                        target.children[0].style.display = "inline-block";
                        document.getElementById(value).style.backgroundColor = "white";
                        document.getElementById(value).children[2].style.backgroundColor = "white";

                    }
                    else {
                        change_price_with_qty_decrease(e);
                        change_savings_with_qty_decrease(e);
                        let curr_qty = parseInt(e.nextElementSibling.innerHTML);
                        curr_qty -= 1;
                        e.nextElementSibling.innerHTML = curr_qty;
                        subTotal();

                        let item_page_qty = parseInt(document.getElementById("item-view-page-qty").innerHTML);
                        item_page_qty -= 1;
                        document.getElementById("item-view-page-qty").innerHTML = item_page_qty;
                    }

                    let target = document.getElementById(value).children[3].children[1].children[1];
                    let home_page_qty = parseInt(target.innerHTML);
                    home_page_qty -= 1;
                    target.innerHTML = home_page_qty;
                },
                error: function (data) {
                    console.log('Something went wrong.');
                }
            });
        });
    });


    document.querySelectorAll(".bag-hover-remove-btn").forEach((e) => {
        e.addEventListener("click", () => {
            let value = e.value;
            $.ajax({
                type: 'POST',
                data: { "minusid": value },
                url: 'backend/removeFromBag.php',
                success: function (data) {
                    if (data == "removed") {
                        remove_item_through_btn(e);
                        $("#quantity-item-view-page").css("display", "none");
                        $("#add-to-bag-item-view-page").css("display", "inline-block");
                        let target = document.getElementById(value).children[3];
                        target.children[1].style.display = "none";
                        target.children[0].style.display = "inline-block";
                        document.getElementById(value).style.backgroundColor = "white";
                        document.getElementById(value).children[2].style.backgroundColor = "white";
                    }
                },
                error: function (data) {
                    console.log('Something went wrong.');
                }
            });
        });
    });

});
$("#my-bag-hover-view").mouseleave(() => {
    $("#my-bag-hover-view").css("display", "none");

});

subTotal = () => {
    var sub_total = 0;
    document.querySelectorAll(".bag-hover-item-price").forEach((e) => {
        // console.log(e.innerHTML);
        sub_total += parseInt(e.innerHTML);
    });
    document.getElementById("sub-total").innerHTML = sub_total;
};
if (document.getElementById("item-view-page-qty").innerHTML > 0) {
    document.getElementById("add-to-bag-item-view-page").style.display = "none";
} else {
    document.getElementById("quantity-item-view-page").style.display = "none";
}

change_price_with_qty_increase = (e) => {
    const display_price = e.parentElement.nextElementSibling.childNodes[0].childNodes[1];
    let price = display_price.innerHTML;
    let quantity = e.previousElementSibling.innerHTML;
    let price_per_unit = price / quantity;
    let new_price = parseInt(price) + parseInt(price_per_unit);
    display_price.innerHTML = new_price;
};

change_savings_with_qty_increase = (e) => {
    let display_price = e.parentElement.nextElementSibling.childNodes[1].childNodes[1];
    // console.log(display_price);
    let price = display_price.innerHTML;
    let quantity = e.previousElementSibling.innerHTML;
    let price_per_unit = price / quantity;
    let new_price = parseInt(price) + parseInt(price_per_unit);
    display_price.innerHTML = new_price;
};

change_price_with_qty_decrease = (e) => {
    let display_price = e.parentElement.nextElementSibling.childNodes[0].childNodes[1];
    let price = display_price.innerHTML;
    let quantity = e.nextElementSibling.innerHTML;
    let price_per_unit = price / quantity;
    let new_price = parseInt(price) - parseInt(price_per_unit);
    display_price.innerHTML = new_price;
};

change_savings_with_qty_decrease = (e) => {
    let display_price = e.parentElement.nextElementSibling.childNodes[1].childNodes[1];
    // console.log(display_price);
    let price = display_price.innerHTML;
    let quantity = e.nextElementSibling.innerHTML;
    let price_per_unit = price / quantity;
    let new_price = parseInt(price) - parseInt(price_per_unit);
    display_price.innerHTML = new_price;
};

remove_item = (e) => {
    let display_price = e.parentElement.nextElementSibling.childNodes[0].childNodes[1];
    let price = parseInt(display_price.innerHTML);
    let sub_total = document.getElementById("sub-total");
    let sub_total_amount = parseInt(sub_total.innerHTML);
    let new_total = sub_total_amount - price;
    sub_total.innerHTML = new_total;
    display_price.innerHTML = 0;
    e.parentElement.parentElement.style.display = "none";
    const items = document.getElementById("item-count");
    let left_items = parseInt(items.innerHTML);
    left_items -= 1;
    items.innerHTML = left_items;
};


remove_item_through_btn = (e) => {
    let display_price = e.parentElement.previousElementSibling.childNodes[0].childNodes[1];
    let price = parseInt(display_price.innerHTML);
    let sub_total = document.getElementById("sub-total");
    let sub_total_amount = parseInt(sub_total.innerHTML);
    let new_total = sub_total_amount - price;
    sub_total.innerHTML = new_total;
    display_price.innerHTML = 0;
    e.parentElement.parentElement.style.display = "none";
    const items = document.getElementById("item-count");
    let left_items = parseInt(items.innerHTML);
    left_items -= 1;
    items.innerHTML = left_items;
};