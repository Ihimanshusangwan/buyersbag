<?php

include("connect.php");

if (isset($_COOKIE['bag'])) {
    $bag = unserialize($_COOKIE['bag']);
    foreach ($bag as $item) {

        $id = $item['pid'];

        $query = "SELECT id,productname,brand,mrp,sellingprice,img1 FROM pinfo where id = $id;";

        $query_result = mysqli_query($conn, $query);

        $data = mysqli_fetch_assoc($query_result);

        $saving = $data['mrp'] - $data['sellingprice'];

        $display_price = (int) $data['sellingprice'] * (int) $item['qty'];

        $display_savings = (int) $saving * (int) $item['qty'];

        echo <<<item

            <div class="bag-hover-item-wrapper" >

            <div class="bag-hover-item-main-img">

                <img src="media/{$data['img1']}" alt="no-image" onclick='window.location.assign("itemView.php?pid={$data['id']}")'>

            </div>

            <div class="bag-hover-item-details">

                <span class="bag-item-brand">{$data['brand']}</span>

                <p class="bag-item-product">{$data['productname']}</p>

            </div>

            <div class="bag-hover-qty-changer">

            

            <button class="bag-hover-minus" value="{$data['id']}">-</button>

            <span class="bag-hover-qty">{$item['qty']}</span>

            <button class="bag-hover-plus" value="{$data['id']}">+</button>

            

            </div>

            <div class="bag-hover-price-viewer"><div class="bag-hover-sp"><span>Rs </span><span class = "bag-hover-item-price">$display_price</span></div><div class="bag-hover-discount"><span>Saved Rs. </span><span class="saving-rs">$display_savings</span></div>

            </div>

            <div class="bag-hover-remove-item">

                <button class="bag-hover-remove-btn" value="{$data['id']}">x</button>

            </div>

        </div>

item;

    }

    ;





}

?>