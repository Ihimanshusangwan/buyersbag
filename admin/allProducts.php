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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
    </style>
    <style>
        body {
            background-color: #f1f3f6;
        }
    </style>

</head>

<body>

    <?php include_once("adminHeader.php"); ?>
    <?php include_once("../backend/insertForm.php"); ?>
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
                <li><a href="catview.php?cat=$cat_name">$cat_name</a></li>
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
                        echo <<<box
                <div class="item-box">
                <div class="discount" >
                    <span>{$discount}% Off </span>
                </div>
                <div class="item-imgs">
                        <img src="{$data['img1']}" alt="no image available" >
                        
                </div>
                <div class="item-basic-details">
                    <div> <span class="brand-name">{$data['brand']}</span> <span class="p-ratings">{$data['ratings']}<span class="fa fa-star checked"></span></span></div>
                    <span class=" product-name">{$data['productname']}</span>
                    <span class="volume">{$data['volume']}</span>
                    <span class="prices" >Rs.<span class="sp"> {$displaySp}   </span ><s class="mrp">{$data['mrp']}</s></span>
                </div>
                <div class="item-control-btns">
                    <form action="deletionpage.php" method="POST"  >
                    <input type="hidden" value="{$data['id']}" name = "idfordeletion" >
                    <button type="submit" value="delete" name="delete" class="del-btn">Delete</button>
                    </form>
                    <form action="updatePage.php" method="POST"  >
                    <input type="hidden" value="{$data['id']}" name = "idtoedit" >
                    <button type="submit" value="edit" name="edit" class="edit-btn">Edit</button>
                    </form>
                </div>
            </div>
box;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php include_once("adminFooter.php"); ?>
    <?php mysqli_close($conn); ?>
    <?php include_once("../backend/contactForm.php"); ?>
    <script src="indexscript.js"></script>
    <script src="../homeJs/contact.js"></script>

</body>

</html>