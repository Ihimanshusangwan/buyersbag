<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/icon.png" type="image/icon type">
    <title>Buyer's bag</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/adminStyle/footer_style.css">
    <link rel="stylesheet" href="admin/adminStyle/headerStyling.css">
    <link rel="stylesheet" href="homeStyle/Main.css">
    <!-- <link rel="stylesheet" href="homeStyle/about.css"> -->
    <!-- <link rel="stylesheet" href="itemStyling.css"> -->
    <!-- <link rel="stylesheet" href="bagStyling.css"> -->
    <link rel="stylesheet" href="homeStyle/contactForm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin;>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        body {
            font-family: 'Josefin Sans', sans-serif;
        }

        .what-is-buyers-bag,
        .why-to-use {
            width: 80%;
            margin: auto;
            display: flex;
            flex-direction: row;


        }

        .what-is-buyers-bag {
            margin-top: 3rem;
        }

        .head-para-wrapper {
            width: 75%;
        }

        .what-heading,
        .why-heading {
            width: 100%;
            height: max-content;
            font-size: 2.5rem;
            color: #58595B;
            font-weight: 300;
            padding-bottom: 1.5rem;
            display: block;

        }

        .what-img,
        .why-img {
            width: 25%;
        }

        .what-para,
        .why-para {
            font-size: 1.7rem;
            color: #808285;
            line-height: 2rem;
        }

        .what-footer {
            color: #6D6E71;

            font-size: 1.8rem;
            font-weight: bold;
            width: 100%;
            display: block;
            margin: 2.2rem 0 0;
        }

        @media only screen and (max-width: 800px) {
            .header {
                justify-content: flex-start;

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
    <div class="header">
        <img class="logo" src="media/logo.png" alt="Buyer's Bag" onclick="window.location.assign('index.php')">
        <div class="navbar">
            <ul>
                <li> <a class="navbar-btn" href="index.php">Home</a></li>
                <li> <a class="navbar-btn" href="index.php">Categories</a></li>
                <li> <a class="navbar-btn" href="Products.php">Shop</a></li>
                <li> <a class="navbar-btn" href="about.php">About</a></li>
                <li> <span class="navbar-btn contact-btn">Contact</span></li>
            </ul>

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
            <img src="media/about_what.png" alt="Buyer's Bag">
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

            <img src="media/about_why.png" alt="Buyer's Bag">
        </div>

    </div>
    <?php include("footer.php"); ?>
    <?php include("backend/contactForm.php"); ?>
    <script src="homeJs/contact.js"></script>
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