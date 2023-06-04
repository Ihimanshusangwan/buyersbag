<?php include("../backend/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../media/icon.png" type="image/icon type">
    <title>Buyer's bag</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminStyle/footer_style.css">
    <link rel="stylesheet" href="adminStyle/mainstyle.css">
    <!-- <link rel="stylesheet" href="itemStyling.css"> -->
    <!-- <link rel="stylesheet" href="bagStyling.css"> -->
    <link rel="stylesheet" href="../homeStyle/contactForm.css">
    <link rel="stylesheet" href="../homeStyle/about.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin;>
    <link rel="stylesheet" href="../homeStyle/Main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        @media only screen and (max-width: 800px) {
            .header {
                justify-content: space-around;

            }

            .logo {
                margin-left: 2rem;
            }

            .what-is-buyers-bag,
            .why-to-use {
                flex-direction: column;
            }

            .head-para-wrapper {
                width: 100%;
            }

            .what-img,
            .why-img {
                width: max-content;
                margin: auto;
            }
        }
    </style>
</head>

<body>
    <?php include("adminHeader.php"); ?>
    <div id="burger-menu">
        <ul>
            <li> <a class="navbar-btn" href="index.php">Home</a></li>
            <li> <a class="navbar-btn" href="#categories">Categories</a></li>
            <li> <a class="navbar-btn" href="about.php">About</a></li>
            <li> <span class="navbar-btn contact-btn">Contact</span></li>
        </ul>
    </div>
    <button id="burger-menu-btn"><i class="fa fa-bars"></i></button>
    <button id="burger-menu-close"><i class="fa fa-times" aria-hidden="true"></i></button>

    <div class="what-is-buyers-bag">
        <div class="head-para-wrapper">
            <div class="what-heading"><span>What is Buyer's Bag</span></div>
            <div class="what-para">Buyer's Bag is India’s largest online
                food and grocery store. With over 18,000 products and over a 1000 brands in our catalogue you will find
                everything you are looking for. Right from fresh Fruits and Vegetables, Rice and Dals, Spices and
                Seasonings to Packaged products, Beverages, Personal care products, Meats – we have it all.
                Choose from a wide range of options in every category, exclusively handpicked to help you find the best
                quality available at the lowest prices. Select a time slot for delivery and your order will be delivered
                right to your doorstep, anywhere in Bangalore, Hyderabad, Mumbai, Pune, Chennai, Delhi, Noida, Mysore,
                Coimbatore, Vijayawada-Guntur, Kolkata, Ahmedabad-Gandhinagar, Lucknow-Kanpur, Gurgaon, Vadodara,
                Visakhapatnam, Surat, Nagpur, Patna, Indore and Chandigarh Tricity You can pay online using your debit /
                credit card or by cash / sodexo on delivery.
                We guarantee on time delivery, and the best quality!</div>
            <div class="what-footer">Happy Shopping</div>

        </div>
        <div class="what-img">
            <img src="../media/about_what.png" alt="Buyer's Bag">
        </div>
    </div>
    <div class="why-to-use">
        <div class="head-para-wrapper">
            <div class="why-heading"><span> Why should I use Buyer's Bag?</span></div>
            <div class="why-para">Buyer's Bag allows you to walk away from the drudgery of grocery shopping and
                welcome an easy relaxed way of browsing and shopping for groceries. Discover new products and shop for
                all your food and grocery needs from the comfort of your home or office. No more getting stuck in
                traffic jams, paying for parking, standing in long queues and carrying heavy bags – get everything you
                need, when you need, right at your doorstep. Food shopping online is now easy as every product on your
                monthly shopping list, is now available online at Buyer's Bag, India’s best online grocery store.
            </div>
        </div>
        <div class="why-img">

            <img src="../media/about_why.png" alt="Buyer's Bag">
        </div>

    </div>
    <?php include("adminfooter.php"); ?>
    <?php include("../backend/contactForm.php"); ?>
    <?php include_once("../backend/insertForm.php"); ?>
    <script src="../homeJs/contact.js"></script>
    <script src="indexscript.js"></script>
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