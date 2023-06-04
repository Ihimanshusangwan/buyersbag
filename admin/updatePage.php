<?php
include("../backend/connect.php");
$edit_id = (int) $_REQUEST['idtoedit'];
$edit_Query = "SELECT * FROM pinfo WHERE id = $edit_id ;";
$edit_query_result = mysqli_query($conn, $edit_Query);
$edit_item = mysqli_fetch_assoc($edit_query_result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../media/icon.png" type="image/icon type">
    <title>Buyer's bag</title>
    <link rel="stylesheet" href="adminStyle/mainstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../homeStyle/contactForm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin;>
    <link rel="stylesheet" href="adminStyle/footer_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        #insert-form {
            display: block;
            position: static;
            margin: auto;
        }

        .image-viewer-for-edit {
            height: max-content;
            width: 80vw;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .image-viewer-for-edit div {
            height: 300px;
            width: 300px;
            margin: 15px;
            border: 1.5px solid grey;
            text-align: right;
            background-color: white;
        }

        .image-viewer-for-edit div img {
            height: 250px;
            width: 300px;
        }

        .image-viewer-for-edit div input {
            margin-top: 11px;
        }

        .no-img {
            display: flex;
            height: 250px;
            width: 300px;
            align-items: center;
            justify-content: center;
        }
    </style>
    <link rel="stylesheet" href="../homeStyle/Main.css">
</head>

<body>
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

    <div id="insert-form">
        <form action="../backend/update.php" method="POST" enctype="multipart/form-data">
            <div class="names form-elements">
                <div><label for="pname" class="input-label">Product Name: </label><span style="color: red;">*</span>
                    <input class="input" type="text" value="<?php echo $edit_item['productname'] ?>" name="pname"
                        required>
                </div>
                <div><label for="bname" class="input-label">Brand Name: </label>
                    <input class="input" type="text" value="<?php echo $edit_item['brand'] ?>" name="bname">
                </div>
            </div>
            <label for="desc" class="input-label form-elements">Description</label>
            <textarea name="desc" cols="30" rows="10"><?php echo $edit_item['description'] ?></textarea>
            <label for="volume " class="input-label form-elements"> Product Weight/Volume<span
                    style="color: red;">*</span></label>
            <input class="input" type="text" value="<?php echo $edit_item['volume'] ?>" id="vol" name="volume" required>
            <div class="prices form-elements">
                <div><label for="mrp" class="input-label">MRP price: </label><span style="color: red;">*</span>
                    <input class="input" type="text" value="<?php echo $edit_item['mrp'] ?>" name="mrp" required>
                </div>
                <div><label for="sp" class="input-label">Selling price: </label><span style="color: red;">*</span>
                    <input class="input" type="text" value="<?php echo $edit_item['sellingprice'] ?>" name="sp"
                        required>
                </div>
            </div>
            <div class="existing-cat">
                <label for="category" class="input-label">Product category: </label><span style="color: red;">*</span>
                <select name="category">
                    <option value="none" hidden>Select an Option</option>
                    <?php
                    $catQuery = "SELECT catname FROM pcat ;";
                    $catdata = mysqli_query($conn, $catQuery);
                    if (mysqli_num_rows($catdata) > 0) {
                        while ($row = mysqli_fetch_assoc($catdata)) {
                            if ($edit_item['category'] === $row['catname']) {
                                echo " <option value ='{$row['catname']}' selected>" . $row['catname'] . "</option>";
                            } else {
                                echo " <option value ='{$row['catname']}' >" . $row['catname'] . "</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="ratings form-elements">
                <label for="ratings" class="input-label">Product ratings: </label>
                <select name="ratings" required>
                    <?php
                    $r = 5.0;
                    while ($r >= 1.0) {

                        if ((string) $r == (string) $edit_item['ratings']) {
                            echo "<option value = '$r' selected>$r</option>";
                        } else {
                            echo " <option value = '$r' >$r</option>";
                        }
                        $r -= 0.1;
                    }
                    ?>
                </select>
            </div>
            <div class="image-viewer-for-edit">
                <?php
                $i = 1;
                $unique = 'a';
                while ($i <= 5) {
                    if ($edit_item["img$i"] !== "") {
                        echo <<<img
                        <div>
                        <img src="{$edit_item["img$i"]}" alt="image loading failed" >
            
                        <input type="file" name="img$i" accept=".jpeg,.png,.jpg" >                      
                        </div>
img;
                    } else {
                        echo <<<add
                            <div>
                            <span class="no-img">No Image available</span>
                            <input type="file" name="img$i" accept=".jpeg,.png,.jpg" >                      
                            </div>
    add;
                    }
                    $i++;
                }

                ?>
            </div>
            <input type="hidden" value="<?php echo $_REQUEST['idtoedit']; ?>" name="idforupdate">
            <div class="btn form-elements">
                <input type="submit" value="Update" name="update" id="form-insert-btn">

            </div>

        </form>
    </div>
    <?php include_once("adminFooter.php"); ?>
    <?php include_once("../backend/contactForm.php"); ?>
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