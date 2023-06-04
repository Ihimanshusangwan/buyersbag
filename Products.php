<?php
include("backend/connect.php");
?>
<?php
 $item_count = 0;
 if (isset($_COOKIE['bag'])) {
     $bag = unserialize($_COOKIE['bag']);
     $item_count = count($bag);
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="media/icon.png" type="image/icon type">
    <title>Buyer's bag</title>
    <link rel="stylesheet" href="admin/adminStyle/footer_style.css">
    <link rel="stylesheet" href="homeStyle/itemStyling.css">
    <link rel="stylesheet" href="homeStyle/contactForm.css">
    <link rel="stylesheet" href="homeStyle/bagStyling.css">
    <link rel="stylesheet" href="admin/adminStyle/headerStyling.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin;>
    <link rel="stylesheet" href="homeStyle/Main.css">
    <style>
        body {
            background-color: #f1f3f6;
            margin: 0;
            font-family: 'Josefin Sans', sans-serif;
        }

        .cat-view-body {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;

        }

        .all-cat-select-box {
            display: inline-block;
            width: 17vw;
            height: max-content;
            font-size: 1.5rem;
            position: sticky;
            top: 7.2rem;
            border: 1px solid rgb(224, 224, 224);
            padding: 0.9rem;
            margin: 0.6rem;
            background-color: white;
        }

        .all-cat-select-box ul li {
            list-style: none;
            margin: 0.7rem 0px;
        }

        .all-cat-select-box ul li a {
            text-decoration: none;
            color: black;

        }

        .cat-items-view-box {
            width: 83vw;
            border: 1px solid rgb(224, 224, 224);
            font-size: 1.2rem;
            padding: 0.9rem;
            margin-top: 0.6rem;
            background-color: white;
        }

        @media only screen and (max-width: 800px) {
            .all-cat-select-box {
                display: none;

            }

            .cat-items-view-box {
                width: 100%;
                margin: auto;
            }

        }
    </style>

</head>

<body>
    <?php include("backend/mail.php"); ?>
    <?php include("backend/myBag.php"); ?>
    <div class="header">
        <img class="logo" src="media/logo.png" alt="Buyer's Bag" onclick="window.location.assign('index.php')">
        <div class="navbar">
            <ul>
                <li> <a class="navbar-btn" href="index.php">Home</a></li>
                <li> <a class="navbar-btn" href="">Shop</a></li>
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
        <div class="all-cat-select-box">
            <h3 id="all-cat-heading">Categories</h3>
            <ul>
                <?php
                $all_cat_select_query = "SELECT catname FROM pcat ;";
                $fetched_cat = mysqli_query($conn, $all_cat_select_query);
                if (mysqli_num_rows($fetched_cat) > 0) {
                    while ($cat_row = mysqli_fetch_assoc($fetched_cat)) {
                        $cat_name = $cat_row['catname'];
                        echo <<<cat
                <li><a href="catView.php?cat=$cat_name">$cat_name</a></li>
cat;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="cat-items-view-box">
            <h2>Showing Products from all Catagory</h2>
            <h4 class="total-items-in-cat">
                <?php
                $get_items_Query = "SELECT * FROM pinfo ;";
                $query_result = mysqli_query($conn, $get_items_Query);
                $no_of_rows = mysqli_num_rows($query_result);
                echo <<<total
            Showing 0 - {$no_of_rows} products of {$no_of_rows} products
total;
                ?>
            </h4>
            <div class="all-item-container">
                <?php
                if ($no_of_rows > 0) {
                    while ($data = mysqli_fetch_assoc($query_result)) {
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
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php include_once("footer.php"); ?>
    <?php include("backend/contactForm.php"); ?>
    <script src="homeJs/contact.js"></script>
    <script src="homeJs/myBag.js"></script>
    <?php mysqli_close($conn); ?>
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