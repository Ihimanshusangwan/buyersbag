<?php
include("connect.php");

$pname = $_REQUEST['pname'];
$bname = $_REQUEST['bname'];
$desc = $_REQUEST['desc'];
$volume = $_REQUEST['volume'];
$mrp = $_REQUEST['mrp'];
$sp = $_REQUEST['sp'];
$category = $_REQUEST['category'];
// echo $category;
$newcat = $_REQUEST['newcat'];
$ratings = $_REQUEST['ratings'];
// $img1 = $_FILES['img1'];
// $img2 = $_FILES['img2'];
// $img3 = $_FILES['img3'];
// $img4 = $_FILES['img4'];
// $img5 = $_FILES['img5'];
$newcatimg = $_FILES['newcatimg'];

if ($pname === "" || $volume === "" || $mrp === "" || $sp === "" || ($category === "none" && $newcat === "")) {
    die("fill all required fields");

} else {
    $catQuery = "SELECT catname FROM pcat ;";
    $catdata = mysqli_query($conn, $catQuery);
    if (mysqli_num_rows($catdata) > 0) {
        while ($row = mysqli_fetch_assoc($catdata)) {
            if ($row['catname'] == $newcat) {
                die("category already exists");
            }
        }
    }
}
$catToInsert = $category;
if ($category == "none" && $newcat != "") {
    $catToInsert = $newcat;
    $pcatQuery = " INSERT INTO pcat(catname) VALUE('$newcat');";
    mysqli_query($conn, $pcatQuery);
    $patimgquery = "SELECT catid FROM pcat WHERE catname = '$newcat';";
    $catimgqueryfire = mysqli_query($conn, $patimgquery);
    $catrow = mysqli_fetch_assoc($catimgqueryfire);
    $catid = (int) $catrow['catid'];
    $filename = $newcatimg['name'];
    $ext = explode(".", $filename);
    $extention = end($ext);
    $newfile = "../media/cimg/$catid.$extention";
    $tmpfile = $newcatimg['tmp_name'];
    move_uploaded_file($tmpfile, $newfile);
    $query2 = "UPDATE pcat SET catimgadd = '$newfile' WHERE catid = '$catid' ;";
    mysqli_query($conn, $query2);
}
$query1 = "INSERT INTO pinfo(productname,brand,description,volume,mrp,sellingprice,category,ratings) VALUES('$pname','$bname','$desc','$volume','$mrp','$sp','$catToInsert','$ratings');";
if (mysqli_query($conn, $query1)) {
    $q = "SELECT id FROM pinfo ORDER BY id desc";
    $data = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($data);
    $id = (int) $row['id'];
    $i = 1;
    $unique = "a";
    while ($i <= 5) {
        if ($i === 2) {
            $unique = "b";
        }
        if ($i === 3) {
            $unique = "c";
        }
        if ($i === 4) {
            $unique = "d";
        }
        if ($i === 5) {
            $unique = "e";
        }
        if ($_FILES['img' . "$i"]['name'] != "") {
            $img = $_FILES['img' . "$i"];
            $filename = $img['name'];
            $ext = explode(".", $filename);
            $extention = end($ext);
            $newfile = "../media/pimg/$id" . $unique . ".$extention";
            $tmpfile = $img['tmp_name'];
            move_uploaded_file($tmpfile, $newfile);
            $query2 = "UPDATE pinfo SET img$i = '$newfile' WHERE id = '$id' ;";
            if (mysqli_query($conn, $query2)) {
                $i++;
            } else {
                die("image not stored at server... delete this entry and retry");
            }
        } else {
            $i++;
        }


    }
    echo " <h1>Sucessfuly insertedd</h1> ";
    echo "<h3><br> Redirecting to home page............. </h3>";
    header("Refresh:2;url=../admin/index.php");


}


mysqli_close($conn);
?>