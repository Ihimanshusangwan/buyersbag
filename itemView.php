<?php
include("backend/connect.php");

$pid = $_REQUEST['pid'];

$item_data_query = "SELECT * FROM pinfo WHERE id = $pid;";

$item_query_result = mysqli_query($conn, $item_data_query);

$item_data = mysqli_fetch_assoc($item_query_result);

?>



<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="media/icon.png" type="image/icon type">

    <title>Buyer's bag</title>

    <link rel="stylesheet" href="homeStyle/itemStyling.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="homeStyle/contactForm.css">

    <link rel="stylesheet" href="admin/adminStyle/footer_style.css">

    <link rel="stylesheet" href="homeStyle/bagStyling.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="admin/adminStyle/headerStyling.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin;>

    <link rel="stylesheet" href="homeStyle/itemView.css">

    <link rel="stylesheet" href="homeStyle/Main.css">

</head>



<body>

    <?php include("backend/mail.php"); ?>

    <?php include("backend/myBag.php"); ?>

    <?php
    $item_count = 0;
    if (isset($_COOKIE['bag'])) {
        $bag = unserialize($_COOKIE['bag']);
        $item_count = count($bag);
    }
    ?>

    <div class="header">

        <img class="logo" src="media/logo.png" alt="Buyer's Bag" onclick="window.location.assign('index.php')">

        <div class="navbar">

            <ul>

                <li> <a class="navbar-btn" href="index.php">Home</a></li>

                <li> <a class="navbar-btn" href="Products.php">Shop</a></li>

                <li> <a class="navbar-btn" href="about.php">About</a></li>

                <li> <span class="navbar-btn contact-btn">Contact</span></li>

            </ul>

        </div>

        <button id="burger-menu-btn"><i class="fa fa-bars"></i></button>

        <button id="burger-menu-close"><i class="fa fa-times" aria-hidden="true"></i></button>

        <div id="my-bag">

            <i class="fa fa-shopping-basket"></i>

            <div id="my-bag-contents">

                <span id="my-bag-heading"> My Bag</span>

                <span id="no-of-items"> <span id="item-count">

                        <?php echo $item_count; ?>

                    </span> items</span>

            </div>

        </div>

    </div>

    <button id="close-cat" style=""><i class="fa fa-times" aria-hidden="true"></i></button>

    <div id="burger-menu">

        <ul>

            <li> <a class="navbar-btn" href="index.php">Home</a></li>

            <li> <a class="navbar-btn" href="#top" id="show-cat">Categories</a></li>

            <li> <a class="navbar-btn" href="Products.php">Shop</a></li>

            <li> <a class="navbar-btn" href="about.php">About</a></li>

            <li> <span class="navbar-btn contact-btn">Contact</span></li>

        </ul>

    </div>

    <div class="cat-view-body">

        <div class="all-cat-select-box" id="cat-box">

            <h3 id="all-cat-heading">Categories</h3>

            <ul>

                <?php

                $all_cat_select_query = "SELECT catname FROM pcat ;";

                $fetched_cat = mysqli_query($conn, $all_cat_select_query);

                if (mysqli_num_rows($fetched_cat) > 0) {

                    while ($cat_row = mysqli_fetch_assoc($fetched_cat)) {

                        $cat_name = $cat_row['catname'];

                        echo <<<cat

                <li><a href="catview.php?cat=$cat_name">$cat_name</a></li>

cat;

                    }

                }

                ?>

            </ul>

        </div>

        <div class="item-view-box">

            <div class="item-imgs-preview">

                <div id="main-img-preview">

                    <img src="admin/<?php echo $item_data['img1']; ?>" alt="image loading failed">

                </div>

                <div class="other-available-img">

                    <?php

                    $i = 1;

                    while ($i <= 5) {

                        if ($item_data["img" . "$i"] != "") {

                            echo <<<imgs

                            <div class = "other-img"> 

                             <img src="admin/{$item_data['img' . $i]}" alt="image loading failed" >

                            </div>

imgs;

                        }

                        $i++;

                    }

                    ?>

                </div>

            </div>

            <div class="item-details-preview">

                <span id="brand-name">

                    <?php echo $item_data['brand']; ?>

                </span>

                <span class="productname">

                    <?php echo $item_data['productname']; ?>

                </span>

                <span class="productname">

                    <?php echo $item_data['volume']; ?>

                </span>

                <span id="mrp"> MRP: Rs <s>

                        <?php echo $item_data['mrp']; ?>

                    </s></span>

                <span id="sp"> Price: Rs

                    <?php echo $item_data['sellingprice']; ?>

                </span>

                <span id="discount">You Save:

                    <?php

                    $displaySp = (int) $item_data['sellingprice'];

                    $p_mrp = $item_data['mrp'];

                    $off = (($p_mrp - $displaySp) / $p_mrp) * 100;

                    $discount = (int) $off;

                    echo $discount; ?>%

                </span>

                <span id="taxes">(Inclusive of all taxes)</span>

                <p id="p-ratings"> Ratings:

                    <?php echo $item_data['ratings']; ?><span class="fa fa-star checked"></span>

                </p>

                <button id="add-to-bag-item-view-page" value="<?php echo $item_data['id']; ?>">ADD T0 BAG</button>

                <?php

                $qty = 0;

                if (isset($_COOKIE['bag'])) {
                    $bag = unserialize($_COOKIE['bag']);
                }               
                if (isset($bag[$item_data['id']]['qty'])) {
                    $qty = $bag[$item_data['id']]['qty'];
                } 
                

                ?>

                <div id="quantity-item-view-page">

                    <button id="item-view-page-minus" value="<?php echo $item_data['id']; ?>">-</button>

                    <span id="item-view-page-qty">

                        <?php echo $qty; ?>

                    </span>

                    <button id="item-view-page-plus" value="<?php echo $item_data['id']; ?>">+</button>

                </div>

                <span id="desc-heading">Description</span>

                <p id="desc">

                    <?php echo $item_data['description']; ?>

                </p>



            </div>

        </div>

    </div>

    <h2 class="item-heading">Similar Products</h2>

    <div class="similar-item-box">

        <?php

        $similar_item_query = "SELECT * FROM pinfo WHERE category = '{$item_data['category']}';";

        $similar_item_query_result = mysqli_query($conn, $similar_item_query);

        $a = 1;

        while ($a <= 6 && $similar_item_data = mysqli_fetch_array($similar_item_query_result)) {

            if ($similar_item_data['id'] != $item_data['id']) {

                $qty = 0;
                if (isset($_COOKIE['bag'])) {
                    $bag = unserialize($_COOKIE['bag']);
                    if (isset($bag[$similar_item_data['id']]['qty'])) {
                        $qty = $bag[$similar_item_data['id']]['qty'];
                    } 
                }
                echo <<<box

                            <div class="item-box" id="{$similar_item_data['id']}">

                            <div class="discount" >

                                <span>{$discount}% Off </span>

                            </div>

                            <div class="item-imgs" onclick="window.location.assign('itemView.php?pid={$similar_item_data['id']}')">

                                    <img src="admin/{$similar_item_data['img1']}" alt="no image available" >

                                    

                            </div>

                            <div class="item-basic-details" onclick="window.location.assign('itemView.php?pid={$similar_item_data['id']}')">

                                <div> <span class="brand-name">{$similar_item_data['brand']}</span> <span class="p-ratings">{$similar_item_data['ratings']}<span class="fa fa-star checked"></span></span></div>

                                <span class=" product-name">{$similar_item_data['productname']}</span>

                                <span class="volume">{$similar_item_data['volume']}</span>

                                <span class="prices" >Rs.<span class="sp"> {$displaySp}   </span ><s class="mrp" >{$similar_item_data['mrp']}</s></span>

                            </div>

                            <div class="item-control-btns">

                            <button class="add-to-bag" value="{$similar_item_data['id']}">ADD <i class="fa fa-shopping-cart" ></i></button>

                            <div class="quantity" ><button class="minus" value="{$similar_item_data['id']}">-</button><span class="qty-amount">{$qty}</span><button class="plus" value="{$similar_item_data['id']}">+</button></div>

                            </div>

                        </div>

                box;

            }

        }

        ?>

    </div>

    <div id="popup-body">

        <div id="item-imgs-preview-popup-box">

            <div class="other-available-img-popup">

                <?php

                $i = 1;

                while ($i <= 5) {

                    if ($item_data["img" . "$i"] != "") {

                        echo <<<imgs

                    <div class = "other-img-popup"> 

                     <img src="admin/{$item_data['img' . $i]}" alt="image loading failed" >

                    </div>

imgs;

                    }

                    $i++;

                }

                ?>

            </div>

            <div id="main-img-preview-popup">

                <img src="admin/<?php echo $item_data['img1']; ?>" alt="image loading failed">

            </div>

            <i id="close-popup" class="fa fa-close"></i>

        </div>

    </div>



    <?php include("footer.php"); ?>

    <?php include("backend/contactForm.php"); ?>

    <script src="homeJs/contact.js"></script>

    <script src="homeJs/itemViewPage.js"></script>

    <?php mysqli_close($conn); ?>

    <script>

        document.getElementById("main-img-preview").addEventListener("click", () => {

            document.getElementById("popup-body").style.display = "flex";

        });

        document.getElementById("close-popup").addEventListener("click", () => {

            document.getElementById("popup-body").style.display = "none";

        });

        document.querySelectorAll(".other-img").forEach(function (e) {

            e.addEventListener("click", function () {

                let main_img = document.getElementById("main-img-preview");

                main_img.innerHTML = e.innerHTML;

            })

        });

        document.querySelectorAll(".other-img-popup").forEach(function (e) {

            e.addEventListener("click", function () {

                let main_img = document.getElementById("main-img-preview-popup");

                main_img.innerHTML = e.innerHTML;

            })

        });

        document.getElementById("burger-menu-btn").addEventListener("click", () => {

            document.getElementById("burger-menu-btn").style.display = "none";

            document.getElementById("burger-menu").style.display = "block";

            document.getElementById("burger-menu-close").style.display = "inline-block";



        });

        document.getElementById("burger-menu-close").addEventListener("click", () => {

            document.getElementById("burger-menu-close").style.display = "none";

            document.getElementById("burger-menu").style.display = "none";

            document.getElementById("burger-menu-btn").style.display = "inline-block";



        });

        document.getElementById("close-cat").addEventListener("click", () => {

            document.getElementById("cat-box").style.display = "none";

            document.getElementById("close-cat").style.display = "none";



        });

        document.getElementById("show-cat").addEventListener("click", (e) => {

            e.preventDefault();

            document.getElementById("cat-box").style.display = "inline-block";

            document.getElementById("burger-menu").style.display = "none";

            document.getElementById("burger-menu-close").style.display = "none";

            document.getElementById("burger-menu-btn").style.display = "inline-block";

            document.getElementById("close-cat").style.display = "inline-block";



        });

    </script>

</body>



</html>