<?php

include("backend/connect.php");
?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buyer's Bag</title>

    <link rel="icon" href="media/icon.png" type="image/icon type">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="admin/adminStyle/footer_style.css">

    <link rel="stylesheet" href="admin/adminStyle/headerStyling.css">

    <link rel="stylesheet" href="homeStyle/itemStyling.css">

    <link rel="stylesheet" href="homeStyle/bagStyling.css">

    <link rel="stylesheet" href="homeStyle/contactForm.css">

    <link rel="stylesheet" href="homeStyle/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin;>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="homeStyle/Main.css">

    <style>



    </style>

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

                <li> <a class="navbar-btn" href="#categories">Categories</a></li>

                <li> <a class="navbar-btn" href="Products.php">Shop</a></li>

                <li> <a class="navbar-btn" href="about.php">About</a></li>

                <li> <span class="navbar-btn contact-btn">Contact</span></li>

            </ul>

        </div>

        <div id="my-bag">

            <i class="fa fa-shopping-basket"></i>

            <div id="my-bag-contents">

                <span id="my-bag-heading"> My Bag</span>

                <span id="no-of-items"> <span id="item-count">

                        <?php echo $item_count; ?>

                    </span> items</span>

            </div>

        </div>

        <button id="burger-menu-btn"><i class="fa fa-bars"></i></button>

        <button id="burger-menu-close"><i class="fa fa-times" aria-hidden="true"></i></button>

    </div>

    <div id="burger-menu">

        <ul>

            <li> <a class="navbar-btn" href="index.php">Home</a></li>

            <li> <a class="navbar-btn" href="#top">Categories</a></li>

            <li> <a class="navbar-btn" href="Products.php">Shop</a></li>

            <li> <a class="navbar-btn" href="about.php">About</a></li>

            <li> <span class="navbar-btn contact-btn">Contact</span></li>

        </ul>

    </div>

    <div class="home-page-img-wrapper">

        <div class="empty-space">



        </div>

        <div class="img-wrapper">

            <div class="image-overlay"><span>Avail Best <span style="color: red;">Discounts</span> Today</span></div>

        </div>

        <div class="floating-wrapper">

            <span class="upto"> Upto</span>

            <div class="off-box"><span class="percent">50%</span><span class="off">Off</span></div>

            <span class="foot">on daily requirements</span>

        </div>

    </div>



    <h2 class="all-items-heading " id="categories">View Products by Category</h2>

    <div class="all-categories-container">

        <?php

        $all_cat_select_query = "SELECT * FROM pcat ;";

        $fetched_cat = mysqli_query($conn, $all_cat_select_query);

        if (mysqli_num_rows($fetched_cat) > 0) {

            while ($cat_row = mysqli_fetch_assoc($fetched_cat)) {

                $cat_name = $cat_row['catname'];

                echo <<<cat

                <div class="view-item-by-category" onclick="window.location.assign('catView.php?cat=$cat_name')" >

                <img src="admin/{$cat_row['catimgadd']}" class="cat-img">

                </div>

                cat;

            }

        }

        ?>

    </div>

    <h2 class="all-items-heading">Best Selling Products</h2>

    <div class="all-item-container">

        <?php

        $top_rated_items_query = "SELECT * FROM pinfo ORDER BY ratings DESC;";

        $top_rated_items_query_result = mysqli_query($conn, $top_rated_items_query);

        if (mysqli_num_rows($top_rated_items_query_result) > 0) {

            $i = 1;

            while ($data = mysqli_fetch_assoc($top_rated_items_query_result)) {

                if ($i <= 10) {

                    $displaySp = (int) $data['sellingprice'];

                    $p_mrp = $data['mrp'];

                    $off = (($p_mrp - $displaySp) / $p_mrp) * 100;

                    $discount = (int) $off;
                    $qty = 0;

                    if (isset($_COOKIE['bag'])) {
                        $bag = unserialize($_COOKIE['bag']);
                    }               
                    if (isset($bag[$data['id']]['qty'])) {
                        $qty = $bag[$data['id']]['qty'];
                    } 
                    

                    echo <<<box

                    <div class="item-box" id="{$data['id']}">

                        <div class="discount" >

                            <span>{$discount}% Off </span>

                        </div>

                        <div class="item-imgs" onclick="window.location.assign('itemView.php?pid={$data['id']}')">

                                <img src="admin/{$data['img1']}" alt="no image available" >

                                

                        </div>

                        <div class="item-basic-details" onclick="window.location.assign('itemView.php?pid={$data['id']}')">

                            <div> <span class="brand-name">{$data['brand']}</span> <span class="p-ratings">{$data['ratings']}<span class="fa fa-star checked"></span></span></div>

                            <span class=" product-name">{$data['productname']}</span>

                            <span class="volume">{$data['volume']}</span>

                            <span class="prices" >Rs.<span class="sp"> {$displaySp}   </span ><s class="mrp" >{$data['mrp']}</s></span>

                        </div>

                        <div class="item-control-btns">

                        <button class="add-to-bag" value="{$data['id']}">ADD <i class="fa fa-shopping-cart" ></i></button>

                        <div class="quantity" ><button class="minus" value="{$data['id']}">-</button><span class="qty-amount">{$qty}</span><button class="plus" value="{$data['id']}">+</button></div>

                        </div>

                    </div>

box;

                    $i++;

                } else {

                    break;

                }



            }

        }

        ?>

    </div>

    <div class="why-choose-us-wrapper">

        <span id="why-choose-heading">Why to choose Buyer's Bag ?</span>

        <h5 class="feature-heading">

            <i class="fa fa-dot-circle-o"></i>





            Great discounts everyday.

        </h5>

        <span class="feature-desc">

            We provides our customers best deals to grab thier favourite products.

        </span>

        <h5 class="feature-heading">

            <i class="fa fa-dot-circle-o"></i>

            Hygine is our top priorty.

        </h5>

        <span class="feature-desc">

            All standard safety measures are taken to ensure the safety as it is our first motto.

        </span>

        <h5 class="feature-heading">

            <i class="fa fa-dot-circle-o"></i>

            Get the fresh grocery items everyday.

        </h5>

        <span class="feature-desc">

            Get access to the fresh products everyday.

        </span>

        <h5 class="feature-heading">

            <i class="fa fa-dot-circle-o"></i>

            Widest product range.

        </h5>

        <span class="feature-desc">

            we have a large variety of products so you will find all your essentials in one place.

        </span>

    </div>





    <?php include("backend/contactForm.php"); ?>

    <?php include("footer.php"); ?>

    <?php mysqli_close($conn); ?>

    <script src="homeJs/contact.js"></script>

    <!-- <script src="additem.js"></script> -->

    <script src="homeJs/myBag.js"></script>

    <script>

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

    </script>

</body>



</html>