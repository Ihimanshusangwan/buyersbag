subTotal = () => {
    var sub_total = 0;
    document.querySelectorAll(".bag-hover-item-price").forEach((e) => {
        // console.log(e.innerHTML);
        sub_total += parseInt(e.innerHTML);
    });
    document.getElementById("subtotal").innerHTML = sub_total;
    document.getElementById("total-amount").innerHTML = sub_total;
};
totalSavings = () => {
    var total_savings = 0;
    document.querySelectorAll(".saving-rs").forEach((e) => {
        // console.log(e.innerHTML);
        total_savings += parseInt(e.innerHTML);
    });
    document.getElementById("total-savings").innerHTML = total_savings;

};
subTotal();
totalSavings();
document.getElementById("continue-shopping").addEventListener("click", () => {
    window.location.assign('index.php');
});
document.getElementById("empty-bag").addEventListener("click", () => {
    $.ajax({
        type: 'POST',
        data: "",
        url: 'backend/emptyBag.php',
        success: function (data) {
            if (data == "removed") {
                document.querySelectorAll(".bag-hover-item-wrapper").forEach((e) => {
                    e.style.display = "none";
                });
                window.location.assign("BagCheckout.php");
            }
            else {
                document.getElementById("caution").innerHTML = "Bag already empty";
            }
        },
        error: function (data) {
            console.log('Something went wrong.');
        }
    });
});
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
                totalSavings();

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
                    change_price_with_qty_decrease(e);
                    change_savings_with_qty_decrease(e);
                    subTotal();
                    totalSavings();
                    e.parentElement.parentElement.style.display = "none";
                    let bag_item_count = document.getElementById("your-bag-item-count");
                    curr_count = parseInt(bag_item_count.innerHTML);
                    curr_count-=1;
                    bag_item_count.innerHTML = curr_count;
                }
                else {
                    change_price_with_qty_decrease(e);
                    change_savings_with_qty_decrease(e);
                    let curr_qty = parseInt(e.nextElementSibling.innerHTML);
                    curr_qty -= 1;
                    e.nextElementSibling.innerHTML = curr_qty;
                    subTotal();
                    totalSavings();
                }
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
                    e.parentElement.previousElementSibling.children[0].children[1].innerHTML = 0;
                    e.parentElement.nextElementSibling.children[0].children[1].innerHTML = 0;
                    subTotal();
                    totalSavings();
                    e.parentElement.parentElement.style.display = "none";
                    let bag_item_count = document.getElementById("your-bag-item-count");
                    curr_count = parseInt(bag_item_count.innerHTML);
                    curr_count-=1;
                    bag_item_count.innerHTML = curr_count;
                }
            },
            error: function (data) {
                console.log('Something went wrong.');
            }
        });
    });
});

change_price_with_qty_increase = (e) => {
    const display_price = e.parentElement.nextElementSibling.childNodes[0].childNodes[1];
    let price = display_price.innerHTML;
    let quantity = e.previousElementSibling.innerHTML;
    let price_per_unit = price / quantity;
    let new_price = parseInt(price) + parseInt(price_per_unit);
    display_price.innerHTML = new_price;
};

change_savings_with_qty_increase = (e) => {
    let display_price = e.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.children[0].children[1];
    let price = display_price.innerHTML;
    let quantity = e.previousElementSibling.innerHTML;
    let price_per_unit = price / quantity;
    let new_price = parseInt(price) + parseInt(price_per_unit);
    display_price.innerHTML = new_price;
};
change_price_with_qty_decrease = (e) => {
    const display_price = e.parentElement.nextElementSibling.childNodes[0].childNodes[1];
    let price = display_price.innerHTML;
    let quantity = e.nextElementSibling.innerHTML;
    let price_per_unit = price / quantity;
    let new_price = parseInt(price) - parseInt(price_per_unit);
    display_price.innerHTML = new_price;
};

change_savings_with_qty_decrease = (e) => {
    let display_price = e.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.children[0].children[1];
    let price = display_price.innerHTML;
    let quantity = e.nextElementSibling.innerHTML;
    let price_per_unit = price / quantity;
    let new_price = parseInt(price) - parseInt(price_per_unit);
    display_price.innerHTML = new_price;
};
