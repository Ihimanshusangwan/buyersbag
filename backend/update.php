<?php
include("connect.php");


$id_for_updation = (int) $_REQUEST['idforupdate'];
$pname = $_REQUEST['pname'];
$bname = $_REQUEST['bname'];
$desc = $_REQUEST['desc'];
$volume = $_REQUEST['volume'];
$mrp = $_REQUEST['mrp'];
$sp = $_REQUEST['sp'];
$category = $_REQUEST['category'];
$ratings = $_REQUEST['ratings'];


if ($pname === "" || $volume === "" || $mrp === "" || $sp === "" || $category === "none") {
    die("fill all required fields");

}
$update_query = "UPDATE pinfo SET productname='$pname' ,brand='$bname',description='$desc',volume='$volume',mrp='$mrp',sellingprice='$sp',category='$category',ratings='$ratings' WHERE id= $id_for_updation;";

if (mysqli_query($conn, $update_query)) {
    $fetch_img_add_query = "SELECT img1,img2,img3,img4,img5 FROM pinfo WHERE id =$id_for_updation;";
    $fetch_img_add_query_result = mysqli_query($conn, $fetch_img_add_query);
    $img_add_data = mysqli_fetch_assoc($fetch_img_add_query_result);
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
        if ($_FILES['img' . "$i"]['name'] == $img_add_data["img$i"] || $_FILES['img' . "$i"]['name'] == "") {
            $i++;
            continue;
        } else {
            $img = $_FILES['img' . "$i"];
            $filename = $img['name'];
            $ext = explode(".", $filename);
            $extention = end($ext);
            $newfile = "../media/pimg/$id_for_updation" . $unique . ".$extention";
            if (file_exists($newfile)) {
                unlink($newfile);
            }
            $tmpfile = $img['tmp_name'];
            move_uploaded_file($tmpfile, $newfile);
            $query2 = "UPDATE pinfo SET img$i = '$newfile' WHERE id = $id_for_updation ;";
            if (mysqli_query($conn, $query2)) {
                $i++;
            } else {
                die("image not stored at server... delete this entry and retry");
            }
        }


    }
    echo " <h1>Sucessfuly updated </h1>";
    echo "<h3><br> Redirecting to home page............. </h3>";
    header("Refresh:2;url=../admin/index.php");

}


mysqli_close($conn);
?>