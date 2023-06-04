<?php
include("../backend/connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../media/icon.png" type="image/icon type">
    <title>Buyer's bag</title>
    <link rel="stylesheet" href="adminStyle/mainstyle.css">
    <link rel="stylesheet" href="adminStyle/footer_style.css">
    <link rel="stylesheet" href="../homeStyle/contactForm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin;>
    <style>
        body {
            font-family: 'Josefin Sans', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="../homeStyle/Main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <span id="home"></span>
    <?php include_once("adminHeader.php"); ?>
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

    <?php include_once("../backend/deleteitem.php"); ?>
    <!-- <button id="insertion-btn">Add New Product</button> -->

    <?php include_once("../backend/insertForm.php"); ?>

    <h2 class="all-items-heading " id="categories">View Products by Category</h2>
    <div class="all-categories-container">
        <?php
        $all_cat_select_query = "SELECT * FROM pcat ;";
        $fetched_cat = mysqli_query($conn, $all_cat_select_query);
        if (mysqli_num_rows($fetched_cat) > 0) {
            while ($cat_row = mysqli_fetch_assoc($fetched_cat)) {
                $cat_name = $cat_row['catname'];
                echo <<<cat
                <div class="view-item-by-category" onclick="window.location.assign('catview.php?cat=$cat_name')" >
                <img src="{$cat_row['catimgadd']}" class="cat-img">
                </div>
                cat;
            }
        }
        ?>
    </div>
    <h2 class="all-items-heading">Newly Added Products</h2>
    <div class="all-item-container">
        <?php include_once("latestitems.php"); ?>
    </div>
    <div id="top-rated-products">
        <h2 class="all-items-heading">Top Rated Products</h2>
        <div class="all-item-container">
            <?php include_once("topRatedItems.php"); ?>
        </div>
    </div>
    <?php include_once("adminFooter.php"); ?>
    <?php include_once("../backend/contactForm.php"); ?>

    <?php mysqli_close($conn); ?>
    <script src="indexscript.js"></script>
    <script src="../homeJs/contact.js"></script>
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