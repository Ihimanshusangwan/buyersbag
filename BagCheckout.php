<?php
include("backend/connect.php");

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="media/icon.png" type="image/icon type">

    <title>Buyer's bag</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="homeStyle/main.css">

    <link rel="stylesheet" href="admin/adminStyle/footer_style.css">

    <link rel="stylesheet" href="admin/adminStyle/headerStyling.css">

    <!-- <link rel="stylesheet" href="itemStyling.css"> -->

    <!-- <link rel="stylesheet" href="bagStyling.css"> -->

    <link rel="stylesheet" href="homeStyle/contactForm.css">

    <link rel="stylesheet" href="homeStyle/BagCheckout.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin;>

    <link rel="stylesheet" href="homeStyle/Main.css">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style>

        @media only screen and (max-width: 800px) {

            .header {

                justify-content: flex-start;

            }



            .logo {

                margin-left: 2rem;

            }



            #bag-items-wrapper {

                width: 100%;

            }



            .bag-hover-item-wrapper {

                height: 10rem;

            }



            body {

                font-size: 1.1rem;

            }



            #checkout {

                font-size: 1.3rem;

            }



            .saving-wrapper {

                font-size: 1rem;

            }



            .total-amount-wrapper {

                font-size: 1.9rem;

            }



            #empty-bag,

            #continue-shopping {

                font-size: 1rem;

            }

        }

    </style>

</head>



<body>

    <div class="header">

        <img class="logo" src="media/logo.png" alt="Buyer's Bag" onclick="window.location.assign('index.php')">

        <div class="navbar">

            <ul>

                <li> <a class="navbar-btn" href="index.php">Home</a></li>

                <li> <a class="navbar-btn" href="index.php">Categories</a></li>

                <li> <a class="navbar-btn" href="Products.php">Shop</a></li>

                <li> <a class="navbar-btn" href="">About</a></li>

                <li> <span class="navbar-btn contact-btn">Contact</span></li>

            </ul>

        </div>

    </div>

    <button id="burger-menu-btn"><i class="fa fa-bars"></i></button>

    <button id="burger-menu-close"><i class="fa fa-times" aria-hidden="true"></i></button>

    </div>

    <div id="burger-menu">

        <ul>

            <li> <a class="navbar-btn" href="index.php">Home</a></li>

            <li> <a class="navbar-btn" href="index.php">Categories</a></li>

            <li> <a class="navbar-btn" href="Products.php">Shop</a></li>

            <li> <a class="navbar-btn" href="about.php">About</a></li>

            <li> <span class="navbar-btn contact-btn">Contact</span></li>

        </ul>

    </div>

    <?php

    $item_in_bag = 0;

    if (isset($_COOKIE['bag'])) {
        $bag = unserialize($_COOKIE['bag']);
        $item_in_bag = count($bag);

    }

    ?>

    <div id="bag-items-wrapper">

        <h2 id="your-bag-heading"> Your Bag (

            <span id ="your-bag-item-count"><?php echo $item_in_bag; ?></span> items )

        </h2>



        <div class="item-wrapper-head">

            <div class="first-part">

                <div class="part-left"> ITEM DESCRIPTION</div>

                <div class="part-middle">

                    <ul>

                        <li>QUANTITY</li>

                        <li>SUBTOTAL</li>

                    </ul>

                </div>

            </div>

            <div class="second-part">

                <div class="part-end"> SAVINGS</div>

            </div>

        </div>

        <?php

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

                        <img src="admin/{$data['img1']}" alt="no-image" onclick='window.location.assign("itemView.php?pid={$data['id']}")'>

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

                    <div class="bag-hover-price-viewer"><div class="bag-hover-sp"><span>Rs </span><span class = "bag-hover-item-price">$display_price</span></div>

                    </div>

                    <div class="bag-hover-remove-item">

                        <button class="bag-hover-remove-btn" value="{$data['id']}">x</button>

                    </div>

                    <div class="bag-hover-discount"><span><span>Rs. </span><span class="saving-rs">$display_savings</span></span></div>

                </div>

        item;

            }

            ;





        }

        ?>

        <div class="main-checkout-wrapper">

            <div class="empty-continue-wrapper">

                <span id="caution" style="color: red; font-size: 15px;"></span>

                <button id="empty-bag"><i class="fa fa-shopping-basket basket-icon"></i> EMPTY BAG</button>

                <button id="continue-shopping">CONTINUE SHOPPING</button>

            </div>

            <div class="total-saving-checkout-wrapper">

                <div class="total-saving-wrapper">

                    <div class="total-wrapper">

                        <div class="subtotal-delivery-wrapper">

                            <div class="subtotal"><span>Subtotal</span><span><span>Rs. </span><span

                                        id="subtotal"></span></span></div>

                            <div class="delivery"><span>Delivery</span><span>**</span></div>

                        </div>

                        <div class="total-amount-wrapper">

                            <div class="total">TOTAL</div>

                            <div class="amount"><span>Rs. </span><span id="total-amount"></span></div>

                        </div>

                    </div>



                    <div class="saving-wrapper">

                        <img src="media/savings_icon.png" alt="">

                        <span>You Saved!</span>

                        <span>Rs. <span id="total-savings"></span></span>

                    </div>

                </div>

                <div class="checkout-btn-wrapper">

                    <div id="checkout-btn-container"><button id="checkout">CHECKOUT</button></div>

                    <span>** Actual delivery charges computed at checkout time</span>

                </div>

            </div>

        </div>





    </div>











    <?php include("backend/contactForm.php"); ?>

    <?php include("footer.php"); ?>

    <?php mysqli_close($conn); ?>

    <script src="homeJs/contact.js"></script>

    <script src="homeJs/bagCheckout.js"></script>

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